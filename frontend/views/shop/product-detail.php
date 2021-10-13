<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = Yii::t('app', 'Shop');
$this->params['breadcrumbs'][] = $this->title;
$cdnUrl = Yii::$app->params['frontend'];
$imgUrl = Yii::$app->params['common'] . "/media";
$this->registerCssFile(Url::toRoute("css/swiper.min.css"));
$this->registerCssFile(Url::toRoute("css/product-detail.css"));
$this->registerCssFile(Url::toRoute("css/easyzoom.css"));
?>
<script type="text/javascript" src="<?= Url::toRoute('js/easyzoom.js') ?>"></script>
<script type="text/javascript" src="<?= Url::toRoute('js/swiper-bundle.min.js') ?>"></script>
<div class="row py-3 p-md-3 p-lg-4 px-xl-5 py-xl-4">
    <div class="col-12 col-md-6 px-3">
        <div class="product__carousel ps-md-3 ps-lg-4 ps-xl-5 mt-0">
            <!-- Swiper and EasyZoom plugins start -->
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    <div class="swiper-slide easyzoom easyzoom--overlay">
                        <a href="<?= $imgUrl . '/' . $detail['image'] ?>">
                            <img src="<?= $imgUrl . '/' . $detail['image'] ?>">
                        </a>
                    </div>
                    <?php if (!empty($detail['images'])): ?>
                        <?php $imgArr = explode(',', $detail['images']);
                        foreach ($imgArr as $key => $value): ?>
                            <div class="swiper-slide easyzoom easyzoom--overlay">
                                <a href="<?= $imgUrl . '/' . $value ?>">
                                    <img src="<?= $imgUrl . '/' . $value ?>">
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="<?= $imgUrl . '/' . $detail['image'] ?>">
                    </div>
                    <?php if (!empty($detail['images'])): ?>
                        <?php $imgArr = explode(',', $detail['images']);
                        foreach ($imgArr as $key => $value): ?>
                            <div class="swiper-slide">
                                <img src="<?= $imgUrl . '/' . $value ?>">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Swiper and EasyZoom plugins end -->
        </div>
    </div>
    <div class="col-12 col-md-6 px-3">
        <span class="my-3 fs-3 m-0 fw-bolder text-uppercase d-block"><?= $detail['name'] ?> <span
                    class="badge rounded-0 bg-danger" id="outOfStock">Hết hàng</span></span>
        <?php if (!empty($detail['sale_price'])): ?>
            <span class="my-3 fs-4 m-0 fw-bolder d-block"><span
                        class="fw-light text-decoration-line-through"><?= number_format($detail['regular_price'], 0, ',', '.') ?>đ</span> <?= number_format($detail['selling_price'], 0, ',', '.') ?>đ</span>
        <?php else: ?>
            <span class="my-3 fs-4 m-0 fw-bolder d-block"><?= number_format($detail['selling_price'], 0, ',', '.') ?>đ</span>
        <?php endif; ?>
        <div class="w-100 my-3">
            <span class="fw-light fs-5 d-block mb-2">Color: <span id="color"></span></span>
            <?php if (!strpos($detail['assoc_color_id'], ',')): ?>
                <button class="btn-color fw-bold fs-6"
                        data-hex='<?= \frontend\models\Color::getColorCodeById($detail['assoc_color_id'])['color_code'] ?>'
                        data-name-color="<?= \frontend\models\Color::getColorCodeById($detail['assoc_color_id'])['name'] ?>"
                        style="background:<?= \frontend\models\Color::getColorCodeById($detail['assoc_color_id'])['color_code'] ?>"></button>
            <?php else: ?>
                <?php $colorArr = explode(',', $detail['assoc_color_id']);
                foreach ($colorArr as $key => $color):?>
                    <button class="btn-color fw-bold fs-6"
                            data-hex='<?= \frontend\models\Color::getColorCodeById($color)['color_code'] ?>'
                            data-name-color="<?= \frontend\models\Color::getColorCodeById($color)['name'] ?>"
                            style="background:<?= \frontend\models\Color::getColorCodeById($color)['color_code'] ?>"></button>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="w-100 my-3">
            <span class="fw-light fs-5 d-block mb-2">Size: <span id="size"></span></span>
            <?php if (!strpos($detail['assoc_size_id'], ',')): ?>
                <button class="btn-size btn fw-bold fs-6"
                        data-size="<?= \frontend\models\Size::getSizeById($detail['assoc_size_id']) ?>"><?= \frontend\models\Size::getSizeById($detail['assoc_size_id']) ?></button>
            <?php else: ?>
                <?php $sizeArr = explode(',', $detail['assoc_size_id']);
                foreach ($sizeArr as $key => $size):?>
                    <button class="btn-size btn fw-bold fs-6"
                            data-size="<?= \frontend\models\Size::getSizeById($size) ?>"><?= \frontend\models\Size::getSizeById($size) ?></button>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="w-100 my-3">
            <span class="fw-light fs-5 d-block mb-2">Số lượng:</span>
            <div class="w-100 d-flex">
                <button type="button" onclick="DESC()" id="btnDESC"
                        class="btn btn-gray d-inline-block fw-bolder border-top-0 border-bottom-0 border-start-0 border-dark">
                    -
                </button>
                <input type="text" id="amountInput" value="1" class="text-center d-inline-block">
                <button type="button" onclick="ASC()" id="btnASC"
                        class="btn btn-gray d-inline-block fw-bolder border-top-0 border-bottom-0 border-end-0 border-dark">
                    +
                </button>
            </div>
            <i class="notifyColor mt-md-2 mt-lg-2 mt-xl-0 ml-2 d-block" id="quantity"
               data-quantity="<?= $detail['quantity'] ?>">Hiện
                còn <?= $detail['quantity'] ?> sản phẩm.</i>
            <small id="notify" class="text-danger"></small>
        </div>
        <div class="w-100 row my-3 mx-0">
            <div class="col-12 col-sm-6 col-md-12 col-lg-6 text-center p-0">
                <a class="btn p-3 btn-outline-dark w-100" href="#" id="btnAdd"><i
                            class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</a>
            </div>
            <div class="col-12 col-sm-6 col-md-12 col-lg-6 mt-md-2 mt-lg-0 p-0 text-center">
                <a class="btn p-3 btn-dark text-light w-100" href="#" id="btnBuyNow"><i
                            class="fas fa-dollar-sign text-light"></i> Mua ngay</a>
            </div>
        </div>
    </div>
</div>
<div class="w-100 my-2 mx-0 px-md-5">
    <div class="accordion p-0" id="accordionInformation">
        <div class="accordion-item border-0">
            <h2 class="accordion-header" id="headingInf">
                <button class="fs-4 accordion-button text-uppercase bg-white fw-bold text-dark px-0 rounded-0 border-bottom border-dark"
                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseInf" aria-expanded="true"
                        aria-controls="collapseInf">
                    chi tiết sản phẩm
                </button>
            </h2>
            <div id="collapseInf" class="accordion-collapse collapse show" aria-labelledby="headingInf"
                 data-bs-parent="#accordionInformation">
                <div class="accordion-body">
                    <?= $detail['description'] ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="w-100 my-2 mx-0 px-md-5">
    <p class="m-0 text-uppercase border-bottom border-dark px-0 fw-bolder fs-4 pt-3 pb-2">
        sản phẩm bán chạy
    </p>
</div>
<div class="full-width ">
    <div class="row m-0 px-0 px-md-5">
        <div class="w-100 row p-0 m-0 d-none d-sm-flex">
            <?php foreach ($bestSellers as $key => $value): ?>
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 mx-0 py-3 position-relative product-card overflow-hidden">
                    <div class="position-relative overflow-hidden w-100 img-shadow">
                        <a href="<?= Url::toRoute(['shop/product-detail', 'detail' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"
                           class="text-decoration-none text-dark px-0 w-100 position-relative">
                            <div class="position-relative product-img w-100 mb-2">
                                <img class="img-product"
                                     src="<?= $imgUrl . '/' . $value['image'] ?>">
                            </div>
                            <div class="pr-inf px-2 px-lg-1 px-xl-2 py-2 w-100 border-top">
                                <?php if (!empty($value['sale_price'])): ?>
                                    <span class="px-0 fw-bold mt-2 p-price">
                                    <span class="text-decoration-line-through text-dark fw-light fs-regular-price"><?= number_format($value['regular_price'], 0, ',', '.') ?>đ</span> <?= number_format($value['selling_price'], 0, ',', '.') ?>đ
                                </span>
                                <?php else: ?>
                                    <span class="px-0 fw-bold mt-2 p-price"><?= number_format($value['selling_price'], 0, ',', '.') ?>đ</span>
                                <?php endif; ?>
                                <p class="m-0 product-name"><?= $value['name'] ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="product-button row m-0">
                        <a href="javascript:void(0)"
                           data-id="<?= \common\components\encrypt\CryptHelper::encryptString($value['id']) ?>"
                           class="btn rounded-0 btnAdd col-4 col-md-3"><i class="fas fa-cart-plus"></i></a>
                        <a href="javascript:void(0)"
                           data-id="<?= \common\components\encrypt\CryptHelper::encryptString($value['id']) ?>"
                           class="btn rounded-0 btnBuyNow col-4 col-md-6"><i
                                    class="fas fa-dollar-sign d-md-none"></i><span
                                    class="d-none d-md-inline-block"><i
                                        class="fas fa-dollar-sign"></i> <?= Yii::t('app', 'Buy now') ?></span></a>
                        <a href="javascript:void(0)"
                           data-id=""<?= \common\components\encrypt\CryptHelper::encryptString($value['id']) ?>"
                        class="btn rounded-0 btnAdd col-4 col-md-3"><i class="far fa-heart"></i></a>
                    </div>
                </div>
            <?php endforeach; ?>
            <i class="col-12 p-0 m-0 text-end mb-3">
                <a href="<?= Url::toRoute('shop/product') ?>" class="text-decoration-none text-dark">Xem toàn bộ sản
                    phẩm >></a>
            </i>
        </div>
        <div class="w-100 row p-0 m-0 d-sm-none">
            <?php foreach ($bestSellersMb as $key => $value): ?>
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 mx-0 py-3 position-relative product-card overflow-hidden">
                    <div class="position-relative overflow-hidden w-100 img-shadow">
                        <a href="<?= Url::toRoute(['shop/product-detail', 'detail' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"
                           class="text-decoration-none text-dark px-0 w-100 position-relative">
                            <div class="position-relative product-img w-100 mb-2">
                                <img class="img-product"
                                     src="<?= $imgUrl . '/' . $value['image'] ?>">
                            </div>
                            <div class="pr-inf px-2 px-lg-1 px-xl-2 py-2 w-100 border-top">
                                <?php if (!empty($value['sale_price'])): ?>
                                    <span class="px-0 fw-bold mt-2 p-price">
                                    <span class="text-decoration-line-through text-dark fw-light fs-regular-price"><?= number_format($value['regular_price'], 0, ',', '.') ?>đ</span> <?= number_format($value['selling_price'], 0, ',', '.') ?>đ
                                </span>
                                <?php else: ?>
                                    <span class="px-0 fw-bold mt-2 p-price"><?= number_format($value['selling_price'], 0, ',', '.') ?>đ</span>
                                <?php endif; ?>
                                <p class="m-0 product-name"><?= $value['name'] ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="product-button row m-0">
                        <a href="javascript:void(0)"
                           data-id="<?= \common\components\encrypt\CryptHelper::encryptString($value['id']) ?>"
                           class="btn rounded-0 btnAdd col-4 col-md-3"><i class="fas fa-cart-plus"></i></a>
                        <a href="javascript:void(0)"
                           data-id="<?= \common\components\encrypt\CryptHelper::encryptString($value['id']) ?>"
                           class="btn rounded-0 btnBuyNow col-4 col-md-6"><i
                                    class="fas fa-dollar-sign d-md-none"></i><span
                                    class="d-none d-md-inline-block"><i
                                        class="fas fa-dollar-sign"></i> <?= Yii::t('app', 'Buy now') ?></span></a>
                        <a href="javascript:void(0)"
                           data-id=""<?= \common\components\encrypt\CryptHelper::encryptString($value['id']) ?>"
                        class="btn rounded-0 btnAdd col-4 col-md-3"><i class="far fa-heart"></i></a>
                    </div>
                </div>
            <?php endforeach; ?>
            <i class="col-12 p-0 m-0 text-end mb-3">
                <a href="<?= Url::toRoute('shop/product') ?>" class="text-decoration-none text-dark">Xem toàn bộ sản
                    phẩm >></a>
            </i>
        </div>
    </div>
</div>
<div class="w-100 my-2 mx-0 px-md-5">
    <p class="m-0 text-uppercase border-bottom border-dark px-0 fw-bolder fs-4 pt-3 pb-2">
        sản phẩm đang sale
    </p>
</div>
<div class="full-width pb-5">
    <div class="row m-0 px-0 px-md-5">
        <div class="w-100 row p-0 m-0 d-none d-sm-flex">
            <?php foreach ($onSale as $key => $value): ?>
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 mx-0 py-3 position-relative product-card overflow-hidden">
                    <div class="position-relative overflow-hidden w-100 img-shadow">
                        <a href="<?= Url::toRoute(['shop/product-detail', 'detail' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"
                           class="text-decoration-none text-dark px-0 w-100 position-relative">
                            <div class="position-relative product-img w-100 mb-2">
                                <img class="img-product"
                                     src="<?= $imgUrl . '/' . $value['image'] ?>">
                            </div>
                            <div class="pr-inf px-2 px-lg-1 px-xl-2 py-2 w-100 border-top">
                                <?php if (!empty($value['sale_price'])): ?>
                                    <span class="px-0 fw-bold mt-2 p-price">
                                    <span class="text-decoration-line-through text-dark fw-light fs-regular-price"><?= number_format($value['regular_price'], 0, ',', '.') ?>đ</span> <?= number_format($value['selling_price'], 0, ',', '.') ?>đ
                                </span>
                                <?php else: ?>
                                    <span class="px-0 fw-bold mt-2 p-price"><?= number_format($value['selling_price'], 0, ',', '.') ?>đ</span>
                                <?php endif; ?>
                                <p class="m-0 product-name"><?= $value['name'] ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="product-button row m-0">
                        <a href="javascript:void(0)"
                           data-id="<?= \common\components\encrypt\CryptHelper::encryptString($value['id']) ?>"
                           class="btn rounded-0 btnAdd col-4 col-md-3"><i class="fas fa-cart-plus"></i></a>
                        <a href="javascript:void(0)"
                           data-id="<?= \common\components\encrypt\CryptHelper::encryptString($value['id']) ?>"
                           class="btn rounded-0 btnBuyNow col-4 col-md-6"><i
                                    class="fas fa-dollar-sign d-md-none"></i><span
                                    class="d-none d-md-inline-block"><i
                                        class="fas fa-dollar-sign"></i> <?= Yii::t('app', 'Buy now') ?></span></a>
                        <a href="javascript:void(0)"
                           data-id=""<?= \common\components\encrypt\CryptHelper::encryptString($value['id']) ?>"
                        class="btn rounded-0 btnAdd col-4 col-md-3"><i class="far fa-heart"></i></a>
                    </div>
                </div>
            <?php endforeach; ?>
            <i class="col-12 p-0 m-0 text-end mb-3">
                <a href="<?= Url::toRoute('shop/product') ?>" class="text-decoration-none text-dark">Xem toàn bộ sản
                    phẩm >></a>
            </i>
        </div>
        <div class="w-100 row p-0 m-0 d-sm-none">
            <?php foreach ($onSaleMb as $key => $value): ?>
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 mx-0 py-3 position-relative product-card overflow-hidden">
                    <div class="position-relative overflow-hidden w-100 img-shadow">
                        <a href="<?= Url::toRoute(['shop/product-detail', 'detail' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"
                           class="text-decoration-none text-dark px-0 w-100 position-relative">
                            <div class="position-relative product-img w-100 mb-2">
                                <img class="img-product"
                                     src="<?= $imgUrl . '/' . $value['image'] ?>">
                            </div>
                            <div class="pr-inf px-2 px-lg-1 px-xl-2 py-2 w-100 border-top">
                                <?php if (!empty($value['sale_price'])): ?>
                                    <span class="px-0 fw-bold mt-2 p-price">
                                    <span class="text-decoration-line-through text-dark fw-light fs-regular-price"><?= number_format($value['regular_price'], 0, ',', '.') ?>đ</span> <?= number_format($value['selling_price'], 0, ',', '.') ?>đ
                                </span>
                                <?php else: ?>
                                    <span class="px-0 fw-bold mt-2 p-price"><?= number_format($value['selling_price'], 0, ',', '.') ?>đ</span>
                                <?php endif; ?>
                                <p class="m-0 product-name"><?= $value['name'] ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="product-button row m-0">
                        <a href="javascript:void(0)"
                           data-id="<?= \common\components\encrypt\CryptHelper::encryptString($value['id']) ?>"
                           class="btn rounded-0 btnAdd col-4 col-md-3"><i class="fas fa-cart-plus"></i></a>
                        <a href="javascript:void(0)"
                           data-id="<?= \common\components\encrypt\CryptHelper::encryptString($value['id']) ?>"
                           class="btn rounded-0 btnBuyNow col-4 col-md-6"><i
                                    class="fas fa-dollar-sign d-md-none"></i><span
                                    class="d-none d-md-inline-block"><i
                                        class="fas fa-dollar-sign"></i> <?= Yii::t('app', 'Buy now') ?></span></a>
                        <a href="javascript:void(0)"
                           data-id=""<?= \common\components\encrypt\CryptHelper::encryptString($value['id']) ?>"
                        class="btn rounded-0 btnAdd col-4 col-md-3"><i class="far fa-heart"></i></a>
                    </div>
                </div>
            <?php endforeach; ?>
            <i class="col-12 p-0 m-0 text-end mb-3">
                <a href="<?= Url::toRoute('shop/product') ?>" class="text-decoration-none text-dark">Xem toàn bộ sản
                    phẩm >></a>
            </i>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= Url::toRoute('js/product-detail.js') ?>"></script>

