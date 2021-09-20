<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \frontend\models\ResetPasswordForm */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = Yii::t('app', 'Resend verification email');
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
                <div class="mt-3 mb-4 text-light">
                    <h1><?= Html::encode($this->title) ?></h1>
                    <p class="text-light"><?= Yii::t('app', 'Please fill out your email. A verification email will be sent there.') ?></p>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>
                <div class="my-3">
                    <?= $form->field($model, 'email')
                        ->textInput(['type' => 'email', 'class' => 'rounded-pill form-control p-3 text-light', 'placeholder' => Yii::t('app', 'Enter new password')])
                        ->label(false) ?>
                </div>
                <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-light rounded-pill fs-4 w-100 mt-3']) ?>
                <?php ActiveForm::end(); ?>
                <div class="my-3 text-light">
                    <?= Html::a(Yii::t('app', 'Back to login page.'), ['site/login'], ['class' => 'text-decoration-underline text-primary']) ?>
                </div>
            </div>
        </div>
    </div>
</div>