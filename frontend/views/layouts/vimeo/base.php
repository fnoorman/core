<?php
/**
 * Created by PhpStorm.
 * User: Fahmy
 * Date: 9/2/15
 * Time: 8:10 PM
 */
use yii\helpers\Html;

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>

        /* Sticky footer styles
        -------------------------------------------------- */
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            /* Margin bottom by footer height */
            margin-bottom: 60px;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            background-color: #f5f5f5;
        }

        /* Custom page CSS
        -------------------------------------------------- */
        /* Not required for template or sticky footer method. */

        .container {
            width: auto;
            max-width: 1080px;
            padding: 0 15px;
        }
        .container .text-muted {
            margin: 20px 0;
        }
        #drop_zone {
            border: 2px dashed #bbb;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            padding: 25px;
            text-align: center;
            font: 20pt bold 'Helvetica';
            color: #bbb;
        }

        .label-warning {
            font-size: 24px;
        }

        .label-success {
            font-size: 24px;
        }

    </style>
</head>
<?php
$options = ['class'=>''];
if(isset($this->params['bodyClass'])){
    Html::addCssClass($options,$this->params['bodyClass']);
}
echo Html::beginTag('body',$options);
?>
<?php $this->beginBody() ?>
<?=$content?>
<?php $this->endBody() ?>
</body>

<?php if(isset($this->blocks['JavascriptInit'])):?>
    <?=$this->blocks['JavascriptInit']?>
<?php endif;?>
</html>
<?php $this->endPage() ?>
