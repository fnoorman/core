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
class InspiniaCampaignAsset extends AssetBundle
{
    public $sourcePath = '@themes/inspinia/assets';
    public $baseUrl = '@web';
    public $css = [
        'css/plugins/summernote/summernote.css',
        'css/plugins/summernote/summernote-bs3.css',
    ];
    public $js = [
        'js/inspinia.js',
//        'js/plugins/pace/pace.min.js',
        'js/plugins/summernote/summernote.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
