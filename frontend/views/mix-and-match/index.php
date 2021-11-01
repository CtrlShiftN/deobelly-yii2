<?php
/* @var $this yii\web\View */
$imgUrl = Yii::$app->params['common'] . '/media';
$this->title = Yii::t('app', 'Top Collection');
$this->registerCssFile('/css/collection.css');
//var_dump($otherMixes);die;
?>

<div class="collections row mt-4 w-100 px-0 mx-0">
    <div class="top-collection px-2">
        <!--        <h2 class="d-none d-lg-block">--><? //= Yii::t('app', 'Top Collection') ?><!--</h2>-->
        <div class="row pt-3 w-100 px-0 mx-0">
            <div class="col-12 col-lg-7">
                <div class="zoom">
                    <img src="<?= $imgUrl . '/' . $topMix['image'] ?>" class="w-100">
                </div>
            </div>
            <div class="col-12 col-lg-5 top-collection__content pt-3 pt-lg-0">
                <h3><?= $topMix['title'] ?></h3>
                <p>
                    <i class="fas fa-calendar-alt"></i> <?= date_format(date_create($topMix['created_at']), 'H:i:s d-m-Y') ?>
                </p>
                <?= strip_tags($topMix['content']) ?>
                <div class="top-collection__products py-3">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                    <?= Yii::t('app', 'Products') ?>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body row mx-0 pb-4 d-flex align-items-stretch w-100 px-0">
                                    <?php foreach ($topMix['element_products'] as $key => $products) : ?>
                                        <div class="col-12 col-md-6 pb-3">
                                            <div class="card card-shadow h-100">
                                                <a href="<?= \yii\helpers\Url::toRoute(['shop/product-detail', 'detail' => \common\components\encrypt\CryptHelper::encryptString($products['id'])]) ?>"
                                                   target="_blank" title="<?= $products['name'] ?>">
                                                    <div class="card-img h-100 zoom">
                                                        <img src="<?= $imgUrl . '/' . $products['image'] ?>"
                                                             class="img-fluid h-100 object-fit-cover">
                                                    </div>
                                                    <div class="other-mixes__title fw-bolder fs-6"><?= $products['name'] ?></div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Weekly Collections -->
    <div class="weekly-collection mt-3">
        <h2 class="mx-3 previous-collection__title"><?= Yii::t('app', 'Weekly Collections') ?></h2>
        <div class="row mx-0 justify-content-center px-0 w-100">
            <div id="recipeCarousel" class="mixAndMatchCarousel carousel slide px-0 w-100" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <?php foreach ($otherMixes as $key => $mixes) : ?>
                        <div class="carousel-item <?= ($key == 0) ? 'active' : '' ?>">
                            <div class="col-12 col-md-3 px-5 px-md-3 pb-5">
                                <div class="card card-shadow">
                                    <a href="<?= \yii\helpers\Url::toRoute(['mix-and-match/', 'mix' => \common\components\encrypt\CryptHelper::encryptString($mixes['id'])]) ?>">
                                        <div class="card-img">
                                            <img src="<?= $imgUrl . '/' . $mixes['image'] ?>" class="img-fluid">
                                        </div>
                                        <div class="other-mixes__title fw-bolder fs-6"><?= $mixes['title'] ?></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#recipeCarousel"
                        data-bs-slide="prev">
                    <i class="fas fa-chevron-left fa-3x text-dark"></i>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#recipeCarousel"
                        data-bs-slide="next">
                    <i class="fas fa-chevron-right fa-3x text-dark"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- End Weekly Collections -->
</div>
<script>
    let items = document.querySelectorAll('.mixAndMatchCarousel .carousel-item')

    items.forEach((el) => {
        const minPerSlide = 4
        let next = el.nextElementSibling
        for (var i = 1; i < minPerSlide; i++) {
            if (!next) {
                // wrap carousel by using first child
                next = items[0]
            }
            let cloneChild = next.cloneNode(true)
            el.appendChild(cloneChild.children[0])
            next = next.nextElementSibling
        }
    })
</script>