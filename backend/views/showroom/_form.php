<?php

use kartik\file\FileInput;
use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Showroom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="showroom-form container p-3">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => ['multiple' => false, 'accept' => 'image/*'],
        'pluginOptions' => ['previewFileType' => 'image', 'showUpload' => false]
    ])->label(Yii::t('app', 'Avatar'));
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=>'Showroom Hà Nội']) ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true, 'placeholder'=>'Số AAA, đường BBB, phường CCC, quận DDD, Hà Nội']) ?>
    <?= $form->field($model, 'tel')->textInput(['maxlength' => true, 'placeholder'=>'0365113xxx']) ?>
    <?= $form->field($model, 'gps_link')->textInput(['maxlength' => true, 'placeholder'=>'Nhập vào link GG Map đến địa chỉ cửa hàng']) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
