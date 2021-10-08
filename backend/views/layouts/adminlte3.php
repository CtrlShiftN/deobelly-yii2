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
                            <li class="nav-item <?= ($controller == 'user') ? 'menu-is-opening menu-open' : '' ?>">
                                <a href="#" class="nav-link <?= ($controller == 'user') ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-user-astronaut"></i>
                                    <p>
                                        <?= Yii::t('app', 'Accounts') ?>
                                        <i class="right fas fa-angle-right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= $cdnUrl ?>/user/create"
                                           class="nav-link <?= ($controller == 'user' && $action == 'create') ? 'active' : '' ?>">
                                            <i class="nav-icon fas fa-user-plus"></i>
                                            <p><?= Yii::t('app', 'Add new account') ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= $cdnUrl ?>/user"
                                           class="nav-link <?= ($controller == 'user' && $action == 'index') ? 'active' : '' ?>">
                                            <i class="nav-icon fas fa-user"></i>
                                            <p><?= Yii::t('app', 'Account management') ?></p>
                                        </a>
                                    </li>
                                </ul>
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
                        <li class="nav-item <?= ($controller == 'product-type' || $controller == 'product-category' || $controller == 'product') ? 'menu-is-opening menu-open' : '' ?>">
                            <a href="#"
                               class="nav-link <?= ($controller == 'product-type' || $controller == 'product-category' || $controller == 'product') ? 'active' : '' ?>">
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
                                    <a href="<?= Url::toRoute('product/') ?>"
                                       class="nav-link <?= ($controller == 'product') ? 'active' : '' ?>">
                                        <i class="nav-icon far fa-newspaper"></i>
                                        <p><?= Yii::t('app', 'Product Management') ?></p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Product -->
                        <li class="nav-header text-uppercase font-weight-bold"><?= Yii::t('app', 'Others') ?></li>
                        <li class="nav-item">
                            <a href="<?= Url::toRoute('contact/') ?>" class="nav-link">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p><?= Yii::t('app', 'Contact') ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::toRoute('tool/slider') ?>" class="nav-link">
                                <i class="nav-icon fab fa-slideshare"></i>
                                <p><?= Yii::t('app', 'Slider') ?></p>
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
