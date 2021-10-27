<?php

/* @var $this yii\web\View */

use frontend\models\Color;
use kartik\depdrop\DepDrop;
use kartik\form\ActiveForm;
use kartik\label\LabelInPlace;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Payment');
$this->params['breadcrumbs'][] = $this->title;
$cdnUrl = Yii::$app->params['frontend'];
$imgUrl = Yii::$app->params['common'] . "/media";
?>
<style>
    .product-quantity {
        height: 25px;
        max-height: 25px;
        width: 25px;
        max-width: 25px;
        border-radius: 50%;
        position: absolute;
        background-color: #ec0000;
        color: #fff;
        text-align: center;
        top: 0;
        right: -11px;
        z-index: 2;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-name {
        display: block;
        display: -webkit-box;
        margin: 0 !important;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 2;
    }

    .bg-lighter-gray {
        background-color: rgba(222, 222, 222, 0.26) !important;
    }

    .bg-red {
        background-color: #e80000 !important;
    }

    .product-in-cart {
        height: 350px;
        overflow: scroll;
        padding: 0 !important;
    }

    @media (max-width: 576px) {
        .fs-xsm__12px {
            font-size: 12px !important;
        }
    }

    .container-label {
        display: block;
        position: relative;
        padding-left: 27px;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default radio button */
    .container-label input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 2px;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: #cecece;
        border-radius: 50%;
    }

    /* When the radio button is checked, add a blue background */
    .container-label input:checked ~ .checkmark {
        background-color: #e80000;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container-label input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .container-label .checkmark:after {
        top: 7px;
        left: 7px;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: white;
    }
</style>
<div class="w-100 row mx-0 px-1 pt-3 pt-md-5 pt-lg-5 px-sm-0 d-flex">
    <div class="col-12 col-lg-6 order-1 order-lg-0 mx-0 d-flex p-0 mt-4 mt-lg-0">
        <?php $form = ActiveForm::begin(['id' => 'contact-form', 'options' => ['class' => 'w-100 m-0 p-0']]); ?>
        <div class="w-100 m-0 p-0">
            <h3 class="w-100 pb-1 border-bottom px-0"><?= Yii::t('app', 'Billing information') ?>:</h3>

            <div class="w-100 row py-3 px-1 m-0">
                <div class="col-12 col-sm-6 px-1">
                    <?= $form->field($model, 'name')->label(Yii::t('app', "Consignee's name")) ?>
                </div>
                <div class="col-12 col-sm-6 px-1">
                    <?= $form->field($model, 'tel')->label(Yii::t('app', 'Phone number')) ?>
                </div>
                <div class="col-12 px-1">
                    <?= $form->field($model, 'email')->label(Yii::t('app', 'Email address')) ?>
                </div>
            </div>
            <!--form-->
            <div class="accordion accordion-flush w-100 px-1 my-1" id="accordionPaymentOnDelivery">
                <div class="accordion-item border rounded-0">
                    <p class="accordion-header px-2 py-3 bg-lighter-gray" id="flush-heading-home-delivery">
                        <label class="container-label w-100 m-0" for='sm-home-delivery'>
                            <?= Yii::t('app', 'Home delivery') ?>
                            <input type='radio' name="payment-methods" id='sm-home-delivery' checked="checked">
                            <span class="checkmark"></span>
                            <button class="accordion-button" hidden type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-home-delivery" aria-expanded="true"
                                    aria-controls="flush-home-delivery">
                            </button>
                        </label>
                    </p>
                    <div id="flush-home-delivery" class="accordion-collapse collapse border-top show"
                         aria-labelledby="flush-heading-home-delivery" data-bs-parent="#accordionPaymentOnDelivery">
                        <div class="accordion-body row m-0 p-2">
                            <div class="col-12 col-sm-6 px-1">
                                <?= $form->field($model, 'province_id')->dropDownList($provinces, ['id' => 'province-id', 'prompt' => Yii::t('app', '- Choose province/city -')])->label(Yii::t('app', 'Province')) ?>
                            </div>
                            <div class="col-12 col-sm-6 px-1">
                                <?= $form->field($model, 'district_id')->widget(DepDrop::classname(), [
                                    'options' => ['id' => 'district-id'],
                                    'pluginOptions' => [
                                        'depends' => ['province-id'],
                                        'placeholder' => Yii::t('app', '- Choose district -'),
                                        'url' => Url::to(['/checkout/get-district'])
                                    ]
                                ])->label(Yii::t('app', 'District')); ?>
                            </div>
                            <div class="col-12 col-sm-6 px-1">
                                <?= $form->field($model, 'village_id')->widget(DepDrop::classname(), [
                                    'options' => ['id' => 'village-id'],
                                    'pluginOptions' => [
                                        'depends' => ['district-id'],
                                        'placeholder' => Yii::t('app', '- Choose village/ward -'),
                                        'url' => Url::to(['/checkout/get-village'])
                                    ]
                                ])->label(Yii::t('app', 'Village')); ?>
                            </div>
                            <div class="col-12 col-sm-6 px-1">
                                <?= $form->field($model, 'specific_address')->textInput(['id' => 'address'])->label(Yii::t('app', 'Specific address')) ?>
                            </div>
                            <div class="col-12 px-1">
                                <?= $form->field($model, 'notes', ['options' => ['class' => 'm-0']])->textarea(['placeholder' => Yii::t('app', 'Note to the seller'), 'class' => 'm-0'])->label(Yii::t('app', 'Message') . ' (' . Yii::t('app', 'Optional') . '):') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border">
                    <p class="accordion-header px-2 py-3 bg-lighter-gray" id="flush-heading-receive-at-store">
                        <label class="container-label w-100 m-0"
                               for='sm-receive-at-store'><?= Yii::t('app','Receive products at the store') ?>
                            <input type='radio' name="payment-methods" id='sm-receive-at-store'>
                            <span class="checkmark"></span>
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-receive-at-store" aria-expanded="false"
                                    aria-controls="flush-receive-at-store" hidden>
                            </button>
                        </label>
                    </p>
                    <div id="flush-receive-at-store" class="accordion-collapse collapse"
                         aria-labelledby="flush-heading-receive-at-store" data-bs-parent="#accordionPaymentOnDelivery">
                        <div class="accordion-body row m-0 p-2 text-center" hidden></div>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-12 col-lg-6 order-0 order-lg-1 p-0 ps-lg-4 ps-xl-5 m-0 my-4 my-lg-0">
        <h3 class="pb-1 border-bottom px-0"><?= Yii::t('app', 'Cart') ?>:</h3>
        <div class="w-100 m-0 p-0 <?= (count($cart) > 3) ? 'product-in-cart' : '' ?>">
            <?php foreach ($cart as $key => $value): ?>
                <div class="w-100 row m-0 pb-2 p-0 d-flex align-items-center border-bottom">
                    <div class="col-8 col-sm-6 col-md-7 col-lg-8 row m-0 p-0">
                        <div class="col-4 col-md-2 position-relative p-0">
                            <img src="<?= $imgUrl . '/' . $cart[$key]['p-img'] ?>" class="w-100 position-relative">
                            <span class="product-quantity"><?= $cart[$key]['quantity'] ?></span>
                        </div>
                        <div class="col-8 col-md-10 ps-3 d-flex align-items-center">
                            <div class="w-100">
                                <p class="m-0 product-name"><?= $cart[$key]['p-name'] ?></p>
                                <span class="fs__14px"
                                      data-color="<?= $cart[$key]['color_id'] ?>"><?= Color::getColorCodeById($cart[$key]['color_id'])['name'] ?></span>,
                                <span class="fs__14px"
                                      data-color="<?= $cart[$key]['size_id'] ?>"><?= \frontend\models\Size::getSizeById($cart[$key]['size_id']) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-sm-6 col-md-5 col-lg-4 row m-0 py-0 px-2">
                        <p class="m-0 px-1 text-end price" id="total_price_<?= $key ?>"
                           data-total-price="<?= $cart[$key]['total_price'] ?>"><?= number_format($cart[$key]['total_price'], 0, ',', '.') ?>
                            đ</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="w-100 row m-0 p-0 bg-lighter-gray border-top mt-3">
    <div class="col-12 col-md-6 m-0 p-0">
    </div>
    <div class="col-12 col-md-6 m-0 p-2">
        <div class="my-1 py-2 w-100"><?= Yii::t('app', "Total product's price") ?>: <span class="fs-5 m-0 float-end"
                                                                                          id="total_price_product"></span>
        </div>
        <div class="my-1 py-2 w-100"><?= Yii::t('app', 'Shipping fee') ?>: <span class="fs-5 m-0 float-end"
                                                                                 id="shipping_fee" data-fee="0"></span>
        </div>
        <div class="my-1 py-2 w-100"><?= Yii::t('app', 'Total payment') ?>: <span class="fs-4 text-danger m-0 float-end"
                                                                                  id="total_price"></span></div>
    </div>
    <div class="w-100 row m-0 py-3 px-0 px-sm-auto border-top d-flex align-items-center">
        <div class="col-7 col-sm-8 fs-xsm__12px">
            <?= Yii::t('app', 'Clicking "Order" means you agree to abide by') ?> <a
                    href="<?= Url::toRoute('site/terms') ?>"
                    class="text-decoration-none text-primary"><?= Yii::t('app', 'the De Obelly terms') ?>.</a>
        </div>
        <div class="col-5 col-sm-4 px-2">
            <button type="button" class="btn bg-red rounded-0 px-3 px-sm-4 py-2 text-white float-end"
                    id="order"><?= Yii::t('app', 'Order') ?></button>
        </div>
    </div>
</div>
<script>
    if($('#sm-home-delivery').prop('checked'));
    let total_price = 0;
    for (let i = 0; i < $('.price').length; i++) {
        total_price += parseInt($('#total_price_' + i).attr('data-total-price'));
    }
    $('#total_price_cart,#total_price_product').html(new Intl.NumberFormat(['ban', 'id']).format(total_price) + 'đ');
    $('#shipping_fee').html($('#shipping_fee').attr('data-fee') + 'đ');
    $('#total_price').html(new Intl.NumberFormat(['ban', 'id']).format(parseInt($('#shipping_fee').attr('data-fee')) + total_price) + 'đ')

    $("#telInput").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
    $('#sm-home-delivery,#sm-receive-at-store').on('click', function () {
        $(this).parent().find('button').trigger('click')
    })
</script>






