<?php
/* @var $this yii\web\View */
$imgUrl = Yii::$app->params['common'].'/media';
$this->title = Yii::t('app', 'Top Collection');
$this->registerCssFile('/css/collection.css');
?>

<div class="collections row mt-4">
    <h2 class="d-none d-md-block"><?= Yii::t('app', 'Top Collection') ?></h2>
    <div class="col-12 col-lg-9 col-xl-10 px-5 px-md-3 m-0 top-collection">
        <div class="row pt-3">
            <div class="col-12 col-md-7">
                <img src="<?= $imgUrl.'/'.$mixes[0]['image'] ?>" class="w-100">
            </div>
            <div class="col-12 col-md-5 collection-content">
                <h3><?= $mixes[0]['title'] ?></h3>
                <p><?= Yii::t('app', 'Created at '). date_format(date_create($mixes[0]['created_at']), 'H:i:s d-m-Y') ?></p>
                <?= strip_tags($mixes[0]['content']) ?>
            </div>
        </div>
        <h3 class="mixed-product-heading border-bottom py-2"><?= Yii::t('app', 'Mixed Products') ?></h3>
    </div>
    <div class="col-12 col-lg-3 col-xl-2 px-5 px-md-3 m-0">
        <div class="w-100 mt-3 fs-4"><h2
                    class="previous-collection__title text-uppercase"><?= Yii::t('app', 'Weekly Collections') ?></h2>
        </div>
        <img src="<?= $imgUrl.'/'.$mixes[0]['image'] ?>" class="w-100">
    </div>
</div>