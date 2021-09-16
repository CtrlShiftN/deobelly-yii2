<?php

/* @var $this yii\web\View */

/* @var $model \common\models\Post */

use yii\bootstrap5\Html;
use yii\helpers\Url;
use common\models\User;
use yii\widgets\LinkPager;

$imgUrl = Yii::$app->params['common'] . "/media";
?>
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
<script>
    $("#pagination").children().addClass('p-2 px-3 h-100 border').children().addClass("text-dark");
</script>