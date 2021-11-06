<?php

use kartik\detail\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Showroom */

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$arrStatus = [Yii::t('app', 'Inactive'), Yii::t('app', 'Active')];
$imgUrl = Yii::$app->params['common'] . '/media';
?>
<div class="showroom-view container p-3">

    <?php
    $columns = [
        [
            'attribute' => 'file',
            'type' => DetailView::INPUT_FILEINPUT,
            'label' => Yii::t('app', 'Image'),
            'value' => Html::img($imgUrl . '/' . $model->image, ['alt' => $model->name, 'class' => 'img-fluid']),
            'format' => 'raw'
        ],
        [
            'attribute' => 'name',
            'value' => (!empty($model->name)) ? $model->name : null,
        ],
        [
            'attribute' => 'address',
            'value' => (!empty($model->address)) ? $model->address : null,
        ],
        [
            'attribute' => 'tel',
            'value' => (!empty($model->tel)) ? $model->tel : null,
        ],
        [
            'attribute' => 'gps_link',
            'value' => (!empty($model->gps_link)) ? $model->gps_link : null,
        ],
        [
            'attribute' => 'status',
            'value' => (!empty($arrStatus[$model->status])) ? $arrStatus[$model->status] : null,
            'type' => DetailView::INPUT_SELECT2,
            'widgetOptions' => [
                'data' => $arrStatus,
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Status') . ' --'],
                'pluginOptions' => ['allowClear' => true]
            ],
        ],
        [
            'attribute' => 'created_at',
            'format' => 'datetime',
            'value' => (!empty($model->created_at)) ? $model->created_at : null,
            'displayOnly' => true
        ]
    ]
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'bordered' => true,
//        'enableEditMode' => false,
        'buttons1' => '{delete}',
        'hAlign' => DetailView::ALIGN_CENTER,
        'vAlign' => DetailView::ALIGN_MIDDLE,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => $this->title,
            'type' => DetailView::TYPE_INFO,
        ],
        'deleteOptions' => [
            'url' => \yii\helpers\Url::toRoute(['showroom/delete', 'id' => \common\components\encrypt\CryptHelper::encryptString($model->id)]),
            'params' => ['id' => \common\components\encrypt\CryptHelper::encryptString($model->id), 'kvdelete' => true],
        ],
        'attributes' => $columns
    ]); ?>

</div>
