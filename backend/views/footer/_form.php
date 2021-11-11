<?php

use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Footer */
/* @var $form yii\widgets\ActiveForm */

$arrTitleFooter = [Yii::t('app','No')];
foreach (ArrayHelper::map(\backend\models\Footer::getTitleFooter(), 'id', 'title') as $key => $value) {
    $arrTitleFooter[$key] = $value;
}
?>

<div class="footer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList($arrTitleFooter)->label(Yii::t('app','Parent title')); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
