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
 
</script>
 
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content text-center p-md">

                    <h2><span class="text-navy">INSPINIA 55555 - Responsive Admin Theme</span>
                    is provided with two main layouts <br/>three skins and separate configure options.</h2>
 <textarea type="text" name="content" id="content">waerewfwef</textarea>
 <button type="submit" class="btn btn-danger copyeditor">Save</button>
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
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Create New Contest</h5>
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

                            </div>
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal">
                                <p>Let we know your contest's name.</p>
                                <div class="form-group"><label class="col-lg-3 control-label">Contest Name</label>

                                    <div class="col-lg-10"><input type="email" placeholder="Email" class="form-control"> <span class="help-block m-b-none">Example block-level help text here.</span>
                                    </div>
                                </div>                             
                                <div class="text-center">
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Form in simple modal box</a>
                            </div>
                            </form>
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
 

            <div id="review_frame" class="row animated fadeInLeft" style="display:none">
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
                        </div>
                    </div>
                    <div class="ibox-content no-padding">

                        <div class="summernote">
                            <h3>Lorem Ipsum is simply</h3>
                           ly unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
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


    </div>
 
 <?php $this->beginBlock('JavascriptInit'); ?>

<script>
        $(document).ready(function(){

            $('.summernote').summernote();
            var sHTML = $('.summernote').code();
            alert(sHTML);

       });
        var edit = function() {
            alert('edit!');
            $('.click2edit').summernote({focus: true});
        };
        var save = function() {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };

        $(".copyeditor").on("click", function() {

       var targetName = $("#editor").attr('data-target');
       $('#content').val($('.summernote').code());
    });
    </script>

<?php $this->endBlock(); ?>   


 