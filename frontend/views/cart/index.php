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
    <div class="w-100 mx-0 fs-4 pb-2 pt-3 pt-md-4 my-2 my-lg-3 border-bottom text-uppercase px-2"><span
                class="fw-bold d-inline-block fs-2">DE-OBELY</span> / Giỏ hàng
    </div>
<?php if(empty($cart)): ?>
    <div class="w-100 mx-0 fs-5 fw-light text-uppercase text-center my-3 my-md-4">
        <img src="<?= Url::toRoute('img/cart.png') ?>" class="w-25"><br>
        giỏ hàng của bạn đang trống<br>
        <a href="<?= Url::toRoute('shop/product') ?>" class="btn bg-black rounded-0 text-white px-3 py-2">mua ngay</a>
    </div>
<?php else: ?>
    <div class="w-100 row mx-0 px-2 py-2 my-2 border-bottom d-none d-lg-flex">
        <div class="col-4 col-sm-3 col-md-2 col-xxl-1 m-0 px-0 py-3 d-flex">
            <span class="text-uppercase fs-5 fw-bold"> sản phẩm</span>
        </div>
        <div class="col-8 col-sm-9 col-md-10 col-xxl-11 m-0 px-0 py-3 row mx-0">
            <div class="col-4 col-xl-3 col-xxl-4 row m-0 p-0"></div>
            <div class="col-4 col-xl-5 col-xxl-4 row m-0 p-0">
                <div class="col-6 text-uppercase pe-0">đơn giá</div>
                <div class="col-6 text-uppercase pe-0">số lượng</div>
            </div>
            <div class="col-4 row m-0 p-0">
                <div class="col-8 p-0 text-uppercase text-center">số tiền</div>
                <div class="col-4 p-0 text-uppercase text-center">thao tác</div>
            </div>
        </div>
    </div>
    <?php foreach ($cart as $key => $value): ?>
        <?php $idEncrypt = CryptHelper::encryptString($value['id']) ?>
        <div class="w-100 row mx-0 py-2 my-3 my-md-2 border-bottom border-top p-0 row-product" data-id="<?= $value['id'] ?>">
            <div class="col-4 col-sm-3 col-md-2 col-xl-1 row m-0 px-0 d-flex justify-content-center align-items-center">
                <img src="<?= $imgUrl . '/' . $value['p-img'] ?>" class="object-fit-cover w-100 px-0">
            </div>
            <!--information-->
            <div class="col-8 col-sm-9 col-md-10 col-xl-11 m-0 px-0 row d-flex justify-content-center align-items-center px-2 px-md-0 px-md-0">
                <div class="col-12 col-md-4 fs__14px px-0 px-md-3 my-1">
                    <span class="w-100 fw-light fs-name"><?= $value['p-name'] ?></span>
                    <div class="w-100 col-md-4 mx-0 px-0">
                        <div class="dropdown">
                            <button class="btn rounded-0 bg-lighter-gray p-1 dropdown-toggle fs__14px" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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
                <!--price-->
                <div class="col-12 col-md-3 col-lg-4 row m-0 my-1 p-0">
                    <div class="col-lg-6 d-none d-lg-flex p-0 justify-sm-content-center price_<?= $idEncrypt ?>" data-price="<?= $value['p-price'] ?>">
                        <span class="d-md-none me-2">Giá:</span>
                        <?= number_format($value['p-price'], 0, ',', '.') ?>đ
                    </div>
                    <!--quantity-->
                    <div class="col-12 col-lg-6 p-0 text-md-center">
                        <p class="d-lg-none my-0">Số lượng: </p>
                        <div class="d-flex justify-md-content-center">
                            <button type="button" data-id="<?= $idEncrypt ?>"
                                    class="btn btn-gray border-end border-0 border-dark btnDESC d-md-flex justify-content-center align-items-center">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="text" id="amount<?= $idEncrypt ?>" value="<?= $value['quantity'] ?>"
                                   onchange="totalPrice()"
                                   class="text-center d-inline-block amountInput quantity_<?= $idEncrypt ?>">
                            <button type="button" data-id="<?= $idEncrypt ?>"
                                    class="btn btn-gray border-start border-0 border-dark btnASC d-md-flex justify-content-center align-items-center">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!--total price-->
                <div class="col-12 col-md-5 col-lg-4 row m-0 p-0 my-1">
                    <div class="col-8 p-0 text-md-center text-red total-price_<?= $key ?>"
                         data-total-price="<?= $value['total_price'] ?>">
                        <p class="d-lg-none d-inline-block d-md-block text-black my-0">Tổng:</p>
                        <?= number_format($value['total_price'], 0, ',', '.') ?>đ
                    </div>
                    <!--action-->
                    <div class="col-4 p-0 text-md-center">
                        <button class="btn bg-transparent w-100 p-0"><i class="far fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="w-100 row mx-0 px-2 my-4 d-flex align-items-center justify-content-center">
        <div class="col-12 col-md-6 m-0 px-0 d-flex">
        </div>
        <div class="col-12 col-md-6 m-0 px-0 row text-end">
            <div class="col-12 px-0 mb-1">
                <p class="m-0 text-uppercase fs-6">tổng thanh toán: <span class="fs-3 text-red" id="totalPrice"></span></p>

            </div>
            <div class="col-12 text-uppercase p-0">
                <a href="javascript:void(0)" class="btn bg-black text-white fw-light me-1">Cập nhật</a>
                <a href="javascript:void(0)" class="btn bg-black text-white fw-light">Thanh toán</a>
            </div>
        </div>
    </div>
<?php endif; ?>