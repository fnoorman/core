<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders Forms', 'url' => ['site/orderform']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <!-- <h1> Checkout<?php //= Html::encode($this->title) ?></h1> -->


    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h1>Checkout</h1>
            <div class="ibox-content">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                        <td>Package</td>
                        <td>Price (RM)</td>
                        <td>Total (RM)</td>
                        <td>Total (RM)</td>
                    </tr>
                  </thead>
                    <?php
                        //foreach ($model as $data){
                    ?>
                      <tbody>
                        <tr>
                            <td><?php echo $model->package; ?></td>
                            <td><?php echo $model->orderId; ?></td>
                            <td><?php echo $model->totalPrice; ?></td>
                            <td><?= Html::a('Delete', ['deletecartitem', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </tr>
                    <?php //} ?>
                        <tr>
                            <td colspan="2" align="right">Sub-Total : (RM)</td>
                            <td><?php echo $model->totalPrice; ?></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right">Total : (RM)</td>
                          <td><?php echo $model->totalPrice; ?></td>
                        </tr>
                      </tbody>

                </table>

                <?php echo Html::beginForm('https://www.onlinepayment.com.my/MOLPay/pay/test5160/','post'); ?>
                    <input type="hidden" name="bill_name" value="<?php echo $model->firstName.$model->lastName ?>">
                    <input type="hidden" name="bill_desc" value="<?php echo $model->package ?>">
                    <input type="hidden" name="orderid" value="<?php echo $model->orderId ?>">
                    <input type="hidden" name="amount" value="<?php echo $model->totalPrice ?>">
                    <input type=hidden name= 'returnurl' value='http://localhost/core/frontend/web/index.php?r=site/paymentsuccess'>


                    <div class="form-group" align="right">
                        <?= Html::a('Add Package', ['orderform'], ['class' => 'btn btn-success']) ?>
                        <?= Html::submitButton('Confirm Payment',['class'=>"btn btn-primary"]) ?>
                    </div>

                <?php echo Html::endForm(); ?>

            </div>
        </div>
      </div>
    </div>
    <br>


<!-- <p> -->
    <?php //= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?php //= Html::a('Delete', ['delete', 'id' => $model->id], [
        // 'class' => 'btn btn-danger',
        // 'data' => [
        //     'confirm' => 'Are you sure you want to delete this item?',
        //     'method' => 'post',
        // ],
    // ]) ?>
<!-- </p> -->

</div>
