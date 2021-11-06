<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MixAndMatch */

$this->title = Yii::t('app', 'Create Mix And Match');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mix And Matches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mix-and-match-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
