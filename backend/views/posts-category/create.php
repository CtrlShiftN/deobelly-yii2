<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PostsCategory */

$this->title = 'Create Posts Category';
$this->params['breadcrumbs'][] = ['label' => 'Posts Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
