<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sliders');
$this->params['breadcrumbs'][] = $this->title;
$commonUrl = Yii::$app->params['common'] . '/media';
$arrStatus = [Yii::t('app', 'Inactive'), Yii::t('app', 'Active')];
?>
<div class="slider-index">
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
                'attribute' => 'link',
                'label' => Yii::t('app', 'Slider'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '140px',
                'value' => function ($model, $key, $index, $widget) use ($commonUrl) {
                    return Html::img($commonUrl . '/' . $model['link'], ['width' => '100%', 'alt' => $model['site']]);
                },
                'filter' => false,
                'format' => 'raw'
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'site',
                'label' => Yii::t('app', 'Site'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'value' => function ($model, $key, $index, $widget) use ($siteIndex) {
                    return (!empty($siteIndex[$model['site']])) ? $siteIndex[$model['site']] : null;
                },
                'editableOptions' => function ($model, $key, $index) use ($siteIndex) {
                    return [
                        'name' => 'site',
                        'asPopover' => false,
                        'header' => Yii::t('app', 'Site'),
                        'size' => 'md',
                        'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                        'data' => $siteIndex,
                        // default value in the text box
                        'value' => $siteIndex[$model['site']],
                        'displayValueConfig' => $siteIndex
                    ];
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => $siteIndex,
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => '-- ' . Yii::t('app', 'Site') . ' --']
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'slide_label',
                'label' => Yii::t('app', 'Slide Label'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['slide_label'];
                },
                // edit field
                'editableOptions' => [
                    'asPopover' => false,
                ],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'slide_text',
                'label' => Yii::t('app', 'Slide Text'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['slide_text'];
                },
                // edit field
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
                'width' => '150px',
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
                'attribute' => 'created_at',
                'label' => Yii::t('app', 'Created_at'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'filter' => false,
                'width' => '200px',
                'format' => 'raw'
            ],
            [
                'label' => Yii::t('app', 'Actions'),
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '150px',
                'value' => function ($model, $key, $index, $widget) {
                    return Html::a(Yii::t('app', 'View'), Url::toRoute(['tool/view-slider', 'id' => \common\components\encrypt\CryptHelper::encryptString($key)]), ['class' => 'btn btn-info mb-2', 'target' => '_blank']) . '<br/>' .
                        Html::a(Yii::t('app', 'Delete'), Url::toRoute(['tool/delete-slider', 'id' => \common\components\encrypt\CryptHelper::encryptString($key)]), ['class' => 'btn btn-danger', 'data' => [
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
                    'content' => Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'Add new slide'), Url::toRoute('tool/create-slide'), [
                        'class' => 'btn btn-success',
                        'title' => Yii::t('app', 'Add new slide'),
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
                'heading' => Yii::t('app', 'Sliders list'),
            ],
        ]);
        Pjax::end();
        ?>
    </div>
</div>
