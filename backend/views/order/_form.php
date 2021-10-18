<?php

use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form container p-3">
    <h3 class="text-uppercase pb-4"><?= Yii::t('app', 'Add New Order') ?></h3>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Enter post title')]) ?>

    <?= $form->field($model, 'tags')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($postTag, 'id', 'title'),
        'options' => ['placeholder' => Yii::t('app', 'Choose post tags')],
        'pluginOptions' => [
            'multiple' => true,
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'post_category_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($postCate, 'id', 'title'),
        'options' => ['placeholder' => Yii::t('app', 'Choose post category')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::class) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Create new post'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
