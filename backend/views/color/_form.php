<?php

use kartik\color\ColorInput;
use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Color */
/* @var $form yii\widgets\ActiveForm */
$this->registerCss('.help-block, .fill-red {color: red}');
$this->registerCss('.help-block {padding-left: 5px}');
?>

<div class="color-form container p-3">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row pb-3">
        <div class="col-12 col-sm-4 col-md-4 col-lg-4"><h4><?= Yii::t('app', 'Title') ?> <sup
                        class="fill-red fs-6">(*)</sup></h4></div>
        <div class="col-12 col-sm-6 col-md-5 col-lg-6">
            <?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('app', 'Black')])->label(false) ?>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-12 col-sm-4 col-md-4 col-lg-4"><h4><?= Yii::t('app', 'Color Code') ?> <sup
                        class="fill-red fs-6">(*)</sup></h4></div>
        <div class="col-12 col-sm-6 col-md-5 col-lg-6">
            <?= $form->field($model, 'color_code')->widget(ColorInput::classname(), [
                'options' => ['placeholder' => Yii::t('app', 'Select color ...')],
            ])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Add New Color'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
