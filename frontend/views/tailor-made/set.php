<?php

use kartik\file\FileInput;
use kartik\form\ActiveField;
use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\TailorMadeOrder */
/* @var $form ActiveForm */

$imgUrl = Yii::$app->params['common'] . '/media';
$this->registerCssFile(Url::toRoute('css/tailor-made-measure.css'));
$this->title = Yii::t('app', 'Set Measurements');
?>
<div class="top pt-4 pt-lg-5">
    <div class="row w-100 px-0 mx-0">
        <h3 class="title-svn px-0 pb-4 fs-1 text-center"><?= $this->title ?></h3>
        <div class="col-12 col-lg-8 px-3 ps-lg-0 pe-lg-4">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <?= $form->field($model, 'file', ['hintType' => ActiveField::HINT_SPECIAL])->widget(FileInput::classname(), [
                'options' => ['multiple' => false, 'accept' => 'image/*'],
                'pluginOptions' => ['previewFileType' => 'image', 'showUpload' => false]
            ])->label(Yii::t('app', 'Body Image'))->hint('Một bức ảnh chụp toàn thân sẽ giúp các thợ may có thể tư vấn, thiết kế các kiểu quần áo, loại vải,... phù hợp với từng đối tượng'); ?>
            <?= $form->field($model, 'customer_name')->textInput(['placeholder' => 'Nguyễn Văn A']) ?>
            <?= $form->field($model, 'customer_tel')->textInput(['placeholder' => '0365 113 xxx']) ?>
            <?= $form->field($model, 'customer_email')->textInput(['type' => 'email', 'placeholder' => 'nonereply@deobelly.vn']) ?>
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
        <div class="col-12 col-lg-4 px-3 pe-lg-0 ps-lg-4">
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
            <img src="<?= $imgUrl . '/tailor-made/measurements.png' ?>" class="img-fluid pt-3 w-100">
            <img src="<?= $imgUrl . '/tailor-made/3-huong-dan-cach-do-thong-so-quan-ao.jpg' ?>"
                 class="img-fluid pt-4 w-100">
        </div>
    </div>
    <div class="row px-2 px-lg-0 mb-3 text-justify d-flex align-items-center w-100 px-0 mx-0">
        <img src="<?= $imgUrl . '/tailor-made/dress_form_measurements_guide_header.jpg' ?>" class="img-fluid">
        <h4 class="text-uppercase pt-3">Để có được các chỉ số đo vừa vặn</h4>
        <p>Lấy số đo cơ thể chính xác là một trong những chìa khóa để có được thân hình cân đối. Cho dù bạn chọn tạo
            khối mẫu của mình từ một mẫu phù hợp thương mại hay phác thảo nó từ các phép đo, thì việc có các phép đo
            chính xác là rất quan trọng cho sự hình thành một chỉnh thể thống nhất. (Và một chỉnh thể vừa vặn rất quan
            trọng đối với mọi thứ bạn tạo ra!)</p>
        <p>Tất cả những gì bạn cần là một thước dây! Mặc dù dễ dàng nhất là nhờ người khác đo số đo của bạn, nhưng bạn
            có thể tự làm. Chỉ cần đứng trước gương để bạn có thể thấy rằng bạn đã dán băng keo vào đúng vị trí, và đôi
            khi là một chút trung thực.</p>
        <p>Tốt nhất, bạn nên đo khi chỉ mặc áo mỏng. Tuy nhiên, quần áo cộc tay hoặc bó sát sẽ ổn. KHÔNG đo lường khi
            mặc quần jean, áo mồ hôi, hoặc quần áo cồng kềnh khác. Điều đó tạo lên những sai xót!
        <p>Vì cơ thể được làm bằng mô mềm nên có thể hơi khó để biết chính xác độ chặt của băng quấn quanh cơ thể. Băng
            phải vừa khít một chút, nhưng không chặt - nó không thể "đào sâu" hoặc tạo ra vết lõm trên cơ thể. Nó cũng
            không được lỏng lẻo! Chỉ cần quấn băng quanh vùng cơ thể được đo và giữ cố định. Bạn có thể đặt một ngón tay
            phía sau băng, nhưng không nên nhiều hơn thế.</p>
        <div class="col-12 col-md-4 h-100 py-2">
            <div class="card card-shadow h-100">
                <a href="<?= Url::toRoute('tailor-made/top') ?>"
                   target="_blank" title="<?= Yii::t('app', 'Top Measurements') ?>">
                    <div class="card-img h-100 zoom image-holder">
                        <img src="<?= $imgUrl . '/tailor-made/vest-top.jpg' ?>"
                             class="img-thumbnail h-100 object-fit-cover">
                        <div class="measure-method__title">
                            <p class="text-uppercase fs-4 fw-bolder title-svn"><?= Yii::t('app', 'Top Measurements') ?></p>
                        </div>
                        <div class="img-overlay"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-4 h-100 py-2">
            <div class="card card-shadow h-100">
                <a href="<?= Url::toRoute('tailor-made/pants') ?>"
                   target="_blank" title="<?= Yii::t('app', 'Pants Measurements') ?>">
                    <div class="card-img h-100 zoom image-holder">
                        <img src="<?= $imgUrl . '/tailor-made/trousers.jpg' ?>"
                             class="img-thumbnail h-100 object-fit-cover">
                        <div class="measure-method__title">
                            <p class="text-uppercase fs-4 fw-bolder title-svn"><?= Yii::t('app', 'Pants Measurements') ?></p>
                        </div>
                        <div class="img-overlay"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-4 h-100 py-2">
            <div class="card card-shadow h-100">
                <a href="<?= Url::toRoute('tailor-made/set') ?>"
                   target="_blank" title="<?= Yii::t('app', 'Set Measurements') ?>">
                    <div class="card-img h-100 zoom image-holder">
                        <img src="<?= $imgUrl . '/tailor-made/fullset.jpg' ?>"
                             class="img-thumbnail h-100 object-fit-cover">
                        <div class="measure-method__title">
                            <p class="text-uppercase fs-4 fw-bolder title-svn"><?= Yii::t('app', 'Set Measurements') ?></p>
                        </div>
                        <div class="img-overlay"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div><!-- top -->
