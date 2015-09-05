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
class SingleUnifyAsset extends AssetBundle
{
    public $sourcePath = '@themes/unify/assets';
    public $baseUrl = '@web';
    public $css = [
        "css/footers/footer-v7.css",
        "plugins/animate.css",
        "plugins/line-icons/line-icons.css",
        "plugins/font-awesome/css/font-awesome.min.css",
        "plugins/pace/pace-flash.css",
        "plugins/owl-carousel/owl.carousel.css",
        "plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css",
        "plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css",
    ];
    public $js = [
        "plugins/smoothScroll.js",
        "plugins/jquery.easing.min.js",
        "plugins/pace/pace.min.js",
        "plugins/jquery.parallax.js",
        "plugins/counter/waypoints.min.js",
        "plugins/counter/jquery.counterup.min.js",
        "plugins/owl-carousel/owl.carousel.js",
        "plugins/sky-forms-pro/skyforms/js/jquery.form.min.js",
        "plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js",
        "plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js",
        "plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js",
        "plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js",
        "js/one.app.js",
        "js/forms/login.js",
        "js/forms/contact.js",
        "js/plugins/pace-loader.js",
        "js/plugins/owl-carousel.js",
        "js/plugins/revolution-slider.js",
        "js/plugins/cube-portfolio/cube-portfolio-lightbox.js",
    ];
    public $depends = [
        'common\assets\unify\DefaultUnifyAsset',
    ];
}