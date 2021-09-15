<?php

/* @var $this yii\web\View */

/* @var $model \common\models\Post */

use yii\bootstrap5\Html;
use yii\helpers\Url;
use common\models\User;
use yii\widgets\LinkPager;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->registerCssFile(Url::toRoute("css/post.css"));
$this->registerCss("
    .accordion-item {
        border: 1px solid black !important;
    }
    .accordion-item, .accordion-button:focus {
        outline: none !important;
    }
    .accordion-button:focus {
        box-shadow: none !important;
    }
");
?>
<div class="posts row mt-4">
    <div class="col-12 col-lg-8 col-xl-9 p-0 m-0">
        <div class="text-center fw-bold fs-1 border-bottom border-dark border-3">
            <i class="fas fa-feather-alt fa-flip-horizontal"></i> <span
                    class="fw-bold text-uppercase"><?= Yii::t('app', 'News') ?></span><i
                    class="fas fa-feather-alt"></i>
        </div>
        <?php foreach ($post as $value) : ?>
            <div class="col-12 row px-0 m-0 py-3 py-md-4">
                <div class="col-4 px-md-5"><a href="#"><img src="<?= $imgUrl . '/' . $value['avatar'] ?>"
                                                            class="img-fluid"></a>
                </div>
                <div class="col-8">
                    <div class="h-75">
                        <h4 class="tag-ellipsis text-uppercase fw-bold"><?= $value['title'] ?></h4>
                        <i class="far fa-calendar-alt"><span
                                    class="me-3"> <?= $value['updated_at'] ?></span></i>
                        <i class="fas fa-user d-none d-sm-inline-block"><span
                                    class="ms-1"><?= User::findOne(['id' => $value['admin_id']])['name']; ?></span></i>
                        <div class="mt-1 mt-md-2 title">
                            <?php if (!empty($value['tag_id'])): ?>
                                <?php foreach (\frontend\models\PostTag::getPostTag(explode(',', $value['tag_id'])) as $tag) : ?>
                                    <a target="_blank"
                                       href="<?= Url::toRoute(['post/index', 'post_tag' => \common\components\encrypt\CryptHelper::encryptString($value['tag_id'])]) ?>"><span
                                                class="badge border text-dark"><?= Yii::t('app', $tag['title']) ?></span></a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="short-text mt-2 fs-5 lh-sm"><?= $value['content'] ?></div>
                    </div>
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
        <div class="accordion accordion-flush" id="accordionFlushPost">
            <div class="accordion-item">
                <button class="accordion-button collapsed bg-white" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <h4 class="accordion-header text-dark fw-bolder text-uppercase"
                        id="flush-headingOne"><?= Yii::t('app', 'Post categories') ?>
                    </h4>
                </button>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                     data-bs-parent="#accordionFlushPost">
                    <div class="accordion-body border-top border-dark">
                        <?php foreach ($postCategory as $value): ?>
                            <a target="_blank"
                               href="<?= Url::toRoute(['post/index', 'post_category' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"><span
                                        class="badge bg-secondary rounded-0 fs-6 p-2 mb-1"><?= Yii::t('app', $value['title']) ?></span></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 mt-3 fs-4"><p
                    class="fw-bold border-bottom text-uppercase text-center"><?= Yii::t('app', 'outstanding blog posts') ?></p>
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