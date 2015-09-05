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
class IE8SliderUnifyAsset extends AssetBundle
{
    public $sourcePath = '@themes/unify/assets';
    public $baseUrl = '@web';
    public $css = [
        "plugins/revolution-slider/rs-plugin/css/settings-ie8.css",
    ];
    public $cssOptions = ['condition' => 'lte IE9','type'=>'text/css','media'=>'screen'];
    public $js = [
    ];
    public $depends = [
        'common\assets\unify\DefaultUnifyAsset',
        'common\assets\unify\SingleUnifyAsset',
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
