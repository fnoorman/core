<?php
/**
 * Created by PhpStorm.
 * User: Fahmy
 * Date: 9/8/15
 * Time: 5:54 PM
 */
use common\assets\inspinia\InspiniaCampaignAsset;

InspiniaCampaignAsset::register($this);
?>
<div class="wrapper wrapper-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
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

                    <h1>Campaign</h1>
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
</div>
<?php $this->beginBlock('JavascriptInit'); ?>
<script>
    $(document).ready(function(){

        $('.summernote').summernote();

    });
    var edit = function() {
        $('.click2edit').summernote({focus: true});
    };
    var save = function() {
        var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
        $('.click2edit').destroy();
    };
</script>
<?php $this->endBlock();?>

