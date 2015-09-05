<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
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
        <h3>Register to Hybrizy</h3>
        <p>Create account to see it in action.</p>
        <?php
        $form = ActiveForm::begin([
            'id'          => 'form-login',
            'fieldConfig' => [
                'template'  => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}"
            ],
            'options'     => ['class' => 'm-t', 'role' => 'form'],

        ]);
        ?>
        <style>
            .black-font {
                color: #000;
            }

            .hybrizy-error-blue {
                color: #29abe2;
                font-weight: bold;
            }
        </style>

        <?= $form->field($model, 'email',['inputOptions'=>['placeholder'=>'Enter Email','class'=>'form-control black-font'],'errorOptions'=>['class'=>'hybrizy-error-blue']]) ?>
        <?= $form->field($model, 'password',['inputOptions'=>['placeholder'=>'Enter Password','class'=>'form-control black-font'],'errorOptions'=>['class'=>'hybrizy-error-blue']])->passwordInput() ?>
        <div class="form-group">
            <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Sign-In', ['class' => 'btn btn-warning block full-width m-b', 'name' => 'signup-button']) ?>
        </div>
        <p class="text-center"><small>Already have an account?</small></p>
        <a class="btn btn-sm btn-primary btn-block" href="login.html">Login</a>
        <?php ActiveForm::end(); ?>

        <p class="m-t"> <small>Hybrizy &copy; 2014 Apt Inventions Sdn. Bhd.</small> </p>
    </div>
</div>
