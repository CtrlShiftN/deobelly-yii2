<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Đặt Lại Mật Khẩu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xl-6"></div>
    <div class="col-12 col-xl-6 mt-md-5 mt-2">
        <div class="w-100">
            <div class="max-width mx-auto ">
                <?php $form = ActiveForm::begin(['id' => 'reset-password-form', 'class' => 'form-floating ']); ?>
                <div class=" border-radius bg-light  border-radius">
                    <div class="mx-4">
                        <div class=" pt-md-5 pt-3">
                            <h1 class="fw-bold text-primary text-center "><?= Html::encode($this->title) ?></h1>
                            <p class="my-md-4 my-2">Please choose your new password:</p>
                        </div>
                        <?= $form->field($model, 'password', ['options' => [
                            'class' => 'form-floating mt-5 '],
                            'inputOptions' => ['id' => 'floatingInputPassword', 'class' => 'form-control'],
                            'template' => "{input}\n<label for='floatingInputPassword'>Password</label>\n{error}"])->textInput(['type'=> 'password','autofocus' => true,'class' => 'form-control w-100 border rounded-pill'])->label(false) ?>

                        <?= Html::submitButton('Lưu Mật Khẩu', ['class' => 'btn btn-primary rounded-pill fs-4 text-light w-100 my-5', 'name' => 'login-button']) ?>

                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>