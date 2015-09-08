<?php
/**
 * Created by PhpStorm.
 * User: Fahmy
 * Date: 8/28/15
 * Time: 3:21 PM
 */
use yii\helpers\Html;
use common\assets\unify\DefaultUnifyAsset;
use common\assets\unify\IE8SliderUnifyAsset;
use common\assets\unify\SingleUnifyAsset;
use common\assets\unify\UnifyMediaAsset;
use common\widgets\Alert;
use yii\helpers\Url;

$defaultBundle = DefaultUnifyAsset::register($this);
SingleUnifyAsset::register($this);
IE8SliderUnifyAsset::register($this);
UnifyMediaAsset::register($this);

$this->params['page_body_prop'] = ['id'=>'body', 'data-spy'=>'scroll', 'data-target'=>'.one-page-header' ,'class'=>'demo-lightbox-gallery dark'];

?>

<!--=== Header ===-->
<nav class="one-page-header navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="menu-container page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="#intro">
                <span>U</span>nify
                <!-- <img src="assets/img/logo1.png" alt="Logo"> -->
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <div class="menu-container">
                <ul class="nav navbar-nav">
                    <li class="page-scroll home">
                        <a href="#body">Home</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About v3</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#services">Services</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#news">News</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Portfolio</a>
                    </li>                   
                    <?php if(Yii::$app->user->isGuest):?>
                        <li class="page-scroll">
                            <a href="<?php echo Url::to(['site/signup']); ?>">Signup</a>
                        </li>
                        <li class="page-scroll">
                            <a href="<?php echo Url::to(['site/login']); ?>">Login</a>
                        </li>
                    <?php else:?>
                        <li class="page-scroll">
                            <?=html::a('Logout ('. Yii::$app->user->identity->username .')',['site/logout'], ['data-method' => 'POST'])?>
                        </li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!--=== End Header ===-->

<?php if(isset($referEmail)) { ?>
<div> <center><?=$referEmail; ?></center></div>
<?php }?>

 
<!-- Intro Section -->
<section id="intro" class="intro-section">
    <div class="fullscreenbanner-container">
        <div class="fullscreenbanner">
            <ul>
                <!-- SLIDE 1 -->
                <li data-transition="curtain-1" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">
                    <!-- MAIN IMAGE -->
                    <img src="<?=$defaultBundle->baseUrl?>/img/sliders/revolution/bg1.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                    <!-- LAYERS -->
                    <div class="tp-caption rs-caption-1 sft start"
                         data-x="center"
                         data-hoffset="0"
                         data-y="100"
                         data-speed="800"
                         data-start="2000"
                         data-easing="Back.easeInOut"
                         data-endspeed="300">
                        WE ARE UNIFY CREATIVE TECHNOLOGY COMPANY
                    </div>

                    <!-- LAYER -->
                    <div class="tp-caption rs-caption-2 sft"
                         data-x="center"
                         data-hoffset="0"
                         data-y="200"
                         data-speed="1000"
                         data-start="3000"
                         data-easing="Power4.easeOut"
                         data-endspeed="300"
                         data-endeasing="Power1.easeIn"
                         data-captionhidden="off"
                         style="z-index: 6">
                        Creative freedom matters user experience.<br>
                        We minimize the gap between technology and its audience.
                    </div>

                    <!-- LAYER -->
                    <div class="tp-caption rs-caption-3 sft"
                         data-x="center"
                         data-hoffset="0"
                         data-y="360"
                         data-speed="800"
                         data-start="3500"
                         data-easing="Power4.easeOut"
                         data-endspeed="300"
                         data-endeasing="Power1.easeIn"
                         data-captionhidden="off"
                         style="z-index: 6">
                        <span class="page-scroll"><a href="#about" class="btn-u btn-brd btn-brd-hover btn-u-light">Learn More</a></span>
                        <span class="page-scroll"><a href="#portfolio" class="btn-u btn-brd btn-brd-hover btn-u-light">Our Work</a></span>
                    </div>
                </li>

                <!-- SLIDE 2 -->
                <li data-transition="slideup" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
                    <!-- MAIN IMAGE -->
                    <img src="<?=$defaultBundle->baseUrl?>/img/sliders/revolution/bg2.jpg" alt="slidebg1"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                    <!-- LAYERS -->
                    <div class="tp-caption rs-caption-1 sft start"
                         data-x="center"
                         data-hoffset="0"
                         data-y="100"
                         data-speed="800"
                         data-start="1500"
                         data-easing="Back.easeInOut"
                         data-endspeed="300">
                        DEDICATED ADVANCED TEAM
                    </div>

                    <!-- LAYER -->
                    <div class="tp-caption rs-caption-2 sft"
                         data-x="center"
                         data-hoffset="0"
                         data-y="200"
                         data-speed="1000"
                         data-start="2500"
                         data-easing="Power4.easeOut"
                         data-endspeed="300"
                         data-endeasing="Power1.easeIn"
                         data-captionhidden="off"
                         style="z-index: 6">
                        We are creative technology company providing<br>
                        key digital services on web and mobile.
                    </div>

                    <!-- LAYER -->
                    <div class="tp-caption rs-caption-3 sft"
                         data-x="center"
                         data-hoffset="0"
                         data-y="360"
                         data-speed="800"
                         data-start="3500"
                         data-easing="Power4.easeOut"
                         data-endspeed="300"
                         data-endeasing="Power1.easeIn"
                         data-captionhidden="off"
                         style="z-index: 6">
                        <span class="page-scroll"><a href="#about" class="btn-u btn-brd btn-brd-hover btn-u-light">Learn More</a></span>
                        <span class="page-scroll"><a href="#portfolio" class="btn-u btn-brd btn-brd-hover btn-u-light">Our Work</a></span>
                    </div>
                </li>

                <!-- SLIDE 3 -->
                <li data-transition="slideup" data-slotamount="5" data-masterspeed="700"  data-title="Slide 3">
                    <!-- MAIN IMAGE -->
                    <img src="<?=$defaultBundle->baseUrl?>/img/sliders/revolution/bg3.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                    <!-- LAYERS -->
                    <div class="tp-caption rs-caption-1 sft start"
                         data-x="center"
                         data-hoffset="0"
                         data-y="110"
                         data-speed="800"
                         data-start="1500"
                         data-easing="Back.easeInOut"
                         data-endspeed="300">
                        WE DO THINGS DIFFERENTLY
                    </div>

                    <!-- LAYER -->
                    <div class="tp-caption rs-caption-2 sfb"
                         data-x="center"
                         data-hoffset="0"
                         data-y="210"
                         data-speed="800"
                         data-start="2500"
                         data-easing="Power4.easeOut"
                         data-endspeed="300"
                         data-endeasing="Power1.easeIn"
                         data-captionhidden="off"
                         style="z-index: 6">
                        Creative freedom matters user experience.<br>
                        We minimize the gap between technology and its audience.
                    </div>

                    <!-- LAYER -->
                    <div class="tp-caption rs-caption-3 sfb"
                         data-x="center"
                         data-hoffset="0"
                         data-y="370"
                         data-speed="800"
                         data-start="3500"
                         data-easing="Power4.easeOut"
                         data-endspeed="300"
                         data-endeasing="Power1.easeIn"
                         data-captionhidden="off"
                         style="z-index: 6">
                        <span class="page-scroll"><a href="#about" class="btn-u btn-brd btn-brd-hover btn-u-light">Learn More</a></span>
                        <span class="page-scroll"><a href="#portfolio" class="btn-u btn-brd btn-brd-hover btn-u-light">Our Work</a></span>
                    </div>
                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
            <div class="tp-dottedoverlay twoxtwo"></div>
        </div>
    </div>
</section>
<!-- End Intro Section -->

<?php $this->beginBlock('JavascriptInit'); ?>

<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initCounter();
        App.initParallaxBg();
        LoginForm.initLoginForm();
        ContactForm.initContactForm();
        OwlCarousel.initOwlCarousel();
        RevolutionSlider.initRSfullScreen();
    });
</script>
<!--[if lt IE 9]>
<script src="<?=$defaultBundle->baseUrl?>/plugins/respond.js"></script>
<script src="<?=$defaultBundle->baseUrl?>/plugins/html5shiv.js"></script>
<script src="<?=$defaultBundle->baseUrl?>/js/plugins/placeholder-IE-fixes.js"></script>
<script src="<?=$defaultBundle->baseUrl?>/plugins/sky-forms-pro/skyforms/js/sky-forms-ie8.js"></script>
<![endif]-->

<!--[if lt IE 10]>
<script src="<?=$defaultBundle->baseUrl?>/plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js"></script>
<![endif]-->
<?php $this->endBlock('JavascriptInit'); ?>


