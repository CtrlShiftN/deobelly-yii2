<?php

/* @var $this yii\web\View */
/* @var $model \common\models\Posts */

use yii\bootstrap4\Html;
use yii\helpers\Url;

$cdnUrl = Yii::$app->params['common'];
$this->registerCssFile(Url::toRoute("css/posts.css"));
?>

<div class="row mt-4">
    <div class="col-12 col-lg-8 p-0 m-0">
        <div class="text-center fw-bold fs-1 border-bottom border-dark border-3">
            <i class="fas fa-feather-alt fa-flip-horizontal"></i> <span class="fw-bold"> Tin Mới </span><i
                class="fas fa-feather-alt"></i>
        </div>
        <?php foreach($posts as $value) : ?>
            <?php
            $avatar = pathinfo($value['avatar'], PATHINFO_BASENAME);
            $thumbnail = pathinfo($value['thumbnail'], PATHINFO_BASENAME); ?>

            <div class="col-12 row p-0 m-0 my-2 my-md-4">
                <div class="col-4"><a href="#"><img src="<?= $cdnUrl.'/media/'.$value['avatar']?>" class="img-fluid"></a></div>
                <div class="col-8">
                    <div class="h-75">
                        <h4 class="title text-uppercase fw-bold"><a href="#"><?=$value['title']?></a></h4>
                        <div class="date-author">
                            <i class="far fa-calendar-alt"></i><span class="me-3">16/07/2021 </span><i class="fas fa-user"></i><span class="ms-1">DE OBELLY</span>
                        </div>
                        <div class=" short-text mt-2 mt-md-3 fs-5 lh-sm"><?=$value['content'] ?></div>
                    </div>
                    <div class="h-25 watch-more ">
                        <div class="d-flex align-items-end float-end h-100 fs-5">
                            <a href="#"><span>xem thêm <i class="fas fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class=" col-12 col-lg-4">
        <div class="w-100"><p class="fs-4 fw-bold border-bottom">DANH MỤC TIN TỨC</p></div>
        <div class="text-dark">
            <?php for ($i = 0; $i < 3; $i++): ?>
            <a href="" class="w-100">Xu Hướng Thời Trang<span class="float-end">(7)</span></a><br>
            <?php endfor; ?>
        </div>
        <div class="w-100 mt-3 fs-3"><span class="fw-bold">TIN NỔI BẬT</span></div>
        <?php foreach($posts as $value): ?>
            <div class="row my-2 ">
                <div class="col-4 ">
                    <a href="#"><img src="<?= $cdnUrl.'/media/'.$value['thumbnail']?>" class="img-fluid h-100"></a>
                </div>
                <div class="col-8">
                    <div class="title text-uppercase fw-bold"><a href="#"><?=$value['title']?></a></div>
                    <div class="date-author d-lg-none d-xl-block mt-2">
                        <i class="far fa-calendar-alt"></i><span>16/07/2021 </span><i class="fas fa-user ms-1"></i><span>DE OBELLY</span></div>
                    <div class="d-lg-none hot-news mt-2 mt-md-3 fs-5 lh-sm"><?=$value['content'] ?></div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="my-4">
            <div class="my-4 d-none d-lg-block"><a href="">
                    <a href="#"><img src="<?= $cdnUrl.'/media/'.$value['thumbnail']?>" class="img-fluid"></a>
            </div>
        </div>
    </div>
</div>
