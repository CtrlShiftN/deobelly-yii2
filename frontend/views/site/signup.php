<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use kartik\label\LabelInPlace;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$imgUrl = Yii::$app->params['common']. "/media";
$this->title = Yii::t('app', 'Signup');
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
                <div class=" border-radius bg-light">
                    <div class="mx-4">
                        <div class="pt-3">
                            <h1 class="fw-bold text-center text-primary"><?= Html::encode($this->title) ?></h1>
                        </div>
                        <?= $form->field($model, 'name', $config)->widget(LabelInPlace::classname(), [
                            'type' => LabelInPlace::TYPE_HTML5,
                            'label' => (Yii::t('app','Enter name')),
                            'options' => ['type' => 'text', 'class' => 'form-control border rounded-pill mt-md-5 mt-3'],
                            'encodeLabel' => false
                        ]); ?>
                        <?= $form->field($model, 'tel', $config)->widget(LabelInPlace::classname(), [
                            'type' => LabelInPlace::TYPE_HTML5,
                            'label' => (Yii::t('app','Enter phone number')),
                            'options' => ['type' => 'number', 'class' => 'form-control border rounded-pill mt-md-3 mt-2'],
                            'encodeLabel' => false
                        ]); ?>
                        <?= $form->field($model, 'email', $config)->widget(LabelInPlace::classname(), [
                            'type' => LabelInPlace::TYPE_HTML5,
                            'label' => (Yii::t('app','Enter email')),
                            'options' => ['type' => 'email', 'class' => 'form-control border rounded-pill mt-md-3 mt-2'],
                            'encodeLabel' => false
                        ]); ?>
                        <?= $form->field($model, 'password', $config)->widget(LabelInPlace::classname(), [
                            'type' => LabelInPlace::TYPE_HTML5,
                            'label' => (Yii::t('app','Enter password')),
                            'options' => ['type' => 'password', 'class' => 'form-control border rounded-pill mt-md-3 mt-2'],
                            'encodeLabel' => false
                        ]); ?>
                        <?= $form->field($model, 'password_confirm', $config)->widget(LabelInPlace::classname(), [
                            'type' => LabelInPlace::TYPE_HTML5,
                            'label' => (Yii::t('app','Enter confirm-password')),
                            'options' => ['type' => 'password', 'class' => 'form-control border rounded-pill mt-md-3 mt-2'],
                            'encodeLabel' => false
                        ]); ?>
                        <?= Html::submitButton(Yii::t('app','Signup'), ['class' => 'btn btn-primary rounded-pill text-light w-100', 'name' => 'signup-button']) ?>
                    </div>
                    <p class="text-center py-3"><?= Yii::t('app','You already have an account ?') ?> <?= Html::a(Yii::t('app','Login'), ['/login']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>