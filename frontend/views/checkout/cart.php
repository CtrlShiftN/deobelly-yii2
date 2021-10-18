<?php

/* @var $this yii\web\View */

use frontend\models\Color;
use frontend\models\ProductType;
use common\components\encrypt\CryptHelper;
use common\components\helpers\ParamHelper;
use frontend\models\Size;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Cart');
$this->params['breadcrumbs'][] = $this->title;
$cdnUrl = Yii::$app->params['frontend'];
$imgUrl = Yii::$app->params['common'] . "/media";
$this->registerCssFile(Url::toRoute("css/cart.css"));
$this->registerJsFile(Url::toRoute('js/cart.js'));
?>
<div class="w-100 mx-0 fs-4 pb-2 pt-3 pt-md-4 my-3 border-bottom text-uppercase"><span
            class="fw-bold d-inline-block fs-2">DE-OBELY</span> / Giỏ hàng
</div>
<div class="w-100 row mx-0 px-2 py-2 my-3 border-bottom d-none d-md-flex">
    <div class="col-5 m-0 px-0 py-3 d-flex">
        <span class="text-uppercase fs-5 fw-bold"> sản phẩm</span>
    </div>
    <div class="col-7 m-0 px-0 py-3 row mx-0">
        <div class="col-3 text-uppercase text-center">đơn giá</div>
        <div class="col-3 text-uppercase text-center">số lượng</div>
        <div class="col-3 text-uppercase text-center">số tiền</div>
        <div class="col-3 text-uppercase text-center">thao tác</div>
    </div>
</div>
<?php foreach ($cart as $key => $value): ?>
    <?php $idEncrypt = CryptHelper::encryptString($value['id']) ?>
    <div class="w-100 row mx-0 py-2 my-3 my-md-2 border-bottom border-top p-0 row-product" data-id="<?= $value['id'] ?>">
        <div class="col-12 col-md-5 row m-0 px-0 d-flex justify-content-center align-items-center">
                <!--image-->
                <div class="col-6 col-md-4 row m-0 p-0">
                    <div class="col-5 px-2 d-flex justify-content-center align-items-center">
                        <label class="category-checkbox">
                            <input type="checkbox" value="<?= $idEncrypt ?>">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-7 px-0 px-md-2">
                        <img src="<?= $imgUrl . '/' . $value['p-img'] ?>" class="object-fit-cover w-100">
                    </div>
                </div>
                <!--name-->
                <div class="col-6 xol-md-8 fs__14px px-1 px-md-2">
                    <span class="w-100"><?= $value['p-name'] ?></span>
                    <div class="w-100 col-md-4 mx-0 px-0">
                        <div class="dropdown">
                            <button class="btn rounded-0 bg-lighter-gray p-1 dropdown-toggle fs__14px" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Phân loại
                            </button>
                            <ul class="dropdown-menu m-0 p-0 rounded-0" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <?php if (!empty($value['color_id'])): ?>
                                        <?php $colorArr = explode(',', $value['pa-color']) ?>
                                        <select class="w-100 fs__14px mb-1">
                                            <option value="<?= $value['color_id'] ?>"><?= Color::getColorCodeById($value['color_id'])['name'] ?></option>
                                            <?php foreach ($colorArr as $color): ?>
                                                <?php if ($color != $value['color_id']): ?>
                                                    <option value="<?= $color ?>"><?= Color::getColorCodeById($color)['name'] ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php endif; ?>
                                </li>
                                <li>
                                    <?php if (!empty($value['size_id'])): ?>
                                        <?php $sizeArr = explode(',', $value['pa-size']) ?>
                                        <select class="w-100 fs__14px">
                                            <option value="<?= $value['size_id'] ?>"><?= Size::getSizeById($value['size_id']) ?></option>
                                            <?php foreach ($sizeArr as $size): ?>
                                                <?php if ($size != $value['size_id']): ?>
                                                    <option value="<?= $size ?>"><?= Size::getSizeById($size) ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
        <!--information-->
        <div class="col-12 col-md-7 m-0 px-0 row d-flex justify-content-center align-items-center row-action fs__14px">
            <!--price-->
            <div class="col-6 col-md-3 col-xl-3 p-0 text-md-center price_<?= $idEncrypt ?>" data-price="<?= $value['p-price'] ?>">
                <span class="d-md-none me-2">Giá:</span>
                <?= number_format($value['p-price'], 0, ',', '.') ?>đ
            </div>
            <!--quantity-->
            <div class="col-6 col-md-3 col-xl-3 p-0">
                <div class="d-flex justify-content-center">
                    <button type="button" onclick="reduceProductQuantity()" id=""
                            class="btn btn-gray d-inline-block fw-bolder border-top-0 border-bottom-0 border-start-0 border-dark btnDESC d-md-flex d-none">
                        -
                    </button>
                    <label for="amount<?= $idEncrypt ?>" class="my-auto d-md-none me-2">Số lượng: </label>
                    <input type="text" id="amount<?= $idEncrypt ?>" value="<?= $value['quantity'] ?>"
                           onchange="totalPrice()"
                           class="text-center d-inline-block amountInput quantity_<?= $idEncrypt ?>">
                    <button type="button" onclick="increaseProductQuantity()" id=""
                            class="btn btn-gray d-inline-block fw-bolder border-top-0 border-bottom-0 border-end-0 border-dark btnASC d-md-flex d-none">
                        +
                    </button>
                </div>
            </div>
            <!--total price-->
            <div class="col-12 col-md-4 col-xl-3 p-0 text-md-center total-price_<?= $idEncrypt ?>"
                 data-total-price="<?= $value['total_price'] ?>">
                <span class="d-md-none me-2">Tổng:</span>
                <?= number_format($value['total_price'], 0, ',', '.') ?>đ
            </div>
            <!--action-->
            <div class="col-12 col-md-2 col-xl-3 p-0 text-md-center">
                <button class="btn btn-dark w-100"><?= Yii::t('app', 'Delete') ?></button>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<div class="w-100 row mx-0 px-2 mt-4 d-flex align-items-center justify-content-center bg-lighter-gray">
    <div class="col-12 col-md-6 m-0 px-0 py-3 d-flex">
        <label class="category-checkbox text-uppercase my-auto">
            <input type="checkbox" id="checkAll">Chọn tất cả (<?= count($cart) ?>) sản phẩm
            <span class="checkmark"></span>
        </label>
        <button class="btn btn-dark text-uppercase mx-3">Xóa</button>
    </div>
    <div class="col-12 col-md-6 m-0 px-0 py-3 row">
        <div class="col-12 col-sm-7 px-0">
            <p class="m-0 text-uppercase fs-5">tổng thanh toán (<span id="totalProduct"></span>):</p>
            <span class="fs-2 text-danger" id="totalPrice"></span>
        </div>
        <div class="col-12 col-sm-5 text-uppercase d-flex align-items-center justify-content-center">
            <a href="javascript:void(0)" class="btn btn-danger text-light w-100">Mua ngay</a>
        </div>
    </div>
</div>
