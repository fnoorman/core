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
                    <li class="page-scroll">
                        <a href="#contact">Contact</a>
                    </li>
                    <li class="page-scroll">
                        <a href="../index.html">Main</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!--=== End Header ===-->

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

<!--  About Section -->
<section id="about" class="about-section section-first">
    <div class="block-v1">
        <div class="container">
            <div class="title-v1">
                <h1>What is Hybrizy?</h1>
                <p>Hybrizy is a new web and mobile application that combine both physical and digital contents by using pre-generated codes. In simpler words, Hybrizy is your one-code-solution to your new and improvised paper products.</p>                
            </div>
            <div class="row content-boxes-v3">
                <div class="col-md-4 md-margin-bottom-30">
                    <i class="icon-custom rounded-x icon-bg-dark fa fa-lightbulb-o" style="background-color:#17607f;"></i>
                    <div class="content-boxes-in-v3">
                        <h2 class="heading-sm">Printed agencies</h2>
                        <p>A key to elevate your printed materials into a new level. Hybrizy promotes a new type of combination reading that aids readers in experiencing enhanced reading. </p>
                    </div>
                </div>
                <div class="col-md-4 md-margin-bottom-30">
                    <i class="icon-custom rounded-x icon-bg-dark fa fa-flask" style="background-color:#17607f;"></i>
                    <div class="content-boxes-in-v3">
                        <h2 class="heading-sm">Electronic industry</h2>
                        <p>Hybrizy can provide the answer to your dilemma by using this tiny code to store all your visual adaptation. Any contests or even music videos can be stored into this tiny code.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <i class="icon-custom rounded-x icon-bg-dark fa fa-bolt" style="background-color:#17607f;"></i>
                    <div class="content-boxes-in-v3">
                        <h2 class="heading-sm">Individuals</h2>
                        <p>Hybrizy is your key in creating a cutting edge document storage experience. You can customize on what you want people to find in the Hybrizy code by managing it through your dashboard.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about-image bg-grey" style="background-color:#7bd8ff;">
        <div class="container">
            <div class="title-v1">
                <h1>MERGING PAPER AND DIGITAL WITH EASE</h1>
                <p style="color:#333;">Hybrizy lets you spice up your <strong>Plain Old </strong>text-on-paper by adding value to your print products. <br>
                Hybrizy can solve your dilemma by providing a <strong>Tiny Code </strong>that promises awesome feedback from your customers and audiences.</p>
            </div>
            <div class="img-center">
                <img class="img-responsive" src="img/mockup/HYBRIZYBANNER.png" alt="">
            </div>
        </div>
    </div>

    <div class="container content-lg">
        <div class="title-v1">
            <h2>Our Vision And Mission</h2>
            <p>Brings new <strong>Innovation Perspective </strong>to printing media in the new age. <br>
            <!-- Providing <strong>One-Code-Solution </strong>to your new and improvised printing products.</p> -->
        </div>

        <div class="row">
            <div class="col-md-6 content-boxes-v3 margin-bottom-40">
                <div class="clearfix margin-bottom-30" style="background-color:#7bd8ff;padding-left:20px;padding-top:10px;">
                    <i class="icon-custom icon-md rounded-x icon-bg-u icon-line icon-trophy"></i>
                    <div class="content-boxes-in-v3">
                        <h2 class="heading-sm">New Approach &amp; Solution</h2>
                        <p>Hybrizy is the new and innovative web and mobile application that makes ordinary paper products become extra-ordinary.</p>
                    </div>
                </div>
                <div class="clearfix margin-bottom-30" style="background-color:#17607f;padding-left:20px;padding-top:10px;">
                    <i class="icon-custom icon-md rounded-x icon-bg-u icon-line icon-directions" style="background-color:#29abe2;"></i>
                    <div class="content-boxes-in-v3">
                        <h2 class="heading-sm" style="color:#fff;">Ease of Accessibilities</h2>
                        <p style="color:#fff;">Provide multiple platform for mobiles, tablets and PC's. So you can access it anywhere and anytime by using a specific code. </p>
                    </div>
                </div>
                <div class="clearfix margin-bottom-30" style="padding-left:20px;padding-top:10px;">
                    <i class="icon-custom icon-md rounded-x icon-bg-u icon-line icon-diamond"></i>
                    <div class="content-boxes-in-v3">
                        <h2 class="heading-sm">Customize Content</h2>
                        <p>It can be anything such as campaigns, products, contests and etc according to your own creativity.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <img class="img-responsive" src="img/mockup/HYBRIZYBANNER2.png" alt="">
            </div>
        </div>
    </div>

    <div class="parallax-counter parallaxBg" style="background-color:#29abe2;">
        <div class="container">
            <div class="parallax-quote-in">
                <p>We do not simplify things but we give something <br>more manageable.</p>
                <small>- Hybrizy -</small>
            </div>
        </div>
    </div>
</section>
<!--  About Section -->

<!-- Services Section -->
<section id="services">
    <div class="container content-lg">
        <div class="title-v1">
            <h2>Hybrizy Packages &amp; Pricing</h2>
            <p>You can choose the packages that suit your needs.<br>
            Each package contain different features.</p>
        </div>
        <!-- <div class="container content"> -->
        <!-- Pricing Dark -->
        <div class="row margin-bottom-20 pricing-dark">
            <div class="col-md-3 col-sm-6">
                <div class="pricing hover-effect">
                    <div class="pricing-head">
                        <h3>Begginer</h3>
                    </div>
                    <ul class="pricing-content list-unstyled" style="background-color:#17607f;">
                        <li>
                            <ul class="list-unstyled list-inline rating">
                                <li><i class="fa fa-star fa-2x"></i></li>
                                <li><i class="fa fa-star-half-empty fa-2x"></i></li>
                                <li><i class="fa fa-star-o fa-2x"></i></li>
                                <li><i class="fa fa-star-o fa-2x"></i></li>
                                <li><i class="fa fa-star-o fa-2x"></i></li>
                            </ul>
                        </li>
                        <li><i class="fa fa-gift"></i> Free customisation <span><i class="fa fa-check"></i></span></li>
                        <li><i class="fa fa-inbox"></i> 24 hour support<span><i class="fa fa-check"></i></span></li>
                        <li><i class="fa fa-globe"></i> 10 GB Disckspace</li>
                        <li><i class="fa fa-cloud-upload"></i> Cloud Storage</li>
                        <li><i class="fa fa-umbrella"></i> Online Protection</li>
                    </ul>
                    <div class="pricing-footer" style="background-color:#17607f;">
                        <h4><i>$</i>5<i>.49</i> <span>Per Month</span></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cloud Storage magna psum condimentum...</p>
                        <a href="#" class="btn-u btn-brd btn-u-default btn-u-xs"><i class="fa fa-shopping-cart"></i> Purchase Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="pricing hover-effect pricing-square-border">
                    <div class="pricing-head">
                        <h3>Pro</h3>
                    </div>
                    <ul class="pricing-content list-unstyled" style="background-color:#2ec1ff;">
                        <li>
                            <ul class="list-unstyled list-inline rating">
                                <li><i class="fa fa-star fa-2x"></i></li>
                                <li><i class="fa fa-star fa-2x"></i></li>
                                <li><i class="fa fa-star-half-empty fa-2x"></i></li>
                                <li><i class="fa fa-star-o fa-2x"></i></li>
                                <li><i class="fa fa-star-o fa-2x"></i></li>
                            </ul>
                        </li>
                        <li><i class="fa fa-gift"></i> Free customisation<span><i class="fa fa-check"></i></span></li>
                        <li><i class="fa fa-inbox"></i> 24 hour support<span><i class="fa fa-check"></i></span></li>
                        <li><i class="fa fa-globe"></i> 10 GB Disckspace<span><i class="fa fa-check"></i></span></li>
                        <li><i class="fa fa-cloud-upload"></i> Cloud Storage</li>
                        <li><i class="fa fa-umbrella"></i> Online Protection</li>
                    </ul>
                    <div class="pricing-footer" style="background-color:#2ec1ff;">
                        <h4><i>$</i>8<i>.69</i> <span>Per Month</span></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cloud Storage magna psum condimentum...</p>
                        <a href="#" class="btn-u btn-brd btn-u-default btn-u-xs"><i class="fa fa-shopping-cart"></i> Purchase Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="pricing hover-effect pricing-square-border">
                    <div class="pricing-head">
                        <h3>Premium</h3>
                    </div>
                  <ul class="pricing-content list-unstyled" style="background-color:#3d6c7f;">
                        <li>
                            <ul class="list-unstyled list-inline rating">
                                <li><i class="fa fa-star fa-2x"></i></li>
                                <li><i class="fa fa-star fa-2x"></i></li>
                                <li><i class="fa fa-star fa-2x"></i></li>
                                <li><i class="fa fa-star-half-empty fa-2x"></i></li>
                                <li><i class="fa fa-star-o fa-2x"></i></li>
                            </ul>
                        </li>
                        <li><i class="fa fa-gift"></i> Free customisation<span><i class="fa fa-check"></i></span></li>
                        <li><i class="fa fa-inbox"></i> 24 hour support<span><i class="fa fa-check"></i></span></li>
                        <li><i class="fa fa-globe"></i> 10 GB Disckspace<span><i class="fa fa-check"></i></span></li>
                        <li><i class="fa fa-cloud-upload"></i> Cloud Storage<span><i class="fa fa-check"></i></span></li>
                        <li><i class="fa fa-umbrella"></i> Online Protection</li>
                    </ul>
                    <div class="pricing-footer" style="background-color:#3d6c7f;">
                        <h4><i>$</i>13<i>.99</i> <span>Per Month</span></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cloud Storage magna psum condimentum...</p>
                        <a href="#" class="btn-u btn-brd btn-u-default btn-u-xs"><i class="fa fa-shopping-cart"></i> Purchase Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="pricing hover-effect pricing-square-border">
                    <div class="pricing-head">
                        <h3>Elite</h3>
                    </div>
                 <ul class="pricing-content list-unstyled" style="background-color:#2ec1ff;">
                        <li>
                            <ul class="list-unstyled list-inline rating">
                                <li><i class="fa fa-star fa-2x"></i></li>
                                <li><i class="fa fa-star fa-2x"></i></li>
                                <li><i class="fa fa-star fa-2x"></i></li>
                                <li><i class="fa fa-star fa-2x"></i></li>
                                <li><i class="fa fa-star fa-2x"></i></li>
                            </ul>
                        </li>
                        <li><i class="fa fa-gift"></i> Free customisation<span><i class="fa fa-check"></i></span></li>
                        <li><i class="fa fa-inbox"></i> 24 hour support<span><i class="fa fa-check"></i></span></li>
                        <li><i class="fa fa-globe"></i> 10 GB Disckspace<span><i class="fa fa-check"></i></span></li>
                        <li><i class="fa fa-cloud-upload"></i> Cloud Storage<span><i class="fa fa-check"></i></span></li>
                        <li><i class="fa fa-umbrella"></i> Online Protection<span><i class="fa fa-check"></i></span></li>
                    </ul>

                    <div class="pricing-footer" style="background-color:#2ec1ff;">
                        <h4><i>$</i>99<i>.00</i> <span>Per Month</span></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cloud Storage magna psum condimentum...</p>
                        <a href="#" class="btn-u btn-brd btn-u-default btn-u-xs"><i class="fa fa-shopping-cart"></i> Purchase Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    <!-- End Pricing Dark -->
    </div><!--/container-->

    <!--<div class="call-action-v1">
        <div class="container">
            <div class="call-action-v1-box">
                <div class="call-action-v1-in">
                    <p>Unify creative technology company providing key digital services and focused on helping our clients to build a successful business on web and mobile.</p>
                </div>
                <div class="call-action-v1-in inner-btn page-scroll">
                    <a href="#portfolio" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-block">View Our Portfolio</a>
                </div>
            </div>
        </div>
    </div> -->
</section>
<!-- End Services Section -->

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


