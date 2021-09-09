<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->registerCss('.help-block, .fill-red {color: red}');
$this->registerCss('.help-block {padding-left: 5px}');
$this->title = "Tạo tài khoản mới";
?>

<div class="container user-form p-3">
    <h3 class="text-uppercase pb-4">Tạo tài khoản mới</h3>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row pb-3">
        <div class="col-12 col-sm-2 col-md-3 col-lg-3"><h4>Họ và tên <sup class="fill-red fs-6">(*)</sup></h4></div>
        <div class="col-12 col-sm-6 col-md-5 col-lg-6">
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Nguyễn Văn A'])->label(false) ?>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-12 col-sm-2 col-md-3 col-lg-3"><h4>Email <sup class="fill-red fs-6">(*)</sup></h4></div>
        <div class="col-12 col-sm-6 col-md-5 col-lg-6">
            <?= $form->field($model, 'email')->textInput(['placeholder' => 'support.deobelly@gmail.com'])->label(false) ?>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-12 col-sm-2 col-md-3 col-lg-3"><h4>Mật khẩu <sup class="fill-red fs-6">(*)</sup></h4></div>
        <div class="col-12 col-sm-6 col-md-5 col-lg-6">
            <?= $form->field($model, 'password_hash')->textInput(['placeholder' => 'Nhập vào mật khẩu...'])->label(false) ?>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-12 col-sm-2 col-md-3 col-lg-3"><h4>Số điện thoại</h4></div>
        <div class="col-12 col-sm-6 col-md-5 col-lg-6">
            <?= $form->field($model, 'tel')->textInput(['placeholder' => '0912 668 668'])->label(false) ?>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-12 col-sm-2 col-md-3 col-lg-3"><h4>Địa chỉ</h4></div>
        <div class="col-12 col-sm-6 col-md-5 col-lg-6">
            <?= $form->field($model, 'address')->textInput(['placeholder' => 'Số 1 Trung Hòa, Cầu Giấy, Hà Nội'])->label(false) ?>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-12 col-sm-2 col-md-3 col-lg-3"><h4>Vai trò <sup class="fill-red fs-6">(*)</sup></h4></div>
        <div class="col-12 col-sm-6 col-md-5 col-lg-6">
            <?= $form->field($model, 'role')->dropDownList(\common\models\User::ROLES)->label(false) ?>
        </div>
    </div>
    <div class="form-group mb-0">
        <?= Html::submitButton('Tạo tài khoản', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
