<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \common\models\LoginForm */

use kartik\label\LabelInPlace;
use yii\bootstrap5\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . "\media";
$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
$config = ['template' => "{input}\n{error}\n{hint}"];
?>
<div class="pt-5">
    <div class="row border-radius mt-md-5 mt-0">
        <div class="col-6 col-md-6 d-md-block d-none border-radius bg-white">
            <div class="h-100 d-flex">
                <div class="align-self-center"><img src="<?= Url::toRoute('img/img-content-login.jpg') ?>" class="img-fluid"></div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="mx-md-4 my-md-3 border-radius bg-light py-4 px-3">
                <div class="mt-3 mb-4">
                    <h1 class="fw-bold text-primary text-center m-0"><?= Html::encode($this->title) ?></h1>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <div class="mt-3">
                        <?= $form->field($model, 'email')
                            ->textInput(['autofocus' => true, 'class' => 'rounded-pill form-control'])
                            ->label(Yii::t('app', 'Enter email')) ?>
                    </div>
                    <div class="mt-3">
                        <?= $form->field($model, 'password')
                            ->textInput(['type' => 'password', 'class' => 'rounded-pill form-control'])
                            ->label(Yii::t('app', 'Enter password')) ?>
                    </div>
                    <?= $form->field($model, 'rememberMe')->checkbox(['class' => 'mt-3']) ?>
                    <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary rounded-pill fs-4 text-light w-100 mt-3', 'name' => 'login-button']) ?>
                    <div class="mt-3">
                        <?= Yii::t('app', 'You forgot password ?') ?>
                        <?= Html::a(Yii::t('app', 'Password retrieval'), ['/request-password-reset'], ['class' => 'text-decoration-none one-line']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
                <div class="mb-3">
                    <?= Yii::t('app', 'You dont have an account ?') ?>
                    <?= Html::a(Yii::t('app', 'Signup'), ['/signup'], ['class' => 'text-decoration-none one-line']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
