<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Social */
/* @var $form yii\widgets\ActiveForm */
$this->registerCss('.help-block, .fill-red {color: red}');
$this->registerCss('.help-block {padding-left: 5px}');
?>

<div class="social-form container px-3 py-0">
    <?php $form = ActiveForm::begin(); ?>
        <div class="w-100 row px-0 mx-0">
            <div class="col-12 col-sm-4"><h4><?= Yii::t('app', 'Icon') ?> <sup
                            class="fill-red fs-6">(*)</sup></h4></div>
            <div class="col-12 col-sm-8">
                <?= $form->field($model, 'icon')->textInput(['placeholder' => 'Ex: <i class="nav-icon fas fa-globe"></i>'])->label(false) ?>
            </div>
        </div>
        <div class="w-100 row px-0 mx-0">
            <div class="col-12 col-sm-4"><h4><?= Yii::t('app', 'Link') ?> <sup
                            class="fill-red fs-6">(*)</sup></h4></div>
            <div class="col-12 col-sm-8">
                <?= $form->field($model, 'link')->textInput(['placeholder' => 'https://...'])->label(false) ?>
            </div>
        </div>
    <div class="form-group text-center">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success px-3 py-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
