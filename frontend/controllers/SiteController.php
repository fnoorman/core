<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use common\models\OrderForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout;
    public $enableCsrfValidation = true;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionLanding()
    {
        $this->layout = 'unify/base';
        return $this->render('landing');
    }

    /**
     * Displays main homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "columns-2";
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $this->layout='inspinia/base';
            return $this->render('hybrizy-login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        $this->layout='inspinia/base';
        return $this->render('hybrizy-signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    public function actionOrderform()
    {
          $this->layout = 'main';
          $model = new OrderForm();
          if ($model->load(Yii::$app->request->post()) && $model->save()) {
              return $this->redirect(['orderview', 'id' => $model->id]);

          } else {
              return $this->render('orderform', [
                  'model' => $model,
                  'firstName' => $model->firstName,
              ]);
          }


    }
    public function beforeAction($action)
    {
        if ($action->id === 'paymentsuccess') {
            $this->enableCsrfValidation = false;
        }else {
             $this->enableCsrfValidation = true;
        }

        return parent::beforeAction($action);
    }
    public function actionOrderview($id)
    {
        $this->layout = "inspinia/base";

        return $this->render('orderview', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionPaymentsuccess()
    {
    //Yii::app()->request->enableCsrfValidation = false;
       // $this->enableCsrfValidation = false;
        $this->layout = "main";
        $molpayReturn = [];
            $molpayReturn['tranID'] = Yii::$app->request->post('tranID');
            $molpayReturn['orderid'] = Yii::$app->request->post('orderid');
            $molpayReturn['status'] = Yii::$app->request->post('status');
            $molpayReturn['domain'] = Yii::$app->request->post('domain');
            $molpayReturn['amount'] = Yii::$app->request->post('amount');
            $molpayReturn['currency'] = Yii::$app->request->post('currency');
            $molpayReturn['appcode'] = Yii::$app->request->post('appcode');
            $molpayReturn['paydate'] = Yii::$app->request->post('paydate');
            $molpayReturn['channel'] = Yii::$app->request->post('channel');
            $molpayReturn['skey'] = Yii::$app->request->post('skey');
            $molpayReturn['error_code'] = Yii::$app->request->post('error_code');
            $molpayReturn['error_desc'] = Yii::$app->request->post('error_desc');


         //print_r($molpayReturn);
         //return $this->render('molpayReturn');
         return $this->render('paymentsuccess',
         ['returnData' => $molpayReturn]

         );

    }

    protected function findModel($id)
    {
        if (($model = OrderForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDeletecartitem($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['orderview']);
    }
}
