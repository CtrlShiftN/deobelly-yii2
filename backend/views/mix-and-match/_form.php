<?php

use kartik\file\FileInput;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MixAndMatch */
/* @var $form yii\widgets\ActiveForm */
$this->registerCss("
.help-block{color: red}
")
?>

<div class="mix-and-match-form container p-3">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => ['multiple' => false, 'accept' => 'image/*'],
        'pluginOptions' => ['previewFileType' => 'image', 'showUpload' => false]
    ])->label(Yii::t('app', 'Image'));
    ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Vest Autumn 2021 Collection')]) ?>

    <?= $form->field($model, 'mixProduct')->widget(Select2::classname(), [
        'data' => $products,
        'options' => ['placeholder' => Yii::t('app', 'Related Products')],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => true
        ],
    ]); ?>

    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::class) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Add New Collections'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
