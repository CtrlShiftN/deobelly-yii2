<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Url;

$this->title = 'Chính sách và điều khoản';
$this->registerCssFile(Url::toRoute('css/terms.css'));
?>
<div class="my-4" id="contentTerms">
    <h1 class="text-center">Điều Khoản Và Dịch Vụ</h1>
    <hr>
    <?php foreach ($terms as $value): ?>
    <h5><?= $value['id'] ?>. <?= $value['title'] ?></h5>
    <?= $value['content'] ?>
    <?php endforeach; ?>
</div>

