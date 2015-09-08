<?php
/**
 * Created by PhpStorm.
 * User: Fahmy
 * Date: 8/27/15
 * Time: 8:25 PM
 */
use yii\helpers\Url;
 
?>

<script type="text/javascript">

function contestButton_click() 
{
    document.getElementById('contest_frame').style.display = 'block';
    document.getElementById('review_frame').style.display = 'none';
    document.getElementById('videoimage_frame').style.display = 'none';
}
function reviewButton_click() 
{
    document.getElementById('contest_frame').style.display = 'none';
    document.getElementById('review_frame').style.display = 'block';
    document.getElementById('videoimage_frame').style.display = 'none';
}
function videoButton_click() 
{
    document.getElementById('contest_frame').style.display = 'none';
    document.getElementById('review_frame').style.display = 'none';
    document.getElementById('videoimage_frame').style.display = 'block';
}   

    window.onload = codeAddress;

</script>
 
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
 