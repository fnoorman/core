<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
//use backend\assets\inspinia\CustomMainAsset;

$this->title = 'Role Section';
$this->params['breadcrumbs'][] = 'All Roles';

//CustomMainAsset::register($this);

?>
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-title">
                  <h5>
                      Role information
                  </h5>
                  <div class="ibox-tools">
                      <a class="collapse-link">
                          <i class="fa fa-chevron-up"></i>
                      </a>
                  </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                      <tbody>
                          <?php foreach($roles as $role):?>
                              <tr>
                                <td><?=Html::a(ucfirst($role->name),['role/detail','name'=>$role->name])?></td>
                                <td><?=$role->description?></td>
                                <td>

                                    <?=Html::beginTag('a', [
                                        'href'=>Url::to([
                                            'role/load',
                                            'name'  =>  $role->name,
                                            'type'    =>  $role->type,
                                        ])])
                                    ?>
                                    <i class="fa fa-pencil fa-lg"></i>
                                    <?=Html::endTag('a')?>
                                    <?=Html::beginTag('a', [
                                        'href'=>Url::to([
                                            'role/remove',
                                            'name'  =>  $role->name,
                                            'type'    =>  $role->type,
                                        ])])
                                    ?>
                                    <i class="fa fa-trash fa-lg"></i>
                                    <?=Html::endTag('a')?>

                                </td>
                              </tr>
                          <?php endforeach;?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>New Role</h5>
                </div>
                <div class="ibox-content">
                    <?php
                        $form = ActiveForm::begin([
                            'id'      =>"role-form",
                            'action'=> !($model->id) ? ['role/create']:['role/update'],
//                            'action'  =>Url::to(['role/create'])
                        ]);

                        if($model->id){
                            echo $form->field($model,'originalRole')->hiddenInput(['value'=>$model->name]);
                        }
                        echo $form->field($model,'name',['inputOptions'=>['placeholder'=>'New Role']]);
                        echo $form->field($model,'description',['inputOptions'=>['placeholder'=>'Description','rows'=>'3']])->textarea();
                    ?>
                    <div class="form-group">
                        <?= Html::submitButton(!($model->id) ? Yii::t('app', 'Add New Role') : Yii::t('app', 'Update Role'), ['class' => 'btn btn-primary block full-width m-b', 'name' => 'new-button']) ?>
                    </div>

                    <?php ActiveForm::end();?>

                    <!-- <form role="form" method="post" action="">
                        <div class="form-group">
                            <input type="text" placeholder="Role name" id="role" class="form-control" name="RoleForm[name]">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Description" name="RoleForm[description]"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Add</button>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
