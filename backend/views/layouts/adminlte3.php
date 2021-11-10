<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

$cdnUrl = Yii::$app->params['backend'];
$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <?= $this->render('_adminlte3Head') ?>
    </head>
    <body class="hold-transition sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= $cdnUrl ?>" class="nav-link"><?= Yii::t('app', 'Home') ?></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link"><?= Yii::t('app', 'Contact') ?></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= $cdnUrl ?>" class="brand-link align-self-center">
                <img src="<?= $cdnUrl ?>/img/logo.png" alt="De Obelly Logo"
                     class="brand-image img-circle elevation-3 bg-light"
                     style="opacity: .8">
                <span class="brand-text font-weight-bold">De Obelly</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <?php if (!Yii::$app->user->isGuest) : ?>
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="<?= $cdnUrl ?>/img/avatar.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <div class="d-block font-weight-bold text-white"><?= Yii::$app->user->identity->name ?></div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role == 1) : ?>
                            <li class="nav-item">
                                <a href="<?= Url::toRoute('user/') ?>"
                                   class="nav-link <?= ($controller == 'user') ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-user-astronaut"></i>
                                    <p><?= Yii::t('app', 'Accounts') ?></p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <!-- Post -->
                        <li class="nav-item <?= ($controller == 'post' || $controller == 'post-tag' || $controller == 'post-category') ? 'menu-is-opening menu-open' : '' ?>">
                            <a href="#"
                               class="nav-link <?= ($controller == 'post' || $controller == 'post-tag' || $controller == 'post-category') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-blog"></i>
                                <p>
                                    <?= Yii::t('app', 'Posts') ?>
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('post-tag/') ?>"
                                       class="nav-link <?= ($controller == 'post-tag') ? 'active' : '' ?>">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p><?= Yii::t('app', 'Post tags') ?></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('post-category/') ?>"
                                       class="nav-link <?= ($controller == 'post-category') ? 'active' : '' ?>">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p><?= Yii::t('app', 'Post categories') ?></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('post/') ?>"
                                       class="nav-link <?= ($controller == 'post') ? 'active' : '' ?>">
                                        <i class="nav-icon far fa-newspaper"></i>
                                        <p><?= Yii::t('app', 'Post management') ?></p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Product -->
                        <li class="nav-item <?= ($controller == 'product-type' || $controller == 'product-category' ||
                            $controller == 'product' || $controller == 'trademark' || $controller == 'mix-and-match' ||
                            $controller == 'tailor-made-order') ? 'menu-is-opening menu-open' : '' ?>">
                            <a href="#"
                               class="nav-link <?= ($controller == 'product-type' || $controller == 'product-category' ||
                                   $controller == 'product' || $controller == 'trademark' || $controller == 'mix-and-match' ||
                                   $controller == 'tailor-made-order') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-shopping-basket"></i>
                                <p>
                                    <?= Yii::t('app', 'Products') ?>
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('product-type/') ?>"
                                       class="nav-link <?= ($controller == 'product-type') ? 'active' : '' ?>">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p><?= Yii::t('app', 'Product Types') ?></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('product-category/') ?>"
                                       class="nav-link <?= ($controller == 'product-category') ? 'active' : '' ?>">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p><?= Yii::t('app', 'Product Category') ?></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('trademark/') ?>"
                                       class="nav-link <?= ($controller == 'trademark') ? 'active' : '' ?>">
                                        <i class="nav-icon fas fa-trademark"></i>
                                        <p><?= Yii::t('app', 'Trademark') ?></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('product/') ?>"
                                       class="nav-link <?= ($controller == 'product') ? 'active' : '' ?>">
                                        <i class="nav-icon far fa-newspaper"></i>
                                        <p><?= Yii::t('app', 'Products') ?></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('mix-and-match/') ?>"
                                       class="nav-link <?= ($controller == 'mix-and-match') ? 'active' : '' ?>">
                                        <i class="nav-icon fas fa-object-group"></i>
                                        <p><?= Yii::t('app', 'Collections') ?></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('tailor-made-order/') ?>"
                                       class="nav-link <?= ($controller == 'tailor-made-order') ? 'active' : '' ?>">
                                        <i class="nav-icon fas fa-object-group"></i>
                                        <p><?= Yii::t('app', 'Tailor Made') ?></p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Product -->
                        <!-- Warehouse -->
                        <li class="nav-item <?= ($controller == 'order' || $controller == 'cart' || $controller == 'tracking-status') ? 'menu-is-opening menu-open' : '' ?>">
                            <a href="#"
                               class="nav-link <?= ($controller == 'order' || $controller == 'cart' || $controller == 'tracking-status') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-warehouse"></i>
                                <p>
                                    <?= Yii::t('app', 'Warehouse') ?>
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('order/') ?>"
                                       class="nav-link <?= ($controller == 'order') ? 'active' : '' ?>">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p><?= Yii::t('app', 'Orders') ?></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('tracking-status/') ?>"
                                       class="nav-link <?= ($controller == 'tracking-status') ? 'active' : '' ?>">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p><?= Yii::t('app', 'Order Status') ?></p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End warehouse -->
                        <!-- Site Content -->
                        <li class="nav-item <?= ($controller == 'site-our-stories' || $controller == 'footer' ||
                            $controller == 'site-contact' || $controller == 'site-index') ? 'menu-is-opening menu-open' : '' ?>">
                            <a href="#"
                               class="nav-link <?= ($controller == 'site-our-stories' || $controller == 'footer' ||
                                   $controller == 'site-contact' || $controller == 'site-index') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-sitemap"></i>
                                <p>
                                    <?= Yii::t('app', 'Content Managers') ?>
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('site-index/') ?>"
                                       class="nav-link <?= ($controller == 'site-index') ? 'active' : '' ?>">
                                        <i class="nav-icon fas fa-house-user"></i>
                                        <p><?= Yii::t('app', 'Homepage') ?></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('site-casual/') ?>"
                                       class="nav-link <?= ($controller == 'site-casual') ? 'active' : '' ?>">
                                        <i class="nav-icon fab fa-elementor"></i>
                                        <p><?= Yii::t('app', 'Casual') ?></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('site-our-stories/') ?>"
                                       class="nav-link <?= ($controller == 'site-our-stories') ? 'active' : '' ?>">
                                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                        <p><?= Yii::t('app', 'Introductions') ?></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('site-contact/') ?>"
                                       class="nav-link <?= ($controller == 'site-contact') ? 'active' : '' ?>">
                                        <i class="nav-icon far fa-address-book"></i>
                                        <p><?= Yii::t('app', 'Contact') ?></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Url::toRoute('footer/') ?>"
                                       class="nav-link <?= ($controller == 'footer') ? 'active' : '' ?>">
                                        <i class="nav-icon fas fa-shoe-prints"></i>
                                        <p><?= Yii::t('app', 'Footer') ?></p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- ./Site Content -->
                        <li class="nav-header text-uppercase font-weight-bold"><?= Yii::t('app', 'Others') ?></li>
                        <li class="nav-item">
                            <a href="<?= Url::toRoute('showroom/') ?>"
                               class="nav-link <?= ($controller == 'showroom') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-store"></i>
                                <p><?= Yii::t('app', 'Showroom') ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::toRoute('color/') ?>"
                               class="nav-link <?= ($controller == 'color') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-palette"></i>
                                <p><?= Yii::t('app', 'Color') ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::toRoute('size/') ?>"
                               class="nav-link <?= ($controller == 'size') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-ruler-combined"></i>
                                <p><?= Yii::t('app', 'Size') ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::toRoute('contact/') ?>"
                               class="nav-link <?= ($controller == 'contact') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p><?= Yii::t('app', 'Contact') ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::toRoute('terms-and-services/') ?>"
                               class="nav-link <?= ($controller == 'terms-and-services') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-concierge-bell"></i>
                                <p><?= Yii::t('app', 'Terms & Services') ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::toRoute('tool/slider') ?>"
                               class="nav-link <?= ($controller == 'tool' && $action == 'slider') ? 'active' : '' ?>">
                                <i class="nav-icon fab fa-slideshare"></i>
                                <p><?= Yii::t('app', 'Slider') ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::toRoute('social/') ?>"
                               class="nav-link <?= ($controller == 'social') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-globe"></i>
                                <p><?= Yii::t('app', 'Social network') ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::toRoute('site/logout') ?>" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p><?= Yii::t('app', 'Logout') ?></p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?= $content ?>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong><?= Yii::t('app', 'Copyright') ?> &copy; <?= date('Y') ?> <a
                        href="<?= Yii::$app->params['frontend'] ?>">De
                    Obelly</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b><?= Yii::t('app', 'Version') ?></b> 2.4.4
            </div>
        </footer>
    </div>
    <?php $this->endBody() ?>
    <script src="<?= $cdnUrl ?>/adminlte3/dist/js/adminlte.js"></script>
    </body>
    </html>
<?php $this->endPage();
