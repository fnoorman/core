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
<div class="loginColumns animated fadeInDown">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-lg-12">
                    <img alt="image"  src="images/logo_hybrizy.png" />
                </div>
            </div>
            <div class="row">

            </div>


        </div>
        <div class="col-md-6">
            <div class="ibox-content">
                <?php
                $form = ActiveForm::begin([
                    'id'          => 'form-signup',
                    'fieldConfig' => [
                        'template'  => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}"
                    ],
                    'options'     => ['class' => 'm-t', 'role' => 'form'],
                ]);
                ?>
                <?= $form->field($model, 'username',['inputOptions'=>['placeholder'=>'Enter Username']]) ?>
                <?= $form->field($model, 'email',['inputOptions'=>['placeholder'=>'Enter Email']]) ?>
                <?= $form->field($model, 'password',['inputOptions'=>['placeholder'=>'Enter Password']])->passwordInput() ?>
                <?= $form->field($model, 'confirmPassword',['inputOptions'=>['placeholder'=>'Confirm Your Password']])->passwordInput() ?>
                <div class="form-group">
                    <div class="checkbox i-checks"><label style="color: #1c84c6;"> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-warning block full-width m-b', 'name' => 'signup-button']) ?>
                </div>
                <p class="text-success text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-primary btn-block" href="<?=Url::to(['site/login'])?>">Login</a>
                <?php ActiveForm::end(); ?>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6 text-right">
            <small>Hybrizy Apt Inventions Sdn. Bhd.© 2014-2015</small>
        </div>
    </div>
</div>
