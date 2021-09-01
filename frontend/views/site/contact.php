<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile(Url::toRoute('css/contact.css'));
?>
<div class="site-contact">
    <div class="w-100">
        <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8752675235874!2d105.77944141269522!3d21.037676292854805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b55b011e49%3A0x9406c12dc4604160!2zxJDhuqFpIGjhu41jIFF14buRYyBnaWEgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1629020641063!5m2!1svi!2s"
                width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="row mt-3 ">
        <div class="col-lg-6 order-lg-first order-xs-last">
            <h3 class="fw-bold mb-4 text-center text-md-start"><span
                        class=" border-3 border-dark border-bottom">LIÊN HỆ</span></h3>
            <div class="fs-5">
                <p><span class="text-muted">Địa chỉ của chúng tôi</span><br>Tầng 1,tòa nhà GP Invest, 170 Đê La Thành,
                    Đống Đa,Hà Nội</p>
                <p><span class="text-muted">Email của chúng tôi</span><br>hi@gmail.com</p>
                <p><span class="text-muted">Điện Thoại</span><br>1900.636.099</p>
                <p><span class="text-muted">Thời gian làm việc</span><br>Thứ 2 đến Thứ 6 từ 8h đến 18h; Thứ 7 và Chủ
                    nhật từ 8h00 đến 17h00</p>
            </div>
        </div>

        <div class="col-12 col-lg-6 order-sm-first order-xs-first">
            <h3 class="fw-bold mb-4  text-center text-md-start"><span class=" border-3 border-dark border-bottom ">GỬI THẮC MẮC CỦA BẠN</span>
            </h3>
            <div class="hr"></div>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'email') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'tel') ?>
                </div>
            </div>

            <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4><i class="icon fa fa-check"></i> THÀNH CÔNG!</h4>
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>
        <?php if (Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4><i class="fas fa-times"></i> LỖI!</h4>
                <?= Yii::$app->session->getFlash('error') ?>
            </div>
        <?php endif; ?>
    </div>
</div>
