<?php

use kartik\detail\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Trademark */

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$arrStatus = [Yii::t('app', 'Inactive'), Yii::t('app', 'Active')];
?>
<div class="trademark-view container p-3">
    <?php
    $columns = [
        [
            'attribute' => 'name',
            'value' => $model->name,
        ],
        [
            'attribute' => 'slug',
            'value' => $model->slug,
            'displayOnly' => true
        ],
        [
            'attribute' => 'status',
            'value' => $arrStatus[$model->status],
            'type' => DetailView::INPUT_SELECT2,
            'widgetOptions' => [
                'data' => $arrStatus,
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Status') . ' --'],
                'pluginOptions' => ['allowClear' => true]
            ],
        ],
        [
            'attribute' => 'created_at',
            'value' => $model->created_at,
            'displayOnly' => true
        ]
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
            'url' => \yii\helpers\Url::toRoute(['trademark/delete', 'id' => \common\components\encrypt\CryptHelper::encryptString($model->id)]),
            'params' => ['id' => \common\components\encrypt\CryptHelper::encryptString($model->id), 'kvdelete' => true],
        ],
        'attributes' => $columns
    ]); ?>

</div>
