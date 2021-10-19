<?php

use kartik\depdrop\DepDrop;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form container p-3">
    <h3 class="text-uppercase pb-4"><?= Yii::t('app', 'Add New Order') ?></h3>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($users, 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose a customer')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model,'tel')->textInput(['placeholder'=>Yii::t('app', '0397 742 291')]) ?>

    <?= $form->field($model, 'product_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($products, 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose a product')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'color_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($colors, 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose a color')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'size_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($sizes, 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose a size')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'quantity')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'province')->dropDownList($provinces, ['id' => 'province-id', 'prompt' => '- Select category -']) ?>

    <?= $form->field($model, 'district')->widget(DepDrop::classname(), [
        'options' => ['id' => 'district-id'],
        'pluginOptions' => [
            'depends' => ['province-id'],
            'placeholder' => 'Select...',
            'url' => Url::to(['/order/get-district'])
        ]
    ]); ?>

    <?= $form->field($model, 'village')->widget(DepDrop::classname(), [
        'options' => ['id' => 'village-id'],
        'pluginOptions' => [
            'depends' => ['district-id'],
            'placeholder' => 'Select...',
            'url' => Url::to(['/order/get-village'])
        ]
    ]); ?>

    <?= $form->field($model, 'specific_address')->textInput(['placeholder' => Yii::t('app', 'No 19, 29 alley, 460 lane, Khuong Dinh street')]) ?>

    <?= $form->field($model, 'notes')->widget(\yii\redactor\widgets\Redactor::class) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Add New Order'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
