<?php

/* @var $this yii\web\View */
use kartik\form\ActiveForm;
use kartik\label\LabelInPlace;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Payment');
$this->params['breadcrumbs'][] = $this->title;
$cdnUrl = Yii::$app->params['frontend'];
$imgUrl = Yii::$app->params['common'] . "/media";
?>
<div class="w-100 mx-0 fs-4 pb-2 pt-3 my-2 my-lg-3 border-bottom text-uppercase px-2"><span
            class="fw-bold d-inline-block fs-2">DE-OBELY</span> / <?= Yii::t('app', 'Payment') ?>
</div>
<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
<?= $form->field($model, 'quantity')->textInput(['autofocus' => true, 'class' => 'rounded-pill form-control'])->label(Yii::t('app', 'Name'), ['class' => 'fw-bold fs-5 px-3']) ?>


<?= $form->field($model, 'address')->textarea(['rows' => 5])->label(Yii::t('app', 'Content'), ['class' => 'fw-bold fs-5 px-3']) ?>

<?php
    echo $form->field($model, 'province_id')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']);?>
<div class="form-group mt-2 mt-md-3">
    <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-dark p-2 col-12 rounded-pill', 'name' => 'contact-button']) ?>
</div>
<?php ActiveForm::end(); ?>
