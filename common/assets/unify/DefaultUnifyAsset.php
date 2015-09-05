<?php
/**
 * Created by PhpStorm.
 * User: Fahmy
 * Date: 9/1/15
 * Time: 9:59 PM
 */

namespace common\assets\unify;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DefaultUnifyAsset extends AssetBundle
{
    public $sourcePath = '@themes/unify/assets';
    public $baseUrl = '@web';
    public $css = [
        'plugins/bootstrap/css/bootstrap.min.css',
        'css/one.style.css',
    ];
    public $js = [
        "plugins/jquery/jquery-migrate.min.js",
        "plugins/bootstrap/js/bootstrap.min.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}