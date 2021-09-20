<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = Yii::t('app', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
$config = ['template' => "{input}\n{error}\n{hint}"];
?>
<div class="pt-md-5">
    <div class="row bg-transparent mt-md-5 mt-0 bg-input-field p-0">
        <div class="col-lg-6 d-lg-block d-none p-0 bg-white">
            <div class="h-100 d-flex">
                <div class="align-self-center"><img src="<?= $imgUrl ?>/img-content-login.jpg" class="img-fluid"></div>
            </div>
        </div>
        <div class="col-12 col-lg-6 px-xl-5 py-0">
            <div class="mx-md-4 my-md-3 py-md-4 px-3">
                <div class="mt-3 mb-4">
                    <h1 class="fw-bold text-light text-center m-0"><?= Html::encode($this->title) ?></h1>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="mt-2">
                    <?= $form->field($model, 'name')
                        ->textInput(['autofocus' => true, 'class' => 'rounded-pill form-control p-3 text-light', 'placeholder' => Yii::t('app', 'Enter first and last name')])->label(false)
                    ?>
                </div>
                <div class="mt-2">
                    <?= $form->field($model, 'tel')
                        ->textInput(['type' => 'number', 'class' => 'rounded-pill form-control p-3 text-light', 'placeholder' => Yii::t('app', 'Enter phone number')])->label(false) ?>
                </div>
                <div class="mt-2">
                    <?= $form->field($model, 'email')
                        ->textInput(['type' => 'email', 'class' => 'rounded-pill form-control p-3 text-light', 'placeholder' => Yii::t('app', 'Enter email')])
                        ->label(false) ?>
                </div>
                <div class="mt-2">
                    <?= $form->field($model, 'password')
                        ->textInput(['type' => 'password', 'class' => 'rounded-pill form-control p-3 text-light', 'placeholder' => Yii::t('app', 'Enter password')])
                        ->label(false) ?>
                </div>
                <div class="my-2">
                    <?= $form->field($model, 'password_confirm')
                        ->textInput(['type' => 'password', 'class' => 'rounded-pill form-control p-3 text-light', 'placeholder' => Yii::t('app', 'Confirm password')])
                        ->label(false) ?>
                </div>
                <?= Html::submitButton(Yii::t('app', 'Register'), ['class' => 'btn btn-light rounded-pill fs-5 text-uppercase w-100 mt-3']) ?>
                <?php ActiveForm::end(); ?>
                <div class="my-3 text-light">
                    <?= Yii::t('app', 'You already have an account ?') ?> <?= Html::a(Yii::t('app', 'Login'), ['/site/login'], ['class' => 'text-decoration-underline text-primary']) ?>
                </div>
            </div>
        </div>
    </div>
</div>