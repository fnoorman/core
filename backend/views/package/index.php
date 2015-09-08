<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PackageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Packages');
$this->params['breadcrumbs'][] = $this->title;
$this->params['activeMenu'] = $this->title;
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
                                <?= Html::a(Yii::t('app', 'Create Package'), ['create'], ['class' => 'btn btn-success']) ?>
                            </p>
                        </div>
                    </div>
                                            <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [['class' => 'yii\grid\SerialColumn'],

                            [
                                'attribute' => 'id',
                                'format'=>'raw',
                                'headerOptions'=>['width'=>'100px']
                            ],
                        'name',
                            [
                                'attribute' => 'maxCallOut',
                                'format'=>'raw',
                                'headerOptions'=>['width'=>'100px']
                            ],
                            [
                                'attribute' => 'maxAllowedCode',
                                'format'=>'raw',
                                'headerOptions'=>['width'=>'100px']
                            ],
//                        'maxCallOut',
//                        'maxAllowedCode',
                            [
                                'attribute' => 'enable',
                                'format'=>'raw',
                                'value'=> function($model){
                                    return $model->StatusText();
                                },
                                'headerOptions'=>['width'=>'100px']
                            ],
//                        'enable',
                        // 'code',
                        // 'videoMaxSize',
                        // 'pictureMaxSize',
                        // 'minBalance',
                        // 'update_by',
                        // 'update_at',
                        // 'create_by',
                        // 'created_at',

                        ['class' => 'yii\grid\ActionColumn'],
                        ],
                        ]); ?>

                </div>
            </div>
        </div>
    </div>

</div>
