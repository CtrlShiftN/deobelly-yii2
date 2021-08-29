<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Đặt lại mật khẩu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xl-6"></div>
    <div class="col-12 col-xl-6 mt-md-5 mt-2">
        <div class="w-100">
            <div class="max-width mx-auto ">
                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', 'class' => 'form-floating ']); ?>
                <div class=" border-radius bg-light  border-radius">
                    <div class="mx-4">
                        <div class=" pt-md-5 pt-3">
                            <h1 class="fw-bold text-primary text-center "><?= Html::encode($this->title) ?></h1>
                        </div>
                        <div  class=" pt-md-5 pt-3">
                            <h4><p>Vui lòng điền vào email của bạn. Một liên kết để đặt lại mật khẩu sẽ được gửi đến đó.</p></h4>
                        </div>
                        <?= $form->field($model, 'email', ['options' => [
                            'class' => 'form-floating mt-5 '],
                            'inputOptions' => ['id' => 'floatingInputEmail', 'class' => 'form-control'],
                            'template' => "{input}\n<label for='floatingInputEmail'>Email</label>\n{error}"])->textInput(['autofocus' => true, 'class' => 'form-control w-100 border rounded-pill'])->label(false) ?>

                        <?= Html::submitButton('Gửi', ['class' => 'btn btn-primary rounded-pill fs-4 text-light w-100 mt-5', 'name' => 'reset-button']) ?>

                        <div class="py-md-4 py-2">
                            Bạn đã nhớ mật khẩu ? <?= Html::a('Đăng Nhập ', ['site/login'],['class'=>'text-decoration-none'] ) ?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
