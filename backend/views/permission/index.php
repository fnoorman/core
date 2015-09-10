<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use backend\assets\inspinia\CustomMainAsset;

$this->title = 'Permission Section';
$this->params['breadcrumbs'][] = 'All Permissions';

//CustomMainAsset::register($this);

?>
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-title">
                  <h5>
                      Permission information
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
                          <?php foreach($permissions as $permission):?>
                              <tr>
                                <td><?=Html::a(ucfirst($permission->name),['role/view','name'=>$permission->name])?></td>
                                <td><?=$permission->description?></td>
                                <td>
                                  <?=Html::beginTag('a', [
                                      'href'=>Url::to([
                                        'permission/remove',
                                        'name'  =>  $permission->name,
                                        'type'  =>  $permission->type,
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
                    <h5>New Permission</h5>
                </div>
                <div class="ibox-content">
                    <?php
                        $form = ActiveForm::begin([
                            'id'      =>"permission-form",
                            'action'  =>Url::to(['permission/create'])
                        ]);
                        echo $form->field($model,'name',['inputOptions'=>['placeholder'=>'New Permission']]);
                        echo $form->field($model,'description',['inputOptions'=>['placeholder'=>'Description','rows'=>'3']])->textarea();
                    ?>
                    <div class="form-group">
                        <?= Html::submitButton('Add New Permission', ['class' => 'btn btn-primary block full-width m-b', 'name' => 'new-button']) ?>
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
