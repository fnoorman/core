<?php
/**
 * Created by PhpStorm.
 * User: Fahmy
 * Date: 9/10/15
 * Time: 5:08 PM
 */
?>

<?php foreach ($dataProvider->models as $value): ?>
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
<?php endforeach;?>
