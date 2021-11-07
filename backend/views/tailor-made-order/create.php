<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TailorMadeOrder */

$this->title = Yii::t('app', 'Get a Tailor-made');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tailor-made-order-create">
    <div class="container px-3 pt-3">
        <h3 class="text-uppercase"><?= Yii::t('app', 'Get a Tailor-made') ?></h3>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        'arrTypes' => $arrTypes
    ]) ?>

</div>
