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
                        </div>
                        <?= $form->field($model, 'email', $config)->widget(LabelInPlace::classname(),[
                            'type' => LabelInPlace::TYPE_HTML5,
                            'label'=>'Nhập email',
                            'options' => ['type' => 'email', 'class'=>'form-control fs-5 border rounded-pill mt-5'],
                            'encodeLabel'=> false
                        ]); ?>

                        <?= $form->field($model, 'password', $config)->widget(LabelInPlace::classname(),[
                            'type' => LabelInPlace::TYPE_HTML5,
                            'label'=>'Nhập mật khẩu',
                            'options' => ['type' => 'password', 'class'=>'form-control fs-5 border rounded-pill mt-4'],
                            'encodeLabel'=> false
                        ]); ?>
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary rounded-pill fs-4 text-light w-100 mt-4','name' => 'login-button']) ?>
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