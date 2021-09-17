<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$imgUrl = Yii::$app->params['common']. "/media";
$this->title = Yii::t('app','Change password');
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
            <div class="mx-md-4 my-md-3 py-4 px-3">
                <div class="mt-3 mb-4">
                    <h1 class="fw-bold text-primary text-center m-0"><?= Html::encode($this->title) ?></h1>
                    <p class="my-md-4 my-2 fs-5"><?= Yii::t('app','Please enter your new password:') ?></p>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <div class="mt-3">
                        <?= $form->field($model,'password')
                            ->textInput(['type' => 'password','class' => 'rounded-pill form-control p-3 text-light', 'placeholder' => Yii::t('app','Enter new password')])
                            ->label(false) ?>
                    </div>
                    <div class="mt-3">
                        <?= $form->field($model,'password_confirm')
                            ->textInput(['type' => 'password','class' => 'rounded-pill form-control p-3 text-light', 'placeholder' => Yii::t('app','Confirm new password')])
                            ->label(false) ?>
                    </div>
                    <?= Html::submitButton(Yii::t('app', 'Reset password'), ['class' => 'btn btn-light rounded-pill fs-4 w-100 mt-3']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>