<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use kartik\label\LabelInPlace;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$this->title = 'Contact';
$imgUrl = Yii::$app->params['common'] . "/media";
$this->registerCssFile(Url::toRoute('css/contact.css'));
$this->registerCss("
    .w-45 {
        width: 45%;
    } 
");
$config = ['template'=>"{input}\n{error}\n{hint}"];
?>
<div class="site-contact">
    <div class="w-100">
        <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8752675235874!2d105.77944141269522!3d21.037676292854805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b55b011e49%3A0x9406c12dc4604160!2zxJDhuqFpIGjhu41jIFF14buRYyBnaWEgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1629020641063!5m2!1svi!2s"
                width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="row border-bottom">
        <div class="p-3 text-center my-3">
            <h5> Nếu bạn có yêu cầu kinh doanh hoặc câu hỏi khác, vui lòng điền vào biểu mẫu sau để liên hệ với chúng tôi. Cảm ơn bạn!</h5>
        </div>
    </div>
    <div class="row mt-3 ">
        <div class="col-lg-6 order-lg-first order-xs-last my-3">
            <div class="text-center w-100 my-3">
                <img src="<?= $imgUrl ?>/logo.png" class="w-25 d-none d-lg-inline-block">
                <h3 class="fw-bold mb-4 text-center text-md-start d-lg-none"><span class=" border-3 border-dark border-bottom">LIÊN HỆ</span></h3>
            </div>
            <div class="w-100">
                <p><span class="fw-bold">Địa chỉ:</span><br>Tầng 1,tòa nhà GP Invest, 170 Đê La Thành,
                    Đống Đa,Hà Nội</p>
                <p class="d-inline-block w-45"><span class="fw-bold">Email liên hệ:</span><br>deobelly@gmail.com</p>
                <p class="d-inline-block w-45"><span class="fw-bold">Điện Thoại:</span><br>1900.636.099</p>
                <p><span class="fw-bold">Thời gian làm việc:</span><br>Thứ 2 đến Thứ 6 từ 8h đến 18h; Thứ 7 và Chủ
                    nhật từ 8h00 đến 17h00.</p>
            </div>
            <img src="<?= Url::toRoute('img/contact/cskh.jpg') ?>"
                 alt="Chăm sóc khách hàng."
                 class="shadow-lg rounded w-100">
        </div>
        <div class="col-12 col-lg-6 order-sm-first order-xs-first my-3 my-lg-5">
            <?php if (Yii::$app->session->hasFlash('contactSuccess')): ?>
                <div class="alert alert-success alert-dismissible fade show my-3">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h4><i class="icon fa fa-check"></i> THÀNH CÔNG!</h4>
                    <?= Yii::$app->session->getFlash('contactSuccess') ?>
                </div>
            <?php endif; ?>
            <?php if (Yii::$app->session->hasFlash('contactError')): ?>
                <div class="alert alert-danger alert-dismissible fade show my-3">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h4><i class="fas fa-times"></i> LỖI!</h4>
                    <?= Yii::$app->session->getFlash('contactError') ?>
                </div>
            <?php endif; ?>
            <h3 class="fw-bold mb-4 text-center"><span class=" border-3 border-dark border-bottom ">GỬI THẮC MẮC CỦA BẠN</span>
            </h3>
            <div class="hr"></div>

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
            <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Họ và Tên:',['class'=>'fw-bold']) ?>
            <div class="row">
                <div class="col-md-6 my-3">
                    <?= $form->field($model, 'email', $config)->widget(LabelInPlace::classname(),[
                        'type' => LabelInPlace::TYPE_HTML5,
                        'label'=>'<i class="fas fa-phone"></i> Phone number',
                        'options' => ['type' => 'email', 'class'=>'form-control'],
                        'encodeLabel'=> false
                    ]); ?>
                </div>
                <div class="col-md-6 my-3">
                    <?= $form->field($model, 'tel')->label('Số điện thoại:',['class'=>'fw-bold']) ?>
                </div>
            </div>

            <?= $form->field($model, 'content')->textarea(['rows' => 6])->label('Nội dung liên hệ:',['class'=>'fw-bold'])?>

            <div class="form-group mt-2 mt-md-3">
                <?= Html::submitButton('Gửi', ['class' => 'btn btn-dark p-2 col-12', 'name' => 'contact-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
