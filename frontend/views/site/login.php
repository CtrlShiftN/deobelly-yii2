<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Đăng Nhập';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xl-6"></div>
    <div class="col-12 col-xl-6 mt-md-5 mt-2">
        <div class="w-100">
            <div class="max-width mx-auto ">
                <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'form-floating ']); ?>
                <div class=" border-radius bg-light  border-radius">
                    <div class="mx-4">
                        <div class=" pt-md-5 pt-3">
                            <h1 class="fw-bold text-primary text-center "><?= Html::encode($this->title) ?></h1>
                        </div>
                        <?= $form->field($model, 'email', [
                            'inputOptions' => ['autofocus' => true, 'class' => 'form-control border rounded-pill mt-md-5 mt-3']
                        ])->textInput()->input('email', ['placeholder' => "Nhập email"])->label(false); ?>

                        <?= $form->field($model, 'password', [
                            'inputOptions' => ['autofocus' => true, 'class' => 'form-control border rounded-pill mt-md-4 mt-2']
                        ])->textInput()->input('password', ['placeholder' => "Nhập mật khẩu"])->label(false); ?>

                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary rounded-pill fs-4 text-light w-100 mt-5','name' => 'login-button']) ?>
                        <div class="mt-4">
                            Bạn quên mật khẩu ? <?= Html::a('Quên mật khẩu', ['/request-password-reset'],['class'=>'text-decoration-none'] ) ?>
                        </div>
                        <div class="pb-4">
                            Bạn chưa có tài khoản ? <?= Html::a('Đăng Kí ', ['/signup'],['class'=>'text-decoration-none'] ) ?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>