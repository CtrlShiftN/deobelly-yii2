<?php


use common\models\User;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tài khoản';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
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
                'alertMsg' => 'The EXCEL export file will be generated for download.',
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
                'attribute' => 'name',
                'label' => 'Họ và tên',
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '150px',
            ],
            [
                'attribute' => 'tel',
                'label' => 'Số điện thoại',
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '150px',
            ],
            [
                'attribute' => 'address',
                'label' => 'Địa chỉ',
                'vAlign' => 'middle',
                'hAlign' => 'center',
            ],
            [
                'attribute' => 'email',
                'label' => 'Email',
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '250px',
            ],
            [
                'attribute' => 'verified_at',
                'label' => 'Đã xác thực',
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'filter' => false
            ],
            [
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'status',
                'label' => 'Trạng thái',
                'vAlign' => 'middle',
                'hAlign' => 'center',
            ],
            [
                'attribute' => 'role',
                'label' => 'Vai trò',
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'value' => function ($model, $key, $index, $widget) {
                    return User::ROLES[$model->role];
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => User::ROLES,
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Vai trò'], // allows multiple authors to be chosen
                'format' => 'raw'
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'dropdown' => true,
                'dropdownOptions' => ['class' => 'float-right'],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action == 'update') {
                        return Url::toRoute(['user/update', 'id' => $key]);
                    }
                    if ($action == 'view') {
                        return Url::toRoute(['user/view', 'id' => $key]);
                    }
                    if ($action == 'delete') {
                        return Url::toRoute(['user/delete', 'id' => $key]);
                    }
                    return '#';
                },
                'viewOptions' => ['title' => 'Xem chi tiết tài khoản', 'data-toggle' => 'tooltip'],
                'updateOptions' => ['title' => 'Chỉnh sửa tài khoản', 'data-toggle' => 'tooltip'],
                'deleteOptions' => ['title' => 'Xóa tài khoản', 'data-toggle' => 'tooltip'],
                'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],

        ];

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
                'fontAwesome' => true
            ],
            'responsive' => true,
            'persistResize' => false,
            'toggleDataOptions' => ['minCount' => 10],
            'exportConfig' => true,
            'rowOptions' => function ($model, $index, $widget, $grid) {
                return [
                    'class' => GridView::TYPE_DEFAULT
                ];
            },
            'condensed' => true,
            'hover' => true,
            'columns' => $gridColumns,
            'toolbar' => [
                [
                    'content' => Html::a('<i class="fas fa-user-plus"></i> Thêm thành viên mới', ['create'], [
                        'class' => 'btn btn-success',
                        'title' => 'Reset Grid',
                        'data-pjax' => 0,
                    ]),
                    'options' => ['class' => 'btn-group mr-2']
                ],
                '{toggleData}',
            ],
            'panel' => [
                'type' => GridView::TYPE_DEFAULT,
                'heading' => 'Danh sách tài khoản',
            ],
        ]); ?>
    </div>
</div>
