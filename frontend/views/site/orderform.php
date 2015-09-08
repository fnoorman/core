<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\widgets\ActiveForm */
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['site/orderform']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(['id' => 'form-order']); ?>
    <?php echo $firstName; ?>
    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orderId')->textInput() ?>

    <?= $form->field($model, 'package')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'type_package')->dropDownList(['z' => 'Please Select', 'a1' => 'Custom Package', 'b1' => 'Fix Package'],['options' =>
          //           [
          //             'z' => ['selected' => true]
          //           ]
          // ]); ?>

    <?= $form->field($model, 'totalPrice')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'dateTime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>
