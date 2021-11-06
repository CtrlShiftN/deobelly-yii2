<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TailorMadeOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tailor Made');
$this->params['breadcrumbs'][] = $this->title;
$arrStatus = [Yii::t('app', 'Inactive'), Yii::t('app', 'Active')];
$imgUrl = Yii::$app->params['common'] . '/media';
?>
<div class="tailor-made-order-index">
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
                'class' => 'kartik\grid\DataColumn',
                'attribute' => 'body_image',
                'label' => Yii::t('app', 'Image'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '140px',
                'value' => function ($model, $key, $index, $widget) use ($imgUrl) {
                    return Html::img($imgUrl . '/' . $model['body_image'], ['width' => '100%', 'alt' => $model['customer_name']]);
                },
                'filter' => false,
                'format' => 'raw'
            ],
            [
                'attribute' => 'user_id',
                'label' => Yii::t('app', 'Accounts'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '75px',
                'value' => function ($model, $key, $index, $widget) use ($users) {
                    return $users[$model['user_id']];
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => $users,
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => '-- ' . Yii::t('app', 'Accounts') . ' --']
            ],
            [
                'attribute' => 'customer_name',
                'label' => Yii::t('app', 'Customer Name'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '75px',
                'value' => function ($model, $key, $index, $widget) use ($users) {
                    return $model['customer_name'];
                },
            ],
            [
                'attribute' => 'customer_tel',
                'label' => Yii::t('app', 'Tel'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '75px',
                'value' => function ($model, $key, $index, $widget) use ($users) {
                    return $model['customer_tel'];
                },
            ],
            [
                'attribute' => 'customer_email',
                'label' => Yii::t('app', 'Email'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '75px',
                'value' => function ($model, $key, $index, $widget) use ($users) {
                    return $model['customer_email'];
                },
            ],
            [
                'attribute' => 'type',
                'label' => Yii::t('app', 'Tailor-made Types'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '75px',
                'value' => function ($model, $key, $index, $widget) use ($types) {
                    return $types[$model['type']];
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => $types,
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => '-- ' . Yii::t('app', 'Tailor-made Types') . ' --']
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'notes',
                'label' => Yii::t('app', 'Notes'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '75px',
                'value' => function ($model, $key, $index, $widget) use ($users) {
                    return $model['notes'];
                },
                'editableOptions' => [
                    'asPopover' => false,
                ],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'status',
                'label' => Yii::t('app', 'Status'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '75px',
                'value' => function ($model, $key, $index, $widget) use ($arrStatus) {
                    return $arrStatus[$model['status']];
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
                        'value' => $arrStatus[$model['status']],
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
            [
//                'label' => Yii::t('app', 'Actions'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '150px',
                'value' => function ($model, $key, $index, $widget) {
                    return Html::a('<i class="fas fa-eye"></i> ' . Yii::t('app', 'View'), Url::toRoute(['product/view', 'id' => \common\components\encrypt\CryptHelper::encryptString($key)]), ['class' => 'btn btn-info mb-2', 'target' => '_blank']) . '<br/>' .
                        Html::a('<i class="far fa-trash-alt"></i> ' . Yii::t('app', 'Delete'), Url::toRoute(['product/delete', 'id' => \common\components\encrypt\CryptHelper::encryptString($key)]), ['class' => 'btn btn-danger mt-2', 'data' => [
                            'method' => 'post',
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        ],]);
                },
                'format' => 'raw'
            ]

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
                    'content' => Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Get a Tailor-made'), ['create'], [
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
                'heading' => Yii::t('app', 'Tailor Made List'),
            ],
        ]);
        Pjax::end();
        ?>
    </div>
</div>
