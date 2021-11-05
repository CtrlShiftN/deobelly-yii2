<?php

use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$imgUrl = Yii::$app->params['common'] . '/media';
$arrStatus = [Yii::t('app', 'Inactive'), Yii::t('app', 'Active')];
?>
<div class="post-view py-4">
    <?php
    $columns = [
        [
            'attribute' => 'file',
            'type' => DetailView::INPUT_FILEINPUT,
            'label' => Yii::t('app', 'Image'),
            'value' => Html::img($imgUrl . '/' . $model->avatar, ['alt' => $model->title]),
            'format' => 'raw'
        ],
        [
            'attribute' => 'title',
            'value' => $model->title,
        ],
        [
            'attribute' => 'content',
            'type' => 'widget',
            'value' => $model->content,
            'widgetOptions' => ['class' => \yii\redactor\widgets\Redactor::class],
//            'displayOnly' => true,
            'format' => 'raw'
        ],
        [
            'attribute' => 'tags',
            'value' => function () use ($tags) {
                $html = '';
                foreach ($tags as $key => $tag) {
                    $html .= '<div class="badge badge-info me-3 p-2">' . $tag . '</div>';
                }
                return $html;
            },
            'format' => 'raw',
            'type' => DetailView::INPUT_SELECT2,
            'widgetOptions' => [
                'data' => ArrayHelper::map(\backend\models\PostTag::getAllTags(), 'id', 'title'),
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Post Tags') . ' --'],
                'pluginOptions' => ['allowClear' => true, 'multiple' => true]
            ],
        ],
        [
            'attribute' => 'post_category_id',
            'value' => \backend\models\PostCategory::findOne($model->post_category_id)['title'],
            'format' => 'raw',
            'type' => DetailView::INPUT_SELECT2,
            'widgetOptions' => [
                'data' => ArrayHelper::map(\backend\models\PostCategory::getAllCategory(), 'id', 'title'),
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Post Categories') . ' --'],
                'pluginOptions' => ['allowClear' => true]
            ],
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
            'url' => \yii\helpers\Url::toRoute(['post/delete', 'id' => \common\components\encrypt\CryptHelper::encryptString($model->id)]),
            'params' => ['id' => \common\components\encrypt\CryptHelper::encryptString($model->id), 'kvdelete' => true],
        ],
        'attributes' => $columns
    ]); ?>

</div>
