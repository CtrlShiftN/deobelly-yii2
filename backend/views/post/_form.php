<?php

use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */
/* @var $form yii\widgets\ActiveForm */
$this->registerCss("
.help-block{color: red}
")
?>

<div class="container posts-form p-3">
    <h3 class="text-uppercase pb-4"><?= Yii::t('app', 'Create new post') ?></h3>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => ['multiple' => false, 'accept' => 'image/*'],
        'pluginOptions' => ['previewFileType' => 'image', 'showUpload' => false]
    ])->label(Yii::t('app', 'Avatar'));
    ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($postTag, 'id', 'title'),
        'options' => ['placeholder' => Yii::t('app','Choose post tags')],
        'pluginOptions' => [
            'multiple' => true,
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'post_category_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($postCate, 'id', 'title'),
        'options' => ['placeholder' => Yii::t('app','Choose post category')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::class) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
