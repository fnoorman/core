<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
//use backend\assets\inspinia\CustomMainAsset;

$this->title ='Permission Assignment Section';
$this->params['breadcrumbs']=[
    [
      'label' => 'Roles',
      'url'   => ['role/index']
    ],
    $role->name
];

//CustomMainAsset::register($this);
?>
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox">
          <div class="ibox-title">
            <h4> Assignment for : <?=$role->name?></h4>
          </div>
          <div class="ibox-content">
            <div class="row">
              <div class="col-lg-5">
                <h3>By Permission / Role</h3>
                <div class="hr-line-dashed"></div>
                <?php
                    $form = ActiveForm::begin([
                        'id'      =>'assignment-form',
                        'fieldConfig' => [
                          'template'  => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}"
                        ],
                        'action'  =>Url::to(['role/assign','name'=>$role->name]),
                        'options' =>[
                            'role'  =>'form'
                        ]
                    ]);
                ?>
                    <?= $form->field($model,'assignment')->dropDownList(
                        $ArrayOfPermissions,
                        [
                            // 'data-placeholder'=>'Choose permission...',
                            'class'           =>'chosen-select',
                            'style'           =>'width:350px;',
                            'tabindex'        =>'2',
                            'prompt'          =>'Choose permission...'

                        ]
                    )?>
                    <?= $form->field($model,'type')->hiddenInput(['value'=>$role->type])?>
                    <div class="form-group">
                        <?= Html::submitButton('Assign Now', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
              </div>

            </div>
              <div class="hr-line-dashed"></div>
              <div class="row">
                <div class="col-lg-6">
                  <h4>Assigned Permissions</h4>
                  <?php if(count($assignedPermissions) > 0):?>
                      <table class="table table-bordered table-striped">
                        <?php foreach($assignedPermissions as $assignedPermission):?>
                            <tr><td><?=$assignedPermission->name?></td></tr>
                        <?php endforeach;?>
                      </table>
                  <?php else:?>
                    <p> <span class="label label-warning">Nothing Assigned</span></p>
                  <?php endif;?>
                </div>
                <div class="col-lg-6">
                  <h4>Assigned Roles</h4>
                  <?php if(count($ArrayOfChildren) > 0):?>
                      <table class="table table-bordered">
                        <?php foreach($ArrayOfChildren as $child):?>
                            <?php if($child['type'] === '1'):?>
                              <tr>
                                  <td>
                                    <?=$child['name']?>
                                  </td>
                              </tr>
                          <?php endif?>
                        <?php endforeach;?>
                      </table>
                  <?php else:?>
                    <p> <span class="label label-warning">Nothing Assigned</span></p>
                  <?php endif;?>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php $this->beginBlock('JavascriptInit'); ?>

<!-- Chosen -->
<script src="inspinia/js/plugins/chosen/chosen.jquery.js"></script>

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
