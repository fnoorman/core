<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace common\assets\unify;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class UnifyMediaAsset extends AssetBundle
{
    public $sourcePath = '@themes/unify/assets';
    public $baseUrl = '@web';
    public $css = [
        "plugins/revolution-slider/rs-plugin/css/settings.css"
        ];
    public $cssOptions =['type' => 'text/css', 'media' => 'screen'];
    public $js = [
    ];
    public $depends = [
        'common\assets\unify\SingleUnifyAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
