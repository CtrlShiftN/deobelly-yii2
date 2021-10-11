<?php

/* @var $this yii\web\View */

/* @var $model \common\models\Post */

use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = $postDetail['title'];
$imgUrl = Yii::$app->params['common'] . "/media";
$this->registerCss('.post-content{text-align: justify}');
$this->registerCss('.post-content img{text-align: center}');
$this->registerCss('.related-post-list{list-style-type: "» "}');
?>
<h3><?= $postDetail['title'] ?></h3>
<span><?= Yii::t('app', 'Created at ') . date_format(date_create($postDetail['created_at']), 'H:i:s d-m-Y') ?></span>
<div class="text-center py-2">
    <img src="<?= $imgUrl . '/' . $postDetail['avatar'] ?>" width="80%">
</div>
<div class="post-content">
    <?= $postDetail['content'] ?>
</div>
<div class="post-tags pb-3">
    <?php foreach (\frontend\models\PostTag::getPostTag(explode(',', $postDetail['tag_id'])) as $tag) : ?>
        <a target="_blank" class="tag"
           href="<?= Url::toRoute(['post/index', 'post_tag' => \common\components\encrypt\CryptHelper::encryptString($tag['id'])]) ?>">
            <?= Yii::t('app', $tag['title']) ?></a>
    <?php endforeach; ?>
</div>
<div class="same-cate-post pb-3">
    <h4 class="text-uppercase"><?= Yii::t('app', 'Related news') ?></h4>
    <ul class="related-post-list">
        <?php foreach (\frontend\models\Post::getAllRelatedPostByCateID($postDetail['post_category_id']) as $post) : ?>
            <li class="pb-1"><a target="_blank" class="related-post-link text-decoration-none"
                   href="<?= Url::toRoute(['post/detail', 'id' => \common\components\encrypt\CryptHelper::encryptString($post['id'])]) ?>">
                    <?= Yii::t('app', $post['title']) ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
