<?php

use kartik\detail\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$imgUrl = Yii::$app->params['common'] . '/media';
$arrStatus = [Yii::t('app', 'Inactive'), Yii::t('app', 'Active')];
$arrHide = [Yii::t('app', 'Show'), Yii::t('app', 'Hide')];
$arrFeature = [Yii::t('app', 'Featured'), Yii::t('app', 'Non-featured')];
$modelColor = $model['color'];
$modelSize = $model['size'];
$modelType = $model['type'];
$modelCate = $model['category'];
?>
<div class="product-view py-4">
    <?php
    $columns = [
        [
            'attribute' => 'file',
            'type' => DetailView::INPUT_FILEINPUT,
            'label' => Yii::t('app', 'Image'),
            'value' => Html::img($imgUrl . '/' . $model->image, ['alt' => $model->name]),
            'format' => 'raw'
        ],
        [
            'attribute' => 'name',
            'value' => $model->name,
        ],
        [
            'attribute' => 'SKU',
            'value' => $model->SKU,
        ],
        [
            'attribute' => 'color',
            'value' => function ($model) use ($color, $modelColor) {
                $html = '';
                $arrColors = explode(',', $modelColor);
                foreach ($arrColors as $key => $colors) {
                    $html .= '<div class="badge badge-info me-3 p-2">' . $color[$colors] . '</div>';
                }
                return $html;
            },
            'type' => DetailView::INPUT_SELECT2,
            'widgetOptions' => [
                'data' => $color,
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Color') . ' --'],
                'pluginOptions' => ['allowClear' => true, 'multiple' => true]
            ],
            'format' => 'raw'
        ],
        [
            'attribute' => 'size',
            'value' => function ($model) use ($size, $modelSize) {
                $html = '';
                $arrSize = explode(',', $modelSize);
                foreach ($arrSize as $key => $sizes) {
                    $html .= '<div class="badge badge-info me-3 p-2">' . $size[$sizes] . '</div>';
                }
                return $html;
            },
            'type' => DetailView::INPUT_SELECT2,
            'widgetOptions' => [
                'data' => $size,
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Size') . ' --'],
                'pluginOptions' => ['allowClear' => true, 'multiple' => true]
            ],
            'format' => 'raw'
        ],
        [
            'attribute' => 'type',
            'value' => function ($model) use ($type, $modelType) {
                $html = '';
                $arrType = explode(',', $modelType);
                foreach ($arrType as $key => $types) {
                    $html .= '<div class="badge badge-info me-3 p-2">' . $type[$types] . '</div>';
                }
                return $html;
            },
            'type' => DetailView::INPUT_SELECT2,
            'widgetOptions' => [
                'data' => $type,
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Product Types') . ' --'],
                'pluginOptions' => ['allowClear' => true, 'multiple' => true]
            ],
            'format' => 'raw'
        ],
        [
            'attribute' => 'short_description',
            'value' => strip_tags($model->short_description),
            'type' => 'widget',
            'widgetOptions' => ['class' => \yii\redactor\widgets\Redactor::class],
            'format' => 'raw'
        ],
        [
            'attribute' => 'description',
            'value' => $model->description,
            'type' => 'widget',
            'widgetOptions' => ['class' => \yii\redactor\widgets\Redactor::class],
//            'displayOnly' => true,
            'format' => 'raw'
        ],
        [
            'attribute' => 'regular_price',
            'value' => $model->regular_price,
        ],
        [
            'attribute' => 'discount',
            'value' => $model->discount,
        ],
        [
            'attribute' => 'quantity',
            'value' => $model->quantity,
        ],
        [
            'attribute' => 'trademark_id',
            'type' => DetailView::INPUT_SELECT2,
            'value' => $trademark[$model->trademark_id],
            'widgetOptions' => [
                'data' => $trademark,
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Trademark') . ' --'],
                'pluginOptions' => ['allowClear' => true]
            ],
        ],
        [
            'attribute' => 'hide',
            'type' => DetailView::INPUT_SELECT2,
            'value' => $arrHide[$model->hide],
            'widgetOptions' => [
                'data' => $arrHide,
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Visibility') . ' --'],
                'pluginOptions' => ['allowClear' => true]
            ],
            'format' => 'raw'
        ],
        [
            'attribute' => 'is_feature',
            'value' => $arrFeature[$model->is_feature],
            'type' => DetailView::INPUT_SELECT2,
            'widgetOptions' => [
                'data' => $arrFeature,
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Is featured?') . ' --'],
                'pluginOptions' => ['allowClear' => true]
            ],
        ],
        [
            'attribute' => 'created_at',
            'value' => $model->created_at,
            'displayOnly' => true,
        ],
    ]
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'bordered' => true,
        'hAlign' => DetailView::ALIGN_CENTER,
        'vAlign' => DetailView::ALIGN_MIDDLE,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => $this->title,
            'type' => DetailView::TYPE_INFO,
        ],
        'deleteOptions' => [
            'url' => \yii\helpers\Url::toRoute(['product/delete', 'id' => \common\components\encrypt\CryptHelper::encryptString($model->id)]),
            'params' => ['id' => \common\components\encrypt\CryptHelper::encryptString($model->id), 'kvdelete' => true],
        ],
        'attributes' => $columns
    ]); ?>

</div>
