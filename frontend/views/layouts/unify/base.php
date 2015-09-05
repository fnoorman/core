<?php
/**
 * Created by PhpStorm.
 * User: Fahmy
 * Date: 8/25/15
 * Time: 10:25 AM
 */
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\assets\unify\UnifyThemeAsset;

$baseBundle = UnifyThemeAsset::register($this);

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
    <!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
    <!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <!-- CSS Theme -->
        <link rel="stylesheet" href="<?=$baseBundle->baseUrl?>/css/theme-colors/default.css" id="style_color">
        <link rel="stylesheet" href="<?=$baseBundle->baseUrl?>/css/theme-skins/one.dark.css">

        <!-- CSS Customization -->
        <link rel="stylesheet" href="<?=$baseBundle->baseUrl?>/css/custom.css">
    </head>
    <body <?php echo implode(' ', array_map(function($prop, $value) {
        return $prop.'="'.$value.'"';
    }, array_keys($this->params['page_body_prop']), $this->params['page_body_prop'])) ;?>>

    <?php $this->beginBody() ?>
        <?= $content ?>
    <?php $this->endBody() ?>
    </body>
    <?php if(isset($this->blocks['JavascriptInit'])):?>
        <?=$this->blocks['JavascriptInit']?>
    <?php endif;?>
    </html>
<?php $this->endPage() ?>