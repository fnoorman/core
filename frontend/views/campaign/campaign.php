<?php
/* @var $this yii\web\View */

use common\assets\inspinia\InspiniaCampaignAsset;
InspiniaCampaignAsset::register($this);
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content text-center p-md">

                    <h2><span class="text-navy">INSPINIA - Responsive Admin Theme</span>
                        is provided with two main layouts <br/>three skins and separate configure options.</h2>

                    <p>
                        <button onclick="contestButton_click()" id="contestButton" type="button" class="btn btn-w-m btn-success">Contest</button>
                        <button onclick="reviewButton_click()" id="reviewButton" type="button" class="btn btn-w-m btn-success">Review</button>
                        <button onclick="videoButton_click()" id="videoButton" type="button" class="btn btn-w-m btn-success">Video / Image</button>
                    </p>


                </div>
            </div>
        </div>
    </div>
    <div id="contest_frame" class="row animated fadeInRight" style="display:none">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content text-center p-md">

                    <h4 class="m-b-xxs">Contest layout</h4>
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
    </div>
    <div id="review_frame" class="row animated fadeInLeft" style="display:none">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content text-center p-md">

                    <h4 class="m-b-xxs">Review Layout <span class="label label-primary">NEW</span></h4>
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

    </div>

    <div id="frame" class="row animated fadeInLeft" style="">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Wyswig Summernote Editor</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content no-padding">

                    <div class="summernote">
                        <h3>Lorem Ipsum is simply</h3>
                        dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                        <br/>
                        <br/>
                        <ul>
                            <li>Remaining essentially unchanged</li>
                            <li>Make a type specimen book</li>
                            <li>Unknown printer</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="videoimage_frame" class="row animated fadeInRight" style="display:none">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content text-center p-md">

                    <h4 class="m-b-xxs">Video :: Image Layout <span class="label label-primary">NEW</span></h4>
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

    </div>
</div>