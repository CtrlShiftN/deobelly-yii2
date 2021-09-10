<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap5\ActiveForm */
/* @var $model \common\models\LoginForm */

use kartik\label\LabelInPlace;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
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
            <div class="max-width mx-auto ">
                <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'form-floating']); ?>
                <div class="border-radius bg-light">
                    <div class="mx-4">
                        <div class="pt-md-5 pt-3">
                            <h1 class="fw-bold text-primary text-center pb-3"><?= Html::encode($this->title) ?></h1>
                            <p class="my-md-4 my-2 fs-5"><?= Yii::t('app','Please enter your new password:') ?></p>
                        </div>
                        <?= $form->field($model, 'password', $config)->widget(LabelInPlace::classname(), [
                            'type' => LabelInPlace::TYPE_HTML5,
                            'label' => (Yii::t('app','Enter new password')),
                            'options' => ['type' => 'password', 'class' => 'form-control fs-5 border rounded-pill mt-md-4 mt-2'],
                            'encodeLabel' => false
                        ]); ?>
                        <?= $form->field($model, 'password_confirm', $config)->widget(LabelInPlace::classname(), [
                            'type' => LabelInPlace::TYPE_HTML5,
                            'label' => (Yii::t('app','Enter confirm-password')),
                            'options' => ['type' => 'password', 'class' => 'form-control fs-5 border rounded-pill mt-md-4 mt-2'],
                            'encodeLabel' => false
                        ]); ?>
                        <?= Html::submitButton(Yii::t('app','Change password'), ['class' => 'btn btn-primary rounded-pill text-light w-100 my-md-5 my-3', 'name' => 'signup-button']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>