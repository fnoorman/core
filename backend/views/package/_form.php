<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\assets\inspinia\CustomInspiniaAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Package */
/* @var $form yii\widgets\ActiveForm */
$custom = CustomInspiniaAsset::register($this);
?>




    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        ],
        'errorSummaryCssClass' => 'alert alert-danger'
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maxCallOut')->textInput() ?>

    <?= $form->field($model, 'maxAllowedCode')->textInput() ?>

    <?= $form->field($model, 'enable')->dropDownList($model->StatusDropDownOptions(),[

            // 'data-placeholder'=>'Choose permission...',
            'class'           =>'chosen-select',
            'style'           =>'width:250px;',
            'tabindex'        =>'4',
            'prompt'          =>'Choose ACTIVE or INACTIVE...'


    ]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'videoMaxSize')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pictureMaxSize')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'minBalance')->textInput() ?>

    <?php if(isset($model->id)):?>
        <?= $form->field($model,'create_by')->hiddenInput(['value'=>$model->create_by])->label(false) ?>
        <?= $form->field($model,'update_by',[])->hiddenInput(['value'=>Yii::$app->user->id])->label(false) ?>
    <?php else:?>
        <?= $form->field($model,'update_by')->hiddenInput(['value'=>Yii::$app->user->id])->label(false) ?>
        <?= $form->field($model,'create_by')->hiddenInput(['value'=>Yii::$app->user->id])->label(false) ?>
    <?php endif;?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<?php $this->beginBlock('JavascriptInit'); ?>

<!-- Chosen -->

<script src="<?=$custom->baseUrl?>/js/plugins/chosen/chosen.jquery.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
            '.chosen-select-width'     : {width:"95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }

    });

</script>

<?php $this->endBlock(); ?>


