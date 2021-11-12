<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = Yii::t('app', 'Shop');
$this->params['breadcrumbs'][] = $this->title;
$cdnUrl = Yii::$app->params['frontend'];
$imgUrl = Yii::$app->params['common'] . "/media";
$this->registerCssFile(Url::toRoute("css/shop.css"));
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
<div class="row p-0 my-5 h-100 w-100 mx-0">
    <div class="col-6 px-1 ps-md-5 pe-md-3 mb-4 mb-md-5">
        <?php if (!empty($type[0])): ?>
        <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($type[0]['id'])]) ?>"
           class="text-decoration-none" target="_blank">
            <div class="overflow-hidden w-100 shadow h-35 position-relative my-2 my-md-3">
                <p class="position-absolute text-light fs-title category-title fw-bolder text-uppercase"><?= Yii::t('app', $type[0]['name']) ?></p>
                <img src="<?= $imgUrl . '/' . $type[0]['image'] ?>"
                     class="w-100 shadow object-fit-cover zoom"
                     alt="...">
            </div>
        </a>
        <?php endif; ?>
        <?php if (!empty($type[1])): ?>
        <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($type[1]['id'])]) ?>"
           class="text-decoration-none" target="_blank">
            <div class="overflow-hidden w-100 shadow h-65 position-relative my-2 my-md-3">
                <p class="position-absolute text-light fs-title category-title fw-bolder text-uppercase"><?= Yii::t('app', $type[1]['name']) ?></p>
                <img src="<?= $imgUrl . '/' . $type[1]['image'] ?>"
                     class="w-100 shadow object-fit-cover zoom"
                     alt="...">
            </div>
        </a>
        <?php endif; ?>
    </div>
    <div class="col-6 px-1 ps-md-3 pe-md-5 mb-4 mb-md-5">
        <?php if (!empty($type[2])): ?>
        <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($type[2]['id'])]) ?>"
           class="text-decoration-none" target="_blank">
            <div class="overflow-hidden w-100 shadow h-65 position-relative my-2 my-md-3">
                <p class="position-absolute text-light fs-title category-title fw-bolder text-uppercase"><?= Yii::t('app', $type[2]['name']) ?></p>
                <img src="<?= $imgUrl . '/' . $type[2]['image'] ?>"
                     class="w-100 shadow object-fit-cover zoom"
                     alt="...">
            </div>
        </a>
        <?php endif; ?>
        <?php if (!empty($type[3])): ?>
        <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($type[3]['id'])]) ?>"
           class="text-decoration-none" target="_blank">
            <div class="overflow-hidden w-100 shadow h-35 position-relative my-2 my-md-3">
                <p class="position-absolute text-light fs-title category-title fw-bolder text-uppercase"><?= Yii::t('app', $type[3]['name']) ?></p>
                <img src="<?= $imgUrl . '/' . $type[3]['image'] ?>"
                     class="w-100 shadow object-fit-cover zoom"
                     alt="...">
            </div>
        </a>
        <?php endif; ?>
    </div>
    <?php if (!empty($type[4])): ?>
    <div class="col-12 mb-md-5 px-1 px-md-5 overflow-hidden">
        <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($type[4]['id'])]) ?>"
           class="text-decoration-none" target="_blank">
            <div class="overflow-hidden h-final-type w-100 shadow position-relative mt-md-3">
                <img src="<?= $imgUrl . '/' . $type[4]['image'] ?>"
                     class="w-100 shadow object-fit-cover zoom"
                     alt="...">
                <p class="position-absolute text-light fs-title last-category-title fw-bolder text-uppercase"><?= Yii::t('app', $type[4]['name']) ?></p>
            </div>
        </a>
    </div>
    <?php endif; ?>
</div>