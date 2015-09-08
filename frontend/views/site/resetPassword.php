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

        <p id="forgotText">Please choose your new password:</p>
 
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
            'id'          => 'reset-password-form',
            'fieldConfig' => [
                'template'  => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}"
            ],
            'options'     => ['class' => 'm-t', 'role' => 'form'],

        ]);
        ?>

        <?= $form->field($model, 'password',['inputOptions'=>['class'=>'form-control black-font']])->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-warning block full-width m-b', 'name' => 'reset-button']) ?>
        </div>
        </div>
 
 
        <?php ActiveForm::end(); ?>

        <p class="m-t"> <small>Hybrizy &copy; 2014 Apt Inventions Sdn. Bhd.</small> </p>
    </div>
</div>
 
