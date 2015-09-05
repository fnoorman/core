<?php
/**
 * Created by PhpStorm.
 * User: Fahmy
 * Date: 8/25/15
 * Time: 10:27 AM
 */
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use common\widgets\Alert;
use yii\widgets\Breadcrumbs;
use common\assets\inspinia\InspiniaAsset;

InspiniaAsset::register($this);

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <?php
        $options = ['class'=>'skin-1'];
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