<?php

/* @var $this yii\web\View */

use kartik\depdrop\DepDrop;
use kartik\form\ActiveForm;
use kartik\label\LabelInPlace;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Payment');
$this->params['breadcrumbs'][] = $this->title;
$cdnUrl = Yii::$app->params['frontend'];
$imgUrl = Yii::$app->params['common'] . "/media";
?>
<div class="w-100 mx-0 fs-4 pb-2 pt-3 my-2 my-lg-3 border-bottom text-uppercase px-2"><span
            class="fw-bold d-inline-block fs-2">DE-OBELY</span> / <?= Yii::t('app', 'Payment') ?>
</div>

<div class="w-100 row mx-0 px-2 px-md-4">
    <div class="col-12 col-md-6 px-2">
        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

        <?= $form->field($model, 'province_id')->dropDownList($provinces, ['id' => 'province-id', 'prompt' => Yii::t('app', '- Choose province/city -')])->label(Yii::t('app','Province')) ?>

        <?= $form->field($model, 'district_id')->widget(DepDrop::classname(), [
            'options' => ['id' => 'district-id'],
            'pluginOptions' => [
                'depends' => ['province-id'],
                'placeholder' => Yii::t('app', '- Choose district -'),
                'url' => Url::to(['/checkout/get-district'])
            ]
        ])->label(Yii::t('app','District')); ?>

        <?= $form->field($model, 'village_id')->widget(DepDrop::classname(), [
            'options' => ['id' => 'village-id'],
            'pluginOptions' => [
                'depends' => ['district-id'],
                'placeholder' => Yii::t('app', '- Choose village/ward -'),
                'url' => Url::to(['/checkout/get-village'])
            ]
        ])->label(Yii::t('app','Village')); ?>
        <?= $form->field($model, 'specific_address')->textarea(['rows' => 3])->label(Yii::t('app', 'Specific Address')) ?>
        <div class="form-group mt-2 mt-md-3">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-dark p-2 col-12 rounded-pill', 'name' => 'contact-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-12 col-md-6 px-2">

    </div>
</div>







