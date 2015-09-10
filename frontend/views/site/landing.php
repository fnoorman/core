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
use common\models\Lookup;

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
                <!-- <span>U</span>nify -->
                <img src="img/logohybrizy2.png" alt="Logo" style="margin-top:-15px;">
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
                        <a href="#about">About Us</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#services">Packages</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Gallery</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contact Us</a>
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
                            <a href="<?php echo Url::to(['site/index']);?>">My Profile</a>
                        </li>
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
                    <img src="img/sliders/revolution/bghybrizynew1.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                    <!-- LAYERS -->
                    <!-- <div class="tp-caption rs-caption-1 sft start"
                         data-x="center"
                         data-hoffset="0"
                         data-y="100"
                         data-speed="800"
                         data-start="2000"
                         data-easing="Back.easeInOut"
                         data-endspeed="300">
                        WE ARE UNIFY CREATIVE COMPANY
                    </div> -->

                    <!-- LAYER -->
                    <!-- <div class="tp-caption rs-caption-2 sft"
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
                    </div> -->

                    <!-- LAYER -->
                    <!-- <div class="tp-caption rs-caption-3 sft"
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
                    </div> -->
                </li>

                <!-- SLIDE 2 -->
                <li data-transition="slideup" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
                    <!-- MAIN IMAGE -->
                    <img src="img/sliders/revolution/bghybrizynew2.jpg" alt="slidebg1"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                    <!-- LAYERS -->
                    <!-- <div class="tp-caption rs-caption-1 sft start"
                         data-x="center"
                         data-hoffset="0"
                         data-y="100"
                         data-speed="800"
                         data-start="1500"
                         data-easing="Back.easeInOut"
                         data-endspeed="300">
                        DEDICATED ADVANCED TEAM
                    </div> -->

                    <!-- LAYER -->
                    <!-- <div class="tp-caption rs-caption-2 sft"
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
                    </div> -->

                    <!-- LAYER -->
                    <!-- <div class="tp-caption rs-caption-3 sft"
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
                    </div> -->
                </li>

                <!-- SLIDE 3 -->
                <li data-transition="slideup" data-slotamount="5" data-masterspeed="700"  data-title="Slide 3">
                    <!-- MAIN IMAGE -->
                    <img src="img/sliders/revolution/bghybrizy2.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                    <!-- LAYERS -->
                    <!-- <div class="tp-caption rs-caption-1 sft start"
                         data-x="center"
                         data-hoffset="0"
                         data-y="110"
                         data-speed="800"
                         data-start="1500"
                         data-easing="Back.easeInOut"
                         data-endspeed="300">
                        WE DO THINGS DIFFERENTLY
                    </div> -->

                    <!-- LAYER -->
                    <!-- <div class="tp-caption rs-caption-2 sfb"
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
                    </div> -->

                    <!-- LAYER -->
                    <!-- <div class="tp-caption rs-caption-3 sfb"
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
                    </div> -->
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

                <h1>What is Hybrizy</h1>
                <p>Hybrizy is a new web and mobile application that combine both physical and digital contents by using pre-generated codes. In simpler words, Hybrizy is your one-code-solution to your new and improvised paper products.</p>                
            </div>
            <div class="title-v1">
                <h3>The Magic Of <strong>Hybrizy</strong></h3>
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
                        <p>Hybrizy is your key in creating a cutting edge document storage experience. You can customize on what you want people to find in the Hybrizy code.</p>
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

    <style type="text/css">
        .parallax-quote {
        padding: 30px 0;
        background: rgba(0,0,0,0.8);
    }
    .parallax-quote:after {
     background: rgba(0,0,0,0.2);
}
    </style>
    <div class="parallax-quote parallaxBg" style="background-color:#17607f;">
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
          <?php foreach ($dataProvider->models as $value)  {  ?>
            <div class="col-md-3 col-sm-6">
                <div class="pricing hover-effect">
                    <div class="pricing-head">

                        <h3> <?php echo $value->name;  ?></h3>
                    </div>
                    <ul class="pricing-content list-unstyled" style="background-color:#17607f;">
                        <!-- <li>
                            <ul class="list-unstyled list-inline rating">
                                <li><i class="fa fa-star fa-2x"></i></li>
                                <li><i class="fa fa-star-half-empty fa-2x"></i></li>
                                <li><i class="fa fa-star-o fa-2x"></i></li>
                                <li><i class="fa fa-star-o fa-2x"></i></li>
                                <li><i class="fa fa-star-o fa-2x"></i></li>
                            </ul>
                        </li> -->
                        <?php //foreach ($model->offers as $offer){?>

                        <li><i class="fa fa-gift"></i> Free customisation <span><i class="fa fa-check"></i></span></li>
                        <li><i class="fa fa-inbox"></i> 24 hour support<span><i class="fa fa-check"></i></span></li>
                        <li><i class="fa fa-globe"></i> 10 GB Disckspace</li>
                        <li><i class="fa fa-cloud-upload"></i> Cloud Storage</li>
                        <li><i class="fa fa-umbrella"></i> Online Protection</li>
                        <?php // } ?>
                    </ul>
                    <div class="pricing-footer" style="background-color:#17607f;">
                        <h4><i>$</i>5<i>.49</i> <span>Per Month</span></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cloud Storage magna psum condimentum...</p>
                        <a href="#" class="btn-u btn-brd btn-u-default btn-u-xs"><i class="fa fa-shopping-cart"></i> Purchase Now</a>
                    </div>
                </div>

            </div>
            <?php } ?>
            <!-- <div class="col-md-3 col-sm-6">
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
            </div> -->
            <!-- <div class="col-md-3 col-sm-6">
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
            </div> -->
            <!-- <div class="col-md-3 col-sm-6">
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
        </div> -->
        <!-- </div> -->
    <!-- End Pricing Dark -->
    </div><!--/container-->
</section>
<!-- End Services Section -->

<!-- Portfolio Section -->
<section id="portfolio" class="about-section">
    <div class="container content-lg" style="padding-top:25px;">
        <div class="title-v1">
            <h2>Our Gallery</h2>
            <p>We do <strong>things</strong> differently company providing key digital services. <br>
            Focused on helping our clients to build a <strong>successful</strong> business on web and mobile.</p>
        </div>

        <div class="cube-portfolio">
            <!-- <div id="filters-container" class="cbp-l-filters-button">
                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> All </div>
                <div data-filter=".print" class="cbp-filter-item"> Print </div>
                <div data-filter=".web-design" class="cbp-filter-item"> Web Design </div>
                <div data-filter=".motion" class="cbp-filter-item"> Motion </div>
            </div> --><!--/end Filters Container-->

            <div id="grid-container" class="cbp-l-grid-gallery">
                <div class="cbp-item print motion">
                    <!-- <a href="unify/assets/ajax/project1.html" class="cbp-caption cbp-singlePageInline"
                       data-title="World Clock Widget<br>by Paul Flavius Nechita"> -->
                        <div class="cbp-caption-defaultWrap">
                            <img src="img/portfolio/HYBRIZY01.jpg" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">World Clock Widget</div>
                                    <div class="cbp-l-caption-desc">by Paul Flavius Nechita</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item web-design">
                    <!-- <a href="unify/assets/ajax/project2.html" class="cbp-caption cbp-singlePageInline"
                       data-title="Bolt UI<br>by Tiberiu Neamu"> -->
                        <div class="cbp-caption-defaultWrap">
                            <img src="img/portfolio/HYBRIZY02.jpg" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">Bolt UI</div>
                                    <div class="cbp-l-caption-desc">by Tiberiu Neamu</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item print motion">
                    <!-- <a href="unify/assets/ajax/project3.html" class="cbp-caption cbp-singlePageInline"
                       data-title="WhereTO App<br>by Tiberiu Neamu"> -->
                        <div class="cbp-caption-defaultWrap">
                            <img src="img/portfolio/HYBRIZY03.jpg" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">WhereTO App</div>
                                    <div class="cbp-l-caption-desc">by Tiberiu Neamu</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item web-design print">
                    <!-- <a href="unify/assets/ajax/project4.html" class="cbp-caption cbp-singlePageInline"
                       data-title="iDevices<br>by Tiberiu Neamu"> -->
                        <div class="cbp-caption-defaultWrap">
                            <img src="img/portfolio/HYBRIZY04.jpg" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">iDevices</div>
                                    <div class="cbp-l-caption-desc">by Tiberiu Neamu</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item motion">
                    <!-- <a href="unify/assets/ajax/project5.html" class="cbp-caption cbp-singlePageInline"
                       data-title="Seemple* Music for iPad<br>by Tiberiu Neamu"> -->
                        <div class="cbp-caption-defaultWrap">
                            <img src="img/portfolio/HYBRIZY05.jpg" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">Seemple* Music for iPad</div>
                                    <div class="cbp-l-caption-desc">by Tiberiu Neamu</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item print motion">
                    <!-- <a href="unify/assets/ajax/project6.html" class="cbp-caption cbp-singlePageInline"
                       data-title="Remind~Me Widget<br>by Tiberiu Neamu"> -->
                        <div class="cbp-caption-defaultWrap">
                            <img src="img/portfolio/HYBRIZY06.jpg" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">Remind~Me Widget</div>
                                    <div class="cbp-l-caption-desc">by Tiberiu Neamu</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item web-design print">
                    <!-- <a href="unify/assets/ajax/project7.html" class="cbp-caption cbp-singlePageInline"
                       data-title="Workout Buddy<br>by Tiberiu Neamu"> -->
                        <div class="cbp-caption-defaultWrap">
                            <img src="img/portfolio/HYBRIZY07.jpg" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title"></div>
                                    <div class="cbp-l-caption-desc"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item print">
                    <!-- <a href="unify/assets/ajax/project8.html" class="cbp-caption cbp-singlePageInline"
                       data-title="Digital Menu<br>by Cosmin Capitanu"> -->
                        <div class="cbp-caption-defaultWrap">
                            <img src="img/portfolio/HYBRIZY08.jpg" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title"></div>
                                    <div class="cbp-l-caption-desc"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item motion">
                    <!-- <a href="unify/assets/ajax/project9.html" class="cbp-caption cbp-singlePageInline"
                       data-title="Holiday Selector<br>by Cosmin Capitanu"> -->
                        <div class="cbp-caption-defaultWrap">
                            <img src="img/portfolio/HYBRIZY09.jpg" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title"></div>
                                    <div class="cbp-l-caption-desc"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        .clients-section {
        background: #29abe2;
    }
        .clients-section:after {
        background: rgba(0,0,0,0.5);
    }
    </style>

    <!--Media Queries iphone 5-->
    <style type="text/css">
        @media only screen and (min-device-width: 320px) and (max-device-width: 568px){
        .owl-clients-v2{
            margin-left: -40px;
            }
        }
    </style>
    <div class="clients-section parallaxBg">
        <div class="container">
            <div class="title-v1">
                <h2>Our Clients</h2>
            </div>
            <ul class="owl-clients-v2" style="padding-left:29%;">
                <!-- <li class="item"><a href="#"><img src="unify/assets/img/clients/jkr_edit2.png" alt=""></a></li>
                <li class="item"><a href="#"><img src="unify/assets/img/clients/bekazon_edit.png" alt=""></a></li> -->
                <li class="item"><a href="#"><img src="img/clients2/MOY.png" alt=""></a></li>
                <!-- <li class="item"><a href="#"><img src="unify/assets/img/clients/jpj_edit2.png" alt=""></a></li> -->
                <li class="item"><a href="#"><img src="img/clients2/ujang_edit2.png" alt=""></a></li>
                <li class="item"><a href="#"><img src="img/clients2/apo_edit.png" alt=""></a></li>
                <!-- <li class="item"><a href="#"><img src="unify/assets/img/clients/kesihatan_edit3.png" alt=""></a></li>
                <li class="item"><a href="#"><img src="unify/assets/img/clients/odosys_edit.png" alt=""></a></li>
                <li class="item"><a href="#"><img src="unify/assets/img/clients/fms_edit.png" alt=""></a></li> -->
            </ul>
        </div>
    </div>

    <div class="testimonials-v3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <ul class="list-unstyled owl-ts-v1">
                        <li class="item">
                            <img class="rounded-x img-bordered" src="img/team/img3-sm.jpg" alt="">
                            <div class="testimonials-v3-title">
                                <p>David Case</p>
                                <span>Web Developer, Google</span>
                            </div>
                            <p>I just wanted to tell you how much I like to use Unify - <strong>it's so sleek and elegant!</strong> <br>
                            The customisation options you implemented are countless, and I feel sorry I can't use them all. Good job, and keep going!<p>
                        </li>
                        <li class="item">
                            <img class="rounded-x img-bordered" src="img/team/img2-sm.jpg" alt="">
                            <div class="testimonials-v3-title">
                                <p>Tina Krueger</p>
                                <span>UI Designer, Apple</span>
                            </div>
                            <p>Keep up the great work. Your template is by far the best on the market in terms of features, quality and value or money.</p>
                        </li>
                        <li class="item">
                            <img class="rounded-x img-bordered" src="img/team/img1-sm.jpg" alt="">
                            <div class="testimonials-v3-title">
                                <p>John Clarck</p>
                                <span>Marketing &amp; Cunsulting, IBM</span>
                            </div>
                            <p>So far I really like the theme. I am looking forward to exploring more of your themes. Thank you!</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Portfolio Section -->

<!--style for contact background-->
<style type="text/css">

    .contacts-section {
    background: #17607f;
}
</style>

<!-- Contact Section -->
<section id="contact" class="contacts-section">
    <div class="container content-lg">
        <div class="title-v1">
            <h2>Contact Us</h2>
            <p>So, what is holding you back in using this new app?<br> Subscribe now to get your very own personal Hybrizy code!</p>
        </div>

        <div class="row contacts-in">
            <div class="col-md-6 md-margin-bottom-40">
                <ul class="list-unstyled">
                    <li><i class="fa fa-home"></i> 22 Jalan USJ 21/4, Subang Jaya Selangor</li>
                    <li><i class="fa fa-phone"></i> 03-8024 2601</li>
                    <li><i class="fa fa-envelope"></i>admin@aptinventions.com</li>
                    <li><i class="fa fa-globe"></i> <a href="http://hybrizy.com">www.hybrizy.com</a></li>
                </ul>
            </div>

            <div class="col-md-6">
                <form action="php/sky-forms-pro/demo-contacts-process.php" method="post" id="sky-form3" class="sky-form contact-style" novalidate="novalidate">
                    <fieldset>
                        <label>Name</label>
                        <div class="row">
                            <div class="col-md-7 margin-bottom-20 col-md-offset-0">
                                <div>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                        </div>

                        <label>Email <span class="color-red">*</span></label>
                        <div class="row">
                            <div class="col-md-7 margin-bottom-20 col-md-offset-0">
                                <div>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <label>Message</label>
                        <div class="row">
                            <div class="col-md-11 margin-bottom-20 col-md-offset-0">
                                <div>
                                    <textarea rows="8" name="message" id="message" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <p><button type="submit" class="btn-u btn-brd btn-brd-hover btn-u-dark">Send Message</button></p>
                    </fieldset>

                    <div class="message">
                        <i class="rounded-x fa fa-check"></i>
                        <p>Your message was successfully sent!</p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="copyright-section">
        <p>2015 © All Rights Reserved.Theme by <a target="_blank" href="https:aptinventions.com">APT Inventions SDN BHD</a></p>
        <ul class="social-icons">
            <!-- <li><a href="#" data-original-title="Facebook" class="social_facebook rounded-x"></a></li>
            <li><a href="#" data-original-title="Twitter" class="social_twitter rounded-x"></a></li>
            <li><a href="#" data-original-title="Goole Plus" class="social_googleplus rounded-x"></a></li>
            <li><a href="#" data-original-title="Pinterest" class="social_pintrest rounded-x"></a></li>
            <li><a href="#" data-original-title="Linkedin" class="social_linkedin rounded-x"></a></li> -->
        </ul>
        <span class="page-scroll"><a href="#intro"><i class="fa fa-angle-double-up back-to-top"></i></a></span>
    </div>
</section>
<!-- End Contact Section -->

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
