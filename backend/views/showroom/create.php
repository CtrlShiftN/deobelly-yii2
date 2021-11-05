<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Showroom */

$this->title = Yii::t('app', 'Add New Showroom');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="showroom-create">
    <div class="container px-3 pt-3">
        <h3 class="text-uppercase"><?= Yii::t('app', 'Add New Showroom') ?></h3>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
