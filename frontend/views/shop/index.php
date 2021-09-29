<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = Yii::t('app', 'Shop');
$this->params['breadcrumbs'][] = $this->title;
$cdnUrl = Yii::$app->params['frontend'];
$imgUrl = Yii::$app->params['common'] . "/media";
$this->registerCssFile(Url::toRoute("/css/shop.css"));
$this->registerCss("
.object-fit-cover {
    object-fit: cover;
}
.h-35 {
    height: 35% !important;
}
.h-65 {
    height: 65% !important;
}
");
?>
<div class="row p-0 my-5 h-100">
    <div class="col-6 px-2 ps-md-5 pe-md-3 mb-5">
<!--        TODO: LINKS-->
        <a href="javascript:void(0)" class="text-decoration-none" target="_blank">
            <div class="overflow-hidden w-100 shadow h-65 position-relative my-3">
                <p class="position-absolute text-light fs-1 category-title fw-bolder text-uppercase"><?= Yii::t('app','Men') ?></p>
                <img src="<?= Url::toRoute('img/index/pronto-img-4.jpg') ?>" class="w-100 shadow object-fit-cover zoom"
                     alt="...">
            </div>
        </a>
        <a href="javascript:void(0)" class="text-decoration-none" target="_blank">
            <div class="overflow-hidden w-100 shadow h-35 position-relative my-3">
                <p class="position-absolute text-light fs-1 category-title fw-bolder text-uppercase"><?= Yii::t('app','Accessory') ?></p>
                <img src="<?= Url::toRoute('img/index/GLT_1219.jpeg') ?>" class="w-100 shadow object-fit-cover zoom"
                     alt="...">
            </div>
        </a>
    </div>
    <div class="col-6 px-2 ps-md-3 pe-md-5 mb-5">
        <a href="javascript:void(0)" class="text-decoration-none" target="_blank">
            <div class="overflow-hidden w-100 shadow h-35 position-relative my-3">
                <p class="position-absolute text-light fs-1 category-title fw-bolder text-uppercase"><?= Yii::t('app','new product') ?></p>
                <img src="<?= Url::toRoute('img/index/women.jpg') ?>" class="w-100 shadow object-fit-cover zoom"
                     alt="...">
            </div>
        </a>
        <a href="javascript:void(0)" class="text-decoration-none" target="_blank">
            <div class="overflow-hidden w-100 shadow h-65 position-relative my-3">
                <p class="position-absolute text-light fs-1 category-title fw-bolder text-uppercase"><?= Yii::t('app','Women') ?></p>
                <img src="<?= Url::toRoute('img/index/pronto-img-2.jpg') ?>" class="w-100 shadow object-fit-cover zoom"
                     alt="...">
            </div>
        </a>
    </div>
    <div class="col-12 mb-5 px-2 px-md-5">
        <a href="javascript:void(0)" class="text-decoration-none" target="_blank">
            <div class="overflow-hidden w-100 shadow position-relative mt-3">
                <p class="position-absolute text-light fs-1 last-category-title fw-bolder text-uppercase"><?= Yii::t('app','luxury product') ?></p>
                <img src="<?= Url::toRoute('img/index/brand2.jpg') ?>" class="w-100 shadow object-fit-cover zoom"
                     alt="...">
            </div>
        </a>
    </div>
</div>

<script>
    $(function () {
        var request = $.ajax({
            url: "<?= $cdnUrl ?>/api/ajax/test", // send request to
            method: "POST", // sending method
            data: {user_id: 'abc'}, // sending data
        });

        request.done(function (msg) {
            console.log('success', msg); // what returns
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus); // check errors
        });
    })
</script>