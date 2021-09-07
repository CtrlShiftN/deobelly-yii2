<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap5\ActiveForm */
/* @var $model \common\models\LoginForm */

use kartik\label\LabelInPlace;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$imgUrl = Yii::getAlias('@common'). "/media";
$this->title = 'Quên mật khẩu';
$this->params['breadcrumbs'][] = $this->title;
$config = ['template' => "{input}\n{error}\n{hint}"];
?>
<div class="pt-5">
    <div class="row border-radius mt-md-5 mt-0">
        <div class="col-6 d-md-block d-none bg-light border-radius bg-white">
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
                            <h1 class="fw-bold text-primary text-center "><?= Html::encode($this->title) ?></h1>
                        </div>
                        <div class=" pt-md-5 pt-3">
                            <p class="fs-5">Vui lòng điền vào email của bạn. Một liên kết để đặt lại mật khẩu sẽ được
                                gửi đến đó.</p>
                        </div>
                        <?= $form->field($model, 'email', $config)->widget(LabelInPlace::classname(), [
                            'type' => LabelInPlace::TYPE_HTML5,
                            'label' => '<span class="ms-2">Nhập email</span>',
                            'options' => ['type' => 'email', 'autofocus' => true, 'class' => 'form-control border rounded-pill mt-md-4 mt-2'],
                            'encodeLabel' => false
                        ]); ?>
                        <?= Html::submitButton('Gửi', ['class' => 'btn btn-primary rounded-pill fs-4 text-light w-100 mt-md-4 mt-2', 'name' => 'reset-button']) ?>
                        <div class="py-md-4 py-2">
                            Bạn đã nhớ mật khẩu
                            ? <?= Html::a('Đăng Nhập ', ['site/login'], ['class' => 'text-decoration-none']) ?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>