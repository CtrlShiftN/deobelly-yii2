<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \common\models\LoginForm */

use kartik\label\LabelInPlace;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = 'Đổi mật khẩu';
$this->params['breadcrumbs'][] = $this->title;
$config = ['template' => "{input}\n{error}\n{hint}"];
?>
<div class="h-100 d-flex justify-content-center">
    <div class="row border-radius align-self-center">
        <div class="col-6 col-md-6 d-md-block d-none bg-light border-radius bg-white">
            <div class="h-100 d-flex">
                <div class="align-self-center"><img src="<?= $imgUrl ?>/img-content-login.jpg" class="img-fluid"></div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="max-width mx-auto ">
                <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'form-floating']); ?>
                <div class=" border-radius bg-light">
                    <div class="mx-4">
                        <div class=" pt-md-5 pt-3">
                            <h1 class="fw-bold text-primary text-center pb-3"><?= Html::encode($this->title) ?></h1>
                            <p class="my-md-4 my-2 fs-5">Hãy nhập mật khẩu mới của bạn:</p>
                        </div>
                        <?= $form->field($model, 'password', $config)->widget(LabelInPlace::classname(), [
                            'type' => LabelInPlace::TYPE_HTML5,
                            'label' => '<span class="ms-2">Nhập mật khẩu mới</span>',
                            'options' => ['type' => 'password', 'class' => 'form-control fs-5 border rounded-pill mt-md-4 mt-2'],
                            'encodeLabel' => false
                        ]); ?>
                        <?= $form->field($model, 'password_confirm', $config)->widget(LabelInPlace::classname(), [
                            'type' => LabelInPlace::TYPE_HTML5,
                            'label' => '<span class="ms-2">Nhập lại mật khẩu</span>',
                            'options' => ['type' => 'password', 'class' => 'form-control fs-5 border rounded-pill mt-md-4 mt-2'],
                            'encodeLabel' => false
                        ]); ?>
                        <?= Html::submitButton('Đăng Kí', ['class' => 'btn btn-primary rounded-pill text-light w-100 my-md-5 my-3', 'name' => 'signup-button', 'value' => 'Đăng Kí']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>