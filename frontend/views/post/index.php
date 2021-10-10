<?php

/* @var $this yii\web\View */

/* @var $model \common\models\Post */

use yii\bootstrap5\Html;
use yii\helpers\Url;
use common\models\User;
use yii\widgets\LinkPager;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = Yii::t('app','Fashion News');
?>
<h2 class="d-none d-md-block"><?= Yii::t('app', 'News') ?></h2>
<div class="row mb-3">
    <?php foreach ($post as $key => $value) : ?>
        <!-- Three in a row -->

        <div class="col-12 col-md-6 col-lg-4 py-3 box">
            <div class="article-head">
                <a href="<?= Url::toRoute(['post/detail', 'id' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>"><img
                            class="article-head__image"
                            src="<?= $imgUrl . '/' . $value['avatar'] ?>"
                            alt="<?= $value['slug'] ?>"></a>
                <div class="article-category fs__12px">
                    <?= Yii::t('app', 'Category') ?>: <a target="_blank" class="text-decoration-none text-dark pc-title"
                                                         href="<?= Url::toRoute(['post/index', 'post_category' => \common\components\encrypt\CryptHelper::encryptString($value['pc-id'])]) ?>">
                        <?= Yii::t('app', $value['pc-title']) ?></a>
                </div>
                <div class="article-meta d-flex justify-content-center align-items-center py-1">
                    <i class="fa fa-calendar"></i>&nbsp;<b
                            class="color_main"><?= date_format(date_create($value['created_at']), 'H:i:s d/m/Y') ?></b>
                    &nbsp; Đăng bởi:&nbsp; <b class="color_main"><?= $value['name'] ?></b>
                </div>
            </div>
            <div class="article-title text-center">
                <a class="text-decoration-none text-dark title-heading"
                   href="<?= Url::toRoute(['post/detail', 'id' => \common\components\encrypt\CryptHelper::encryptString($value['id'])]) ?>">
                    <h5><?= $value['title'] ?></h5></a>
            </div>
            <div class="article-content text-center text-justify">
                <?= $value['content'] ?>
            </div>
            <ul class="tags mt-2">
                <?php foreach (\frontend\models\PostTag::getPostTag(explode(',', $value['tag_id'])) as $tag) : ?>
                    <li><a target="_blank" class="tag"
                           href="<?= Url::toRoute(['post/index', 'post_tag' => \common\components\encrypt\CryptHelper::encryptString($tag['id'])]) ?>">
                            <?= Yii::t('app', $tag['title']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>
</div>
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