<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\components\SystemConstant;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\models\ProductType;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$cdnUrl = Yii::$app->params['frontend'];
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
        <?= $this->render('_mainHead') ?>
        <style>
            input[type=search] {
                background: url('<?= $cdnUrl?>/img/search-icon.png') no-repeat 9px center;
            }

            input[type=search]:focus {
                outline: none;
            }

            footer .footer-content {
                background: url('<?= $cdnUrl?>/img/footer_bg.png') no-repeat;
            }
        </style>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <?php $mainType = ProductType::getAllProductType(); ?>
    <div id="wrapper">
        <div id="content">
            <div class="sticky-top">
                <!-- Top nav -->
                <nav class="bg-dark d-none d-md-block">
                    <div class="container">
                        <div class="topbar-content row">
                            <div class="topbar col-md-12 col-lg-5 col-xl-4 d-none d-lg-block text-white py-1 text-start">
                                <ul class="menu-topbar-left my-0">
                                    <li class="site-nav-top">
                                        <strong>SĐT: </strong><a class="phone-num"
                                                                 href="tel:<?= Yii::$app->params['adminTel'] ?>">
                                            <?= Yii::$app->params['adminTel'] ?></a>
                                    </li>
                                    <li class="site-nav-top">
                                        <div class="vr mx-2"></div>
                                    </li>
                                    <li class="site-nav-top">
                                        <strong>Email: </strong> <a class="mail-num"
                                                                    href="mailto:<?= Yii::$app->params['supportEmail'] ?>">
                                            <?= Yii::$app->params['supportEmail'] ?> </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="topbar col-md-12 col-lg-7 col-xl-8 text-white py-1 text-center text-lg-end text-uppercase">
                                <ul class="menu-topbar-right my-0 ps-0">
                                    <li class="site-nav-top"><a href="<?= Url::toRoute('site/our-stories') ?>"
                                                                class="site-nav-top-link"><span><?= Yii::t('app', 'Introduction') ?></span></a>
                                    </li>
                                    <li class="site-nav-top">
                                        <div class="vr mx-2"></div>
                                    </li>
                                    <li class="site-nav-top"><a href="<?= Url::toRoute('post/') ?>"
                                                                class="site-nav-top-link"><span><?= Yii::t('app', 'News') ?></span></a>
                                    </li>
                                    <li class="site-nav-top">
                                        <div class="vr mx-2"></div>
                                    </li>
                                    <li class="site-nav-top"><a href="<?= Url::toRoute('showroom/') ?>"
                                                                class="site-nav-top-link"><span><?= Yii::t('app', 'Showroom') ?></span></a>
                                    </li>
                                    <li class="site-nav-top">
                                        <div class="vr mx-2"></div>
                                    </li>
                                    <li class="site-nav-top"><a href="<?= Url::toRoute('site/terms') ?>"
                                                                class="site-nav-top-link"><span><?= Yii::t('app', 'Terms & Service') ?></span></a>
                                    </li>
                                    <li class="site-nav-top">
                                        <div class="vr mx-2"></div>
                                    </li>
                                    <li class="site-nav-top"><a href="<?= Url::toRoute('site/contact') ?>"
                                                                class="site-nav-top-link"><span><?= Yii::t('app', 'Contact') ?></span></a>
                                    </li>
                                    <?php if (!Yii::$app->user->isGuest) : ?>
                                        <li class="site-nav-top">
                                            <div class="vr mx-2"></div>
                                        </li>
                                        <li class="site-nav-top">
                                            <div class="dropdown header_login ps-2">
                                                <a class="dropdown-toggle" type="button" id="dropdownUserLogin"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="far fa-user"></i> <?= Yii::$app->user->identity->name ?>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownUserLogin">
                                                    <a class="dropdown-item"
                                                       href="<?= Url::toRoute('site/logout') ?>"><?= Yii::t('app', 'Log out') ?></a>
                                                </div>
                                            </div>
                                        </li>
                                    <?php else : ?>
                                        <li class="site-nav-top">
                                            <div class="vr mx-2"></div>
                                        </li>
                                        <li class="site-nav-top"><a href="<?= Url::toRoute('site/login') ?>"
                                                                    class="site-nav-top-link"><span><?= Yii::t('app', 'Login') ?></span></a>
                                        </li>
                                        <li class="site-nav-top">
                                            <div class="vr mx-2"></div>
                                        </li>
                                        <li class="site-nav-top"><a href="<?= Url::toRoute('site/signup') ?>"
                                                                    class="site-nav-top-link"><span><?= Yii::t('app', 'Signup') ?></span></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!Yii::$app->user->isGuest) : ?>
                                        <li class="site-nav-top">
                                            <div class="vr mx-2"></div>
                                        </li>
                                        <li class="site-nav-top">
                                            <div class="shopping-cart d-inline pe-0">
                                                <a href="<?= Url::toRoute('cart/') ?>" class="site-nav-top-link">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    <span class='badge badge-warning' id='lblCartCount'> 0 </span>
                                                </a>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Main nav -->
                <nav class="bg-white shadow">
                    <div class="main-site-nav container p-0">
                        <div class="col-1 col-sm-1 d-block d-lg-none">
                            <button class="btn btn-white btn-sidebar" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"><i
                                        class="fas fa-align-justify"></i>
                            </button>
                            <!-- Sidebar -->
                            <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasWithBackdrop"
                                 aria-labelledby="offcanvasWithBackdropLabel">
                                <div class="offcanvas-header">
                                    <div class="col-11 px-0 text-center">
                                        <a class="text-decoration-none" href="<?php echo Url::home() ?>">
                                            <h3 class="offcanvas-title text-uppercase fw-bolder text-white"
                                                id="offcanvasWithBackdropLabel"><i
                                                        class=" fas fa-feather-alt fa-flip-horizontal"></i>De Obelly <i
                                                        class=" fas fa-feather-alt"></i></h3></a>
                                    </div>
                                    <button type="button" class="btn-close text-reset btn-close-white"
                                            data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body bg-gradient-dark d-block">
                                    <?php if (!Yii::$app->user->isGuest) : ?>
                                        <!-- User -->
                                        <div class="d-flex align-items-center">
                                            <div class="col-3">
                                                <div class="user__avatar img-circle">
                                                    <!-- Avatar image -->
                                                    <img class="user__avatar_image img-circle w-100"
                                                         src="https://avatarfiles.alphacoders.com/131/thumb-131310.jpg"/>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <h4><?= Yii::$app->user->identity->name ?></h4>
                                                <span class="text-success"><i class="fas fa-circle success"></i></span>
                                                Online
                                            </div>
                                        </div>
                                        <!-- End user -->
                                        <!-- Login & signup -->
                                    <?php else : ?>
                                        <div class="d-flex align-items-center">
                                            <div class="col-4">
                                                <div class="text-white">
                                                    <i class="fas fa-user-secret fa-4x"></i>
                                                </div>
                                            </div>
                                            <div class="col-8 pe-0">
                                                <p class="mb-0"><?= Yii::t('app', 'Hi,') ?></p>
                                                <h3><?= Yii::t('app', 'Guest') ?></h3>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <!-- sm,md Navbar -->
                                    <div class="mobile-navbar">
                                        <nav class="mt-2">
                                            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column"
                                                data-widget="treeview" role="menu">
                                                <li class="nav-item  ">
                                                    <a href="<?= Url::home() ?>" class="nav-link ">
                                                        <i class="nav-icon fas fa-handshake"></i>
                                                        <p><?= Yii::t('app', 'Home') ?></p>
                                                    </a>
                                                </li>
                                                <li class="nav-item has-treeview">
                                                    <a href="<?= Url::toRoute(['shop/product']) ?>"
                                                       class="nav-link d-inline-block">
                                                        <i class="nav-icon fas fa-th"></i>
                                                        <p>
                                                            <?= Yii::t('app', 'Product') ?>
                                                            <i class="right fas fa-angle-left"></i>
                                                        </p>
                                                    </a>
                                                    <ul class="nav nav-treeview" style="display:none">
                                                        <?php foreach ($mainType as $key => $value): ?>
                                                            <?php if ($value['segment'] == SystemConstant::SEGMENT_LUXURY): ?>
                                                                <li class="nav-item">
                                                                    <a href="<?= Url::toRoute([$value['slug'].'/']) ?>"
                                                                       class="nav-link d-flex <?= ($controller == 'site' && $action == 'luxury') ? '' : 'd-none' ?>">
                                                                        <i class="far fa-circle nav-icon me-2"></i>
                                                                        <p><?= Yii::t('app', $value['name']) ?></p>
                                                                    </a>
                                                                </li>
                                                            <?php else: ?>
                                                                <li class="nav-item">
                                                                    <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"
                                                                       class="nav-link d-flex">
                                                                        <i class="far fa-circle nav-icon me-2"></i>
                                                                        <p><?= Yii::t('app', $value['name']) ?></p>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                                <li class="nav-item  ">
                                                    <a href="#" class="nav-link ">
                                                        <i class="nav-icon fas fa-handshake"></i>
                                                        <p><?= Yii::t('app', 'Policy') ?></p>
                                                    </a>
                                                </li>
                                                <li class="nav-item  ">
                                                    <a href="<?= Url::toRoute('site/contact') ?>" class="nav-link ">
                                                        <i class="nav-icon fas fa-handshake"></i>
                                                        <p><?= Yii::t('app', 'Contact') ?></p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- End sm,md navbar -->
                                </div>
                            </div>
                            <!-- End Sidebar -->
                        </div>
                        <div class="main-nav-left col-10 col-sm-10 col-lg-2 text-center text-sm-center text-lg-start">
                            <div class="d-flex align-items-center justify-content-center">
                                <?php if($controller == 'site' && $action != 'index'): ?>
                                <a href="<?= Url::home() ?>"
                                   class="logo-align">
                                    <img src="<?= $cdnUrl ?>/img/home.png" class="p-home">
                                </a>
                                <?php endif; ?>
                                <?php if($controller == 'site' && $action != 'casual'): ?>
                                    <a href="<?= Url::toRoute('site/luxury') ?>"
                                       class="logo-align">
                                        <img src="<?= $cdnUrl ?>/img/luxury.png" class="p-1">
                                    </a>
                                <?php endif; ?>
                                <?php if($controller == 'site' && $action != 'luxury'): ?>
                                    <a href="<?= Url::toRoute('site/casual') ?>"
                                       class="logo-align">
                                        <img src="<?= $cdnUrl ?>/img/casual.png">
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="main-nav-right col-1 col-sm-1 col-lg-10 text-end">
                            <ul class="site-nav mb-0 ps-0 d-none d-sm-none d-lg-inline-block" id="main-menu">
                                <?php foreach ($mainType as $key => $value): ?>
                                    <?php if ($value['segment'] == SystemConstant::SEGMENT_LUXURY): ?>
                                        <li class="nav-item <?= ($controller == 'site' && $action == 'luxury') ? '' : 'd-none' ?> px-2">
                                            <a href="<?= Url::toRoute([$value['slug'].'/']) ?>"
                                               class="site-nav-link">
                                                <span><?= Yii::t('app', $value['name']) ?></span>
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li class="nav-item px-2">
                                            <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"
                                               class="site-nav-link">
                                                <span><?= Yii::t('app', $value['name']) ?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </nav>
                <nav class="d-none d-md-flex d-lg-none align-items-center justify-content-center nav-tablet bg-white border-top">
                    <?php foreach ($mainType as $key => $value): ?>
                        <?php if ($value['segment'] == SystemConstant::SEGMENT_LUXURY): ?>
                            <li class="nav-item <?= ($controller == 'site' && $action == 'luxury') ? '' : 'd-none' ?>">
                                <a href="<?= Url::toRoute([$value['slug'].'/']) ?>"
                                   class="site-nav-link">
                                    <span><?= Yii::t('app', $value['name']) ?></span>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"
                                   class="site-nav-link">
                                    <span><?= Yii::t('app', $value['name']) ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </nav>
                <!-- End navs -->
            </div>
            <div class="container px-0">
                <?= $content ?>
            </div>
            <footer class="footer">
                <div class="footer-content">
                    <div class="ft-bg-overlay"></div>
                    <div class="container inner">
                        <div class="row d-none d-lg-flex m-0 p-0">
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <ul class="footer-nav no-bullets">
                                    <h3><?= Yii::t('app', 'ABOUT US') ?></h3>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Suplo fashion') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Business philosophy') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Event communication') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Social activities') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Association and cooperation') ?></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <ul class="footer-nav no-bullets">
                                    <h3><?= Yii::t('app', 'News') ?></h3>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Product reviews') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Fashion news') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Famous brand') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Customer feedback') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Brand history') ?></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <ul class="footer-nav no-bullets">
                                    <h3><?= Yii::t('app', 'PRODUCT CONSULTING') ?></h3>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Office Fashion') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Order clothes') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Frequently asked questions') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'General knowledge') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Why you should choose us') ?></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <ul class="footer-nav no-bullets">
                                    <h3><?= Yii::t('app', 'INSTRUCTIONS') ?></h3>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Shopping guide') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Preferential policy of VIP card') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'warranty Policy') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Directions for use') ?></a>
                                    </li>
                                    <li>
                                        <a href="/"><?= Yii::t('app', 'Payment Guide') ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <ul class="footer-nav no-bullets">
                                    <h3><?= Yii::t('app', 'CONTACT INFO') ?></h3>
                                    <li><span class="ft-content"><i
                                                    class="fas fa-home"></i> <?= Yii::t('app', 'Number xxx, YYY street, ZZZ ward, ABC district, Hanoi') ?></span>
                                    </li>
                                    <li><span class="ft-content"><i class="fas fa-phone-square"></i> <a
                                                    href="tel:1800 1089">1800 1089</a> | <a
                                                    href="tel:1800 1090">1800 1090</a></span></li>
                                    <li><span class="ft-content"><i class="fas fa-envelope"></i><a
                                                    href="mailto:support@deobelly.com"> support@deobelly.com</a></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <ul class="footer-nav no-bullets">
                                    <h3><?= Yii::t('app', 'SIGN UP TO RECEIVE NEWS') ?></h3>
                                    <li class="mb-3"><span
                                                class="ft-content"><?= Yii::t('app', 'Promotion news / Brand news') ?></span>
                                    </li>
                                    <li>
                                        <form action="#" method="POST" class="d-inline">
                                            <input name="form_type" type="hidden" value="customer">
                                            <input type="email" class="form-control d-inline w-75"
                                                   id="exampleInputEmail1"
                                                   aria-describedby="emailHelp" placeholder="Nhập email của bạn...">
                                            <input type="hidden" name="contact[tags]" value="newsletter">
                                            <span type="submit" class="btn btn-dark d-inline"><i
                                                        class="fas fa-paper-plane"></i></span>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <ul class="footer-nav no-bullets">
                                    <h3 class="h3"><?= Yii::t('app', 'CONNECT WITH US') ?></h3>
                                    <li class="mb-3"><span
                                                class="ft-content"><?= Yii::t('app', 'Social network') ?></span></li>
                                    <li>
                                        <div class="ft-social-network">
                                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"
                                                                                   aria-hidden="true"></i></a>
                                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                            <a href="https://www.youtube.com/" class="mt-md-1"><i
                                                        class="fab fa-youtube"></i></a>
                                            <a href="https://twitter.com/" class="mt-lg-1"><i
                                                        class="fab fa-twitter"></i></a>
                                            <a href="https://plus.google.com/" class="mt-lg-1"><i
                                                        class="fab fa-google-plus"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <ul class="footer-nav no-bullets">
                                    <h3><?= Yii::t('app', 'CERTIFICATE') ?></h3>
                                    <li>
                                        <a href="javascript:void(0)" target="_blank"><img class="pt-2"
                                                                                          src="//theme.hstatic.net/1000180292/1000232392/14/footer_payment_logo_1.png?v=3509"></a>
                                        <a href="javascript:void(0)" target="_blank"><img class="pt-2"
                                                                                          src="//theme.hstatic.net/1000180292/1000232392/14/footer_payment_logo_2.png?v=3509"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copy-right bg-dark text-center py-2 fw-bolder">
                    <span>Copyright &copy; <?= date('Y') ?> by DE OBELLY</span>
                </div>
            </footer>
            <div id="back-to-top" class="d-block">
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <div class="phone-call"><a href="tel:<?= Yii::$app->params['adminTel'] ?>"><img
                    src="<?= Yii::$app->params['common'] . '/media/phone-call.png' ?>"
                    width="50" alt="<?= Yii::t('app', 'Call Now') ?>" title="<?= Yii::t('app', 'Call Now') ?>"></a>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', event => {
            // Toggle the side navigation
            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
                // Uncomment Below to persist sidebar toggle between refreshes
                // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
                //     document.body.classList.toggle('sb-sidenav-toggled');
                // }
                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
                });
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            let offset = 220;
            let duration = 500;
            jQuery(window).scroll(function () {
                if (jQuery(this).scrollTop() >= offset) {
                    jQuery('#back-to-top').fadeIn(duration);
                } else {
                    jQuery('#back-to-top').fadeOut(duration);
                }
            });

            jQuery('#back-to-top').click(function (event) {
                event.preventDefault();
                jQuery('html, body').animate({
                    scrollTop: 0
                }, duration);
                return false;
            })
        });
    </script>
    <script>

    </script>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
