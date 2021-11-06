<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TailorMadeOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tailor-made-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'neck')->textInput() ?>

    <?= $form->field($model, 'shoulder')->textInput() ?>

    <?= $form->field($model, 'chest')->textInput() ?>

    <?= $form->field($model, 'arm')->textInput() ?>

    <?= $form->field($model, 'waist')->textInput() ?>

    <?= $form->field($model, 'wrist')->textInput() ?>

    <?= $form->field($model, 'waist_to_floor')->textInput() ?>

    <?= $form->field($model, 'waist_to_knee')->textInput() ?>

    <?= $form->field($model, 'ankle')->textInput() ?>

    <?= $form->field($model, 'hip')->textInput() ?>

    <?= $form->field($model, 'buttock')->textInput() ?>

    <?= $form->field($model, 'knee')->textInput() ?>

    <?= $form->field($model, 'thigh')->textInput() ?>

    <?= $form->field($model, 'biceps')->textInput() ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'admin_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
