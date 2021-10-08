<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = 'DE OBELLY';
$this->registerCssFile(Url::toRoute("/css/index.css"));
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
<h1 class="text-uppercase fw-light text-center my-5"><?= Yii::t('app', 'new product') ?></h1>
<div class="row">
    <div class="col-12 row mb-md-4 mx-0 p-0">
        <div class="col-md-5 px-md-3 px-lg-4 d-none d-md-block">
            <img src="<?= Url::toRoute('img/index/newProductImg1.jpg') ?>" class="object-fit-cover shadow" alt="...">
        </div>
        <div class="col-12 col-md-7 px-md-3 px-lg-4">
            <img src="<?= Url::toRoute('img/index/newProductImg2.jpg') ?>" class="object-fit-cover shadow" alt="...">
        </div>
    </div>
    <div class="col-12 row mt-3 mt-md-4 mx-0 p-0">
        <div class="col-12 col-md-7 px-md-3 px-lg-4">
            <img src="<?= Url::toRoute('img/index/newProductImg3.jpg') ?>" class="object-fit-cover shadow" alt="...">
        </div>
        <div class="col-12 col-md-5 mt-3 mt-md-0 px-md-3 px-lg-4">
            <img src="<?= Url::toRoute('img/index/newProductImg4.jpg') ?>" class="object-fit-cover shadow" alt="...">
        </div>
    </div>
    <div class="col-12 text-center mb-5 mt-4 my-md-5">
        <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($type['san-pham-moi'][0]['id'])]) ?>" class="btn btn-dark rounded-0 fs-4 fw-light px-4 px-lg-5">Xem thêm</a>
    </div>
</div>
<div class="row px-lg-5 w-100 m-0 sereno">
    <div class="col-12 col-md-6 ps-lg-5 px-0 px-md-4">
        <img src="<?= Url::toRoute('img/index/sereno.jpg') ?>" class="object-fit-cover shadow p-0 d-none d-md-block"
             alt="...">
        <img src="<?= Url::toRoute('img/index/sereno-responsive.jpg') ?>" class="object-fit-cover shadow p-0 d-md-none"
             alt="...">
    </div>
    <div class="col-12 col-md-6 d-flex align-items-center px-4 pe-lg-5 mt-3 mt-md-0">
        <div class="w-100 text-justify">
            <h1 class="fw-light m-0 text-uppercase text-center text-md-start">sereno</h1>
            <p class="fs-5 fw-light my-3 my-md-4 my-xl-5">
                Expressing the new definition of success,
                DE OBELLY introduces SS21 Collection "SERENO",
                showing a successful man should be able to comfortably express himself and effortlessly enjoy luxury.
                Living in a time when the public and the private collide,
                when the workplace might be the same with the party,
                when one needs to look classy from monday to weekend without feeling tired.
                Explore the new vision for contemporary success through DE OBELLY's "SERENO" collection
            </p>
            <div class="w-100 text-center">
                <a href="javascript:void(0)" class="btn btn-dark rounded-0 fs-6 fw-light px-4">Xem thêm</a>
            </div>
        </div>
    </div>
</div>
<h1 class="text-uppercase fw-light text-center mt-5 mb-3 my-5"><?= Yii::t('app', 'pronto') ?></h1>
<div class="row px-4 px-md-5 my-3 my-md-5">
    <p class="fs-5 fw-light text-justify w-100">
        Thời gian là thứ tài sản quý giá mà khi càng thành công,
        người ta lại càng muốn tận dụng nó một cách triệt để.
        Thấu hiểu niềm khao khát sở hữu vẻ sang trọng nhưng vẫn thoải mái,
        DE OBELLY mang đến giải pháp cho những người đàn ông thành công trong thời đại mới.
        Kết hợp giữa thiết kế tinh tế, cùng những nguyên vật liệu thượng hạng và công nghệ hiện đại nhất,
        dòng sản phẩm sơ mi “PRONTO” với đặc tính phẳng phiu mà không cần là ủi sau khi giặt,
        đề cao vẻ thanh lịch nhưng tiện dụng, tiết kiệm từng phút giây quý báu của các Quý ông luôn bận rộn.
        Các mẫu áo sơ mi không cần là ủi DE OBELLY PRONTO sẽ sớm có mặt tại các gian hàng trên toàn quốc trong tháng
        10/2021.
    </p>
</div>

<div class="row px-md-5 my-3 my-md-5 px-3">
    <div class="col-6 px-2 ps-md-5 pe-md-3">
        <img src="<?= Url::toRoute('img/index/pronto-img-1.jpg') ?>" class="mb-md-4 w-100 shadow pronto-img-left"
             alt="...">
        <img src="<?= Url::toRoute('img/index/pronto-img-2.jpg') ?>" class="w-100 mt-4 h-50 shadow d-none d-md-block"
             alt="...">
    </div>
    <div class="col-6 px-2 ps-md-3 pe-md-5">
        <img src="<?= Url::toRoute('img/index/pronto-img-3.jpg') ?>" class="w-100 h-25 shadow d-none d-md-block"
             alt="...">
        <img src="<?= Url::toRoute('img/index/pronto-img-4.jpg') ?>" class="my-md-4 w-100 shadow pronto-img-left"
             alt="...">
        <img src="<?= Url::toRoute('img/index/pronto-img-5.jpg') ?>" class="w-100 h-25 shadow d-none d-md-block"
             alt="...">
    </div>
</div>
<div class="row">
    <div class="col-12 text-center pt-3 pt-md-5">
        <a href="javascript:void(0)" class="btn btn-dark rounded-0 fs-4 fw-light px-4 px-lg-5">Xem thêm</a>
    </div>
</div>
<div class="row my-5 px-4 px-md-0">
    <div class="col-12 col-md-6 position-relative p-0 px-md-3">
        <div class="overflow-hidden w-100 shadow">
            <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($type['thoi-trang-nam'][0]['id'])]) ?>" class="text-decoration-none w-100">
                <p class="position-absolute text-light fs-1 men-title fw-bolder text-uppercase">Men</p>
                <img src="<?= Url::toRoute('img/index/men.jpg') ?>"
                     class="object-fit-cover position-relative gender-img" alt="...">
            </a>
        </div>
    </div>
    <div class="col-12 col-md-6 mt-4 mt-md-0 position-relative overflow-hidden p-0 px-md-3">
        <div class="overflow-hidden w-100 shadow">
            <a href="<?= Url::toRoute(['shop/product', 'type' => \common\components\encrypt\CryptHelper::encryptString($type['thoi-trang-nu'][0]['id'])]) ?>" class="text-decoration-none w-100">
                <p class="position-absolute text-light fs-1 women-title fw-bolder text-uppercase">Women</p>
                <img src="<?= Url::toRoute('img/index/women.jpg') ?>"
                     class="object-fit-cover position-relative gender-img" alt="...">
            </a>
        </div>
    </div>
</div>