<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Color */

$this->title = Yii::t('app', 'Update Color: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Colors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="color-update">
    <div class="container px-3 pt-3">
        <h3 class="text-uppercase"><?= Yii::t('app', 'Update Color') ?></h3>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
