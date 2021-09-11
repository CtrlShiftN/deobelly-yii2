<?php

/* @var $this yii\web\View */
/* @var $model \common\models\Posts */

use yii\bootstrap4\Html;
use yii\helpers\Url;
use frontend\models\User;

$imgUrl = Yii::$app->params['common']."/media";
$this->registerCssFile(Url::toRoute("css/posts.css"));
?>

<div class="posts row mt-4">
    <div class="col-12 col-lg-8 p-0 m-0">
        <div class="text-center fw-bold fs-1 border-bottom border-dark border-3">
            <i class="fas fa-feather-alt fa-flip-horizontal"></i> <span class="fw-bold"> Tin Mới </span><i
                class="fas fa-feather-alt"></i>
        </div>
        <?php foreach($posts as $value) : ?>
            <div class="col-12 row p-0 m-0 my-2 my-md-4">
                <div class="col-4"><a href="#"><img src="<?= $imgUrl.'/'.$value['avatar']?>" class="img-fluid"></a></div>
                <div class="col-8">
                    <div class="h-75">
                        <h4 class="title text-uppercase fw-bold"><a href="#"><?=$value['title']?></a></h4>
                        <div class="date-author">
                            <i class="far fa-calendar-alt"><span class="me-3"> <?=$value['updated_at']?></span></i>
                            <i class="fas fa-user"><span class="ms-1"><?= User::findOne(['id' =>$value['admin_id']])['name']; ?></span></i>
                        </div>
                        <div class="short-text mt-2 mt-md-3 fs-5 lh-sm"><?=$value['content'] ?></div>
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
    <div class="col-12 col-lg-4">
        <div class="w-100"><p class="fs-4 fw-bold border-bottom">DANH MỤC TIN TỨC</p></div>
        <div class="row text-dark">
            <?php foreach($posts as $value): ?>
                <div class="col-6"><a href="#" class="w-100 one-line"><?= $value['pc-title'] ?></a></div>
            <?php endforeach; ?>
            </div>
        <div class="w-100 mt-3 fs-3"><p class="fw-bold border-bottom">TIN NỔI BẬT</p></div>
        <?php foreach($posts as $value): ?>
            <div class="row my-lg-2 my-3">
                <div class="col-4">
                    <a href="#"><img src="<?= $imgUrl.'/'.$value['thumbnail']?>" class="img-fluid h-100"></a>
                </div>
                <div class="col-8">
                    <div class="title text-uppercase fw-bold"><a href="#"><?=$value['title']?></a></div>
                    <div class="date-author d-lg-none d-xl-block mt-2">
                        <i class="fas fa-user ms-1"></i>
                        <span><?= User::findOne(['id' =>$value['admin_id']])['name']; ?></span></div>
                    <div class="d-lg-none hot-news mt-2 mt-md-3 fs-5 lh-sm"><?=$value['content'] ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
