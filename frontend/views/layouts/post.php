<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\models\Post;
use frontend\models\PostCategory;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Url;

$cdnUrl = Yii::$app->params['frontend'];
$imageUrl = Yii::$app->params['common'] . '/media';

AppAsset::register($this);
$latestPosts = Post::getLatestPosts();
$postCategory = PostCategory::getAllPostCategory();
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
        <link href="<?= $cdnUrl ?>/css/post.css" rel="stylesheet" type="text/css">
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
    <?php $mainType = ArrayHelper::index(ProductType::getProductType(), null, 'slug'); ?>
    <div id="wrapper">
        <div id="content">
            <div class="sticky-top">
                <!-- Top nav -->
                <nav class="bg-dark d-none d-lg-block">
                    <div class="container">
                        <div class="topbar-content row">
                            <div class="topbar col-xs-5 col-md-5 col-lg-5 text-white py-1 text-start">
                                <ul class="menu-topbar-left my-0">
                                    <li class="site-nav-top"><strong>SĐT: </strong><a class="phone-num"
                                                                                      href="tel:19001089">
                                            19001089</a></li>
                                    <li class="site-nav-top">
                                        <div class="vr mx-2"></div>
                                    </li>
                                    <li class="site-nav-top"><strong>Email: </strong> <a class="mail-num"
                                                                                         href="mailto:nobita.nguyen0902@gmail.com">nobita.nguyen0902@gmail.com </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="topbar col-xs-7 col-md-7 col-lg-7 text-white py-1 text-end text-uppercase">
                                <ul class="menu-topbar-right my-0">
                                    <li class="site-nav-top"><a href="<?php echo Url::home() ?>"
                                                                class="site-nav-top-link"><span>Giới thiệu</span></a>
                                    </li>
                                    <li class="site-nav-top">
                                        <div class="vr mx-2"></div>
                                    </li>
                                    <li class="site-nav-top"><a href="<?= $cdnUrl ?>/post/index"
                                                                class="site-nav-top-link"><span>Tin tức</span></a>
                                    </li>
                                    <li class="site-nav-top">
                                        <div class="vr mx-2"></div>
                                    </li>
                                    <li class="site-nav-top"><a href="#"
                                                                class="site-nav-top-link"><span>Chính sách & điều khoản</span></a>
                                    </li>
                                    <li class="site-nav-top">
                                        <div class="vr mx-2"></div>
                                    </li>
                                    <li class="site-nav-top"><a href="<?= Url::toRoute('site/contact') ?>"
                                                                class="site-nav-top-link"><span>Liên hệ</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Main nav -->
                <nav class="bg-white shadow">
                    <div class="main-site-nav container">
                        <div class="col-1 col-sm-1 d-block d-lg-none">
                            <button class="btn btn-light" type="button" data-bs-toggle="offcanvas"
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
                                                        class=" fas fa-feather-alt fa-flip-horizontal"></i> De Obelly <i
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
                                                <p class="mb-0">Xin chào,</p>
                                                <h3>Guest</h3>
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
                                                        <p>Trang chủ</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item has-treeview">
                                                    <a href="<?= Url::toRoute(['shop/product']) ?>" class="nav-link">
                                                        <i class="nav-icon fas fa-th"></i>
                                                        <p>
                                                            Sản phẩm
                                                            <i class="right fas fa-angle-left"></i>
                                                        </p>
                                                    </a>
                                                    <ul class="nav nav-treeview" style="display: none;">
                                                        <li class="nav-item">
                                                            <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($mainType['thoi-trang-nam'][0]['id'])]) ?>"
                                                               class="nav-link ">
                                                                <i class="far fa-circle nav-icon"></i>
                                                                <p>Men</p>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($mainType['thoi-trang-nu'][0]['id'])]) ?>"
                                                               class="nav-link ">
                                                                <i class="far fa-circle nav-icon"></i>
                                                                <p>Women</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item  ">
                                                    <a href="#" class="nav-link ">
                                                        <i class="nav-icon fas fa-handshake"></i>
                                                        <p>Chính sách</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item  ">
                                                    <a href="<?= Url::toRoute('site/contact') ?>" class="nav-link ">
                                                        <i class="nav-icon fas fa-handshake"></i>
                                                        <p>Liên hệ</p>
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
                            <div class="py-2">
                                <a href="<?php echo Url::home() ?>" class="logo-align">
                                    <img src="<?= $cdnUrl ?>/img/logo.png">
                                </a>
                            </div>
                        </div>
                        <div class="main-nav-right col-1 col-sm-1 col-lg-10 text-end">
                            <ul class="site-nav mb-0 ps-0 d-none d-sm-none d-lg-inline" id="main-menu">
                                <li>
                                    <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($mainType['san-pham-moi'][0]['id'])]) ?>"
                                       class="site-nav-link"><span><?= Yii::t('app', 'New product') ?></span></a>
                                </li>
                                <!--                                <li><a href="#"-->
                                <!--                                       class="site-nav-link"><span>-->
                                <?//= Yii::t('app', 'On Sale') ?><!--</span></a></li>-->
                                <li>
                                    <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($mainType['quan'][0]['id'])]) ?>"
                                       class="site-nav-link"><span><?= Yii::t('app', 'Pants') ?></span></a></li>
                                <li>
                                    <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($mainType['ao'][0]['id'])]) ?>"
                                       class="site-nav-link"><span><?= Yii::t('app', 'Top') ?></span></a></li>
                                <li>
                                    <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($mainType['giay'][0]['id'])]) ?>"
                                       class="site-nav-link"><span><?= Yii::t('app', 'Footwear') ?></span></a>
                                </li>
                                <li>
                                    <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($mainType['phu-kien'][0]['id'])]) ?>"
                                       class="site-nav-link"><span><?= Yii::t('app', 'Accessory') ?></span></a>
                                </li>
                                <!--                                <li><a href="#"-->
                                <!--                                       class="site-nav-link"><span>-->
                                <?//= Yii::t('app', 'Suit') ?><!--</span></a></li>-->
                                <li class="pe-0"><a
                                            href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($mainType['qua-tang'][0]['id'])]) ?>"
                                            class="site-nav-link"><span><?= Yii::t('app', 'Gift') ?></span></a>
                                </li>
                                <!-- TODO: Add search action -->
                                <li class="pe-0 ps-1">
                                    <div class="searchBox d-inline">
                                        <form action="#" method="POST" class="d-inline">
                                            <input name="search" type="search">
                                        </form>
                                    </div>
                                </li>
                                <li class="pe-0">
                                    <div class="vr mx-2"></div>
                                </li>
                                <li>
                                    <div class="dropdown header_login ps-2">
                                        <a class="dropdown-toggle" type="button" id="dropdownUserLogin"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-user fa-lg"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownUserLogin">
                                            <?php if (!Yii::$app->user->isGuest) : ?>
                                                <div class="dropdown-item"><?php Yii::$app->user->identity->name ?></div>
                                                <form method="POST" action="<?= $cdnUrl ?>/logout">
                                                    @csrf
                                                    <a class="dropdown-item" href="<?= $cdnUrl ?>/logout"
                                                       onclick="event.preventDefault(); this.closest('form').submit();">{{
                                                        __('Log Out') }}
                                                    </a>
                                                </form>
                                            <?php else : ?>
                                                <a class="dropdown-item" href="<?= $cdnUrl ?>/site/login">Đăng nhập</a>
                                                <a class="dropdown-item" href="<?= $cdnUrl ?>/site/register">Đăng ký</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </li>
                                <li class="pe-0">
                                    <div class="shopping-cart d-inline pe-0">
                                        <a href="<?= $cdnUrl ?>/#"><i class="fas fa-shopping-cart fa-lg"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End navs -->
            </div>
            <div class="container px-0">
                <div class="posts row mt-4">
                    <div class="col-12 col-lg-8 col-xl-9 px-3 m-0">
                        <?= $content ?>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-3 ps-3 m-0">
                        <div class="w-100 mt-3 fs-4"><h2
                                    class="latest-news__title text-uppercase"><?= Yii::t('app', 'Post Categories') ?></h2>
                        </div>
                        <div class="post-category__right-side">
                            <?php foreach ($postCategory as $category) : ?>
                                <a target="_blank"
                                   href="<?= Url::toRoute(['post/index', 'post_category' => \common\components\encrypt\CryptHelper::encryptString($category['id'])]) ?>"><span
                                            class="badge border text-dark font-weight-bold p-2 m-1"><?= Yii::t('app', $category['title']) ?></span></a>
                            <?php endforeach; ?>
                        </div>
                        <div class="w-100 mt-5 fs-4"><h2
                                    class="latest-news__title text-uppercase"><?= Yii::t('app', 'Latest posts') ?></h2>
                        </div>
                        <div class="latest-news__right-side mb-3">
                            <?php foreach ($latestPosts as $value) : ?>
                                <div class="row d-flex align-items-center">
                                    <div class="col-3 col-lg-5">
                                        <a href="<?= Url::toRoute(['post/detail', 'id' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"><img
                                                    class="latest-news__image"
                                                    src="<?= $imageUrl . '/' . $value['avatar'] ?>"
                                                    alt="<?= $value['slug'] ?>"></a>
                                    </div>
                                    <div class="col-9 col-lg-7">
                                        <a href="<?= Url::toRoute(['post/detail', 'id' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>">
                                            <p class="pb-0 mb-0"><?= $value['title'] ?></p></a>
                                        <span class="latest-post__date"><?= date_format(date_create($value['created_at']), 'H:i:s d/m/Y') ?></span>
                                    </div>
                                </div>
                                <hr class="latest-post__hr">
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="footer-content">
                    <div class="ft-bg-overlay"></div>
                    <div class="container inner">
                        <div class="row d-none d-lg-flex m-0 p-0">
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <ul class="footer-nav no-bullets">
                                    <h3>VỀ CHÚNG TÔI</h3>
                                    <li>
                                        <a href="/">Suplo Fashion</a>
                                    </li>
                                    <li>
                                        <a href="/">Triết lý kinh doanh</a>
                                    </li>
                                    <li>
                                        <a href="/">Truyền thông sự kiện</a>
                                    </li>
                                    <li>
                                        <a href="/">Hoạt động xã hội</a>
                                    </li>
                                    <li>
                                        <a href="/">Liên kết &amp; hợp tác</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <ul class="footer-nav no-bullets">
                                    <h3>TIN TỨC</h3>
                                    <li>
                                        <a href="/">Review sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="/">Tin tức thời trang</a>
                                    </li>
                                    <li>
                                        <a href="/">Thương hiệu nổi tiếng</a>
                                    </li>
                                    <li>
                                        <a href="/">Đánh giá của khách hàng</a>
                                    </li>
                                    <li>
                                        <a href="/">Lịch sử thương hiệu</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <ul class="footer-nav no-bullets">
                                    <h3>TƯ VẤN SẢN PHẨM</h3>
                                    <li>
                                        <a href="/">Thời trang công sở</a>
                                    </li>
                                    <li>
                                        <a href="/">Đặt may trang phục</a>
                                    </li>
                                    <li>
                                        <a href="/">Câu hỏi thường gặp</a>
                                    </li>
                                    <li>
                                        <a href="/">Kiến thức cần thiết</a>
                                    </li>
                                    <li>
                                        <a href="/">Tại sao nên lựa chọn chúng tôi</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <ul class="footer-nav no-bullets">
                                    <h3>HƯỚNG DẪN</h3>
                                    <li>
                                        <a href="/">Hướng dẫn mua hàng</a>
                                    </li>
                                    <li>
                                        <a href="/">Chính sách ưu đãi thẻ VIP</a>
                                    </li>
                                    <li>
                                        <a href="/">Chính sách bảo hành</a>
                                    </li>
                                    <li>
                                        <a href="/">Hướng dẫn sử dụng</a>
                                    </li>
                                    <li>
                                        <a href="/">Hướng dẫn thanh toán</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <ul class="footer-nav no-bullets">
                                    <h3>THÔNG TIN LIÊN HỆ</h3>
                                    <li><span class="ft-content"><i class="fas fa-home"></i> Số xxx, đường YYY, phường ZZZ, quận ABC, Hà Nội</span>
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
                                    <h3>ĐĂNG KÝ NHẬN TIN</h3>
                                    <li class="mb-3"><span class="ft-content">Tin khuyến mãi / Tin thương hiệu</span>
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
                                    <h3 class="h3">KẾT NỐI VỚI CHÚNG TÔI</h3>
                                    <li class="mb-3"><span class="ft-content">Mạng xã hội</span></li>
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
                                    <h3>CHỨNG NHẬN</h3>
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

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
