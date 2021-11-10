<?php

use kartik\detail\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SiteCasual */

$this->title = $model->title;
$imgUrl = Yii::$app->params['common'] . '/media';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="site-casual-view container p-3">
    <?php
    $columns = [
        [
            'attribute' => 'file',
            'type' => DetailView::INPUT_FILEINPUT,
            'label' => Yii::t('app', 'Image'),
            'value' => Html::img($imgUrl . '/' . $model->image, ['alt' => $model->title, 'class' => 'img-fluid']),
            'format' => 'raw'
        ],
        [
            'attribute' => 'title',
            'value' => (!empty($model->title)) ? $model->title : null,
        ],
        [
            'attribute' => 'label',
            'value' => (!empty($model->label)) ? $model->label : null,
        ],
        [
            'attribute' => 'content',
            'type' => 'widget',
            'value' => (!empty($model->content)) ? $model->content : null,
            'widgetOptions' => ['class' => \yii\redactor\widgets\Redactor::class],
//            'displayOnly' => true,
            'format' => 'raw'
        ],
        [
            'attribute' => 'link',
            'value' => (!empty($model->link)) ? $model->link : null,
        ],
        [
            'attribute' => 'type',
            'value' => (!empty($siteContentTypes[$model->type])) ? $siteContentTypes[$model->type] : null,
            'type' => DetailView::INPUT_SELECT2,
            'widgetOptions' => [
                'data' => $siteContentTypes,
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Content Type') . ' --'],
                'pluginOptions' => ['allowClear' => true]
            ],
            'displayOnly' => true,
        ],
        [
            'attribute' => 'note',
            'type' => 'widget',
            'value' => (!empty($model->note)) ? $model->note : null,
            'widgetOptions' => ['class' => \yii\redactor\widgets\Redactor::class],
//            'displayOnly' => true,
            'format' => 'raw'
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
        'buttons1' => '{update}',
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
