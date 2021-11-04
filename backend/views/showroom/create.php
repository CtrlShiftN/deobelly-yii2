<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Showroom */

$this->title = Yii::t('app', 'Add New Showroom');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="showroom-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
