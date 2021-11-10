<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SiteOurStories */

$this->title = Yii::t('app', 'Create Site Our Stories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Site Our Stories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-our-stories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
