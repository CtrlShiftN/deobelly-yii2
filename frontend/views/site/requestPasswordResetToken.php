<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = Yii::t('app', 'Forgot password');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss("
    ::placeholder {
        color: #4d4d4d !important;
    }

    input {
        background-color: rgba(256, 256, 256, 0.8) !important;
    }

    .invalid-feedback {
        padding-left: 17px;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }

    input:focus {
        box-shadow: none !important;
    }

    .bg-input-field {
        background-color: rgba(256, 256, 256, 0.3) !important;
    }
");
?>
<div class="pt-4 pt-md-5">
    <div class="row bg-transparent mt-md-5 mt-0 bg-input-field p-0">
        <div class="col-lg-7 d-lg-flex d-none p-0 bg-white h-100 align-items-center">
            <div id="carouselExampleIndicators" class="carousel slide d-lg-block d-none w-100" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= $imgUrl ?>/sale-banner.jpg" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= $imgUrl ?>/2-2-sale.jpg" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= $imgUrl ?>/3-3-sale.jpg" class="d-block w-100">
                    </div>
                </div>
            </div>
            <div class="h-100 d-flex d-lg-none">
                <div class="align-self-center"><img src="<?= $imgUrl ?>/img-content-login.jpg" class="img-fluid"></div>
            </div>
        </div>
        <div class="col-12 col-lg-5 px-xl-5 py-0 d-flex align-items-center">
            <div class="mx-md-4 my-md-3 py-md-4 px-3 w-100 text-center">
                <div class="mt-3 mb-4">
                    <h1 class="fw-bold text-center"><?= Html::encode($this->title) ?></h1>
                    <p><?= Yii::t('app', 'Please fill in your email. A link to reset the password will be sent there.') ?></p>
                </div>
                <?php if (Yii::$app->session->hasFlash('requestSuccess')): ?>
                    <div class="alert alert-success alert-dismissible fade show my-3">
                        <h4><i class="icon fa fa-check"></i> <?= Yii::t('app', 'Submitted Successfully !') ?></h4>
                        <?= Yii::t('app', Yii::$app->session->getFlash('requestSuccess')) ?>
                    </div>
                <?php endif; ?>
                <?php if (Yii::$app->session->hasFlash('requestError')): ?>
                    <div class="alert alert-danger alert-dismissible fade show my-3">
                        <h4><i class="fas fa-times"></i> <?= Yii::t('app', 'Send Failed !') ?></h4>
                        <?= Yii::t('app', Yii::$app->session->getFlash('requestError')) ?>
                    </div>
                <?php endif; ?>
                <?php $form = ActiveForm::begin(); ?>
                <div class="mt-3">
                    <?= $form->field($model, 'email')
                        ->textInput(['type' => 'email', 'class' => 'border-0 border-bottom rounded-0 form-control', 'placeholder' => Yii::t('app', 'Enter email')])
                        ->label(false) ?>
                </div>
                <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-primary rounded-pill fs-5 text-uppercase w-100 mt-3']) ?>
                <?php ActiveForm::end(); ?>
                <div class="my-3">
                    <?= Html::a(Yii::t('app', 'Back to login page.'), ['site/login'], ['class' => 'text-decoration-underline text-primary']) ?>
                </div>
            </div>
        </div>
    </div>
</div>