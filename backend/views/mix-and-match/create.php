<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MixAndMatch */

$this->title = Yii::t('app', 'Add New Collections');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mix-and-match-create">

    <?= $this->render('_form', [
        'model' => $model,
        'products' => $products,
    ]) ?>

</div>
