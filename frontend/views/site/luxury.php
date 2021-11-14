<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = 'DE OBELLY';
$this->registerCssFile(Url::toRoute("css/luxury.css"));
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
<div class="container px-0 pt-3">
    <div class="row w-100 mx-0 px-0">
        <div class="col-12 col-md-6 px-4 px-md-2 pb-3 pb-md-0">
            <div class="image-holder h-100">
                <a class="text-decoration-none "
                   href="<?= !empty($siteContent[1]['link']) ? Url::toRoute($siteContent[1]['link']) : '#' ?>"
                   title="<?= !empty($siteContent[1]['title']) ? $siteContent[1]['title'] : '' ?>">
                    <img src="<?= $imgUrl . '/' . $siteContent[1]['image'] ?>" class="img-fluid h-100 object-fit-cover">
                    <div class="type-tailor-made__title">
                        <p class="text-uppercase fs-4 fw-bolder"><?= !empty($siteContent[1]['title']) ? $siteContent[1]['title'] : '' ?></p>
                        <p class="text-uppercase see-more"><?= Yii::t('app', 'See more') ?></p>
                    </div>
                    <div class="img-overlay"></div>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-6 px-4 px-md-2 pb-3 pb-md-0">
            <div class="image-holder h-100">
                <a class="text-decoration-none "
                   href="<?= !empty($siteContent[2]['link']) ? Url::toRoute($siteContent[2]['link']) : '#' ?>"
                   title="<?= !empty($siteContent[2]['title']) ? $siteContent[2]['title'] : '' ?>">
                    <img src="<?= $imgUrl . '/' . $siteContent[2]['image'] ?>" class="img-fluid h-100 object-fit-cover">
                    <div class="type-tailor-made__title">
                        <p class="text-uppercase fs-4 fw-bolder"><?= !empty($siteContent[2]['title']) ? $siteContent[2]['title'] : '' ?></p>
                        <p class="text-uppercase see-more"><?= Yii::t('app', 'See more') ?></p>
                    </div>
                    <div class="img-overlay"></div>
                </a>
            </div>
        </div>
    </div>
    <section class="home-feature-product py-3 pt-0 py-md-5">
        <div class="section-heading text-center mb-4">
            <h2 class="section-title">
                <span class="text-uppercase"><?= Yii::t('app', 'Featured Products') ?></span>
            </h2>
        </div>
        <div class="container px-0">
            <div class="row w-100 mx-0 px-0">
                <?php foreach ($featuredProducts as $key => $products): ?>
                    <div class="col-12 col-sm-6 col-md-4 text-center pb-3 px-4">
                        <div class="card box-shadow h-100">
                            <a href="<?= Url::toRoute(['shop/product-detail', 'detail' => \common\components\encrypt\CryptHelper::encryptString($products['id'])]) ?>"
                               class="text-decoration-none">
                                <div class="image-holder">
                                    <img src="<?= $imgUrl . '/' . $products['image'] ?>" class="card-img-top"
                                         title="<?= $products['name'] ?>" alt="<?= $products['name'] ?>">
                                    <div class="img-overlay__see-more">
                                        <a href="<?= Url::toRoute(['shop/product-detail', 'detail' => \common\components\encrypt\CryptHelper::encryptString($products['id'])]) ?>"
                                           class="text-decoration-none text-white text-uppercase"><?= Yii::t('app', 'See more') ?></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="feature-product__detail">
                                        <p><?= $products['name'] ?></p>
                                        <p class="pro-price highlight fw-bolder text-black">
                                            <span class="current-price fs-5"><?= Yii::$app->formatter->asCurrency($products['selling_price']) ?></span>
                                            <?php if ($products['selling_price'] < $products['regular_price']) : ?>
                                                <span class="pro-price-del"><del
                                                            class="compare-price"><?= Yii::$app->formatter->asCurrency($products['regular_price']) ?></del></span>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="view-all-product text-center mt-3">
            <a title="Xem tất cả" href="<?= Url::toRoute('shop/') ?>" class="btnx">
                <span class="btn-content"><?= Yii::t('app', "See more") ?></span>
                <span class="icon"><i class="fa fa-arrow-right"></i></span>
            </a>
        </div>
    </section>
    <div class="row w-100 mx-0 px-0">
        <div class="col-12 col-md-6 px-4 px-md-2 pb-3 pb-md-0">
            <div class="image-holder h-100">
                <a class="text-decoration-none "
                   href="<?= !empty($siteContent[3]['link']) ? Url::toRoute($siteContent[3]['link']) : '#' ?>"
                   title="<?= !empty($siteContent[3]['title']) ? $siteContent[3]['title'] : '' ?>">
                    <img src="<?= $imgUrl . '/' . $siteContent[3]['image'] ?>" class="img-fluid h-100 object-fit-cover">
                    <div class="type-tailor-made__title">
                        <p class="text-uppercase fs-4 fw-bolder"><?= !empty($siteContent[3]['title']) ? $siteContent[3]['title'] : '' ?></p>
                        <p class="text-uppercase see-more"><?= Yii::t('app', 'See more') ?></p>
                    </div>
                    <div class="img-overlay"></div>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-6 px-4 px-md-2 pb-3 pb-md-0">
            <div class="image-holder h-100">
                <a class="text-decoration-none "
                   href="<?= !empty($siteContent[4]['link']) ? Url::toRoute($siteContent[4]['link']) : '#' ?>"
                   title="<?= !empty($siteContent[4]['title']) ? $siteContent[4]['title'] : '' ?>">
                    <img src="<?= $imgUrl . '/' . $siteContent[4]['image'] ?>" class="img-fluid h-100 object-fit-cover">
                    <div class="type-tailor-made__title">
                        <p class="text-uppercase fs-4 fw-bolder"><?= !empty($siteContent[4]['title']) ? $siteContent[4]['title'] : '' ?></p>
                        <p class="text-uppercase see-more"><?= Yii::t('app', 'See more') ?></p>
                    </div>
                    <div class="img-overlay"></div>
                </a>
            </div>
        </div>
    </div>
    <section class="home-new-product pb-5 pt-0 pt-md-5">
        <div class="section-heading text-center mb-4">
            <h2 class="section-title">
                <span class="text-uppercase"><?= Yii::t('app', 'New-arrival Products') ?></span>
            </h2>
        </div>
        <div class="container px-0">
            <div class="row w-100 mx-0 px-0">
                <?php foreach ($newProducts as $key => $products): ?>
                    <div class="col-12 col-sm-6 col-md-4 text-center pb-3 px-4">
                        <div class="card box-shadow">
                            <a href="<?= Url::toRoute(['shop/product-detail', 'detail' => \common\components\encrypt\CryptHelper::encryptString($products['id'])]) ?>"
                               class="text-decoration-none">
                                <div class="image-holder">
                                    <img src="<?= $imgUrl . '/' . $products['image'] ?>" class="card-img-top"
                                         title="<?= $products['name'] ?>" alt="<?= $products['name'] ?>">
                                    <div class="img-overlay__see-more">
                                        <a href="<?= Url::toRoute(['shop/product-detail', 'detail' => \common\components\encrypt\CryptHelper::encryptString($products['id'])]) ?>"
                                           class="text-decoration-none text-white text-uppercase"><?= Yii::t('app', 'See more') ?></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="feature-product__detail">
                                        <p><?= $products['name'] ?></p>
                                        <p class="pro-price highlight fw-bolder text-black">
                                            <span class="current-price fs-5"><?= Yii::$app->formatter->asCurrency($products['selling_price']) ?></span>
                                            <?php if ($products['selling_price'] < $products['regular_price']) : ?>
                                                <span class="pro-price-del"><del
                                                            class="compare-price"><?= Yii::$app->formatter->asCurrency($products['regular_price']) ?></del></span>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="view-all-product text-center mt-3">
            <a title="Xem tất cả"
               href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString(\common\components\SystemConstant::PRODUCT_TYPE_NEW)]) ?>"
               class="btnx">
                <span class="btn-content"><?= Yii::t('app', "See more") ?></span>
                <span class="icon"><i class="fa fa-arrow-right"></i></span>
            </a>
        </div>
    </section>
    <section class="home-latest-news pb-5">
        <div class="section-heading text-center mb-4">
            <h2 class="section-title">
                <span class="text-uppercase"><?= Yii::t('app', 'Latest News') ?></span>
            </h2>
        </div>
        <div class="container px-0">
            <div class="row w-100 mx-0 px-0">
                <?php foreach ($latestNews as $key => $value) : ?>
                    <div class="col-12 col-sm-6 col-lg-4 text-center pb-3 px-4 ">
                        <div class="card box-shadow h-100">
                            <a href="<?= Url::toRoute(['post/detail', 'id' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"
                               class="text-decoration-none">
                                <img src="<?= $imgUrl . '/' . $value['avatar'] ?>" class="card-img-top img-fluid"
                                     title="<?= $value['title'] ?>" alt="<?= $value['title'] ?>">
                                <div class="card-body">
                                    <h4 class="text-black"><?= $value['title'] ?></h4>
                                    <div class="article-content text-black text-justify">
                                        <?= substr(strip_tags($value['content']), 0, 200) . '...' ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="view-all-product text-center mt-3">
            <a title="Xem tất cả" href="<?= Url::toRoute('post/') ?>" class="btnx">
                <span class="btn-content"><?= Yii::t('app', "See more") ?></span>
                <span class="icon"><i class="fa fa-arrow-right"></i></span>
            </a>
        </div>
    </section>
</div>