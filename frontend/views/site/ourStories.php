<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = Yii::t('app', 'Our stories');
$this->params['breadcrumbs'][] = $this->title;
$imgUrl = Yii::$app->params['common'] . "/media";
$this->registerCssFile(Url::toRoute("css/stories.css"));
$this->registerCss(".intro-quote{
    background: url(" . $imgUrl . "/quote.png) no-repeat top left;
    position: relative;
    padding-left: 90px;
    text-align: justify;
   }");
?>
<div class="site-our-stories">
    <div class="full-width d-none d-md-block">
        <!-- Carousel wrapper -->
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
                        <img src="<?= $imgUrl . '/' . $value['link'] ?>" class="d-block w-100"
                             alt="<?= empty($value['slide_label']) ? 'De Obelly' : $value['slide_label'] ?>"/>
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
        <!-- Carousel wrapper -->
    </div>
    <div class="shop-intro text-center pt-md-5 pb-2">
        <?php if (!empty($stories['intro'])): ?>
            <img src="<?= $imgUrl . '/' . $stories['intro']['image'] ?>" width="100%">
            <h3 class="text-uppercase py-2">De Obelly Shop</h3>
            <div class="intro-text px-3">
                <?= (!empty($stories['intro']['content'])) ? $stories['intro']['content'] : '' ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="full-width pb-4 pb-md-5 d-none d-md-block">
        <?php if (!empty($stories['fullwidth'])): ?>
            <img src="<?= $imgUrl . '/' . $stories['fullwidth']['image'] ?>" width="100%">
        <?php endif; ?>
    </div>
    <div class="container-md p-0">
        <div class="row quotes pb-4 pb-md-5 text-center w-100 mx-0 px-2 align-items-md-center justify-content-md-center">
            <?php if (!empty($stories['quote'])): ?>
                <div class="col-12 col-md-1"></div>
                <div class="col-12 col-md-5">
                    <img src="<?= $imgUrl . '/' . $stories['quote']['image'] ?>" width="100%">
                </div>
                <div class="col-12 col-md-5 intro-quote mt-3 mt-md-0 pt-md-0 pe-0">
                    <?= $stories['quote']['content'] ?>
                </div>
                <div class="col-12 col-md-1"></div>
            <?php endif; ?>
        </div>
    </div>
</div>