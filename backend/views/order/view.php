<?php

use kartik\depdrop\DepDrop;
use kartik\detail\DetailView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */

$this->title = Yii::t('app', 'Orders') . ' DO' . $model->id;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <?php
    $columns = [
        [
            'attribute' => 'user_id',
            'value' => \backend\models\User::findNameByID($model->user_id),
            'displayOnly' => true,
        ],
        [
            'attribute' => 'name',
            'value' => $model->name,
        ],
        [
            'attribute' => 'email',
            'value' => $model->email,
        ],
        [
            'attribute' => 'tel',
            'value' => $model->tel,
        ],
        [
            'attribute' => 'product_id',
            'type' => DetailView::INPUT_SELECT2,
            'value' => \backend\models\Product::findNameByID($model->product_id),
            'widgetOptions' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Product::getAllProduct(), 'id', 'name'),
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Products') . ' --'],
                'pluginOptions' => ['allowClear' => true]
            ],
        ],
        [
            'attribute' => 'color_id',
            'type' => DetailView::INPUT_SELECT2,
            'value' => \backend\models\Color::findNameByID($model->color_id),
            'widgetOptions' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Color::getAllColor(), 'id', 'name'),
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Colors') . ' --'],
                'pluginOptions' => ['allowClear' => true]
            ],
        ],
        [
            'attribute' => 'size_id',
            'type' => DetailView::INPUT_SELECT2,
            'value' => \backend\models\Size::findNameByID($model->size_id),
            'widgetOptions' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Size::getAllSize(), 'id', 'name'),
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Colors') . ' --'],
                'pluginOptions' => ['allowClear' => true]
            ],
        ],
        [
            'attribute' => 'quantity',
            'value' => $model->quantity,
        ],
        [
            'attribute' => 'province_id',
            'value' => \backend\models\GeoLocation::findNameByID($model->province_id),
            'type' => DetailView::INPUT_SELECT2,
            'widgetOptions' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\GeoLocation::getAllProvince(), 'id', 'name'),
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Province') . ' --'],
                'pluginOptions' => ['allowClear' => true]
            ],
        ],
        [
            'attribute' => 'district_id',
            'value' => \backend\models\GeoLocation::findNameByID($model->district_id),
            'type' => DetailView::INPUT_DEPDROP,
            'widgetOptions' => [
                'type' => DepDrop::TYPE_SELECT2,
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\GeoLocation::getAllGeoLocation(), 'id', 'name'),
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'District') . ' --'],
                'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                'pluginOptions' => [
                    'depends' => ['order-province_id'],
                    'url' => Url::to(['/order/get-district']),
                    //'params'=>['input-type-1', 'input-type-2']
                ]
            ],
        ],
        [
            'attribute' => 'village_id',
            'value' => \backend\models\GeoLocation::findNameByID($model->village_id),
            'type' => DetailView::INPUT_DEPDROP,
            'widgetOptions' => [
                'type' => DepDrop::TYPE_SELECT2,
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\GeoLocation::getAllGeoLocation(), 'id', 'name'),
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Village') . ' --'],
                'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                'pluginOptions' => [
                    'depends' => ['order-district_id'],
                    'url' => Url::to(['/order/get-village']),
                ]
            ],
        ],
        [
            'attribute' => 'specific_address',
            'value' => $model->specific_address,
        ],
        [
            'attribute' => 'notes',
            'value' => $model->notes,
        ],
        [
            'attribute' => 'logistic_method',
            'type' => DetailView::INPUT_SELECT2,
            'value' => \common\models\Order::getLogisticMethod()[$model->logistic_method],
            'widgetOptions' => [
                'data' => \common\models\Order::getLogisticMethod(),
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Logistic Method') . ' --'],
                'pluginOptions' => ['allowClear' => true]
            ],
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
        'attributes' => $columns
    ]); ?>

</div>
