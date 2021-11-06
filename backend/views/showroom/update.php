<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Showroom */

$this->title = Yii::t('app', 'Update Showroom: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Showrooms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="showroom-update">
    <div class="container px-3 pt-3">
        <h3 class="text-uppercase"><?= Yii::t('app', 'Update Showroom') ?></h3>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
