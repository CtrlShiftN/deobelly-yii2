<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \common\models\LoginForm */

use kartik\label\LabelInPlace;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . "\media";
$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
$config = ['template' => "{input}\n{error}\n{hint}"];
?>
<div class="pt-md-5">
    <div class="row bg-transparent mt-md-5 mt-0 border border-light p-0">
        <div class="col-6 col-md-6 d-md-block d-none p-0 bg-white">
            <div class="h-100 d-flex">
                <div class="align-self-center"><img src="<?= $imgUrl ?>/img-content-login.jpg" class="img-fluid"></div>
            </div>
        </div>
        <div class="col-12 col-md-6 px-xl-5 py-0">
            <div class="mx-md-4 my-md-3 py-4 px-3 ">
                <div class="mt-3 mb-4">
                    <h1 class="fw-bold text-light text-center m-0"><?= Html::encode($this->title) ?></h1>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <div class="mt-3">
                        <?= $form->field($model, 'email')
                            ->textInput(['autofocus' => true, 'class' => 'rounded-pill form-control p-3 text-light', 'placeholder' => Yii::t('app', 'Enter email')])
                            ->label(false) ?>
                    </div>
                    <div class="mt-3">
                        <?= $form->field($model, 'password')
                            ->textInput(['type' => 'password', 'class' => 'rounded-pill form-control p-3 text-light', 'placeholder' => Yii::t('app', 'Enter password')])
                            ->label(false) ?>
                    </div>
                    <?= $form->field($model, 'rememberMe')->checkbox(['class' => 'mt-3'])->label('Remember me', ['class' => 'text-light']) ?>
                    <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-light rounded-pill fs-5 text-uppercase w-100 mt-3']) ?>
                <?php ActiveForm::end(); ?>
                <div class="mt-3 text-light">
                    <?= Yii::t('app', 'You forgot password ?') ?>
                    <?= Html::a(Yii::t('app', 'Password retrieval'), ['/site/request-password-reset'], ['class' => 'text-decoration-underline text-primary one-line']) ?>
                </div>
                <div class="mb-3 text-light">
                    <?= Yii::t('app', 'You dont have an account ?') ?>
                    <?= Html::a(Yii::t('app', 'Signup'), ['/site/signup'], ['class' => 'text-decoration-underline text-primary one-line']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
