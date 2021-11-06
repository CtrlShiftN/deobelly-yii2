<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TailorMadeOrder */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tailor Made Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tailor-made-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'customer_name',
            'customer_tel',
            'customer_email:email',
            'body_image',
            'type',
            'height',
            'weight',
            'neck',
            'shoulder',
            'chest',
            'arm',
            'waist',
            'wrist',
            'waist_to_floor',
            'waist_to_knee',
            'ankle',
            'hip',
            'buttock',
            'knee',
            'thigh',
            'biceps',
            'notes:ntext',
            'status',
            'admin_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
