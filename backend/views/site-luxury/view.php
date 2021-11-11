<?php

use kartik\detail\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SiteLuxury */

$this->title = !empty($model->title) ? $model->title : Yii::t('app', 'Luxury Contents');
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$imgUrl = Yii::$app->params['common'] . '/media';
$arrStatus = [Yii::t('app', 'Inactive'), Yii::t('app', 'Active')];
?>
<div class="site-luxury-view p-4">
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
            'format' => 'raw'
        ],
        [
            'attribute' => 'link',
            'value' => (!empty($model->link)) ? $model->link : null,
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
            'displayOnly' => true,
        ],
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
        'deleteOptions' => [
            'url' => \yii\helpers\Url::toRoute(['product-type/delete', 'id' => \common\components\encrypt\CryptHelper::encryptString($model->id)]),
            'params' => ['id' => \common\components\encrypt\CryptHelper::encryptString($model->id), 'kvdelete' => true],
        ],
        'attributes' => $columns
    ]); ?>
</div>
