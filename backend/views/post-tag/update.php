<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PostTag */

$this->title = 'Update Posts Tag: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="posts-tag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
