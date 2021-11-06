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
$arrHide = [Yii::t('app', 'Visible'), Yii::t('app', 'Invisible')];
$arrFeature = [Yii::t('app', 'Featured'), Yii::t('app', 'Non-featured')];
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
            'attribute' => 'short_description',
            'value' => strip_tags($model->short_description),
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
            'value' => $trademark[$model->trademark_id],
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
