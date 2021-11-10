<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = 'DE OBELLY';
$this->registerCssFile(Url::toRoute("/css/casual.css"));
// new-arrival
$arrNewArrival = \yii\helpers\ArrayHelper::index($siteContent['new-arrival'], null, 'type');
$arrNewProductImage = $arrNewArrival['image-link'];
$newArrivalSeeMoreLink = $arrNewArrival['see-more-link'][0];
// collections
$arrCollections = \yii\helpers\ArrayHelper::index($siteContent['collections'], null, 'type');
$arrCollectionImage = $arrCollections['image-link'];
$collectionMixContent = $arrCollections['mix'][0];
// product type
$arrProductTypes = \yii\helpers\ArrayHelper::index($siteContent['product-type'], null, 'type');
$arrProductTypeImage = $arrProductTypes['image-link'];
$productTypeSeeMoreLink = $arrProductTypes['see-more-link'][0];
$productTypeContent = $arrProductTypes['mix'][0];

// product type
$arrTypes = \yii\helpers\ArrayHelper::index($siteContent['product-types'], null, 'type');
$arrTypesImage = $arrTypes['image-link'];
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
<h1 class="text-uppercase fw-light text-center my-5"><?= Yii::t('app', 'New Arrival') ?></h1>
<div class="row w-100 mx-0">
    <div class="col-12 row mb-md-4 mx-0 p-0">
        <div class="col-md-5 px-md-3 px-lg-4 d-none d-md-block">
            <?php if (!empty($arrNewProductImage[0]['link'])): ?>
                <a href="<?= $arrNewProductImage[0]['link'] ?>" title="<?= $arrNewProductImage[0]['title'] ?>">
                    <img src="<?= $imgUrl . '/' . $arrNewProductImage[0]['image'] ?>" class="object-fit-cover shadow"
                         alt="<?= $arrNewProductImage[0]['title'] ?>">
                </a>
            <?php else: ?>
                <img src="<?= $imgUrl . '/' . $arrNewProductImage[0]['image'] ?>" class="object-fit-cover shadow"
                     alt="<?= $arrNewProductImage[0]['title'] ?>">
            <?php endif; ?>
        </div>
        <div class="col-12 col-md-7 px-md-3 px-lg-4">
            <?php if (!empty($arrNewProductImage[1]['link'])): ?>
                <a href="<?= $arrNewProductImage[1]['link'] ?>" title="<?= $arrNewProductImage[1]['title'] ?>">
                    <img src="<?= $imgUrl . '/' . $arrNewProductImage[1]['image'] ?>" class="object-fit-cover shadow"
                         alt="<?= $arrNewProductImage[1]['title'] ?>">
                </a>
            <?php else: ?>
                <img src="<?= $imgUrl . '/' . $arrNewProductImage[1]['image'] ?>" class="object-fit-cover shadow"
                     alt="<?= $arrNewProductImage[1]['title'] ?>">
            <?php endif; ?>
        </div>
    </div>
    <div class="col-12 row mt-3 mt-md-4 mx-0 p-0">
        <div class="col-12 col-md-7 px-md-3 px-lg-4">
            <?php if (!empty($arrNewProductImage[2]['link'])): ?>
                <a href="<?= $arrNewProductImage[2]['link'] ?>" title="<?= $arrNewProductImage[2]['title'] ?>">
                    <img src="<?= $imgUrl . '/' . $arrNewProductImage[2]['image'] ?>" class="object-fit-cover shadow"
                         alt="<?= $arrNewProductImage[2]['title'] ?>">
                </a>
            <?php else: ?>
                <img src="<?= $imgUrl . '/' . $arrNewProductImage[2]['image'] ?>" class="object-fit-cover shadow"
                     alt="<?= $arrNewProductImage[2]['title'] ?>">
            <?php endif; ?>
        </div>
        <div class="col-12 col-md-5 mt-3 mt-md-0 px-md-3 px-lg-4">
            <?php if (!empty($arrNewProductImage[3]['link'])): ?>
                <a href="<?= $arrNewProductImage[3]['link'] ?>" title="<?= $arrNewProductImage[3]['title'] ?>">
                    <img src="<?= $imgUrl . '/' . $arrNewProductImage[3]['image'] ?>" class="object-fit-cover shadow"
                         alt="<?= $arrNewProductImage[3]['title'] ?>">
                </a>
            <?php else: ?>
                <img src="<?= $imgUrl . '/' . $arrNewProductImage[3]['image'] ?>" class="object-fit-cover shadow"
                     alt="<?= $arrNewProductImage[3]['title'] ?>">
            <?php endif; ?>
        </div>
    </div>
    <?php if (!empty($newArrivalSeeMoreLink)): ?>
        <div class="col-12 text-center mb-5 mt-4 my-md-5">
            <a href="<?= $newArrivalSeeMoreLink['link'] ?>"
               class="btn btn-dark rounded-0 fs-4 fw-light px-4 px-lg-5"
               target="_blank"><?= $newArrivalSeeMoreLink['content'] ?></a>
        </div>
    <?php endif; ?>
</div>
<div class="row px-3 px-md-4 w-100 m-0 sereno">
    <div class="col-12 col-md-6 ps-lg-5 px-0 px-md-4">
        <?php if (!empty($arrCollectionImage[0]['image'])): ?>
            <img src="<?= $imgUrl . '/' . $arrCollectionImage[0]['image'] ?>"
                 class="object-fit-cover shadow p-0 d-none d-md-block"
                 alt="...">
        <?php endif; ?>
        <?php if (!empty($arrCollectionImage[1]['image'])): ?>
            <img src="<?= $imgUrl . '/' . $arrCollectionImage[1]['image'] ?>"
                 class="object-fit-cover shadow p-0 d-md-none"
                 alt="...">
        <?php endif; ?>
    </div>
    <div class="col-12 col-md-6 d-flex align-items-center px-0 px-md-4 pe-lg-5 mt-3 mt-md-0">
        <?php if (!empty($collectionMixContent)): ?>
            <div class="w-100 text-justify">
                <h1 class="fw-light m-0 text-uppercase text-center text-md-start"><?= $collectionMixContent['title'] ?></h1>
                <p class="fs-5 fw-light my-3 my-md-4 my-xl-5 px-0">
                    <?= $collectionMixContent['content'] ?>
                </p>
                <div class="w-100 text-center">
                    <a href="<?= $collectionMixContent['link'] ?>"
                       class="btn btn-dark rounded-0 fs-6 fw-light px-4"><?= Yii::t('app', 'See more') ?></a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php if (!empty($productTypeContent)): ?>
    <h1 class="text-uppercase fw-light text-center mt-5 mb-3 my-5"><?= $productTypeContent['title'] ?></h1>
    <div class="row px-3 px-md-4 my-3 my-md-5 w-100 mx-0">
        <p class="fs-5 fw-light text-justify w-100 px-0">
            <?= $productTypeContent['content'] ?>
        </p>
    </div>
<?php endif; ?>

<div class="row px-md-5 my-3 my-md-5 px-3 w-100 mx-0">
    <div class="col-6 px-2 ps-md-5 pe-md-3">
        <?php if (!empty($arrProductTypeImage[0]['link'])): ?>
            <a href="<?= $arrProductTypeImage[0]['link'] ?>" title="<?= $arrProductTypeImage[0]['title'] ?>">
                <img src="<?= $imgUrl . '/' . $arrProductTypeImage[0]['image'] ?>"
                     class="mb-md-4 w-100 shadow pronto-img-left"
                     alt="<?= $arrProductTypeImage[0]['title'] ?>">
            </a>
        <?php else: ?>
            <img src="<?= $imgUrl . '/' . $arrProductTypeImage[0]['image'] ?>"
                 class="mb-md-4 w-100 shadow pronto-img-left"
                 alt="<?= $arrProductTypeImage[0]['title'] ?>">
        <?php endif; ?>
        <?php if (!empty($arrProductTypeImage[1]['link'])): ?>
            <a href="<?= $arrProductTypeImage[1]['link'] ?>" title="<?= $arrProductTypeImage[1]['title'] ?>">
                <img src="<?= $imgUrl . '/' . $arrProductTypeImage[1]['image'] ?>"
                     class="w-100 mt-4 h-50 shadow d-none d-md-block"
                     alt="<?= $arrProductTypeImage[1]['title'] ?>">
            </a>
        <?php else: ?>
            <img src="<?= $imgUrl . '/' . $arrProductTypeImage[1]['image'] ?>"
                 class="w-100 mt-4 h-50 shadow d-none d-md-block"
                 alt="<?= $arrProductTypeImage[1]['title'] ?>">
        <?php endif; ?>
    </div>
    <div class="col-6 px-2 ps-md-3 pe-md-5">
        <?php if (!empty($arrProductTypeImage[2]['link'])): ?>
            <a href="<?= $arrProductTypeImage[2]['link'] ?>" title="<?= $arrProductTypeImage[2]['title'] ?>">
                <img src="<?= $imgUrl . '/' . $arrProductTypeImage[2]['image'] ?>"
                     class="w-100 h-25 shadow d-none d-md-block"
                     alt="<?= $arrProductTypeImage[2]['title'] ?>">
            </a>
        <?php else: ?>
            <img src="<?= $imgUrl . '/' . $arrProductTypeImage[2]['image'] ?>"
                 class="w-100 h-25 shadow d-none d-md-block"
                 alt="<?= $arrProductTypeImage[2]['title'] ?>">
        <?php endif; ?>

        <?php if (!empty($arrProductTypeImage[3]['link'])): ?>
            <a href="<?= $arrProductTypeImage[3]['link'] ?>" title="<?= $arrProductTypeImage[3]['title'] ?>">
                <img src="<?= $imgUrl . '/' . $arrProductTypeImage[3]['image'] ?>"
                     class="my-md-4 w-100 shadow pronto-img-left"
                     alt="<?= $arrProductTypeImage[3]['title'] ?>">
            </a>
        <?php else: ?>
            <img src="<?= $imgUrl . '/' . $arrProductTypeImage[3]['image'] ?>"
                 class="my-md-4 w-100 shadow pronto-img-left"
                 alt="<?= $arrProductTypeImage[3]['title'] ?>">
        <?php endif; ?>

        <?php if (!empty($arrProductTypeImage[4]['link'])): ?>
            <a href="<?= $arrProductTypeImage[4]['link'] ?>" title="<?= $arrProductTypeImage[4]['title'] ?>">
                <img src="<?= $imgUrl . '/' . $arrProductTypeImage[4]['image'] ?>"
                     class="w-100 h-25 shadow d-none d-md-block"
                     alt="<?= $arrProductTypeImage[4]['title'] ?>">
            </a>
        <?php else: ?>
            <img src="<?= $imgUrl . '/' . $arrProductTypeImage[3]['image'] ?>"
                 class="w-100 h-25 shadow d-none d-md-block"
                 alt="<?= $arrProductTypeImage[4]['title'] ?>">
        <?php endif; ?>
    </div>
</div>
<div class="row w-100 m-0 p-0">
    <div class="col-12 text-center pt-3 pt-md-5">
        <?php if (!empty($productTypeSeeMoreLink)): ?>
            <a href="<?= $productTypeSeeMoreLink['link'] ?>"
               class="btn btn-dark rounded-0 fs-4 fw-light px-4 px-lg-5"><?= Yii::t('app', 'See more') ?></a>
        <?php endif; ?>
    </div>
</div>
<div class="row my-3 my-md-5 px-2 px-md-0 w-100 mx-0">
    <div class="col-12 col-md-6 position-relative p-0 px-md-3">
        <div class="overflow-hidden w-100 shadow">
            <a href="<?= $arrTypesImage[0]['link'] ?>"
               class="text-decoration-none w-100" target="_blank">
                <p class="position-absolute text-light fs-1 men-title fw-bolder text-uppercase"><?= $arrTypesImage[0]['title'] ?></p>
                <img src="<?= $imgUrl . '/' . $arrTypesImage[0]['image'] ?>"
                     class="object-fit-cover position-relative gender-img" alt="<?= $arrTypesImage[0]['title'] ?>">
            </a>
        </div>
    </div>
    <div class="col-12 col-md-6 mt-4 mt-md-0 position-relative overflow-hidden p-0 px-md-3">
        <div class="overflow-hidden w-100 shadow">
            <a href="<?= $arrTypesImage[1]['link'] ?>"
               class="text-decoration-none w-100" target="_blank">
                <p class="position-absolute text-light fs-1 women-title fw-bolder text-uppercase"><?= $arrTypesImage[1]['title'] ?></p>
                <img src="<?= $imgUrl . '/' . $arrTypesImage[1]['image'] ?>"
                     class="object-fit-cover position-relative gender-img" alt="<?= $arrTypesImage[0]['title'] ?>">
            </a>
        </div>
    </div>
</div>