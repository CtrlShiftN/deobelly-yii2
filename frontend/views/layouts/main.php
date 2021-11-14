<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\components\SystemConstant;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\models\ProductType;
use frontend\models\SiteContact;
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
        <?php if (Yii::$app->session->hasFlash('creatNewsLetterSuccess') || Yii::$app->session->hasFlash('creatNewsLetterError')): ?>
            <?php $this->registerCssFile(Url::toRoute("css/success_error-icon.css")); ?>
        <?php endif; ?>
        <style>
            input[type=search] {
                background: url('<?= $cdnUrl?>/img/search-icon.png') no-repeat 9px center;
            }

            input[type=search]:focus {
                outline: none;
            }

            footer .footer-content {
                background: url('<?= $cdnUrl?>/img/footer_bg.png') no-repeat;
                background-size: cover;
            }

            .sidebar-nav .accordion-button:not(.collapsed)::after {
                background-image: url('<?= Url::toRoute('img/arrow-up-black.png') ?>') !important;
            }

            .sidebar-nav .accordion-button::after {
                background-image: url('<?= Url::toRoute('img/arrow-up-white.png') ?>') !important;
            }
        </style>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <?php $mainType = ProductType::getAllProductType(); ?>
    <?php $social = \frontend\models\Social::getAllSocialNetwork(); ?>
    <?php $headerFooter = \frontend\models\Footer::getHeaderTitleFooter() ?>
    <?php $contactFooter = SiteContact::getContactContent(); ?>
    <?php $casualType = ArrayHelper::index($mainType, 'id'); ?>
    <div id="wrapper">
        <div id="content">
            <div class="sticky-top">
                <!-- Top nav -->
                <nav class="bg-dark d-none d-md-block">
                    <div class="container">
                        <div class="topbar-content row">
                            <div class="topbar col-md-12 col-lg-5 col-xl-4 d-none d-lg-block text-white py-1 text-start">
                                <ul class="menu-topbar-left my-0 px-0">
                                    <?php if (!empty($contactFooter['tel'])): ?>
                                        <li class="site-nav-top">
                                            <strong>Hotline: </strong><a class="phone-num"
                                                                         href="tel:<?= $contactFooter['tel'] ?>">
                                                <?= $contactFooter['tel'] ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($contactFooter['email'])): ?>
                                        <li class="site-nav-top">
                                            <div class="vr mx-2"></div>
                                        </li>
                                        <li class="site-nav-top">
                                            <strong>Email: </strong> <a class="mail-num"
                                                                        href="mailto:<?= $contactFooter['email'] ?>">
                                                <?= $contactFooter['email'] ?></a>
                                        </li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                            <div class="topbar col-md-12 col-lg-7 col-xl-8 text-white py-1 text-center text-lg-end text-uppercase">
                                <ul class="menu-topbar-right my-0 ps-0">
                                    <li class="site-nav-top"><a href="<?= Url::toRoute('site/our-stories') ?>"
                                                                class="site-nav-top-link"><span><?= Yii::t('app', 'Introductions') ?></span></a>
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
                                                                class="site-nav-top-link"><span><?= Yii::t('app', 'Terms & Services') ?></span></a>
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
                                                       href="<?= Url::toRoute('site/logout?ref=' . Yii::$app->request->url) ?>"><?= Yii::t('app', 'Log out') ?></a>
                                                </div>
                                            </div>
                                        </li>
                                    <?php else : ?>
                                        <li class="site-nav-top">
                                            <div class="vr mx-2"></div>
                                        </li>
                                        <li class="site-nav-top"><a
                                                    href="<?= Url::toRoute('site/login?ref=' . Yii::$app->request->url) ?>"
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
                                                    <span class='badge badge-warning'
                                                          id='lblCartCount'><?= count(\frontend\models\Cart::getCartByUserId(Yii::$app->user->identity->getId())) ?></span>
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
                        <!-- Sidebar -->
                        <div class="offcanvas offcanvas-start bg-black" tabindex="-1" id="offcanvasWithBackdrop"
                             aria-labelledby="offcanvasWithBackdropLabel">
                            <div class="offcanvas-header p-2 borrder-light border-bottom">
                                <div class="col-11 px-0 text-center">
                                    <a class="text-decoration-none" href="<?php echo Url::home() ?>">
                                        <img src="<?= Url::toRoute('img/sidebar-logo.png') ?>" class="w-100 px-2">
                                    </a>
                                </div>
                                <button type="button" class="btn-close text-reset btn-close-white"
                                        data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body bg-gradient-dark d-block px-0 pt-0">
                                <?php if (!Yii::$app->user->isGuest) : ?>
                                    <!-- User -->
                                    <div class="d-flex align-items-center p-3">
                                        <div class="col-3 p-0">
                                            <div class="user__avatar img-circle">
                                                <!-- Avatar image -->
                                                <i class="far fa-user text-light fa-2x"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 ps-2 text-light">
                                            <h5 class="m-0 sidebar-user-name"><?= Yii::$app->user->identity->name ?></h5>
                                            <span><i class="fas fa-circle success-icon"></i></span>
                                            Online
                                        </div>
                                    </div>
                                    <!-- End user -->
                                    <!-- Login & signup -->
                                <?php endif; ?>
                                <!-- sm,md Navbar -->
                                <div class="mobile-navbar border-light border-top">
                                    <nav class="sidebar-nav">
                                        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column"
                                            data-widget="treeview" role="menu">
                                            <li class="nav-item border-bottom border-light">
                                                <a href="<?= Url::toRoute('site/our-stories') ?>"
                                                   class="nav-link text-uppercase p-3">
                                                    <p class="m-0 fs__15px"><?= Yii::t('app', 'Introductions') ?></p>
                                                </a>
                                            </li>
                                            <li class="nav-item has-treeview border-bottom border-light">
                                                <div class="accordion" id="accordionExample">
                                                    <div class="accordion-item border-0 rounded-0">
                                                        <button class="accordion-button p-0 bg-transparent text-light text-uppercase collapsed p-3 fw-bold fs__15px"
                                                                type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#collapseOne" aria-expanded="false"
                                                                aria-controls="collapseOne">
                                                            shop
                                                        </button>
                                                        <div id="collapseOne" class="accordion-collapse collapse"
                                                             data-bs-parent="#accordionExample">
                                                            <ul class="nav-treeview px-3 list-unstyled">
                                                                <?php foreach ($mainType as $key => $value): ?>
                                                                    <?php if ($value['segment'] != SystemConstant::SEGMENT_CASUAL): ?>
                                                                        <li class="nav-item <?= ($controller == 'site' && $action == 'luxury') ? '' : 'd-none' ?>">
                                                                            <?php if ($value['slug'] == 'mix-and-match' || $value['slug'] == 'tailor-made'): ?>
                                                                            <a href="<?= Url::toRoute([$value['slug'] . '/']) ?>"
                                                                               class="nav-link">
                                                                                <?php else: ?>
                                                                                <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"
                                                                                   class="nav-link">
                                                                                    <?php endif; ?>
                                                                                    <p><?= $value['name'] ?>
                                                                                        <sup><small class="badge bg-secondary text-uppercase">Luxury</small></sup>
                                                                                    </p>
                                                                                </a>
                                                                        </li>
                                                                    <?php else: ?>
                                                                        <li class="nav-item">
                                                                            <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"
                                                                               class="nav-link d-block">
                                                                                <p><?= $value['name'] ?></p>
                                                                            </a>
                                                                        </li>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item border-bottom border-light <?= ($controller == 'site' && $action == 'luxury') ? '' : 'd-none' ?>">
                                                <a href="<?= Url::toRoute('tailor-made/') ?>"
                                                   class="nav-link text-uppercase p-3">
                                                    <p class="m-0 fs__15px"><?= Yii::t('app', 'Tailor-made') ?>
                                                        <sup><small class="badge bg-secondary text-uppercase">Luxury</small></sup>
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="nav-item border-bottom border-light <?= ($controller == 'site' && $action == 'luxury') ? '' : 'd-none' ?>">
                                                <a href="<?= Url::toRoute('mix-and-match/') ?>"
                                                   class="nav-link text-uppercase p-3">
                                                    <p class="m-0 fs__15px"><?= Yii::t('app', 'Collections') ?>
                                                        <sup><small class="badge bg-secondary text-uppercase">Luxury</small></sup>
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="nav-item border-bottom border-light">
                                                <a href="<?= Url::toRoute('showroom/') ?>"
                                                   class="nav-link text-uppercase p-3">
                                                    <p class="m-0 fs__15px"><?= Yii::t('app', 'Showroom') ?></p>
                                                </a>
                                            </li>
                                            <li class="nav-item border-bottom border-light">
                                                <a href="<?= Url::toRoute('post/') ?>"
                                                   class="nav-link text-uppercase p-3">
                                                    <p class="m-0 fs__15px"><?= Yii::t('app', 'News') ?></p>
                                                </a>
                                            </li>
                                            <li class="nav-item border-bottom border-light">
                                                <a href="<?= Url::toRoute('site/terms') ?>"
                                                   class="nav-link text-uppercase p-3">
                                                    <p class="m-0 fs__15px"><?= Yii::t('app', 'Policy') ?></p>
                                                </a>
                                            </li>
                                            <li class="nav-item border-bottom border-light">
                                                <a href="<?= Url::toRoute('site/contact') ?>"
                                                   class="nav-link text-uppercase p-3">
                                                    <p class="m-0 fs__15px"><?= Yii::t('app', 'Contact') ?></p>
                                                </a>
                                            </li>
                                            <?php if (!Yii::$app->user->isGuest) : ?>
                                                <li class="nav-item border-bottom border-light">
                                                    <a href="<?= Url::toRoute('site/logout?ref=' . Yii::$app->request->url) ?>"
                                                       class="nav-link text-uppercase p-3">
                                                        <p class="m-0 fs__15px"><?= Yii::t('app', 'Logout') ?></p>
                                                    </a>
                                                </li>
                                            <?php else : ?>
                                                <li class="nav-item border-bottom border-light">
                                                    <a href="<?= Url::toRoute('site/login?ref=' . Yii::$app->request->url) ?>"
                                                       class="nav-link text-uppercase p-3">
                                                        <p class="m-0 fs__15px"><?= Yii::t('app', 'Login/Signup') ?></p>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- End sm,md navbar -->
                            </div>
                        </div>
                        <!-- End Sidebar -->
                        <div class="main-nav-left <?= (count($mainType) > 6) ? 'col-12 col-xl-2' : 'col-12 col-lg-2' ?> row p-0 m-0 text-center text-sm-center text-lg-start">
                            <div class="col-1 d-md-none m-0 p-0 d-flex align-items-center justify-content-center">
                                <button class="btn btn-white btn-sidebar" type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"><i
                                            class="fas fa-align-justify"></i>
                                </button>
                            </div>
                            <div class="d-flex col-10 col-md-12 p-0 m-0 align-items-center justify-content-center <?= (count($mainType) > 6) ? 'justify-content-xl-start' : 'justify-content-lg-start' ?>">
                                <a href="<?= Url::home() ?>"
                                   class="logo-align text-decoration-none">
                                    <img src="<?= $cdnUrl ?>/img/home.png">
                                </a>
                                <a href="<?= Url::toRoute('site/casual') ?>"
                                   class="logo-align d-none text-uppercase text-decoration-none <?= ($controller == 'site' && $action == 'luxury') ? 'd-none' : 'd-md-block' ?>">
                                    <span class="title-classify text-lighter-black px-2">casual</span>
                                </a>
                                <a href="<?= Url::toRoute('site/luxury') ?>"
                                   class="logo-align d-none text-uppercase text-decoration-none <?= ($controller == 'site' && $action == 'casual') ? 'd-none' : 'd-md-block' ?>">
                                    <span class="title-classify text-lighter-black px-2">luxury</span>
                                </a>
                            </div>
                            <div class="col-1 d-md-none m-0 p-0"></div>
                        </div>
                        <div class="main-nav-right text-end <?= (count($mainType) > 6) ? 'd-none d-xl-flex col-1 col-xl-10' : 'd-none d-lg-flex col-1 col-lg-10' ?>">
                            <ul class="site-nav mb-0 ps-0 w-100 justify-content-end" id="main-menu">
                                <?php if ($controller == 'site' && $action == 'luxury'): ?>
                                    <li class="nav-item d-inline-block p-2">
                                        <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($casualType[SystemConstant::PRODUCT_TYPE_NEW]['id'])]) ?>"
                                           class="site-nav-link">
                                            <span><?= $casualType[SystemConstant::PRODUCT_TYPE_NEW]['name'] ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item p-2 <?= ($controller == 'site' && $action == 'luxury') ? 'd-inline-block' : 'd-none' ?>">
                                        <a href="<?= Url::toRoute(['shop/']) ?>"
                                           class="site-nav-link">
                                            <span>shop</span>
                                        </a>
                                    </li>
                                    <?php foreach ($mainType as $key => $value): ?>
                                        <?php if ($value['segment'] != SystemConstant::SEGMENT_CASUAL): ?>
                                            <li class="nav-item <?= ($controller == 'site' && $action == 'luxury') ? 'd-inline-block' : 'd-none' ?> p-2">
                                                <?php if ($value['slug'] == 'mix-and-match' || $value['slug'] == 'tailor-made'): ?>
                                                <a href="<?= Url::toRoute([$value['slug'] . '/']) ?>"
                                                   class="site-nav-link">
                                                    <?php else: ?>
                                                    <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"
                                                       class="site-nav-link">
                                                        <?php endif; ?>
                                                        <span><?= $value['name'] ?></span>
                                                    </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?><?php foreach ($mainType as $key => $value): ?>
                                    <?php if ($value['segment'] == SystemConstant::SEGMENT_CASUAL): ?>
                                        <li class="nav-item p-2">
                                            <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"
                                               class="site-nav-link">
                                                <span><?= $value['name'] ?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </nav>
                <nav class="w-100 row p-0 m-0 d-md-none bg-white border-top border-bottom">
                    <div class="col-6 m-0 p-0 ">
                        <a href="<?= Url::toRoute('site/casual') ?>"
                           class="logo-align w-100 text-uppercase text-decoration-none <?= ($controller == 'site' && $action == 'luxury') ? 'classify-inactive' : '' ?> <?= ($controller == 'site' && $action == 'casual') ? 'classify-active' : 'text-lighter-black' ?>">
                            <span class="title-classify py-1">casual</span>
                        </a>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <a href="<?= Url::toRoute('site/luxury') ?>"
                           class="logo-align w-100 text-uppercase text-decoration-none <?= ($controller == 'site' && $action == 'casual') ? 'classify-inactive' : '' ?> <?= ($controller == 'site' && $action == 'luxury') ? 'classify-active' : 'text-lighter-black' ?>">
                            <span class="title-classify py-1">luxury</span>
                        </a>
                    </div>
                </nav>
                <nav class="<?= (count($mainType) > 6) ? 'd-none d-md-flex d-xl-none' : 'd-none d-md-flex d-lg-none' ?> align-items-center justify-content-center nav-tablet bg-white border-top border-bottom">
                    <?php if ($controller == 'site' && $action == 'luxury'): ?>
                        <li class="nav-item d-inline-block p-2">
                            <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($casualType[SystemConstant::PRODUCT_TYPE_NEW]['id'])]) ?>"
                               class="site-nav-link">
                                <span><?= $casualType[SystemConstant::PRODUCT_TYPE_NEW]['name'] ?></span>
                            </a>
                        </li>
                        <li class="nav-item p-2 <?= ($controller == 'site' && $action == 'luxury') ? 'd-inline-block' : 'd-none' ?>">
                            <a href="<?= Url::toRoute(['shop/']) ?>"
                               class="site-nav-link">
                                <span>shop</span>
                            </a>
                        </li>
                        <?php foreach ($mainType as $key => $value): ?>
                            <?php if ($value['segment'] != SystemConstant::SEGMENT_CASUAL): ?>
                                <li class="nav-item <?= ($controller == 'site' && $action == 'luxury') ? 'd-inline-block' : 'd-none' ?> p-2">
                                    <?php if ($value['slug'] == 'mix-and-match' || $value['slug'] == 'tailor-made'): ?>
                                    <a href="<?= Url::toRoute([$value['slug'] . '/']) ?>"
                                       class="site-nav-link">
                                        <?php else: ?>
                                        <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"
                                           class="site-nav-link">
                                            <?php endif; ?>
                                            <span><?= $value['name'] ?></span>
                                        </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php foreach ($mainType as $key => $value): ?>
                            <?php if ($value['segment'] == SystemConstant::SEGMENT_CASUAL): ?>
                                <li class="nav-item p-2">
                                    <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"
                                       class="site-nav-link">
                                        <span><?= $value['name'] ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </nav>
                <!-- End navs -->
            </div>
            <?php if (Yii::$app->session->hasFlash('creatNewsLetterSuccess')): ?>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"
                        id='btnModalNewsLetterSuccess' hidden>
                </button>
                <div class="modal" id="myModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="swal2-icon swal2-success swal2-animate-success-icon d-flex">
                                    <div class="swal2-success-circular-line-left"></div>
                                    <span class="swal2-success-line-tip"></span>
                                    <span class="swal2-success-line-long"></span>
                                    <div class="swal2-success-ring"></div>
                                    <div class="swal2-success-fix"></div>
                                    <div class="swal2-success-circular-line-right"></div>
                                </div>
                                <div class='text-center text-uppercase'>
                                    <h2 class="mx-0 mb-3 text-success fw-light"><?= Yii::t('app', 'Successfully!') ?></h2>
                                    <p class="mx-0 mb-4"><?= Yii::t('app', Yii::$app->session->getFlash('creatNewsLetterSuccess')) ?></p>
                                    <button type="button" data-bs-dismiss="modal" id='btnModalNewsLetterClose'
                                            hidden></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (Yii::$app->session->hasFlash('creatNewsLetterError')): ?>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"
                        id='btnModalNewsLetterError'
                        hidden>
                </button>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="swal2-icon swal2-error swal2-animate-error-icon d-flex">
                        <span class="swal2-x-mark">
                            <span class="swal2-x-mark-line-left"></span>
                            <span class="swal2-x-mark-line-right"></span>
                        </span>
                                </div>
                                <div class='text-center'>
                                    <h2 class="mx-0 mb-3 text-success fw-light"><?= Yii::t('app', 'Error!') ?></h2>
                                    <p class="mx-0 mb-4"><?= Yii::t('app', Yii::$app->session->getFlash('creatNewsLetterError')) ?></p>
                                    <button type="button" data-bs-dismiss="modal" id='btnModalNewsLetterClose'
                                            hidden></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="container px-0">
                <?= $content ?>
            </div>
            <footer class="footer">
                <div class="footer-content">
                    <div class="ft-bg-overlay"></div>
                    <div class="container inner">
                        <div class="row d-none d-lg-flex m-0 p-0">
                            <?php foreach ($headerFooter as $value): ?>
                                <div class="col-sm-12 col-md-6 col-lg-3 pb-3 px-auto">
                                    <ul class="footer-nav no-bullets px-2 py-0">
                                        <h3 class="mb-1 text-uppercase"><?= $value['title'] ?></h3>
                                        <?php foreach (\frontend\models\Footer::getFooterByParentId($value['id']) as $items): ?>
                                            <li>
                                                <a href="<?= Url::toRoute($items['link']) ?>"><?= $items['title'] ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endforeach; ?>

                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-sm-12 col-md-6 col-lg-3 pb-3 px-auto">
                                <ul class="footer-nav no-bullets px-2 py-0">
                                    <h3 class="mb-1"><?= Yii::t('app', 'CONTACT INFO') ?></h3>
                                    <?php if (!empty($contactFooter['company_address'])): ?>
                                        <li><span class="ft-content"><i
                                                        class="fas fa-home"></i> <?= $contactFooter['company_address'] ?></span>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($contactFooter['tel'])): ?>
                                        <li><span class="ft-content"><i class="fas fa-phone-square"></i> <a
                                                        href="tel:<?= $contactFooter['tel'] ?>"><?= $contactFooter['tel'] ?></a></span>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($contactFooter['email'])): ?>
                                        <li><span class="ft-content"><i class="fas fa-envelope"></i><a
                                                        href="mailto:<?= $contactFooter['email'] ?>"> <?= $contactFooter['email'] ?></a></span>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 pb-3 px-auto">
                                <ul class="footer-nav no-bullets px-2 py-0">
                                    <h3 class="mb-1"><?= Yii::t('app', 'SIGN UP TO RECEIVE NEWS') ?></h3>
                                    <li class="mb-3"><span
                                                class="ft-content"><?= Yii::t('app', 'Promotion news / Brand news') ?></span>
                                    </li>
                                    <li>
                                        <form action="<?= Url::toRoute('api/ajax/create-contact') ?>" method="POST"
                                              class="d-flex">
                                            <input name="nameNewsLetter" type="hidden" value="newsletter">
                                            <input type="email" class="form-control rounded-0 d-inline w-75 border-0"
                                                   id="exampleInputEmail1" name="emailNewsLetter"
                                                   aria-describedby="emailHelp"
                                                   placeholder="<?= Yii::t('app', 'Enter your email...') ?>">
                                            <?php if (Yii::$app->user->isGuest): ?>
                                                <a href="<?= Url::toRoute('site/login?ref=' . $_SERVER['PHP_SELF']) ?>"
                                                   class="btn btn-dark d-inline align-baseline rounded-0"><i
                                                            class="fas fa-paper-plane"></i></a>
                                            <?php else: ?>
                                                <button type="submit"
                                                        class="btn btn-dark d-inline align-baseline rounded-0"><i
                                                            class="fas fa-paper-plane"></i></button>
                                            <?php endif; ?>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 pb-3 px-auto">
                                <ul class="footer-nav no-bullets px-2 py-0">
                                    <h3 class="mb-1"><?= Yii::t('app', 'CONNECT WITH US') ?></h3>
                                    <li class="mb-3"><span
                                                class="ft-content"><?= Yii::t('app', 'Social networks') ?></span></li>
                                    <li>
                                        <div class="ft-social-network">
                                            <?php foreach ($social as $value): ?>
                                                <a href="<?= $value['link'] ?>" class="mt-1"><?= $value['icon'] ?></a>
                                            <?php endforeach; ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 pb-3 px-auto">
                                <ul class="footer-nav no-bullets px-2 py-0">
                                    <h3 class="mb-1"><?= Yii::t('app', 'CERTIFICATE') ?></h3>
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
                <div class="copy-right bg-dark text-center">
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
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "101740955648709");
        chatbox.setAttribute("attribution", "biz_inbox");

        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v12.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <?php if (Yii::$app->session->hasFlash('creatNewsLetterSuccess')): ?>
        <script>
            $('#btnModalNewsLetterSuccess').trigger("click");
            setTimeout(function () {
                $('#btnModalNewsLetterClose').trigger("click");
            }, 1800);
        </script>
    <?php endif; ?>
    <?php if (Yii::$app->session->hasFlash('creatNewsLetterError')): ?>
        <script>
            $('#btnModalNewsLetterError').trigger("click");
            setTimeout(function () {
                $('#btnModalNewsLetterClose').trigger("click");
            }, 1800);
        </script>
    <?php endif; ?>
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
