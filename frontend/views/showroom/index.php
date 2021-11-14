<?php

use yii\widgets\LinkPager;

$this->registerCssFile(\yii\helpers\Url::toRoute('css/showroom.css'));
$this->title = Yii::t('app', 'Showroom Series');
$imgUrl = Yii::$app->params['common'] . '/media';
?>
<div class="showroom row mt-5 mx-0 px-0 w-100">
    <h1 class="showroom-title fs-4 text-bold text-uppercase w-100"><?= $this->title ?></h1>
    <?php foreach ($showrooms as $showroom): ?>
        <div class="col-12 col-md-6 col-lg-4 pe-3 mb-5 showroom-block"
             title="<?= $showroom['name'] . ' - ' . $showroom['address'] ?>">
            <a class="showroom-info text-decoration-none text-black" href="<?= $showroom['gps_link'] ?>"
              >
                <h3 class="fs-5 text-uppercase mt-2"><?= $showroom['name'] ?></h3>
                <div class="showroom-image mb-2">
                    <img class="w-100" src="<?= $imgUrl . '/' . $showroom['image'] ?>">
                </div>
                <p class="mb-2"><i class="fas fa-map-marker-alt"></i> <?= $showroom['address'] ?></p>
            </a>
            <a class="text-decoration-none text-black" href="tel:<?= $showroom['tel'] ?>">
                <p class="mb-2"><i class="fas fa-phone"></i> <?= $showroom['tel'] ?></p>
            </a>
            <a href="<?= $showroom['gps_link'] ?>">
                <p class="mb-2"><i class="fas fa-map-marked-alt text-black"></i> Chỉ đường qua Google Maps</p>
            </a>
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
