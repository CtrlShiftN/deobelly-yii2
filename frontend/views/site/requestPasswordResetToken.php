<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap5\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$imgUrl = Yii::$app->params['common']. "/media";
$this->title = Yii::t('app', 'Forgot password');
$this->params['breadcrumbs'][] = $this->title;
$config = ['template' => "{input}\n{error}\n{hint}"];
?>
<div class="pt-5">
    <div class="row border-radius mt-md-5 mt-0">
        <div class="col-6 d-md-block d-none bg-light border-radius bg-white">
            <div class="h-100 d-flex">
                <div class="align-self-center"><img src="<?= $imgUrl ?>/img-content-login.jpg" class="img-fluid"></div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="max-width mx-auto ">
                <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'form-floating']); ?>
                <div class="border-radius bg-light">
                    <div class="mx-4">
                        <div class="pt-5">
                            <h1 class="fw-bold text-primary text-center "><?= Html::encode($this->title) ?></h1>
                        </div>
                        <div class="my-4">
                            <p class="fs-5"><?= Yii::t('app','Please fill in your email. A link to reset the password will be sent there.') ?></p>
                        </div>
                        <?php if (Yii::$app->session->hasFlash('success')): ?>
                            <div class="alert alert-success my-3">
                                <h4><i class="icon fa fa-check"></i><?= Yii::t('app','Submitted Successfully !') ?></h4>
                                <?= Yii::$app->session->getFlash('success') ?>
                            </div>
                        <?php endif; ?>
                        <?php if (Yii::$app->session->hasFlash('error')): ?>
                            <div class="alert alert-danger my-3">
                                <h4><i class="fas fa-times"></i><?= Yii::t('app','Send Failed !') ?></h4>
                                <?= Yii::$app->session->getFlash('error') ?>
                            </div>
                        <?php endif; ?>
                        <?= $form->field($model,'email')
                            ->textInput(['type' => 'email','autofocus' => true,'class' => 'rounded-pill form-control'])
                            ->label(Yii::t('app','Enter email')) ?>
                        <?= Html::submitButton(Yii::t('app','Send'), ['class' => 'btn btn-primary rounded-pill fs-4 text-light w-100 mt-md-5 mt-3', 'name' => 'reset-button']) ?>
                        <div class="py-md-4 py-3 text-center">
                            <?= Html::a(Yii::t('app','Back to login page.'), ['site/login'], ['class' => 'text-decoration-none']) ?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>