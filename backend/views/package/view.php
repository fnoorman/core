<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Lookup;
use yii\bootstrap\ActiveForm;
use common\assets\inspinia\CustomInspiniaAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Package */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Packages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$custom = CustomInspiniaAsset::register($this);
?>

<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><?= Html::encode($this->title) ?></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-lg-12">
                            <p>
                                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                                ],
                                ]) ?>
                            </p>
                        </div>
                    </div>



                    <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'name',
                        'maxCallOut',
                        'maxAllowedCode',
                        [
                            'label'=> 'Status',
                            'value'=> $model->StatusText()
                        ],
                        'code',
                        'videoMaxSize',
                        'pictureMaxSize',
                        'minBalance',
                        'update_by',
                        'updated_at:datetime',
                        'create_by',
                        'created_at:datetime',
                    ],
                    ]) ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Item Offer to this package</h3>
                            <div class="hr-line-dashed"></div>
                        </div>


                        <div class="col-lg-5">


                            <?php $form = ActiveForm::begin([
                                'action'=> $offerModel->isNewRecord ?['package/add-offer']:['package/update-offer','offerId'=>$offerModel->id],
                                'fieldConfig' => [
                                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                                ],
                                'errorSummaryCssClass' => 'alert alert-danger'
                            ]) ?>

                            <?= $form->errorSummary($offerModel); ?>

                            <?= $form->field($offerModel,'package_id')->hiddenInput(['value'=>$model->id])->label(false)?>

                            <?= $form->field($offerModel,'item')->dropDownList($model->ItemOfferDropDownOption(),[

                                // 'data-placeholder'=>'Choose permission...',
                                'class'           =>'chosen-select',
                                'style'           =>'width:250px;',
                                'tabindex'        =>'1',
                                'prompt'          =>'Choose Offer'


                            ])?>

                            <div class="form-group field-offer-fronticon">
                                <label class="control-label" for="offer-fronticon">Front Icon</label>
                                <div>
                                    <input type="hidden" name="Offer[frontIcon]" value="<?= isset($offerModel->id)? $offerModel->frontIcon: null ?>">
                                    <div id="offer-fronticon">
                                        <?php foreach($model->IconOfferDropDownOption() as $key => $value):?>
                                            <?php if($key === intval($offerModel->frontIcon)):?>
                                                <label class="radio-inline"><input type="radio" name="Offer[frontIcon]" value="<?=$key?>" checked="checked"> <i class="fa fa-lg <?=$value?>"> </i></label>
                                            <?php else:?>
                                                <label class="radio-inline"><input type="radio" name="Offer[frontIcon]" value="<?=$key?>" > <i class="fa fa-lg <?=$value?>"> </i></label>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </div>
                                    <p class="help-block help-block-error"></p>
                                </div>

                            </div>

                            <?= $form->field($offerModel,'enable')->dropDownList($model->StatusDropDownOptions(),[

                                // 'data-placeholder'=>'Choose permission...',
                                'class'           =>'chosen-select',
                                'style'           =>'width:250px;',
                                'tabindex'        =>'1',
                                'prompt'          =>'Please choose'


                            ])?>

                            <div class="form-group">
                                <?= Html::submitButton($offerModel->isNewRecord ? Yii::t('app', 'Add Offer') : Yii::t('app', 'Update Offer'), ['class' => $offerModel->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            </div>

                            <?php ActiveForm::end()?>
                        </div>
                        <div class="col-lg-4">
                            <table class="table">
                                <thead>
                                <th colspan="4" class="text-center" style="background-color:#18a689;color: #fff ;">
                                    <h2><?=$model->name?></h2>

                                </th>

                                </thead>
                                <tbody>
                                    <?php foreach ($model->offers as $offer):?>

                                        <tr>
                                            <td><i class="fa fa-2x <?=Lookup::item('Icon-Offer', $offer->frontIcon)?>"></i> </td>
                                            <td class="text-center" >
                                                <?=Html::a(Lookup::item('Item-Offer', $offer->item),['package/load-offer','offerId'=>$offer->id,'packageId'=>$model->id])?>
                                            </td>
                                            <td><?=($offer->enable === 1)? '<i class="fa fa-2x fa-check"></i>': ''?></td>
                                            <td>
                                                <?=Html::a('<i class="fa fa-lg fa-trash" style="color:darkred"></i>',['package/delete-offer','offerId'=>$offer->id,'packageId'=>$model->id])?>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>

</div>
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

