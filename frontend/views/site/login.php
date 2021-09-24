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
    background-image: url('$imgUrl/bg-login-page.jpg');
    min-height: 100%;
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
}
");
?>
<div class="pt-4 pt-md-5">
    <div class="row bg-transparent mt-md-5 mt-0 p-0">
        <div class="col-lg-6 col-xl-7 d-lg-flex d-none">
        </div>
        <div class="col-12 col-lg-6 col-xl-5 px-xl-5 py-0 d-flex align-items-center bg-input-field">
            <div class="mx-md-4 my-md-3 py-md-4 p-3 w-100">
                <div class="border-bottom mb-3 pb-3">
                    <h1 class="fw-bold text-center m-0"><?= Html::encode($this->title) ?></h1>
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
                <?= $form->field($model, 'rememberMe')->checkbox(['class' => '']) ?>
                <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary rounded-pill fs-5 text-uppercase w-100']) ?>
                <?php ActiveForm::end(); ?>
                <div class="mt-3 text-center">
                    <span class="text-secondary"> &mdash; <?= Yii::t('app', 'You forgot password ?') ?>  &mdash;</span>
                    <?= Html::a(Yii::t('app', 'Password retrieval'), ['/site/request-password-reset'], ['class' => 'btn btn-outline-dark rounded-pill w-100']) ?>
                </div>
                <div class="my-3 text-center">
                    <span class="text-secondary"> &mdash; <?= Yii::t('app', 'You dont have an account ?') ?>  &mdash;</span>
                    <?= Html::a(Yii::t('app', 'Signup'), ['/site/signup'], ['class' => 'btn btn-outline-dark rounded-pill w-100']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
