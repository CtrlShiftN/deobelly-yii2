<?php
/* @var $this yii\web\View */
$imgUrl = Yii::$app->params['common'] . '/media';
$this->title = Yii::t('app', 'Top Collection');
$this->registerCssFile('/css/collection.css');
//var_dump($otherMixes);die;
?>

<div class="collections row mt-4">
    <div class="top-collection">
        <h2 class="d-none d-md-block"><?= Yii::t('app', 'Top Collection') ?></h2>
        <div class="px-5 px-md-3 m-0">
            <div class="row pt-3">
                <div class="col-12 col-md-7">
                    <img src="<?= $imgUrl . '/' . $topMix['image'] ?>" class="w-100">
                </div>
                <div class="col-12 col-md-5 top-collection__content">
                    <h3><?= $topMix['title'] ?></h3>
                    <p><?= Yii::t('app', 'Created at ') . date_format(date_create($topMix['created_at']), 'H:i:s d-m-Y') ?></p>
                    <?= strip_tags($topMix['content']) ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Weekly Collections -->
    <div class="weekly-collection mt-3">
        <h2 class="d-none d-md-block my-3"><?= Yii::t('app', 'Weekly Collections') ?></h2>
        <div class="row mx-auto my-auto justify-content-center px-0">
            <div id="recipeCarousel" class="carousel slide px-0" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <?php foreach ($otherMixes as $key => $mixes) : ?>
                        <div class="carousel-item  <?= ($key == 0) ? 'active' : $key ?>">
                            <div class="col-md-4 col-lg-3 px-5 px-md-3 pb-5">
                                <div class="card card-shadow">
                                    <a href="<?= \yii\helpers\Url::toRoute(['mix-and-match/', 'mix'=>\common\components\encrypt\CryptHelper::encryptString($mixes['id'])]) ?>">
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
                <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button"
                   data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button"
                   data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
    <!-- End Weekly Collections -->
</div>
<script>
    let items = document.querySelectorAll('.carousel .carousel-item')

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