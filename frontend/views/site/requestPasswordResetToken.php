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
            <div class="mx-md-4 my-md-3 py-md-4 p-3 w-100 text-center">
                <div class="border-bottom mb-3 pb-3">
                    <h1 class="fw-bold text-center"><?= Html::encode($this->title) ?></h1>
                    <p><?= Yii::t('app', 'Please fill in your email. A link to reset the password will be sent there.') ?></p>
                </div>
                <?php $form = ActiveForm::begin(); ?>
                <div class="mt-3">
                    <?= $form->field($model, 'email')
                        ->textInput(['type' => 'email', 'class' => 'border-0 border-bottom rounded-0 form-control', 'placeholder' => Yii::t('app', 'Enter email')])
                        ->label(false) ?>
                </div>
                <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-primary rounded-pill fs-5 text-uppercase w-100 mt-3']) ?>
                <?php ActiveForm::end(); ?>
                <div class="my-3">
                    <?= Html::a(Yii::t('app', 'Back to login page.'), ['site/login'], ['class' => 'btn btn-outline-dark rounded-pill w-100']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    <?php if (Yii::$app->session->hasFlash('requestSuccess')): ?>
    alert('<?= Yii::t('app', 'Submitted Successfully !') . Yii::t('app', Yii::$app->session->getFlash('requestSuccess')) ?>');
    <?php endif; ?>
    <?php if (Yii::$app->session->hasFlash('requestError')): ?>
    alert('<?= Yii::t('app', 'Send Failed !') . Yii::t('app', Yii::$app->session->getFlash('requestError')) ?>');
    <?php endif; ?>
</script>