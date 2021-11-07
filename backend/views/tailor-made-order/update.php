<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TailorMadeOrder */

$this->title = Yii::t('app', 'Update Tailor Made');
?>
<div class="tailor-made-order-update">
    <div class="container px-3 pt-3">
        <h3 class="text-uppercase"><?= Yii::t('app', 'Update Tailor Made') ?></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'arrTypes' => $arrTypes
    ]) ?>

</div>
