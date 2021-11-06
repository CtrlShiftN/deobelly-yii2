<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TailorMadeOrder */

$this->title = Yii::t('app', 'Create Tailor Made Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tailor Made Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tailor-made-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
