<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets\unify;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class UnifyPluginAsset extends AssetBundle
{
    public $sourcePath = '@themes/unify/assets/plugin';
    public $baseUrl = '@web';
    public $css = [
        'bootstrap/css/bootstrap.min.css',
    ];
    public $js = [
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
