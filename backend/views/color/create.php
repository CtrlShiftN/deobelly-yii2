<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Color */

$this->title = Yii::t('app', 'Add New Color');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="color-create">
    <div class="container px-3 pt-3">
        <h3 class="text-uppercase"><?= Yii::t('app', 'Add New Color') ?></h3>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
