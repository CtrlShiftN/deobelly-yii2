<?php

use kartik\color\ColorInput;
use kartik\file\FileInput;
use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Color */
/* @var $form yii\widgets\ActiveForm */
$this->registerCss('.help-block, .fill-red {color: red}');
$this->registerCss('.help-block {padding-left: 5px}');
?>

<div class="color-form container p-3">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => ['multiple' => false, 'accept' => 'image/*'],
        'pluginOptions' => ['previewFileType' => 'image', 'showUpload' => false]
    ])->label(Yii::t('app', 'Image')); ?>
    <?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('app', 'Black')]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Add New Color'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
