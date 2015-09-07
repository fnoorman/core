<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\assets\inspinia\CustomInspiniaAsset;
//use backend\assets\inspinia\CustomMainAsset;

$this->title ='Permission Assignment Section';
$this->params['breadcrumbs']=[
    [
      'label' => 'Roles',
      'url'   => ['role/index']
    ],
    $name
];

$custom = CustomInspiniaAsset::register($this);
//CustomMainAsset::register($this);
?>
<div class="wrapper wrapper-content animated fadeIn">
  <div class="col-lg-12">
      <div class="ibox">
          <div class="ibox-title">
            <h5>
                Assignment for : <?=$name?>
            </h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
          </div>
          <div class="ibox-content">
          <div class="row">
            <div class="col-lg-4">
              <h4>Description</h4>
              <?php
                  $role = Yii::$app->rightManager->getRole($name);
                  echo $role->description;
               ?>
            </div>
            <div class="col-lg-4">
              <?php
                  $form = ActiveForm::begin([
                    'id'            =>'assignment-role-form',
                      'fieldConfig' => [
                        'template'  => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}"
                      ],
                      'action'  =>Url::to(['role/assign','name'=>$name]),
                      'options' =>[
                          'role'  =>'form'
                      ]
                  ]);
              ?>
              <?= $form->field($model,'assignment')->dropDownList(
                  $roleListOptions,
                  [
                      // 'data-placeholder'=>'Choose permission...',
                      'class'           =>'chosen-select',
                      'style'           =>'width:250px;',
                      'tabindex'        =>'2',
                      'prompt'          =>'Choose role...'

                  ]
              )?>
                  <?= $form->field($model,'type')->hiddenInput(['value'=>'1'])?>
                  <div class="form-group">
                      <?= Html::submitButton('Assign Role Now', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                  </div>
              <?php ActiveForm::end(); ?>
            </div>
            <div class="col-lg-4">
              <?php
                  $form = ActiveForm::begin([
                    'id'            =>'assignment-permission-form',
                      'fieldConfig' => [
                        'template'  => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}"
                      ],
                      'action'  =>Url::to(['role/assign','name'=>$name]),
                      'options' =>[
                          'role'  =>'form'
                      ]
                  ]);
              ?>
              <?= $form->field($model,'assignment')->dropDownList(
                  $permissionListOptions,
                  [
                      // 'data-placeholder'=>'Choose permission...',
                      'class'           =>'chosen-select',
                      'style'           =>'width:250px;',
                      'tabindex'        =>'3',
                      'prompt'          =>'Choose permission...'

                  ]
              )?>
                  <?= $form->field($model,'type')->hiddenInput(['value'=>'2'])?>
                  <div class="form-group">
                      <?= Html::submitButton('Assign Permission Now', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                  </div>
              <?php ActiveForm::end(); ?>
            </div>
          </div>
            <div class="row">
                  <div class="col-lg-4">
                    <h4>Ascendant Role(s)</h4>
                    <div class="hr-line-dashed"></div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>

                            </tr>
                        </thead>
                      <tbody>
                        <?php foreach($ascendants as $ascendant):?>
                            <tr>
                              <td>
                                <?= Html::a(ucfirst($ascendant),['role/detail','name'=>$ascendant])?>
                              </td>

                            </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-lg-4">
                    <h4>Descendant Role(s)</h4>
                    <div class="hr-line-dashed"></div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                      <tbody>
                          <?php foreach($roles as $role):?>
                              <tr>
                                <td>
                                  <?=Html::a( $role['item']->name,['role/detail','name'=>$role['item']->name])?>
                                </td>
                                <td>
                                  <?php if($role['enable']):?>

                                    <?=Html::beginTag('a', [
                                        'href'=>Url::to([
                                          'role/removechild',
                                          'parent'  =>  $name,
                                          'child'   =>  $role['item']->name,
                                          'type'   =>  $role['item']->type,
                                        ])])
                                    ?>
                                      <i class="fa fa-trash fa-lg"></i>
                                    <?=Html::endTag('a')?>
                                  <?php endif;?>
                                </td>
                              </tr>
                          <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-lg-4">
                    <h4>Assigned Permission(s)</h4>
                    <div class="hr-line-dashed"></div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                      <tbody>
                        <?php foreach($permissions as $permission):?>
                            <tr>
                              <td>
                                <?= $permission['item']->name?>
                              </td>
                              <td>
                                <?=Html::beginTag('a', [
                                    'href'=>Url::to([
                                      'role/removechild',
                                      'parent'  =>  $name,
                                      'child'   =>  $permission['item']->name,
                                      'type'    =>  $permission['item']->type,
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
