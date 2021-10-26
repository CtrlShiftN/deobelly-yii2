<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = 'DE OBELLY';
$this->registerCssFile(Url::toRoute("/css/luxury.css"));
?>
<!-- Carousel wrapper -->
<div class="full-width">
    <div id="sliderHeader" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <?php foreach ($slider as $key => $value): ?>
                <button type="button" data-bs-target="#carouselBasicExample" data-bs-slide-to="<?= $key ?>"
                        class="active"
                        aria-current="true" aria-label="Slide <?= $key + 1 ?>"></button>
            <?php endforeach; ?>
        </div>
        <!-- Inner -->
        <div class="carousel-inner">
            <?php foreach ($slider as $key => $value): ?>
                <!-- Single item -->
                <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                    <img src="<?= $imgUrl . '/' . $value['link'] ?>" class="d-block w-100" alt="..."/>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?= empty($value['slide_label']) ? '' : $value['slide_label'] ?></h5>
                        <p><?= empty($value['slide_text']) ? '' : $value['slide_text'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
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
</div>
<!-- Carousel wrapper -->
<div class="container-fluid px-0 pt-3">
    <div class="row">
        <div class="col-12 col-md-6 px-5 px-md-2 pb-3 pb-md-0">
            <div class="image-holder h-100">
                <a class="text-decoration-none " href="<?= Url::toRoute('tailor-made/') ?>" target="_blank"
                   title="<?= Yii::t('app', 'Tailor Made') ?>">
                    <img src="<?= $imgUrl . '/tailor-made.jpg' ?>" class="img-fluid h-100 object-fit-cover">
                    <div class="type-tailor-made__title">
                        <p class="text-uppercase fs-4 fw-bolder"><?= Yii::t('app', 'Tailor Made') ?></p>
                        <p class="text-uppercase see-more"><?= Yii::t('app', 'See more') ?></p>
                    </div>
                    <div class="img-overlay"></div>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-6 px-5 px-md-2 pb-3 pb-md-0">
            <div class="image-holder h-100">
                <a class="text-decoration-none " href="<?= Url::toRoute('mix-and-match/') ?>" target="_blank"
                   title="<?= Yii::t('app', 'Collections') ?>">
                    <img src="<?= $imgUrl . '/collections.png' ?>" class="img-fluid h-100 object-fit-cover">
                    <div class="type-tailor-made__title">
                        <p class="text-uppercase fs-4 fw-bolder"><?= Yii::t('app', 'Collections') ?></p>
                        <p class="text-uppercase see-more"><?= Yii::t('app', 'See more') ?></p>
                    </div>
                    <div class="img-overlay"></div>
                </a>
            </div>
        </div>
    </div>
    <section class="home-feature-product pb-5 pt-0 pt-md-5">
        <div class="section-heading text-center">
            <h2 class="section-title">
                <span class="text-uppercase"><?= Yii::t('app', 'Featured Products') ?></span>
            </h2>
        </div>
        <div class="container">
            <?php foreach ($featuredProducts as $key => $products): ?>
            <div class="col-6 col-sm-4 text-center">
                <div class="product-item">
                    <div class="product-img ">
                        <div class="product-sale"><span>Sale</span></div>
                        <a href="<?= Url::toRoute(['shop/product-detail','detail'=>\common\components\encrypt\CryptHelper::encryptString($products['id'])]) ?>" title="<?= $products['name'] ?>">
                            <img src="<?= $imgUrl. ?>">
                        </a>

                        <button type="button" class="btnQuickView quick-view d-none d-lg-block" data-handle="/products/ao-co-slogan" data-tooltip="Xem nhanh"><span>Xem nhanh</span></button>

                    </div>
                    <div class="product-detail">
                        <div class="box-pro-detail">
                            <h3 class="pro-name">
                                <a href="/products/ao-co-slogan" title="Áo có slogan">
                                    Áo có slogan
                                </a>
                            </h3>
                            <div class="box-pro-prices">
                                <p class="pro-price highlight">
                                    <span class="current-price">360,000₫</span>

                                    <span class="pro-price-del">
						<del class="compare-price">
							460,000₫
						</del>
					</span>

                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>