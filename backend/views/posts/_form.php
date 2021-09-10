<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Posts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container posts-form p-3">
    <h3 class="text-uppercase pb-4"><?= Yii::t('app', 'Create new post category') ?></h3>
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tag_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'blog_category_id')->textInput() ?>

    <div class="row pb-3">
        <div class="col-12 col-sm-2 col-md-3 col-lg-3"><h4><?= Yii::t('app', 'Avatar') ?> <sup
                        class="fill-red fs-6">(*)</sup></h4></div>
        <div class="col-12 col-sm-6 col-md-5 col-lg-6">
            <?= $form->field($model, 'avatarImage')->fileInput()->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
