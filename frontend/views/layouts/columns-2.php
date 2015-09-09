<?php
/**
 * Created by PhpStorm.
 * User: Fahmy
 * Date: 8/27/15
 * Time: 8:25 PM
 */
use yii\helpers\Url;
use common\components\Menu;
use common\assets\inspinia\SiteIndexAsset;

SiteIndexAsset::register($this);
?>

<?php $this->beginContent('@frontend/views/layouts/inspinia/base.php');?>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="images/anonymous-512.png" width="48px" height="48px"/>
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=ucfirst(Yii::$app->user->identity->username)?></strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                             
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li>
                                <a href="<?=Url::to(['site/logout'])?>" data-method="post">
                            	<i class="fa fa-sign-out"></i> Log out
                        	</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            HY+
                        </div>
                    </li>
                    <?php
                    echo Menu::widget([
                        'options'=>['tag'=>false],
                        'items' => [
                            // Important: you need to specify url as 'controller/action',
                            // not just as 'controller' even if default action is used.
                            ['label' => 'Order', 'url' => ['site/orderform'],'icon'=>'fa fa-gift'],
                            ['label' => 'Campaign', 'url' => '#',
                                'items'=> [
                                    ['label' => 'Review', 'url' => ['review/index'],'icon'=>'fa fa-book'],
                                ]
                            ],
                            ['label' => 'Rights', 'url' => '#','items' => [
                                ['label' => 'Role', 'url' => ['role/index'],'icon'=>'fa fa-sitemap'],
                                ['label' => 'Permission', 'url' => ['permission/index'],'icon'=>'fa fa-pencil-square-o'],
                            ]]],
                    ]);
                    ?>
                </ul>

            </div>
        </nav>
        <div id="page-wrapper" class="white-bg">
            <div class="row border-bottom">
                <div class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <!--<a href="<?=Url::to(['site/logout'])?>" data-method="post"> <i class="fa fa-sign-out"></i> Log out</a> -->
                        </li>
                    </ul>
                </div>
            </div>
            <?= $content ?>
        </div>
    </div>

<?php $this->endContent('');?>
