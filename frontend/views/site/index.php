<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = 'DE OBELLY';
$this->registerCssFile(Url::toRoute("/css/index.css"));
$this->registerCss("
    .bg-link-product { 
        background-image: url('$imgUrl/background/bgLinkToProduct.jpg');        
        background-attachment: fixed;
        background-size: cover;
        background-repeat: no-repeat; 
    }
    .bgNews{ 
        background-image: url('$imgUrl/background/bgNews.jpg');        
        background-attachment: fixed;
        background-size: cover;
        background-repeat: no-repeat; 
    }
    .btnAdd, .btnBuyNow, .btnFavor {
        height: 42px;
        position: absolute;
        transition: 0.3s;
        z-index: 3;
    }
");
?>
<div class="full-width">
    <!-- Carousel wrapper -->
    <div id="sliderHeader" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselBasicExample" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselBasicExample" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselBasicExample" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <!-- Inner -->
        <div class="carousel-inner">
            <!-- Single item -->
            <div class="carousel-item active">
                <img src="<?= $imgUrl ?>/slideshow.jpg" class="d-block w-100" alt="..."/>
                <div class="carousel-caption d-none d-md-block">
                    <h5><?= Yii::t('app','First slide label') ?></h5>
                    <p><?= Yii::t('app','No life is free right now, sometimes soft against vibrations') ?></p>
                </div>
            </div>
            <!-- Single item -->
            <div class="carousel-item">
                <img src="<?= $imgUrl ?>/slideshow.jpg" class="d-block w-100" alt="..."/>
                <div class="carousel-caption d-none d-md-block">
                    <h5><?= Yii::t('app','Second slide label') ?></h5>
                    <p><?= Yii::t('app','Lorem ipsum dolor sit amet, consectetur adipiscing elit') ?></p>
                </div>
            </div>
            <!-- Single item -->
            <div class="carousel-item">
                <img src="<?= $imgUrl ?>/slideshow.jpg" class="d-block w-100" alt="..."/>
                <div class="carousel-caption d-none d-md-block">
                    <h5><?= Yii::t('app','Third slide label') ?></h5>
                    <p><?= Yii::t('app','Praesent commodo cursus magna, vel scelerisque nisl consectetur') ?></p>
                </div>
            </div>
        </div>
        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#sliderHeader"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#sliderHeader"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel wrapper -->
</div>
<!--Search trends-->
<div class="row m-0 p-0 d-none d-md-block p-4 pb-0">
    <h1 class="text-uppercase mb-3 fw-bolder text-center">
        <i class=" fas fa-feather-alt fa-flip-horizontal"></i> <?= Yii::t('app','search trends')?> <i class="fas fa-feather-alt"></i>
    </h1>
    <div class="col-12 row mt-3 p-0">
        <div class="text-center col-4 col-lg-2 d-none d-md-block py-lg-0 py-md-2">
                    <span class="searchTrends">
                        <img src="<?= $imgUrl ?>/icon/man.jpg">
                    </span>
            <p class="m-0 mt-2 text-uppercase fw-bolder"><?= Yii::t('app','Man Fashion') ?></p>
            </a>
        </div>
        <div class="text-center col-4 col-lg-2 d-none d-md-block py-lg-0 py-md-2">
            <a href="#" class="text-decoration-none text-dark">
                    <span class="searchTrends">
                        <img src="<?= $imgUrl ?>/icon/vestCongSo.jpg">
                    </span>
                <p class="m-0 mt-2 text-uppercase fw-bolder"><?= Yii::t('app','Office fashion')?></p>
            </a>
        </div>
        <div class="text-center col-4 col-lg-2 d-none d-md-block py-lg-0 py-md-2">
            <a href="#" class="text-decoration-none text-dark">
                    <span class="searchTrends">
                        <img src="<?= $imgUrl ?>/icon/vest.jpg">
                    </span>
                <p class="m-0 mt-2 text-uppercase fw-bolder"><?= Yii::t('app','Vest')?></p>
            </a>
        </div>
        <div class="text-center col-4 col-lg-2 d-none d-md-block py-lg-0 py-md-2">
            <a href="#" class="text-decoration-none text-dark">
                    <span class="searchTrends">
                        <img src="<?= $imgUrl ?>/icon/acessories.jpg">
                    </span>
                <p class="m-0 mt-2 text-uppercase fw-bolder"><?= Yii::t('app','Accessory')?></p>
            </a>
        </div>
        <div class="text-center col-4 col-lg-2 d-none d-md-block py-lg-0 py-md-2">
            <a href="#" class="text-decoration-none text-dark">
                    <span class="searchTrends">
                        <img src="<?= $imgUrl ?>/icon/bag.jpg">
                    </span>
                <p class="m-0 mt-2 text-uppercase fw-bolder"><?= Yii::t('app','Handbag')?></p>
            </a>
        </div>
        <div class="text-center col-4 col-lg-2 d-none d-md-block py-lg-0 py-md-2">
            <a href="#" class="text-decoration-none text-dark">
                    <span class="searchTrends">
                        <img src="<?= $imgUrl ?>/icon/shoes.jpg">
                    </span>
                <p class="m-0 mt-2 text-uppercase fw-bolder"><?= Yii::t('app','Shoes')?></p>
            </a>
        </div>
    </div>
</div>
<div class="row mx-0 px-0 px-md-4 pt-3">
    <div class="col-12 row m-0 p-0 mb-3">
        <div class="banner--top col-12 col-md-4 overflow-hidden m-0 p-0">
            <div class="w-100 overflow-hidden h-100">
                <img src="<?= $imgUrl ?>/banner/watch.jpg" class="p-0 w-100 zoomImages m-0 object-fit-cover">
            </div>
        </div>
        <div class="banner--top col-12 col-md-4 overflow-hidden m-0 p-0">
            <div class="w-100 overflow-hidden h-100">
                <img src="<?= $imgUrl ?>/banner/shoes-banner.png"
                     class="p-0 w-100 zoomImages m-0 object-fit-cover">
            </div>
        </div>
        <div class="banner--top col-12 col-md-4 overflow-hidden m-0 p-0">
            <div class="w-100 overflow-hidden h-100">
                <img src="<?= $imgUrl ?>/banner/vest-banner.jpg"
                     class="p-0 w-100 zoomImages m-0 object-fit-cover">
            </div>
        </div>
    </div>
    <div class="col-12 m-0 p-0 row d-none d-md-flex bg-white">
        <div class="banner col-4 ps-0">
            <div class="w-100 overflow-hidden h-75 w-100 border-bottom">
                <img src="<?= $imgUrl ?>/banner/vestBanner.jpg" class="p-0 w-100 zoomImages object-fit-cover">
            </div>
            <div class="h-25 w-100 d-flex align-items-center justify-content-center px-lg-2 border border-2">
                <div class="p-2 text-center">
                    <h4 class="text-uppercase m-0 d-none d-lg-block fw-bolder"><?= Yii::t('app','Luxurious and elegant VEST sets')?></h4>
                    <h5 class="text-uppercase m-0 d-lg-none fw-bolder"><?= Yii::t('app','Luxury VEST sets')?></h5>
                    <a href="#" class="btn text-uppercase text-danger fw-bolder p-0"><?= Yii::t('app','Watch now!')?></a>
                </div>
            </div>
        </div>
        <div class="banner col-4 px-1">
            <div class="h-25 d-flex align-items-center justify-content-center px-lg-2 border border-2">
                <div class="p-2 text-center">
                    <h4 class="text-uppercase m-0 d-none d-lg-block fw-bolder"><?= Yii::t('app','Trendy fashion accessories')?></h4>
                    <h5 class="text-uppercase m-0 d-lg-none fw-bolder"><?= Yii::t('app','Trendy fashion accessories')?></h5>
                    <a href="#" class="btn text-uppercase text-danger fw-bolder p-0"><?= Yii::t('app','Buy now!')?></a>
                </div>
            </div>
            <div class="m-0 p-0 overflow-hidden h-75 w-100">
                <img src="<?= $imgUrl ?>/banner/suitWomen.jpg" class="p-0 w-100 zoomImages object-fit-cover">
            </div>
        </div>
        <div class="banner col-4 pe-0">
            <div class="m-0 p-0 overflow-hidden h-75 w-100 border-bottom">
                <img src="<?= $imgUrl ?>/banner/suit.jpg" class="p-0 w-100 zoomImages object-fit-cover">
            </div>
            <div class="h-25 w-100 d-flex align-items-center justify-content-center px-lg-2 border border-2">
                <div class="p-2 text-center">
                    <h4 class="text-uppercase m-0 d-none d-lg-block fw-bolder"><?= Yii::t('app','Fashionable vest suits')?></h4>
                    <h5 class="text-uppercase m-0 d-lg-none fw-bolder"><?= Yii::t('app','Fashionable suits')?></h5>
                    <a href="#" class="btn text-uppercase text-danger fw-bolder p-0"><?= Yii::t('app','Watch now!')?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row p-0 m-0 pt-4 pt-md-5">
    <h1 class="text-uppercase mb-3 fw-bolder text-center">
        <i class="fas fa-feather-alt fa-flip-horizontal"></i> <?= Yii::t('app','new product')?> <i class="fas fa-feather-alt"></i>
    </h1>
    <div class="col-12 row mx-0 px-3 px-md-5">
        <?php foreach ($productIntro as $key => $value): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-sm-2 my-3 my-md-2">
                <div class="product-card overflow-hidden">
                    <div class="product-tumb">
                        <a href="#" class="text-decoration-none w-100 m-0 p-0 h-100">
                            <!--                            <div class="badge p-2 px-sm-3 rounded-0">-30%</div>-->
                            <img src="<?= $imgUrl . '/' . $value['image'] ?>" alt="" class="w-100">
                        </a>
                    </div>
                    <div class="product-button d-none d-sm-block">
                        <a href="javascript:void(0)" class="btn btn-dark rounded-0 btnFavor"><i
                                    class="far fa-heart"></i></a>
                        <a href="#" class="btn btn-dark rounded-0 btnBuyNow"><?= Yii::t('app','Buy now')?></a>
                        <a href="#" class="btn btn-dark rounded-0 btnAdd"><i class="fas fa-cart-plus"></i></a>
                    </div>
                    <div class="product-details border-top m-0">
                        <a href="#">
                            <h5 class="mb-0 mb-sm-1 text-dark position-absolute"><?= $value['name'] ?></h5>
                            <?php if (empty($value['sale_price'])): ?>
                                <div class="product-price mb-1 text-danger text-sm-center"><?= number_format($value['regular_price'], 0, ',', '.') ?>
                                    VNĐ
                                </div>
                            <?php else: ?>
                                <div class="product-price mb-1 text-warning text-sm-center"><small
                                            class="text-secondary text-decoration-line-through"><?= number_format($value['sale_price'], 0, ',', '.') ?></small> <?= number_format($value['regular_price'], 0, ',', '.') ?>
                                    VNĐ
                                </div>
                            <?php endif; ?>
                        </a>
                        <div class="d-sm-none row m-0 p-0 mb-2">
                            <div class="col-6 p-0 pe-1 d-block">
                                <a href="javascript:void(0)" class="btn rounded-0 p-2 btn-outline-dark w-100"><i
                                            class="far fa-heart"></i></a>
                            </div>
                            <div class="col-6 p-0 ps-1 d-block">
                                <a href="#" class="btn rounded-0 p-2 btn-outline-dark w-100"><i
                                            class="fas fa-cart-plus"></i></a>
                            </div>
                            <a href="#" class="btn rounded-0 p-1 btn-outline-dark col-12 mt-2"><?= Yii::t('app','Buy now')?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="container text-center">
        <div class="row m-0 px-0 py-4 pb-md-5 d-inline-block">
            <a href="<?= Url::toRoute('shop/index') ?>" class="text-decoration-none linkToProduct px-3">
                <h5 class="text-uppercase m-0"><i class="far fa-hand-point-right"></i> <?= Yii::t('app','View all products')?> </h5>
            </a>
        </div>
    </div>
</div>
<div class="row m-0 px-0 px-3 px-md-5">
    <h1 class="text-uppercase fw-bolder text-center col-12 mb-3">
        <i class="fas fa-feather-alt fa-flip-horizontal"></i> <?= Yii::t('app','Collection')?> <i class="fas fa-feather-alt"></i>
    </h1>
    <div class="col-12 m-0 p-0">
        <div id="recipeCarouselAccessories" class="carousel slide carouselProduct col-12" data-bs-ride="carousel">
            <div class="carousel-inner text-center" role="listbox">
                <div class="carousel-item active">
                    <div class="col-6 col-md-3 m-0 p-0">
                        <div class="card border-0 rounded-0 h-100 m-0">
                            <a href="#" class="text-decoration-none w-100 h-100">
                                <div class="card-img border-0">
                                    <img src="<?= $imgUrl ?>/product/clothes/top/shirt1.png"
                                         class="mb-sm-2">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-6 col-md-3 m-0 p-0">
                        <div class="card border-0 rounded-0 h-100 m-0">
                            <a href="#" class="text-decoration-none w-100 h-100">
                                <div class="card-img border-0">
                                    <img src="<?= $imgUrl ?>/product/clothes/top/shirt2.png"
                                         class="mb-sm-2">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-6 col-md-3 m-0 p-0">
                        <div class="card border-0 rounded-0 h-100 m-0">
                            <a href="#" class="text-decoration-none w-100 h-100">
                                <div class="card-img border-0">
                                    <img src="<?= $imgUrl ?>/product/clothes/top/shirt3.png"
                                         class="mb-sm-2">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-6 col-md-3 m-0 p-0">
                        <div class="card border-0 rounded-0 h-100 m-0">
                            <a href="#" class="text-decoration-none w-100 h-100">
                                <div class="card-img border-0">
                                    <img src="<?= $imgUrl ?>/product/clothes/top/shirt4.png"
                                         class="mb-sm-2">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-6 col-md-3 m-0 p-0">
                        <div class="card border-0 rounded-0 h-100 m-0">
                            <a href="#" class="text-decoration-none w-100 h-100">
                                <div class="card-img border-0">
                                    <img src="<?= $imgUrl ?>/product/clothes/top/shirt5.png"
                                         class="mb-sm-2">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-6 col-md-3 m-0 p-0">
                        <div class="card border-0 rounded-0 h-100 m-0">
                            <a href="#" class="text-decoration-none w-100 h-100">
                                <div class="card-img border-0">
                                    <img src="<?= $imgUrl ?>/product/clothes/top/shirt6.png"
                                         class="mb-sm-2">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#recipeCarouselAccessories"
                    data-bs-slide="prev">
                <i class="fas fa-chevron-left fa-3x text-dark"></i>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#recipeCarouselAccessories"
                    data-bs-slide="next">
                <i class="fas fa-chevron-right fa-3x text-dark"></i>
            </button>
        </div>
    </div>
</div>
<div class="full-width bg-link-product py-5">
    <div class="container text-center py-5 my-4">
        <h1 class="text-light text-uppercase mb-3 fw-bolder">
            <i class="fas fa-feather-alt fa-flip-horizontal"></i> DE OBELLY <i class="fas fa-feather-alt"></i>
        </h1>
        <div class="border border-5 border-light p-4 p-md-5 text-justify bg-transparent mx-auto w-motto">
            <h4 class="m-0 text-light">
                <i><?= Yii::t('app','Each employee of DE OBELLY is always grateful to customers by selling the best - trendiest and most thoughtful products to meet the needs of customers...')?>

                </i>
            </h4>
            <div class="text-end mt-3">
                <a href="#" class="btn rounded-0 btn-outline-dark mb-1 mb-sm-0 rounded-circle bg-light">
                    <i class="fas fa-share"></i>
                </a>
                <a href="#" class="btn rounded-0 btn-outline-dark mb-1 mb-sm-0 rounded-circle bg-light">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="btn rounded-0 btn-outline-dark mb-1 mb-sm-0 rounded-circle bg-light">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="btn rounded-0 btn-outline-dark mb-1 mb-sm-0 rounded-circle bg-light">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="btn rounded-0 btn-outline-dark mb-1 mb-sm-0 rounded-circle bg-light">
                    <i class="far fa-envelope"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row px-0 m-0 text-center py-4 pt-md-5">
    <div class="container">
        <h1 class="text-uppercase mb-3 fw-bolder text-center">
            <i class="fas fa-feather-alt fa-flip-horizontal"></i> <?= Yii::t('app','News')?> <i class="fas fa-feather-alt"></i>
        </h1>
        <div class="row m-0 p-0">
            <?php foreach ($posts as $key => $value): ?>
                <div class="col-12 col-sm-6 col-lg-3 px-5 pb-3 p-sm-3 news">
                    <div class="card h-100 border-0">
                        <a class="text-decoration-none text-dark" href="#">
                            <div class="position-relative overflow-hidden rounded">
                                <img src="<?= $imgUrl . '/' . $value['avatar'] ?>"
                                     class="object-fit-cover w-100 h-100 m-0 p-0 zoomImages">
                            </div>
                            <div class="card-body position-relative text-start p-1">
                                <h5 class="card-title text-uppercase fw-bolder"><?= $value['title'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <small class="d-block p-1"><i
                                                class="fas fa-calendar-alt"></i> <?= $value['updated_at'] ?></small>
                                    <small class="d-block p-1"><i
                                                class="fas fa-user-edit"></i> <?= \common\models\User::find()->select('name')->where(['status' => 1, 'id' => $value['id']])->one()['name']; ?>
                                    </small>
                                </h6>
                                <a href="#" class="btn float-end"><?= Yii::t('app','View posts')?> <i
                                            class="fas fa-angle-double-right"></i></a>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="<?= Url::toRoute('site/blog') ?>" class="text-decoration-none linkToProduct d-inline-block px-3">
            <h5 class="text-uppercase m-0"><i class="far fa-hand-point-right"></i> <?= Yii::t('app','See more news')?></h5>
        </a>
    </div>
</div>
<div class="full-width bgNews py-4 py-md-5" id="subscribe">
    <div class="container text-center text-light">
        <h1><i class="fas fa-feather-alt fa-flip-horizontal"></i><?= Yii::t('app','Get early access today')?><i
                    class="fas fa-feather-alt"></i></h1>
        <h5 class="mt-4 px-3">
            <?= Yii::t('app','It only takes a minute to sign up and our tree starter tier is extremely generous. If you have any questions,our support team would be happy to help you.') ?>
        </h5>
        <form method="POST" action="#">
            <div class="col-12 m-0 p-0 mt-4 row p-0 px-sm-4 px-md-4 px-lg-5">
                <div class="col-12 col-md-8">
                    <div class="form-floating mb-3 mb-md-0">
                        <input type="email" class="form-control bg-transparent border border-2 border-light w-100"
                               id="emailSubscribe" placeholder="name@example.com" name="email-subscribe" required>
                        <label for="emailSubscribe" class="text-light"><?= Yii::t('app','Email address')?></label>
                    </div>
                </div>
                <div class="col-12 col-md-4 p-md-0">
                    <button type="submit" class="btn btn-light p-3 w-100" id="btnSubscribe"><?= Yii::t('app','Get st́arted for free')?><i
                                class="fas fa-arrow-right"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    let items = document.querySelectorAll('.carouselProduct .carousel-item')
    items.forEach((el) => {
        const minPerSlide = 4
        let next = el.nextElementSibling
        for (var i = 1; i < minPerSlide; i++) {
            if (!next) {
                next = items[0]
            }
            let cloneChild = next.cloneNode(true)
            el.appendChild(cloneChild.children[0])
            next = next.nextElementSibling
        }
    });
    var header = document.getElementById("btnFilter");
    var btns = header.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("activeButton");
            current[0].className = current[0].className.replace(" activeButton", "");
            this.className += " activeButton";
        });
    }
</script>