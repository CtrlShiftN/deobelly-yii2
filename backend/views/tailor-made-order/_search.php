<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TailorMadeOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tailor-made-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'customer_name') ?>

    <?= $form->field($model, 'customer_tel') ?>

    <?= $form->field($model, 'customer_email') ?>

    <?php // echo $form->field($model, 'body_image') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'neck') ?>

    <?php // echo $form->field($model, 'shoulder') ?>

    <?php // echo $form->field($model, 'chest') ?>

    <?php // echo $form->field($model, 'arm') ?>

    <?php // echo $form->field($model, 'waist') ?>

    <?php // echo $form->field($model, 'wrist') ?>

    <?php // echo $form->field($model, 'waist_to_floor') ?>

    <?php // echo $form->field($model, 'waist_to_knee') ?>

    <?php // echo $form->field($model, 'ankle') ?>

    <?php // echo $form->field($model, 'hip') ?>

    <?php // echo $form->field($model, 'buttock') ?>

    <?php // echo $form->field($model, 'knee') ?>

    <?php // echo $form->field($model, 'thigh') ?>

    <?php // echo $form->field($model, 'biceps') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'admin_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
