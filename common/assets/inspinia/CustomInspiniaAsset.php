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
class CustomInspiniaAsset extends AssetBundle
{
    public $sourcePath = '@themes/inspinia/assets';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [

    ];
    public $depends = [
//        'yii\web\YiiAsset',
    ];
}
