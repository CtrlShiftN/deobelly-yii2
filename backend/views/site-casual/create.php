<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SiteCasual */

$this->title = Yii::t('app', 'Create Site Casual');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Site Casuals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-casual-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
