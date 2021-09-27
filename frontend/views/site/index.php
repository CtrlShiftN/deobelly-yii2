<?php

/* @var $this yii\web\View */

use common\models\User;
use yii\helpers\Url;

$imgUrl = Yii::$app->params['common'] . "/media";
$this->title = 'DE OBELLY';
$this->registerCssFile(Url::toRoute("/css/index.css"));
$this->registerCss("
#wrapper {
    overflow: hidden;
}
.full-width {
    width: 100vw;
    position: relative;
    left: 50%;
    right: 49%;
    margin-left: -50vw;
    margin-right: -50vw;
}

body {
    overflow-x: hidden !important;
    overflow-y: scroll !important;
}

#sliderHeader .carousel-inner .carousel-item img {
    height: 100vh;
    object-fit: cover;
}

@-webkit-keyframes zoom {
    from {
        -webkit-transform: scale(1, 1);
    }
    to {
        -webkit-transform: scale(1.3, 1.3);
    }
}

@keyframes zoom {
    from {
        transform: scale(1, 1);
    }
    to {
        transform: scale(1.3, 1.3);
    }
}

#sliderHeader .carousel-inner img {
    -webkit-animation: zoom 20s;
    animation: zoom 20s infinite;
}

");
?>
<div class="full-width">
    <!-- Carousel wrapper -->
    <div id="sliderHeader" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselBasicExample" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselBasicExample" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselBasicExample" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <!-- Inner -->
        <div class="carousel-inner">
            <!-- Single item -->
            <div class="carousel-item active">
                <img src="<?= $imgUrl ?>/slideshow.jpg" class="d-block w-100" alt="..."/>
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>No life is free right now, sometimes soft against vibrations</p>
                </div>
            </div>
            <!-- Single item -->
            <div class="carousel-item">
                <img src="<?= $imgUrl ?>/slideshow.jpg" class="d-block w-100" alt="..."/>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                </div>
            </div>
            <!-- Single item -->
            <div class="carousel-item">
                <img src="<?= $imgUrl ?>/slideshow.jpg" class="d-block w-100" alt="..."/>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur</p>
                </div>
            </div>
        </div>
        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#sliderHeader"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#sliderHeader"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel wrapper -->
</div>
