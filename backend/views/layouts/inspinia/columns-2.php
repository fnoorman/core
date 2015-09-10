<?php
/**
 * Created by PhpStorm.
 * User: Fahmy
 * Date: 8/27/15
 * Time: 8:25 PM
 */
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use common\components\Menu;
use common\assets\inspinia\SiteIndexAsset;

SiteIndexAsset::register($this);
?>

<?php $this->beginContent('@backend/views/layouts/base.php');?>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <style>
                    .skin-1 .nav > li.active {
                        border-left-color: #0e9aef;
                        border-left-style: solid;
                        border-left-width: 4px;
                    }
                </style>
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
                                <li><a href="login.html">Logout</a></li>
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
                                ['label' => 'Package', 'url' => ['package/index'],'icon'=>'fa fa-gift'],
                                // 'Products' menu item will be selected as long as the route is 'product/index'
                                ['label' => 'Topup', 'url' => ['topup/index']],
                                ['label' => 'Customer Purchase', 'url' => ['order/index']],
                                ['label' => 'Lookup', 'url' => ['lookup/index']],
                                ['label' => 'Campaign', 'url' => ['campaign/campaign']],
                                ['label' => 'Rights', 'url' => '#','items' => [
                                    ['label' => 'Assignment', 'url' => ['assignment/index'],'icon'=>'fa fa-sitemap'],
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
                            <a href="<?=Url::to(['site/logout'])?>" data-method="post">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>This is main title</h2>
                    <ol class="breadcrumb">
                        <?php
                        echo Breadcrumbs::widget([
                            'itemTemplate'  => "<li><a>{link}</a></li>\n",
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]);
                        ?>
                        <!-- <li>
                            <a href="index.html">This is</a>
                        </li>
                        <li class="active">
                            <strong>Breadcrumb</strong>
                        </li> -->
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="" class="btn btn-primary">This is action area</a>
                    </div>
                </div>
            </div>

                <?=$content?>


        </div>
    </div>



<?php $this->endContent('');?>
