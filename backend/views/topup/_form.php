<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\assets\inspinia\CustomInspiniaAsset;
/* @var $this yii\web\View */
/* @var $model common\models\Topup */
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

    <?= $form->field($model, 'top_package')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    <?= $form->field($model, 'total_callout')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'enable')->dropDownList($model->StatusDropDownOptions(),[

            // 'data-placeholder'=>'Choose permission...',
            'class'           =>'chosen-select',
            'style'           =>'width:250px;',
            'tabindex'        =>'4',
            'prompt'          =>'Choose ACTIVE or INACTIVE...'


    ]) ?>

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
