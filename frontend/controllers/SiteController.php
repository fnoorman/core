<?php
namespace frontend\controllers;

use Yii;
use common\models\User;
use common\models\LoginForm;
use common\models\OrderForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\db\Query;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Package;
use common\models\PackageSearch;
use common\models\Offer;
use yii\data\ActiveDataProvider;


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


//        $searchModel = new PackageSearch();
//        $searchModel->enable =1;
//        $dataProvider = $searchModel->search('');
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $query = new Query;
        $activeDataProvider = new ActiveDataProvider([
            'query' => Package::find(),
            'pagination' => [
                    'pageSize' => 4,
            ],
        ]);

        $dataProvider = $activeDataProvider->getModels();

        return $this->render('landing',[
//          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,

          ]);
    }

    /**
     * Displays main homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
    	if (!\Yii::$app->user->isGuest) {
        	$this->layout = "columns-2";

        	return $this->render('index');
        }else {
            return $this->actionLogin();
        }
    }
    /**
     * Displays campaign page.
     *
     * @return mixed
     */
    public function actionCampaign()
    {

    	if (!\Yii::$app->user->isGuest) {
        	$this->layout = "columns-2";
        	return $this->render('campaign',['title'=> 'Campaign']);
        }else {
            return $this->actionLogin();
        }
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

            //return $this->actionIndex();
            return $this->goHome();
            	//$this->layout = "columns-2";
        	//return $this->render('index', ['model' => $model,]);

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
      //  return \Yii::$app->mailer->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['user' => $user])
                 //   ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' - Sign up Verification'])
                 //   ->setTo('koihafiz@gmail.com')
                  //  ->setSubject('try je laaaa...')
                   // ->send();
       // return \Yii::$app->mailer->compose()
    //->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' - Sign up Verification'])
   /// ->setTo('koihafiz@gmail.com')
   // ->setSubject('Message subject')
   // ->setHtmlBody('<b>HTML content</b>')
   // ->send();
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
            if ($user = $model->signup())
            {
                /*if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }*/

                $authKey = $user->getAuthKey();
                $regMail = $user->getEmail();
                $userName= $user->username;



                $to = $regMail;
                $hybrizyAdmin = "Hybrizy.com";
                $subject = "Hybrizy Sign up Verification";
                $message = "<b>Hi $userName, <br><br>This is a verification email for Hybrizy sign up. </b>";
                $message .= "<b>Please click the link below to verify your account.<br><br> </b>";
                $header = "From:admin@hybrizy.com \r\n";
                //$header = "Cc:afgh@somedomain.com \r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-type: text/html\r\n";

                $message .= "".\yii\helpers\Html::a('Click here to verify your account.',
                Yii::$app->urlManager->createAbsoluteUrl(
                ['site/verify','key'=>$authKey, 'email'=>$regMail]
                ));

                $sendMail = \Yii::$app->mailer->compose()
                ->setFrom([\Yii::$app->params['supportEmail'] => $hybrizyAdmin])
                ->setTo($to)
                ->setSubject($subject)
                ->setHtmlBody($message)
                ->send();

                if($sendMail)
                    //return $this->actionIndex('Sila Rujuk email!');
                    return $this->render('landing', [
            			'referEmail' => 'Please refer your Email address for verification.',
       			 ]);
                   // return $this->goHome();
            }
        }
        //forgot


        // forgot
        $this->layout='inspinia/base';
        return $this->render('hybrizy-signup', [
            'model' => $model,
        ]);
    }

         /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionVerify()
    {

        //$model = new User();
        $key = Yii::$app->request->get('key');
        $email = Yii::$app->request->get('email');

        $model = User::findByEmail($email, User::STATUS_PENDING_VERIFICATION);

        if ($model) {
           if($model->validateAuthKey($key)) {


                $model->generateAuthKey();
                $newKey = $model->getAuthKey();
                $model->auth_key = $newKey;
                $model->status = User::STATUS_ACTIVE;
                $model->save();


                Yii::$app->user->login($model);
                //return $this->goHome();
                return $this->actionIndex();

            }else {
            $wrong = "Please be noted that this link has been taken/verify before. Please consult your sytem admin if you got any problem regarding this issue.";
            return $this->render('emailVerification', [
                'wrong' => $wrong,
            ]);
            }
        }
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
	$this->layout='inspinia/base';
        return $this->render('hybrizy-forgot', [
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
	$this->layout='inspinia/base';
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
