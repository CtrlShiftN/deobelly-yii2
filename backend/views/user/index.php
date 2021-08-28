<?php


use common\models\User;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tài khoản';
$this->params['breadcrumbs'][] = $this->title;
$arrStatus = ["Không hoạt động", "Đang hoạt động"];
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
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'name',
                'label' => 'Họ và tên',
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '150px',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['name'];
                },
                // edit field
                'editableOptions' => [
                    'asPopover' => false,
                ],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'tel',
                'label' => 'Số điện thoại',
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'width' => '150px',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['tel'];
                },
                // edit field
                'editableOptions' => [
                    'asPopover' => false,
                ],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'address',
                'label' => 'Địa chỉ',
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['address'];
                },
                // edit field
                'editableOptions' => [
                    'asPopover' => false,
                ],
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
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'status',
                'label' => 'Trạng thái',
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'value' => function ($model, $key, $index, $widget) use ($arrStatus) {
                    return $arrStatus[$model['status']];
                },
                'editableOptions' => function ($model, $key, $index) use ($arrStatus) {
                    return [
                        'name' => 'status',
                        'asPopover' => false,
                        'header' => 'Trạng Thái',
                        'size' => 'md',
                        'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                        'data' => $arrStatus,
                        // default value in the text box
                        'value' => $arrStatus[$model['status']],
                        'displayValueConfig' => $arrStatus
                    ];
                },
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'role',
                'label' => 'Vai trò',
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'value' => function ($model, $key, $index, $widget) {
                    return User::ROLES[$model->role];
                },
                'editableOptions' => function ($model, $key, $index) {
                    return [
                        'name' => 'role',
                        'asPopover' => false,
                        'header' => 'Vai trò',
                        'size' => 'md',
                        'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                        'data' => User::ROLES,
                        // default value in the text box
                        'value' => User::ROLES[$model['role']],
                        'displayValueConfig' => User::ROLES
                    ];
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
                'label' => 'Hành động',
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'value' => function ($model, $key, $index, $widget) {
                    return Html::a('Xóa', Url::toRoute(['user/delete', 'id' => $key]), ['class' => 'btn btn-danger', 'data' => [
                        'method' => 'post',
                        'confirm' => 'Are you sure you want to delete this item?',
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
                'label' => '<i class="far fa-file-alt"></i>  Xuất file',
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
                    'content' => Html::a('<i class="fas fa-user-plus"></i> Thêm thành viên mới', ['create'], [
                        'class' => 'btn btn-success',
                        'title' => 'Reset Grid',
                        'data-pjax' => 0,
                    ]),
                    'options' => ['class' => 'btn-group mr-2']
                ],
                '{export}',
                '{toggleData}',
            ],
            'panel' => [
                'type' => GridView::TYPE_DEFAULT,
                'heading' => 'Danh sách tài khoản',
            ],
        ]);
        Pjax::end();
        ?>
    </div>
</div>
