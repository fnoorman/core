<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace common\assets\inspinia;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class InspiniaAsset extends AssetBundle
{
    public $sourcePath = '@themes/inspinia/assets';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'font-awesome/css/font-awesome.css',
        'css/plugins/chosen/chosen.css',
        'css/animate.css',
        'css/style.css'
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/plugins/metisMenu/jquery.metisMenu.js',
        'js/plugins/slimscroll/jquery.slimscroll.min.js',
        'js/plugins/campaignScript/campaignEngine.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
