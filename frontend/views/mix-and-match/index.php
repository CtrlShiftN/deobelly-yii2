<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . '/media';
$this->title = Yii::t('app', 'Top Collection');
$this->registerCssFile(Url::toRoute("css/swiper.min.css"));
$this->registerCssFile(Url::toRoute('css/collection.css'));
?>
<div class="collections row mt-4 w-100 px-0 mx-0">
    <div class="top-collection px-2">
        <!--        <h2 class="d-none d-lg-block">--><? //= Yii::t('app', 'Top Collection') ?><!--</h2>-->
        <div class="row pt-3 w-100 px-0 mx-0">
            <div class="col-12 col-lg-7">
                <div class="zoom">
                    <img src="<?= $imgUrl . '/' . $topMix['image'] ?>" class="w-100">
                </div>
            </div>
            <div class="col-12 col-lg-5 top-collection__content pt-3 pt-lg-0">
                <h3><?= $topMix['title'] ?></h3>
                <p>
                    <i class="fas fa-calendar-alt"></i> <?= date_format(date_create($topMix['created_at']), 'H:i:s d-m-Y') ?>
                </p>
                <?= strip_tags($topMix['content']) ?>
                <div class="top-collection__products py-3">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                    <?= Yii::t('app', 'Products') ?>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body row mx-0 pb-4 d-flex align-items-stretch w-100 px-0">
                                    <?php foreach ($topMix['element_products'] as $key => $products) : ?>
                                        <div class="col-12 col-md-6 pb-3">
                                            <div class="card card-shadow h-100">
                                                <a href="<?= \yii\helpers\Url::toRoute(['shop/product-detail', 'detail' => \common\components\encrypt\CryptHelper::encryptString($products['id'])]) ?>"
                                                   title="<?= $products['name'] ?>">
                                                    <div class="card-img h-100 zoom">
                                                        <img src="<?= $imgUrl . '/' . $products['image'] ?>"
                                                             class="img-fluid h-100 object-fit-cover">
                                                    </div>
                                                    <div class="other-mixes__title fw-bolder fs-6"><?= $products['name'] ?></div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Weekly Collections -->
    <div class="weekly-collection mt-3">
        <h2 class="mx-3 previous-collection__title"><?= Yii::t('app', 'Weekly Collections') ?></h2>
        <div class="row mx-0 justify-content-center px-0 w-100 overflow-hidden">
            <div class="swiper position-relative">
                <div class="swiper-wrapper">
                    <?php foreach ($otherMixes as $key => $mixes) : ?>
                        <div class="swiper-slide col-12 col-md-3 px-5 px-md-3 pb-5">
                            <div class="card card-shadow">
                                <a href="<?= \yii\helpers\Url::toRoute(['mix-and-match/', 'mix' => \common\components\encrypt\CryptHelper::encryptString($mixes['id'])]) ?>">
                                    <div class="card-img">
                                        <img src="<?= $imgUrl . '/' . $mixes['image'] ?>" class="img-fluid">
                                    </div>
                                    <div class="other-mixes__title fw-bolder fs-6"><?= $mixes['title'] ?></div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
    <!-- End Weekly Collections -->
</div>
<script src="<?= Url::toRoute('js/swiper-bundle.min.js') ?>"></script>
<script>
    var swiper = new Swiper('.swiper', {
        slidesPerView: 1,
        // spaceBetween: 5,
        // loop: true,
        // init: false,
        // pagination: {
        //     el: '.swiper-pagination',
        //     clickable: true,
        // },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        breakpoints: {
            576: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            },
            1400: {
                slidesPerView: 5,
            },
        }
    });
</script>