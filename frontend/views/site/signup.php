<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Đăng Kí';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xl-6"></div>
    <div class="col-12 col-xl-6 mt-md-5 mt-2">
        <div class="w-100">
            <div class="max-width mx-auto">
            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'class' => 'form-floating max-width mx-auto']); ?>
                <div class=" border-radius bg-light  border-radius">
                    <div class="mx-4">
                        <div class="pt-3">
                            <h1 class="fw-bold text-center text-primary"><?= Html::encode($this->title) ?></h1>
                        </div>
                        <?= $form->field($model, 'name', [
                            'inputOptions' => ['autofocus' => true, 'class' => 'form-control border rounded-pill mt-md-4 mt-2']
                        ])->textInput()->input('text', ['placeholder' => "Nhập tên"])->label(false); ?>

                        <?= $form->field($model, 'email', [
                            'inputOptions' => ['autofocus' => true, 'class' => 'form-control border rounded-pill mt-md-3 mt-2']
                        ])->textInput()->input('email', ['placeholder' => "Nhập email"])->label(false); ?>

                        <?= $form->field($model, 'password', [
                            'inputOptions' => ['autofocus' => true, 'class' => 'form-control border rounded-pill mt-md-3 mt-2']
                        ])->textInput()->input('password', ['placeholder' => "Nhập mật khẩu"])->label(false); ?>

                        <?= $form->field($model, 'password_confirm', [
                            'inputOptions' => ['autofocus' => true, 'class' => 'form-control border rounded-pill mt-md-3 mt-2']
                        ])->textInput()->input('password', ['placeholder' => "Nhập lại mật khẩu"])->label(false); ?>

                        <?= $form->field($model, 'tel', [
                            'inputOptions' => ['autofocus' => true, 'class' => 'form-control border rounded-pill mt-md-3 mt-2']
                        ])->textInput()->input('number', ['placeholder' => "Nhập số điện thoại"])->label(false); ?>
                        <div class="mt-3">
                            <?= Html::submitButton('Đăng Kí', ['class' => 'btn btn-primary rounded-pill text-light w-100', 'name' => 'signup-button','value'=>'Đăng Kí']) ?>
                        </div>
                        <p class="text-center py-3">Bạn đã có tài khoản ? <?= Html::a('Đăng Nhập', ['/login']) ?>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
