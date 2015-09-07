<?php
/**
 * Created by PhpStorm.
 * User: Fahmy
 * Date: 8/27/15
 * Time: 8:25 PM
 */
use yii\helpers\Url;
use common\assets\inspinia\SiteIndexAsset;

SiteIndexAsset::register($this);
?>

<?php $this->beginContent('@frontend/views/layouts/inspinia/base.php');?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content text-center p-md">

                    <h2><span class="text-navy">INSPINIA - Responsive Admin Theme</span>
                    is provided with two main layouts <br/>three skins and separate configure options.</h2>

                    <p>
                        All config options you can trun on/off from the theme box configuration (green icon on the left side of page).
                    </p>


                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content text-center p-md">

                    <h4 class="m-b-xxs">Top navigation, centered content layout</h4>
                    <small>(optional layout)</small>
                    <p>Avalible configure options</p>
                    <span class="simple_tag">Scroll navbar</span>
                    <span class="simple_tag">Top fixed navbar</span>
                    <span class="simple_tag">Boxed layout</span>
                    <span class="simple_tag">Scroll footer</span>
                    <span class="simple_tag">Fixed footer</span>
                    <div class="m-t-md">
                        <p>Check the Dashboard v.4 with top navigation layout</p>
                        <div class="p-lg ">
                        <a href="dashboard_4.html"><img class="img-responsive img-shadow" src="img/dashbard4_2.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content text-center p-md">

                    <h4 class="m-b-xxs">Basci left side nabigation layout </h4><small>(main layout)</small>
                    <p>Avalible configure options</p>
                    <span class="simple_tag">Collapse menu</span>
                    <span class="simple_tag">Fixed sidebar</span>
                    <span class="simple_tag">Scroll navbar</span>
                    <span class="simple_tag">Top fixed navbar</span>
                    <span class="simple_tag">Boxed layout</span>
                    <span class="simple_tag">Scroll footer</span>
                    <span class="simple_tag">Fixed footer</span>
                    <div class="m-t-md">
                        <p>Check the Dashboard v.4 with basic layout</p>
                        <div class="p-lg">
                            <a href="dashboard_4_1.html"><img class="img-responsive img-shadow" src="img/dashbard4_1.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content text-center p-md">

                    <h4 class="m-b-xxs">Full height - Outlook view <span class="label label-primary">NEW</span></h4>
                    <small>(optional layout)</small>
                    <p>Avalible configure options</p>
                    <span class="simple_tag">Scroll navbar</span>
                    <span class="simple_tag">Boxed layout</span>
                    <span class="simple_tag">Scroll footer</span>
                    <span class="simple_tag">Fixed footer</span>
                    <div class="m-t-md">
                        <p>Check the Outlook view in in full height page</p>
                        <div class="p-lg ">
                            <a href="full_height.html"><img class="img-responsive img-shadow" src="img/full_height.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content text-center p-md">

                    <h4 class="m-b-xxs">Off canvas menu <span class="label label-primary">NEW</span></h4>
                    <small>(optional layout)</small>
                    <p>Avalible configure options</p>
                    <span class="simple_tag">Collapse menu</span>
                    <span class="simple_tag">Fixed sidebar</span>
                    <span class="simple_tag">Top fixed navbar</span>
                    <span class="simple_tag">Boxed layout</span>
                    <span class="simple_tag">Scroll footer</span>
                    <span class="simple_tag">Fixed footer</span>
                    <div class="m-t-md">
                        <p>Check the off canvas menu on example article page</p>
                        <div class="p-lg">
                            <a href="off_canvas_menu.html"><img class="img-responsive img-shadow" src="img/off_canvas.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>


</div>
<?php $this->endContent('');?>