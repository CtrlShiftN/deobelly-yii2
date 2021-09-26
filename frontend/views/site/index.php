<?php

/* @var $this yii\web\View */

use common\models\User;
use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = 'DE OBELLY';
$this->registerCssFile(Url::toRoute("/css/index.css"));
$this->registerCss("
.full-width {
    width: 100vw;
    position: relative;
    left: 50%;
    right: 49%;
    margin-left: -50vw;
    margin-right: -50vw;
}
");
?>