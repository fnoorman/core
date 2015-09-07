<?php
namespace frontend\controllers;

use Yii;
use common\models\User;
use common\models\LoginForm;
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
            //return $this->goBack();
            	$this->layout = "columns-2";
        	return $this->render('index', [
                'model' => $model,
            ]);
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
}
