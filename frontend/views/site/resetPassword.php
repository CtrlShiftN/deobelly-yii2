<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = Yii::t('app', 'Change password');
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
<div class="pt-4 pt-md-5">
    <div class="row bg-transparent mt-md-5 mt-0 p-0">
        <div class="col-lg-6 col-xl-7 d-lg-flex d-none">
        </div>
        <div class="col-12 col-lg-6 col-xl-5 py-0 d-flex align-items-center bg-input-field">
            <div class="mx-md-4 my-md-3 py-md-4 p-3 w-100 text-center">
                <div class="my-3">
                    <h4 class="text-center text-uppercase m-0 text-secondary line-title"><?= Html::encode($this->title) ?></h4>
                    <p class="my-md-4 my-2 fs-5"><?= Yii::t('app', 'Please enter your new password:') ?></p>
                </div>
                <?php $form = ActiveForm::begin(); ?>
                <div class="mt-3">
                    <?= $form->field($model, 'password')
                        ->textInput(['type' => 'password', 'class' => 'border-0 border-bottom rounded-0 form-control py-2', 'placeholder' => Yii::t('app', 'Enter new password')])
                        ->label(false) ?>
                </div>
                <div class="mt-3">
                    <?= $form->field($model, 'password_confirm')
                        ->textInput(['type' => 'password', 'class' => 'border-0 border-bottom rounded-0 form-control py-2', 'placeholder' => Yii::t('app', 'Confirm new password')])
                        ->label(false) ?>
                </div>
                <?= Html::submitButton(Yii::t('app', 'Reset password'), ['class' => 'btn btn-primary rounded-pill fs-4 w-100 mt-3']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>