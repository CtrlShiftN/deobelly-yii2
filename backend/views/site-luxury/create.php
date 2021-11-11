<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SiteLuxury */

$this->title = Yii::t('app', 'Create Site Luxury');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Site Luxuries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-luxury-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
