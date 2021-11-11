<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->registerCssFile(Url::toRoute('/css/tailor-made.css'));
$this->title = Yii::t('app', 'Tailor Made');
$imgUrl = Yii::$app->params['common'] . '/media';
$this->registerCss(".quote-section{
background: url('" . $imgUrl . "/thomas-with-suit.png') no-repeat;
}");
$this->registerCss(".hero-image{
background: url('" . $imgUrl . "/men-fashion.jpg') no-repeat;
background-size: cover;
position: relative;
}");
?>
<div class="tailor-made">
    <div class="full-width">
        <div class="hero-image text-center">
            <div class="hero-text py-4 d-none d-md-block">
                <h1 class="title-svn pb-4"><?= Yii::t('app', 'Looking for a perfect collections?') ?></h1>
                <h4 class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ultricies
                    velit vitae commodo tempus. Vestibulum vel vulputate turpis. Donec lobortis a libero vitae
                    porttitor.</h4>
                <a href="<?= Url::toRoute('mix-and-match/') ?>" title="<?= Yii::t('app', 'Collections') ?>">
                    <button type="button" class="btn btn-default border bg-white title-svn">
                        <h4 class="mb-0"><?= Yii::t('app', 'See more') ?></h4></button>
                </a>
            </div>
        </div>
    </div>
    <div class="container pt-4">
        <div class="row">
            <div class="col-12 col-md-6">
                <a href="<?= \yii\helpers\Url::toRoute('tailor-made/top') ?>"
                   title="<?= Yii::t('app', 'Top Measurements') ?>">
                    <div class="image-holder p-3">
                        <img src="<?= $imgUrl . '/tailor-made/top.jpg' ?>" class="img-thumbnail w-100">
                        <div class="measure-method__title">
                            <p class="text-uppercase fs-4 fw-bolder title-svn"><?= Yii::t('app', 'Top Measurements') ?></p>
                        </div>
                        <div class="image-overlay card-shadow"></div>
                    </div>
                </a>
                <a href="<?= \yii\helpers\Url::toRoute('tailor-made/pants') ?>"
                   title="<?= Yii::t('app', 'Pants Measurements') ?>">
                    <div class="image-holder p-3">
                        <img src="<?= $imgUrl . '/tailor-made/pants.jpg' ?>" class="img-thumbnail w-100">
                        <div class="measure-method__title">
                            <p class="text-uppercase fs-4 fw-bolder title-svn"><?= Yii::t('app', 'Pants Measurements') ?></p>
                        </div>
                        <div class="image-overlay card-shadow"></div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6">
                <a href="<?= \yii\helpers\Url::toRoute('tailor-made/set') ?>"
                   title="<?= Yii::t('app', 'Set Measurements') ?>">
                    <div class="image-holder p-3 h-100">
                        <img src="<?= $imgUrl . '/tailor-made/set.jpg' ?>" class="img-thumbnail w-100 h-100">
                        <div class="measure-method__title">
                            <p class="text-uppercase fs-4 fw-bolder title-svn"><?= Yii::t('app', 'Set Measurements') ?></p>
                        </div>
                        <div class="image-overlay card-shadow"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <section class="home-latest-news pb-5">
        <div class="section-heading text-center">
            <h2 class="section-title">
                <span class="text-uppercase"><?= Yii::t('app', 'Latest News') ?></span>
            </h2>
        </div>
        <div class="container px-0">
            <div class="row w-100 px-0 mx-0">
                <?php foreach ($latestNews as $key => $value) : ?>
                    <div class="col-12 col-sm-6 col-lg-4 text-center pb-3 px-4">
                        <div class="card box-shadow h-100">
                            <a href="<?= Url::toRoute(['post/detail', 'id' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"
                               target="_blank" class="text-decoration-none">
                                <img src="<?= $imgUrl . '/' . $value['avatar'] ?>" class="card-img-top img-fluid"
                                     title="<?= $value['title'] ?>" alt="<?= $value['title'] ?>">
                                <div class="card-body">
                                    <h4 class="text-black"><?= $value['title'] ?></h4>
                                    <div class="article-content text-black text-justify">
                                        <?= $value['content'] ?>
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