<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Color */

$this->title = Yii::t('app', 'Add New Color');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="color-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
