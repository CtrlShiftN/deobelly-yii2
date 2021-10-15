<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Size */

$this->title = Yii::t('app', 'Add New Size');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="size-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
