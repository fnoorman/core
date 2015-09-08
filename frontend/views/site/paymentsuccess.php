<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Payment Transaction';
$this->params['breadcrumbs'][] = ['label' => 'Orders Forms', 'url' => ['site/orderform']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-molpay">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Here you go!!</p>

    <div class="row">
        <div class="col-lg-5">
<?php
   // $vkey ='fddf6f614ab7ca28462e458896f6d6d7';


    //$key0=md5($tranID.$orderid.$status.$domain.$amount.$currency);
    //$key1=md5($paydate.$domain.$key0.$appcode.$vkey);

    if($returnData['status']=="00"){
        echo"<center><strong>Your Transaction Succesful</strong></center>";
        echo"<br>";
    }
    if($returnData['status']=="11"){
        echo"<center><strong>Your Transaction Fail</strong></center>";
        echo"<br>";
    }
    if($returnData['status']=="22"){
        echo"<center><strong>Your Transaction Pending</strong></center>";
        echo"<br>";
    }

    ?>

    <table border='1' align='center' width='300'>
        <tr>
            <td>Transaction Id:</td><td><?php echo $returnData['tranID'];?></td>
        </tr>
        <tr>
            <td>Order Id:</td><td><?php echo $returnData['orderid'];?></td>
        </tr>
        <tr>
            <td>Amount:</td><td><?php echo $returnData['amount'];?></td>
        </tr>
        <tr>
            <td>Currency</td><td><?php echo $returnData['currency'];?></td>
        </tr>

    </table>


        </div>

    </div>
</div>
