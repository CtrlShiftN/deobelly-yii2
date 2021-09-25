<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \common\models\LoginForm */

use kartik\label\LabelInPlace;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile(Url::toRoute("/css/login.css"));
$this->registerCss("
#wrapper {
    background-image: url('$imgUrl/wp6447583.jpg');
    min-height: 100%;
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
}
");
?>
<div class="pt-sm-4 pt-md-5">
    <div class="row bg-transparent mt-md-5 mt-0 p-0">
        <div class="col-lg-6 col-xl-7 d-lg-flex d-none">
        </div>
        <div class="col-12 col-lg-6 col-xl-5 py-sm-0 py-4 d-flex align-items-center bg-input-field">
            <div class="mx-md-4 my-md-3 py-md-4 p-3 w-100">
                <div class="my-3">
                    <h4 class="text-center text-uppercase m-0 text-secondary line-title"><?= Yii::t('app','Login with') ?></h4>
                </div>
                <div class="row mx-0 my-3 p-0">
                    <div class="col-12 col-sm-4 m-0 p-1">
                        <a class="col-12 btn btn-primary py-2"><i class="fab fa-facebook-f"></i> Facebook</a>
                    </div>
                    <div class="col-12 col-sm-4 m-0 p-1">
                        <a class="col-12 btn btn-danger py-2"><i class="fab fa-google"></i> Google</a>
                    </div>
                    <div class="col-12 col-sm-4 m-0 p-1">
                        <a class="col-12 btn btn-success py-2"><i class="fas fa-phone"></i> Phone</a>
                    </div>
                </div>
                <div class="my-3">
                    <h4 class="text-center text-uppercase m-0 text-secondary line-title"><?= Yii::t('app','Or') ?></h4>
                </div>
                <?php $form = ActiveForm::begin(); ?>
                <div class="mt-3">
                    <?= $form->field($model, 'email')
                        ->textInput(['autofocus' => true, 'class' => 'border-0 border-bottom rounded-0 form-control', 'placeholder' => Yii::t('app', 'Enter email')])
                        ->label(false) ?>
                </div>
                <div class="mt-3">
                    <?= $form->field($model, 'password')
                        ->textInput(['type' => 'password', 'class' => 'border-0 border-bottom rounded-0 form-control', 'placeholder' => Yii::t('app', 'Enter password')])
                        ->label(false) ?>
                </div>
                <div class="row m-0 p-0 mt-3">
                    <div class="col-12 col-sm-6 m-0 p-0">
                        <?= $form->field($model, 'rememberMe')->checkbox(['class' => 'p-0']) ?>
                    </div>
                    <div class="col-12 col-sm-6 m-0 p-0 text-center text-md-end mb-3 mb-sm-0">
                        <?= Html::a(Yii::t('app', 'Forgot password?'), ['/site/request-password-reset'], ['class' => 'text-primary text-decoration-none w-100']) ?>
                    </div>
                </div>
                <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary rounded-pill fs-5 text-uppercase w-100 mt-3']) ?>
                <?php ActiveForm::end(); ?>

                <div class="my-3 text-center">
                    <span class="text-secondary"><?= Yii::t('app', 'You dont have an account ?') ?> <?= Html::a(Yii::t('app', 'Signup'), ['/site/signup'], ['class' => 'text-primary text-decoration-none']) ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.field-loginform-rememberme').removeClass('mb-3');
</script>