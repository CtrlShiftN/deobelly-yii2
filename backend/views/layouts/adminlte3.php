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
                    <a href="<?= $cdnUrl ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
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
                        <li class="nav-header text-uppercase font-weight-bold">Tài khoản</li>
                        <li class="nav-item">
                            <a href="<?= $cdnUrl ?>/user/create"
                               class="nav-link <?= ($controller == 'user' && $action == 'create') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Thêm tài khoản mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $cdnUrl ?>/user"
                               class="nav-link <?= ($controller == 'user' && $action == 'index') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Quản lý tài khoản</p>
                            </a>
                        </li>
                        <!-- Post -->
                        <li class="nav-header text-uppercase font-weight-bold">Bài viết</li>
                        <li class="nav-item">
                            <a href="<?= Url::toRoute('posts-tag/') ?>"
                               class="nav-link <?= ($controller == 'posts-tag') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Quản lý thẻ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::toRoute('posts-category/') ?>"
                               class="nav-link <?= ($controller == 'posts-category') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Quản lý danh mục</p>
                            </a>
                        </li>
                        <li class="nav-header text-uppercase font-weight-bold">Sản phẩm</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./index.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index3.html" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header text-uppercase font-weight-bold">Khác</li>
                        <li class="nav-item">
                            <a href="pages/calendar.html" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Calendar
                                    <span class="badge badge-info right">2</span>
                                </p>
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
            <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= Yii::$app->params['frontend'] ?>">De
                    Obelly</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 2.4.4
            </div>
        </footer>
    </div>
    <?php $this->endBody() ?>
    <script src="<?= $cdnUrl ?>/adminlte3/dist/js/adminlte.js"></script>
    </body>
    </html>
<?php $this->endPage();
