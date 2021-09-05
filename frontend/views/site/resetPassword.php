<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use kartik\label\LabelInPlace;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = 'Đăng Nhập';
$this->params['breadcrumbs'][] = $this->title;
$config = ['template'=>"{input}\n{error}\n{hint}"];
?>
<div class="h-top"></div>
<div class="row border-radius">
    <div class="col-6 col-lg-7 d-md-block d-none bg-light border-radius bg-white">
        <div class="h-100 d-flex">
            <div class="align-self-center"><img src="<?= $imgUrl ?>/img-content-login.jpg" class="img-fluid"></div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-5 ">
        <div class="">
            <div class="max-width mx-auto ">
                <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'form-floating']); ?>
                <div class=" border-radius bg-light">
                    <div class="mx-4">
                        <div class=" pt-md-5 pt-3">
                            <h1 class="fw-bold text-primary text-center "><?= Html::encode($this->title) ?></h1>
                            <p class="my-md-4 my-2">Please choose your new password:</p>
                        </div>
                        <?= $form->field($model, 'password', [
                            'inputOptions' => ['autofocus' => true, 'class' => 'form-control border rounded-pill mt-md-5 mt-3']
                        ])->textInput()->input('password', ['placeholder' => "Nhập mật khẩu mới"])->label(false); ?>
                        <?= $form->field($model, 'password_confirm', [
                            'inputOptions' => ['autofocus' => true, 'class' => 'form-control border rounded-pill mt-md-3 mt-2']
                        ])->textInput()->input('password', ['placeholder' => "Nhập lại mật khẩu"])->label(false); ?>
                        <?= Html::submitButton('Lưu Mật Khẩu', ['class' => 'btn btn-primary rounded-pill fs-4 text-light w-100 my-5', 'name' => 'login-button']) ?>

                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>