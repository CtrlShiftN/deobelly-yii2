<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = Yii::t('app','Our stories');
$this->params['breadcrumbs'][] = $this->title;
$imgUrl = Yii::$app->params['common'] . "/media";
$this->registerCssFile(Url::toRoute("/css/stories.css"));
?>
<div class="site-our-stories">
    <div class="full-width">
        <!-- Carousel wrapper -->
        <div id="sliderHeader" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <?php foreach ($slider as $key => $value): ?>
                    <button type="button" data-bs-target="#carouselBasicExample" data-bs-slide-to="<?= $key ?>"
                            class="active"
                            aria-current="true" aria-label="Slide <?= $key + 1 ?>"></button>
                <?php endforeach; ?>
            </div>
            <!-- Inner -->
            <div class="carousel-inner">
                <?php foreach ($slider as $key => $value): ?>
                    <!-- Single item -->
                    <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                        <img src="<?= $imgUrl . $value['link'] ?>" class="d-block w-100" alt="..."/>
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?= empty($value['slide_label']) ? '' : $value['slide_label'] ?></h5>
                            <p><?= empty($value['slide_text']) ? '' : $value['slide_text'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
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
</div>