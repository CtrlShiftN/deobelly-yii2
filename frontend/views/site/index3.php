<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = 'DE OBELLY';
?>
<div class="under-construction">
    <img src="<?= $imgUrl.'/under-construction.jpg' ?>" class="img-fluid">
</div>
