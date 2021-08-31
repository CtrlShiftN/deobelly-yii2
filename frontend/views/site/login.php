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
                        <?= $form->field($model, 'email', ['options' => [
                            'class' => 'form-floating mt-5 '],
                            'inputOptions' => ['id' => 'floatingInputEmail', 'class' => 'form-control'],
                            'template' => "{input}\n<label for='floatingInputEmail'>Email</label>\n{error}"])->textInput(['autofocus' => true, 'class' => 'form-control w-100 border rounded-pill'])->label(false) ?>
                        <?= $form->field($model, 'password', ['options' => [
                            'class' => 'form-floating mt-3'],
                            'inputOptions' => ['id' => 'floatingInputPassword', 'class' => 'form-control'],
                            'template' => "{input}\n<label for='floatingInputPassword'>Password</label>\n{error}"])->textInput(['type'=> 'password','class' => 'form-control w-100 border rounded-pill'])->label(false) ?>

                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary rounded-pill fs-4 text-light w-100 mt-5', 'name' => 'login-button']) ?>
                        <div class="mt-4">
                            Bạn quên mật khẩu ? <?= Html::a('Quên mật khẩu', ['site/request-password-reset'],['class'=>'text-decoration-none'] ) ?>
                        </div>
                        <div class="pb-4">
                            Bạn chưa có tài khoản ? <?= Html::a('Đăng Kí ', ['site/signup'],['class'=>'text-decoration-none'] ) ?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
