<?php

use kartik\file\FileInput;
use kartik\form\ActiveField;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TailorMadeOrder */
/* @var $form yii\widgets\ActiveForm */
$imgUrl = Yii::$app->params['common'] . '/media';
?>

<div class="tailor-made-order-form container p-3">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'file', ['hintType' => ActiveField::HINT_SPECIAL])->widget(FileInput::classname(), [
        'options' => ['multiple' => false, 'accept' => 'image/*'],
        'pluginOptions' => ['previewFileType' => 'image', 'showUpload' => false]
    ])->label(Yii::t('app', 'Body Image'))->hint('Một bức ảnh chụp toàn thân sẽ giúp các thợ may có thể tư vấn, thiết kế các kiểu quần áo, loại vải,... phù hợp với từng đối tượng'); ?>
    <div class="row w-100 px-0 mx-0">
        <div class="col-12 col-md-6 col-lg-4 px-2 px-md-auto">
            <?= $form->field($model, 'customer_name')->textInput(['placeholder' => 'Nguyễn Văn A']) ?>
        </div>
        <div class="col-12 col-md-6 col-lg-4 px-2 px-md-auto">
            <?= $form->field($model, 'customer_tel')->textInput(['placeholder' => '0365 113 xxx']) ?>
        </div>
        <div class="col-12 col-md-6 col-lg-4 px-2 px-md-auto">
            <?= $form->field($model, 'customer_email')->textInput(['type' => 'email', 'placeholder' => 'nonereply@deobelly.vn']) ?>
        </div>
    </div>
    <?= $form->field($model, 'type', ['hintType' => ActiveField::HINT_SPECIAL])->widget(Select2::classname(), [
        'data' => $arrTypes,
        'options' => ['placeholder' => Yii::t('app', 'Choose a tailor-made type')],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->hint('Việc xác định loại may đo giúp các nhà thiết kế dễ dàng điều chỉnh các thông số để trang phục phù hợp với cơ thể nhất') ?>
    <div class="row w-100 px-0 mx-0">
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'height', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Đơn vị đo cm, vd: 170 cm') ?>
        </div>
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'weight', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Đơn vị đo kg, vd: 68kg') ?>
        </div>
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'neck', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo vòng cổ, đơn vị: cm') ?>
        </div>
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'shoulder', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo chiều rộng vai, đơn vị: cm') ?>
        </div>
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'chest', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo vòng 1, đơn vị: cm') ?>
        </div>
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'arm', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo chiều dài cánh tay, đơn vị: cm') ?>
        </div>
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'waist', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo thắt lưng, đơn vị: cm') ?>
        </div>
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'wrist', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo cổ tay, đơn vị: cm') ?>
        </div>
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'hip', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo vòng hông, đơn vị: cm') ?>
        </div>
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'buttock', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo vòng 3, đơn vị: cm') ?>
        </div>
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'biceps', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo bắp tay, đơn vị: cm') ?>
        </div>
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'waist_to_floor', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Đo từ phần phần thắt lưng đến chấm gót chân. Đơn vị: cm') ?>
        </div>
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'waist_to_knee', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Đo từ phần thắt lưng đến đầu gối. Đơn vị: cm') ?>
        </div>
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'ankle', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Đo một vòng quanh mắt cá chân, đơn vị: cm') ?>
        </div>
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'knee', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Đo một vòng quanh đầu gối, đơn vị: cm') ?>
        </div>
        <div class="col-6 col-md-4 col-lg-3 px-1 px-md-auto">
            <?= $form->field($model, 'thigh', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Đo một vòng quanh phần đùi, đơn vị: cm') ?>
        </div>
        <div class="col-12 px-1 px-md-auto">
            <?= $form->field($model, 'notes', ['hintType' => ActiveField::HINT_SPECIAL])->widget(\yii\redactor\widgets\Redactor::class)->hint('Hãy mô tả thêm về yêu cầu của bạn. Chất liệu vải như thế nào, cotton hay vải bò? Mục đích may quần là gì, đi chơi hay đi làm? v.v...') ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
