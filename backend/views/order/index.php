<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
$arrStatus = \backend\models\TrackingStatus::getAllStatus();
$arrStatus = \yii\helpers\ArrayHelper::map($arrStatus, 'id', 'name');
?>
<div class="order-index">
    <div class="pt-3">
        <?php
        $defaultExportConfig = [
            GridView::EXCEL => [
                'label' => 'Excel',
                'icon' => 'file-excel-o',
                'iconOptions' => ['class' => 'text-success'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => 'grid-export',
                'alertMsg' => Yii::t('app', 'The EXCEL export file will be generated for download.'),
                'options' => ['title' => 'Microsoft Excel 95+'],
                'mime' => 'application/vnd.ms-excel',
                'config' => [
                    'worksheet' => 'ExportWorksheet',
                    'cssFile' => ''
                ]
            ],
        ];
        $gridColumns = [
            [
                'class' => 'kartik\grid\SerialColumn',
                'contentOptions' => ['class' => 'kartik-sheet-style'],
                'headerOptions' => ['class' => 'kartik-sheet-style']
            ],
            [
                'attribute' => 'user_name',
                'label' => Yii::t('app', 'Customer Name'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '140px',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['user_name'];
                },
                'filter' => false,
                'format' => 'raw'
            ],
            [
                'attribute' => 'product_name',
                'label' => Yii::t('app', 'Customer Name'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '140px',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['product_name'];
                },
                'filter' => false,
                'format' => 'raw'
            ],
            [
                'attribute' => 'color_name',
                'label' => Yii::t('app', 'Customer Name'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '140px',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['color_name'];
                },
                'filter' => false,
                'format' => 'raw'
            ],
            [
                'attribute' => 'size_name',
                'label' => Yii::t('app', 'Customer Name'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '140px',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['size_name'];
                },
                'filter' => false,
                'format' => 'raw'
            ],
            [
                'attribute' => 'quantity',
                'label' => Yii::t('app', 'Customer Name'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '140px',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['quantity'];
                },
                'filter' => false,
                'format' => 'raw'
            ],
            [
                'attribute' => 'tel',
                'label' => Yii::t('app', 'Customer Name'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '140px',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['tel'];
                },
                'filter' => false,
                'format' => 'raw'
            ],
            [
                'attribute' => 'address',
                'label' => Yii::t('app', 'Customer Name'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '140px',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['address'];
                },
                'filter' => false,
                'format' => 'raw'
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'notes',
                'label' => Yii::t('app', 'Title'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['notes'];
                },
                'editableOptions' => function ($model, $key, $index) use ($arrStatus) {
                    return [
                        'name' => 'notes',
                        'asPopover' => false,
                        'header' => Yii::t('app', 'Notes'),
                        'size' => 'md',
                        'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                        // default value in the text box
                        'value' => $model['notes'],
                    ];
                },
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'status',
                'label' => Yii::t('app', 'Actions'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '150px',
                'value' => function ($model, $key, $index, $widget) use ($arrStatus) {
                    return Yii::t('app', $arrStatus[$model['status']]);
                },
                'editableOptions' => function ($model, $key, $index) use ($arrStatus) {
                    return [
                        'name' => 'status',
                        'asPopover' => false,
                        'header' => Yii::t('app', 'Status'),
                        'size' => 'md',
                        'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                        'data' => $arrStatus,
                        // default value in the text box
                        'value' => Yii::t('app', $arrStatus[$model['status']]),
                        'displayValueConfig' => $arrStatus
                    ];
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => $arrStatus,
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => '-- ' . Yii::t('app', 'Status') . ' --']
            ],
        ];
        Pjax::begin();
        echo GridView::widget([
            'id' => 'gridview',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
//            'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
            'headerRowOptions' => ['class' => 'kartik-sheet-style'],
            'filterRowOptions' => ['class' => 'kartik-sheet-style'],
            'pjax' => true, // pjax is set to always true for this demo
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            // set export properties
            'export' => [
                'fontAwesome' => true,
                'label' => '<i class="far fa-file-alt"></i> ' . Yii::t('app', 'Export files'),
            ],
            'responsive' => true,
            'persistResize' => false,
            'toggleDataOptions' => ['minCount' => 10],
            'rowOptions' => function ($model, $index, $widget, $grid) {
                return [
                    'class' => GridView::TYPE_DEFAULT
                ];
            },
            'condensed' => true,
            'hover' => true,
            'columns' => $gridColumns,
            'exportConfig' => $defaultExportConfig,
            'toolbar' => [
                [
                    'content' => Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Add New Order'), ['create'], [
                        'class' => 'btn btn-success',
                        'title' => 'Reset Grid',
                        'data-pjax' => 0,
                        'target' => '_blank'
                    ]),
                    'options' => ['class' => 'btn-group mr-2']
                ],
                '{export}',
                '{toggleData}',
            ],
            'panel' => [
                'type' => GridView::TYPE_DEFAULT,
                'heading' => Yii::t('app', 'Order List'),
            ],
        ]);
        Pjax::end();
        ?>
    </div>
</div>
