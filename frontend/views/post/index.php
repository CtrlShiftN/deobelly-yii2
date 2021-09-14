<?php

/* @var $this yii\web\View */

/* @var $model \common\models\Post */

use yii\bootstrap5\Html;
use yii\helpers\Url;
use frontend\models\User;
use yii\widgets\LinkPager;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->registerCssFile(Url::toRoute("css/posts.css"));
?>
<div class="posts row mt-4">
    <div class="col-12 col-lg-8 col-xl-9 p-0 m-0">
        <div class="text-center fw-bold fs-1 border-bottom border-dark border-3">
            <i class="fas fa-feather-alt fa-flip-horizontal"></i> <span
                    class="fw-bold text-uppercase"><?= Yii::t('app', 'News') ?></span><i
                    class="fas fa-feather-alt"></i>
        </div>
        <?php foreach ($posts as $value) : ?>
            <div class="col-12 row p-0 m-0 my-2 my-md-4">
                <div class="col-4 px-md-4"><a href="#"><img src="<?= $imgUrl . '/' . $value['avatar'] ?>" class="img-fluid"></a>
                </div>
                <div class="col-8">
                    <a href="#">
                        <div class="h-75">
                            <h4 class="title text-uppercase fw-bold"><?= $value['title'] ?></h4>
                                <i class="far fa-calendar-alt"><span
                                            class="me-3"> <?= $value['updated_at'] ?></span></i>
                                <i class="fas fa-user d-none d-sm-inline-block"><span
                                            class="ms-1"><?= User::findOne(['id' => $value['admin_id']])['name']; ?></span></i>
                            <div class="short-text mt-2 mt-md-3 fs-5 lh-sm"><?= $value['content'] ?></div>
                        </div>
                    </a>
                    <div class="h-25 watch-more ">
                        <div class="d-flex align-items-end float-end h-100 fs-5">
                            <a href="#"><span>Xem thêm <i class="fas fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?= LinkPager::widget([
            'pagination' => $pages,
            //Css option for container
            'options' => ['class' => 'list-unstyled d-flex align-items-center justify-content-center', 'id' => "pagination"],
            //First option value
            'firstPageLabel' => '&#10094;&#10094;',
            //Last option value
            'lastPageLabel' => '&#10095;&#10095;',
            //Previous option value
            'prevPageLabel' => '&#10094;',
            //Next option value
            'nextPageLabel' => '&#10095;',
            //Current Active option value
            'activePageCssClass' => 'bg-danger p-active',
            //Max count of allowed options
            'maxButtonCount' => 3,
            // Css for each options. Links
            'linkOptions' => ['class' => 'text-decoration-none'],
            'disabledPageCssClass' => 'disabled p-2 border p-inactive',
            // Customzing CSS class for navigating link
            'prevPageCssClass' => 'p-back',
            'nextPageCssClass' => 'p-next',
            'firstPageCssClass' => 'p-first',
            'lastPageCssClass' => 'p-last',
        ])
        ?>
    </div>
    <div class="col-12 col-lg-4 col-xl-3">
        <div class="w-100"><p
                    class="fs-4 fw-bold border-bottom text-uppercase"><?= Yii::t('app', 'Post categories') ?></p></div>
        <div class="row text-dark">
            <?php foreach ($posts as $value): ?>
                <div class="col-6"><a href="#" class="w-100 one-line"><?= $value['pc-title'] ?></a></div>
            <?php endforeach; ?>
        </div>
        <div class="w-100 mt-3 fs-4"><p
                    class="fw-bold border-bottom text-uppercase"><?= Yii::t('app', 'outstanding blog posts') ?></p>
        </div>
        <?php foreach ($outstandingPosts as $value): ?>
            <div class="row my-lg-2 py-2">
                <div class="col-4">
                    <a href="#"><img src="<?= $imgUrl . '/' . $value['avatar'] ?>"
                                     class="img-fluid h-100 object-fit-cover"></a>
                </div>
                <div class="col-8">
                    <a href="#">
                        <div class="title text-uppercase fw-bold fs-6"><?= $value['title'] ?></div>
                            <i class="far fa-calendar-alt"><span
                                        class="me-3"> <?= $value['updated_at'] ?></span></i>
                            <i class="fas fa-user d-none d-sm-inline-block"><span
                                        class="ms-1"><?= User::findOne(['id' => $value['admin_id']])['name']; ?></span></i>
                        <div class="d-lg-none hot-news mt-2 mt-md-3 fs-5 lh-sm"><?= $value['content'] ?></div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
    $("#pagination").children().addClass('p-2 px-3 h-100 border').children().addClass("text-dark");
</script>