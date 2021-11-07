<?php

use kartik\detail\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TailorMadeOrder */

$this->title = Yii::t('app', 'Get a Tailor-made') . ' No. ' . $model->id;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$imgUrl = Yii::$app->params['common'] . '/media';
$arrStatus = [Yii::t('app', 'Inactive'), Yii::t('app', 'Active')];
?>
<div class="tailor-made-order-view p-4">
    <?php
    $columns = [
        [
            'attribute' => 'file',
            'type' => DetailView::INPUT_FILEINPUT,
            'label' => Yii::t('app', 'Body Image'),
            'value' => Html::img($imgUrl . '/' . $model->body_image, ['alt' => $model->customer_name, 'class' => 'img-fluid']),
            'format' => 'raw'
        ],
        [
            'attribute' => 'user_id',
            'value' => (!empty($users[$model->user_id])) ? $users[$model->user_id] : null,
            'type' => DetailView::INPUT_SELECT2,
            'widgetOptions' => [
                'data' => $users,
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Accounts') . ' --'],
                'pluginOptions' => ['allowClear' => true]
            ],
        ],
        [
            'attribute' => 'customer_name',
            'value' => (!empty($model->customer_name)) ? $model->customer_name : null,
        ],
        [
            'attribute' => 'customer_tel',
            'value' => (!empty($model->customer_tel)) ? $model->customer_tel : null,
        ],
        [
            'attribute' => 'customer_email',
            'value' => (!empty($model->customer_email)) ? $model->customer_email : null,
        ],
        [
            'attribute' => 'type',
            'label' => Yii::t('app', 'Tailor-made Types'),
            'value' => (!empty($types[$model->type])) ? $types[$model->type] : null,
            'type' => DetailView::INPUT_SELECT2,
            'widgetOptions' => [
                'data' => $types,
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Tailor-made Types') . ' --'],
                'pluginOptions' => ['allowClear' => true]
            ],
        ],
        [
            'attribute' => 'height',
            'value' => (!empty($model->height)) ? $model->height : null,
        ],
        [
            'attribute' => 'weight',
            'value' => (!empty($model->weight)) ? $model->weight : null,
        ],
        [
            'attribute' => 'neck',
            'value' => (!empty($model->neck)) ? $model->neck : null,
        ],
        [
            'attribute' => 'shoulder',
            'value' => (!empty($model->shoulder)) ? $model->shoulder : null,
        ],
        [
            'attribute' => 'chest',
            'value' => (!empty($model->chest)) ? $model->chest : null,
        ],
        [
            'attribute' => 'arm',
            'value' => (!empty($model->arm)) ? $model->arm : null,
        ],
        [
            'attribute' => 'waist',
            'value' => (!empty($model->waist)) ? $model->waist : null,
        ],
        [
            'attribute' => 'wrist',
            'value' => (!empty($model->wrist)) ? $model->wrist : null,
        ],
        [
            'attribute' => 'hip',
            'value' => (!empty($model->hip)) ? $model->hip : null,
        ],
        [
            'attribute' => 'buttock',
            'value' => (!empty($model->buttock)) ? $model->buttock : null,
        ],
        [
            'attribute' => 'biceps',
            'value' => (!empty($model->biceps)) ? $model->biceps : null,
        ],
        [
            'attribute' => 'waist_to_floor',
            'value' => (!empty($model->waist_to_floor)) ? $model->waist_to_floor : null,
        ],
        [
            'attribute' => 'waist_to_knee',
            'value' => (!empty($model->waist_to_knee)) ? $model->waist_to_knee : null,
        ],
        [
            'attribute' => 'knee',
            'value' => (!empty($model->knee)) ? $model->knee : null,
        ],
        [
            'attribute' => 'ankle',
            'value' => (!empty($model->ankle)) ? $model->ankle : null,
        ],
        [
            'attribute' => 'thigh',
            'value' => (!empty($model->thigh)) ? $model->thigh : null,
        ],
        [
            'attribute' => 'notes',
            'type' => 'widget',
            'value' => (!empty($model->notes)) ? $model->notes : null,
            'widgetOptions' => ['class' => \yii\redactor\widgets\Redactor::class],
//            'displayOnly' => true,
            'format' => 'raw'
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
//        'buttons1' => '{delete}',
        'hAlign' => DetailView::ALIGN_CENTER,
        'vAlign' => DetailView::ALIGN_MIDDLE,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => $this->title,
            'type' => DetailView::TYPE_INFO,
        ],
        'deleteOptions' => [
            'url' => \yii\helpers\Url::toRoute(['tailor-made-order/delete', 'id' => \common\components\encrypt\CryptHelper::encryptString($model->id)]),
            'params' => ['id' => \common\components\encrypt\CryptHelper::encryptString($model->id), 'kvdelete' => true],
        ],
        'attributes' => $columns
    ]); ?>

</div>
