<?php

use kartik\file\FileInput;
use kartik\form\ActiveField;
use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TailorMadeOrder */
/* @var $form ActiveForm */

$imgUrl = Yii::$app->params['common'] . '/media';
$this->registerCss(".text-justify{text-align:justify}")
?>
<div class="top pt-4 pt-lg-5">

    <div class="row">
        <div class="col-12 col-lg-8 px-4 ps-lg-0 pe-lg-4">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <?= $form->field($model, 'file', ['hintType' => ActiveField::HINT_SPECIAL])->widget(FileInput::classname(), [
                'options' => ['multiple' => false, 'accept' => 'image/*'],
                'pluginOptions' => ['previewFileType' => 'image', 'showUpload' => false]
            ])->label(Yii::t('app', 'Body Image'))->hint('Một bức ảnh chụp toàn thân sẽ giúp các thợ may có thể tư vấn, thiết kế các kiểu quần áo, loại vải,... phù hợp với từng đối tượng'); ?>
            <?= $form->field($model, 'customer_name')->textInput(['placeholder' => 'Nguyễn Văn A']) ?>
            <?= $form->field($model, 'customer_tel')->textInput(['placeholder' => '0365 113 xxx']) ?>
            <?= $form->field($model, 'customer_email')->textInput(['type' => 'email', 'placeholder' => 'nonereply@deobelly.vn']) ?>
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3">
                    <?= $form->field($model, 'height', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Đơn vị đo cm, vd: 170 cm') ?>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <?= $form->field($model, 'weight', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Đơn vị đo kg, vd: 68kg') ?>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <?= $form->field($model, 'neck', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo vòng cổ, đơn vị: cm') ?>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <?= $form->field($model, 'shoulder', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo chiều rộng vai, đơn vị: cm') ?>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <?= $form->field($model, 'chest', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo vòng 1, đơn vị: cm') ?>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <?= $form->field($model, 'arm', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo chiều dài cánh tay, đơn vị: cm') ?>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <?= $form->field($model, 'waist', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo thắt lưng, đơn vị: cm') ?>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <?= $form->field($model, 'wrist', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo cổ tay, đơn vị: cm') ?>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <?= $form->field($model, 'hip', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo vòng hông, đơn vị: cm') ?>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <?= $form->field($model, 'buttock', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo vòng 3, đơn vị: cm') ?>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <?= $form->field($model, 'biceps', ['hintType' => ActiveField::HINT_SPECIAL])->textInput(['type' => 'number'])->hint('Số đo bắp tay, đơn vị: cm') ?>
                </div>
                <div class="col-12">
                    <?= $form->field($model, 'notes', ['hintType' => ActiveField::HINT_SPECIAL])->widget(\yii\redactor\widgets\Redactor::class)->hint('Hãy mô tả thêm về yêu cầu của bạn. Kiểu áo nào, sơ mi hay vest? Chất liệu vải như thế nào, cotton hay vải lụa? Mục đích may áo là gì, đi chơi hay đi làm? v.v...') ?>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-12 col-lg-4 px-4 pe-lg-0 ps-lg-4">
            <h4>Áo sơ mi nam, có thể tham khảo cách đo sau</h4>
            <ul class="text-justify">
                <li>Chiều dài áo: Đo từ sát chân cổ trước đến lai áo ở vị trí mong muốn.</li>
                <li>Ngang vai: Đo từ đỉnh vai trái sang đỉnh vai phải.</li>
                <li>Vòng nách: Đo theo chiều vòng cong của nách.</li>
                <li>Ống tay: Đo từ đỉnh vai đến vị trí tay áo ưng ý.</li>
                <li>Vòng ngực: Đo từ mạch hạ xuống khoảng 1 – 2cm ở bên này sang bên kia.</li>
                <li>Cổ áo: Để thước dây quanh cổ sao cho nằm thoải mái trên vai. Đồng thời nên thừa ra một khoảng trống
                    nhỏ ở giữa cổ và bằng đo từ 1 ngón tay.
                </li>
                <li>Eo: Đo toàn bộ chu vi quanh vòng eo.</li>
                <li>Bắp tay: Đo cánh tay phải hoặc tay trái tại điểm to nhất của cánh tay, lưu ý thư giãn không nên gồng
                    cánh tay lại.
                </li>
                <li>Cổ tay: Đặt thước dây tại xung quanh vùng cổ tay và nên thừa ra khoảng 1cm</li>
            </ul>
            <img src="<?= $imgUrl . '/tailor-made/3-huong-dan-cach-do-thong-so-quan-ao.jpg' ?>" class="img-fluid">
        </div>
    </div>
</div><!-- top -->
