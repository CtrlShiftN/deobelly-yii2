<?php

use kartik\detail\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MixAndMatch */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$imgUrl = Yii::$app->params['common'] . '/media';
$arrStatus = [Yii::t('app', 'Inactive'), Yii::t('app', 'Active')];
$modelMixProduct = $model->mixed_product_id;
?>
<div class="mix-and-match-view p-4">
    <?php
    $columns = [
        [
            'attribute' => 'file',
            'type' => DetailView::INPUT_FILEINPUT,
            'label' => Yii::t('app', 'Image'),
            'value' => Html::img($imgUrl . '/' . $model->image, ['alt' => $model->title]),
            'format' => 'raw'
        ],
        [
            'attribute' => 'title',
            'value' => (!empty($model->title)) ? $model->title : null,
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
            'attribute' => 'mixProduct',
            'label' => Yii::t('app', 'Related Products'),
            'value' => function ($model) use ($modelMixProduct, $products) {
                if (!empty($modelMixProduct)) {
                    $html = '<ol class="mb-0">';
                    if (is_array($modelMixProduct)) {
                        $arrProducts = $modelMixProduct;
                    } else {
                        $arrProducts = explode(',', $modelMixProduct);
                    }
                    foreach ($arrProducts as $key => $product) {
                        $html .= '<li>' . $products[$product] . '</li>';
                    }
                    $html .= '</ol>';
                } else {
                    $html = null;
                }
                return $html;
            },
            'type' => DetailView::INPUT_SELECT2,
            'widgetOptions' => [
                'data' => $products,
                'options' => ['placeholder' => '-- ' . Yii::t('app', 'Related Products') . ' --'],
                'pluginOptions' => ['allowClear' => true, 'multiple' => true]
            ],
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
            'url' => \yii\helpers\Url::toRoute(['post/delete', 'id' => \common\components\encrypt\CryptHelper::encryptString($model->id)]),
            'params' => ['id' => \common\components\encrypt\CryptHelper::encryptString($model->id), 'kvdelete' => true],
        ],
        'attributes' => $columns
    ]); ?>

</div>
