<?php

use kartik\file\FileInput;
use kartik\form\ActiveField;
use kartik\form\ActiveForm;
use kartik\money\MaskMoney;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t('app', 'Add New Product');
$arrProductType = ArrayHelper::map($type, 'id', 'name');
$type = \common\components\helpers\SystemArrayHelper::removeElementAt($arrProductType, \common\components\SystemConstant::PRODUCT_TYPE_NEW);
?>

<div class="product-form container p-3">
    <h3 class="text-uppercase pb-4"><?= Yii::t('app', 'Add New Product') ?></h3>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-12 col-md-3 pe-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Enter product name')]) ?>
            <?= $form->field($model, 'SKU', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Enter product sku')])->hint(Yii::t('app', 'A stock-keeping unit (SKU) is a scannable bar code, most often seen printed on product labels in a retail store')) ?>
            <?= $form->field($model, 'cost_price')->widget(MaskMoney::classname(), [
                'pluginOptions' => [
                    'prefix' => 'VND ',
                    'suffix' => ' đ',
                    'affixesStay' => true,
                    'thousands' => ',',
                    'decimal' => '.',
                    'precision' => 0,
                    'allowZero' => false,
                    'allowNegative' => false,
                ]
            ]) ?>
            <?= $form->field($model, 'regular_price')->widget(MaskMoney::classname(), [
                'pluginOptions' => [
                    'prefix' => 'VND ',
                    'suffix' => ' đ',
                    'affixesStay' => true,
                    'thousands' => ',',
                    'decimal' => '.',
                    'precision' => 0,
                    'allowZero' => false,
                    'allowNegative' => false,
                ]
            ]) ?>
            <?= $form->field($model, 'sale_price')->widget(MaskMoney::classname(), [
                'pluginOptions' => [
                    'prefix' => 'VND ',
                    'suffix' => ' đ',
                    'affixesStay' => true,
                    'thousands' => ',',
                    'decimal' => '.',
                    'precision' => 0,
                    'allowZero' => false,
                    'allowNegative' => false,
                ]
            ]) ?>
            <?= $form->field($model, 'color')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map($color, 'id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Choose color')],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => true,
                ],
            ]) ?>
            <?= $form->field($model, 'size')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map($size, 'id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Choose size')],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => true,
                ],
            ]) ?>
            <?= $form->field($model, 'trademark_id')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map($trademark, 'id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Choose trademark')],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]) ?>
            <?= $form->field($model, 'quantity')->textInput(['type' => 'number']) ?>
            <?= $form->field($model, 'type')->widget(Select2::classname(), [
                'data' => $type,
                'options' => ['placeholder' => Yii::t('app', 'Choose product type')],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => true
                ],
            ]) ?>
            <?= $form->field($model, 'category')->widget(Select2::classname(), [
                'data' => ArrayHelper::map($productCate, 'id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Choose product category')],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]) ?>
        </div>
        <div class="col-12 col-md-9 border-start ps-3">
            <?= $form->field($model, 'file')->widget(FileInput::classname(), [
                'options' => ['multiple' => false, 'accept' => 'image/*'],
                'pluginOptions' => ['previewFileType' => 'image', 'showUpload' => false]
            ])->label(Yii::t('app', 'Image')); ?>
            <?= $form->field($model, 'files')->widget(FileInput::classname(), [
                'options' => ['multiple' => true],
                'pluginOptions' => ['previewFileType' => 'image', 'showUpload' => false, 'maxFileCount' => 10]
            ])->label(Yii::t('app', 'Related Images')); ?>
            <?= $form->field($model, 'description')->widget(\yii\redactor\widgets\Redactor::class) ?>
            <div class="row">
                <div class="col-12 col-md-6">
                    <?= $form->field($model, 'relatedProduct')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map($products, 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Choose related product')],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'multiple' => true
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Add New Product'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
