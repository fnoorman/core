<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
$this->params['bodyClass'] = 'hybrizy-purple-bg';
?>
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">HY+</h1>
        </div>
        <h3>Welcome to Hybrizy</h3>
        <?php
        $resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => 'adf gyr3fer435rgeg']);
        echo "===> ".$resetLink;
        ?>
        <p>A tiny code that promises awesome feedback from your customers and audiences.
            An innovating approach for creating attention-grabbing contents.
        </p>
        <p id="forgotText">Please fill out your email. A link to reset password will be sent there.</p>
 
        <style>
            .black-font {
                color: #000;
            }

            .hybrizy-error-blue {
                color: #29abe2;
                font-weight: bold;
            }

            a.hybrizy-error-blue:hover {
                color: #18a689;
                font-weight: bold;
            }

        </style>
 
    
        <div id="formForgotOB">
        <?php
        $form = ActiveForm::begin([
            'id'          => 'request-password-reset-form',
            'fieldConfig' => [
                'template'  => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}"
            ],
            'options'     => ['class' => 'm-t', 'role' => 'form'],

        ]);
        ?>

        <?= $form->field($model, 'email',['inputOptions'=>['placeholder'=>'Enter Email','class'=>'form-control black-font'],'errorOptions'=>['class'=>'hybrizy-error-blue']]) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-warning block full-width m-b', 'name' => 'forgot-button']) ?>
        </div>
        </div>
        <a id="formsControlzBack" onclick="getLoginForm()" href="<?php echo Url::to(['site/login']); ?>" class="hybrizy-error-blue"><small>Back to login</small></a>
        <p class="text-muted text-center" style="color: #fff"><small>Do not have an account?</small></p>
        <a class="btn btn-sm btn-primary btn-block" href="<?=Url::to(['site/signup'])?>">Create an account</a>
        <?php ActiveForm::end(); ?>

        <p class="m-t"> <small>Hybrizy &copy; 2014 Apt Inventions Sdn. Bhd.</small> </p>
    </div>
</div>
 
