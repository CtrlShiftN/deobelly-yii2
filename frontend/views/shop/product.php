<?php

/* @var $this yii\web\View */

use common\components\helpers\ParamHelper;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Product');
$this->params['breadcrumbs'][] = $this->title;
$cdnUrl = Yii::$app->params['frontend'];
$imgUrl = Yii::$app->params['common'] . "/media";
$this->registerCss("
.full-width {
    width: 100vw;
    position: relative;
    left: 50%;
    right: 49%;
    margin-left: -50vw;
    margin-right: -50vw;
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
    0% {
        transform: scale(1, 1);
    }
    45% {
        transform: scale(1.2, 1.2);
    }
    100% {
        transform: scale(1, 1);
    }
}

#sliderHeader .carousel-inner img {
    -webkit-animation: zoom 10s;
    animation: zoom 10s infinite;
}

#sliderHeader .carousel-inner .carousel-item img {
    object-fit: cover;
}

@media (max-width: 576px) {
    #sliderHeader .carousel-inner .carousel-item img {
        height: 87vh;
    }
}

@media (min-width: 576px) and (max-width: 768px) {
    #sliderHeader .carousel-inner .carousel-item img {
        height: 55vh;
    }
}

@media (min-width: 768px) and (max-width: 1400px) {
    #sliderHeader .carousel-inner .carousel-item img {
        height: 45vh;
    }
}

@media (min-width: 1400px) {
    #sliderHeader .carousel-inner .carousel-item img {
        height: 100vh;
    }
}
");
?>
<style>
    .accordion-button:focus {
        border-color: #000;
        box-shadow: none !important;
    }
    .accordion-button:not(.collapsed) {
        color: #000 !important;
        background-color: #fff !important;
        font-weight: 450 !important;
    }
    button:focus:not(:focus-visible) {
        /* outline: 0; */
    }
    .label-checkbox {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .label-checkbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 24px;
        width: 24px;
        background-color: #fff;
        border: 1px solid black;
    }
    .label-checkbox input:checked ~ .checkmark {
        background-color: #fff;
    }
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }
    .label-checkbox input:checked ~ .checkmark:after {
        display: block;
    }
    .label-checkbox .checkmark:after {
        left: 8px;
        top: 4px;
        width: 5px;
        height: 10px;
        border: solid black;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
</style>
<!-- Carousel wrapper -->
<div class="full-width">
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
                    <img src="<?= $imgUrl . '/slider' . $value['link'] ?>" class="d-block w-100" alt="..."/>
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
</div>
<div class="row">
    <div class="col-12 col-md-4 m-0 p-0">
        <div class="accordion accordion-flush" id="type_category">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed text-uppercase fw-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" data-category="new-product" aria-expanded="false" aria-controls="flush-collapseOne">
                        <?= Yii::t('app', 'new product') ?>
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse ps-4 ps-md-5 py-3" aria-labelledby="flush-headingOne" data-bs-parent="#type_category">
                    <label class="label-checkbox">Áo
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="label-checkbox">Quần
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="label-checkbox">Giày
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="label-checkbox">Sơ mi
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed text-uppercase fw-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <?= Yii::t('app', 'luxury product') ?>
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse ps-4 ps-md-5 py-3" aria-labelledby="flush-headingTwo" data-bs-parent="#type_category">
                    <label class="label-checkbox">Áo
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="label-checkbox">Váy
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="label-checkbox">Giày
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="label-checkbox">Sơ mi
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed text-uppercase fw-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        <?= Yii::t('app', 'Man Fashion') ?>
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse ps-4 ps-md-5 py-3" aria-labelledby="flush-headingThree" data-bs-parent="#type_category">
                    <label class="label-checkbox">Áo
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="label-checkbox">váy
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="label-checkbox">Giày
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="label-checkbox">Sơ mi
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed text-uppercase fw-light btn-type-cate" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        <?= Yii::t('app', 'Women Fashion') ?>
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse ps-4 ps-md-5 py-3" aria-labelledby="flush-headingFour" data-bs-parent="#type_category">
                    <label class="label-checkbox">Áo
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="label-checkbox">váy
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="label-checkbox">Giày
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="label-checkbox">Sơ mi
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFive">
                    <button class="accordion-button collapsed text-uppercase fw-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                        <?= Yii::t('app', 'Women Fashion') ?>
                    </button>
                </h2>
                <div id="flush-collapseFive" class="accordion-collapse collapse ps-4 ps-md-5 py-3" aria-labelledby="flush-headingFive" data-bs-parent="#type_category">
                    <label class="label-checkbox">Áo
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="label-checkbox">váy
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="label-checkbox">Giày
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="label-checkbox">Sơ mi
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-8 m-0 p-0">
        <input type='hidden' id='current_page' class="w-100">
        <div id="result" class="w-100 row m-0 p-0 my-3">
        </div>
        <div class="mt-2 text-center w-100" id="pagination">
            <input type='hidden' id='current_page'>
            <div id='page_navigation'></div>
        </div>
    </div>
</div>

<script>
    <?php if(!empty(ParamHelper::getParamValue('product_category'))): ?>
        var productCategory = '<?= $paramCate ?>';
        //$('button[data-category=<?//= $paramCate ?>//]').attr("aria-expanded","true");
    <?php else: ?>
        var productCategory = 'abc';
    <?php endif; ?>
    $(document).ready(function () {
            requestData();
    });
    function requestData() {
        let request = $.ajax({
            url: "<?= $cdnUrl ?>/api/ajax/test", // send request to
            method: "POST", // sending method
            data: {user_id: productCategory}, // sending data
        });

        request.done(function (msg) {
            console.log('success', msg); // what returns
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus); // check errors
        });
    }
</script>