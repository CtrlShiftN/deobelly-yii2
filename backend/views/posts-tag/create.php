<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PostsTag */

$this->title = 'Thêm thẻ bài viết mới';
$this->params['breadcrumbs'][] = ['label' => 'Posts Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-tag-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
