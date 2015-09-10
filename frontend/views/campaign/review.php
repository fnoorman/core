<?php
/**
 * Created by PhpStorm.
 * User: Fahmy
 * Date: 9/9/15
 * Time: 3:18 AM
 */
use dosamigos\ckeditor\CKEditor;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div class="wrapper wrapper-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h1>This is review</h1>

                </div>
                <div class="ibox-content">
                    <?php $form = ActiveForm::begin()?>
                        <?= $form->field($model, 'contents')->widget(CKEditor::className(), [
                            'options' => ['rows' => 6],
                            'preset' => 'basic'
                        ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end();?>

                </div>
            </div>
        </div>
    </div>
</div>