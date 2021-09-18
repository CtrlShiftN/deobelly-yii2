<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\assets\AppAsset;
use yii\bootstrap5\Html;

$cdnUrl = Yii::$app->params['frontend'];
$imgUrl = Yii::$app->params['common']."/media";
$this->registerCssFile("$cdnUrl/css/login.css");

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <?= $this->render('_blankHead') ?>
        <?php $this->registerCss("body,html {width:  100%;height:  100vh !important;margin:  0;padding:  0;} 
            #wrapper { background-image: url('$imgUrl/background-layout.png');min-height: 100%; background-position: top; background-repeat: no-repeat; background-size: cover; }
            ::placeholder {color: white !important;}input{background-color: transparent !important;}
            .invalid-feedback{padding-left: 17px;}
            input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;-moz-appearance: none;appearance: none;margin: 0;}
            ") ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div id="wrapper">
            <div class="container">
                <?= $content ?>
            </div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();