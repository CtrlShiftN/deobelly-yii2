<?php


use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tài khoản';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $gridColumns = [
        [
            'class' => 'kartik\grid\SerialColumn',
            'contentOptions' => ['class' => 'kartik-sheet-style'],
            'headerOptions' => ['class' => 'kartik-sheet-style']
        ],
        [
            'attribute' => 'username',
        ],
        [
            'attribute' => 'name',
        ],
        [
            'attribute' => 'tel',
        ],
        [
            'attribute' => 'address',
        ],
        [
            'attribute' => 'email',
        ],
        [
            'attribute' => 'verified_at',
        ],
        [
            'attribute' => 'status',
        ],
        [
            'attribute' => 'role',
        ],
        [
            'class' => 'kartik\grid\ActionColumn',
            'headerOptions' => ['class' => 'kartik-sheet-style'],
        ],

    ];

    echo GridView::widget([
        'id' => 'gridview',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
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
            '{toggleData}',
        ],
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'heading' => 'Danh sách tài khoản',
        ],
    ]); ?>


</div>
