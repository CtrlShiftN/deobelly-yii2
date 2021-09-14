<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap5\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$imgUrl = Yii::$app->params['common']. "/media";
$this->title = Yii::t('app','Change password');
$this->params['breadcrumbs'][] = $this->title;
$config = ['template' => "{input}\n{error}\n{hint}"];
?>
<div class="pt-5">
    <div class="row border-radius mt-md-5 mt-0">
        <div class="col-6 col-md-6 d-md-block d-none bg-light border-radius bg-white">
            <div class="h-100 d-flex">
                <div class="align-self-center"><img src="<?= $imgUrl ?>/img-content-login.jpg" class="img-fluid"></div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="mx-md-4 my-md-3 border-radius bg-light py-4 px-3">
                <div class="mt-3 mb-4">
                    <h1 class="fw-bold text-primary text-center m-0"><?= Html::encode($this->title) ?></h1>
                    <p class="my-md-4 my-2 fs-5"><?= Yii::t('app','Please enter your new password:') ?></p>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <div class="mt-3">
                        <?= $form->field($model,'password')
                            ->textInput(['type' => 'password','class' => 'rounded-pill form-control'])
                            ->label(Yii::t('app','Enter new password')) ?>
                    </div>
                    <div class="mt-3">
                        <?= $form->field($model,'password_confirm')
                            ->textInput(['type' => 'password','class' => 'rounded-pill form-control'])
                            ->label(Yii::t('app','Enter confirm password')) ?>
                    </div>
                    <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary rounded-pill fs-4 text-light w-100 mt-3', 'name' => 'login-button']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>