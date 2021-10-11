<?php

/* @var $this yii\web\View */

use frontend\models\ProductType;
use common\components\encrypt\CryptHelper;
use common\components\helpers\ParamHelper;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Product');
$this->params['breadcrumbs'][] = $this->title;
$cdnUrl = Yii::$app->params['frontend'];
$imgUrl = Yii::$app->params['common'] . "/media";
$this->registerCssFile(Url::toRoute('css/product.css'));
$paramCate = ParamHelper::getParamValue('type');
?>
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
                    <img src="<?= $imgUrl . '/' . $value['link'] ?>" class="d-block w-100" alt="..."/>
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

<div class="row m-0 p-0 pt-4 pt-md-5">
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasCategory"
         aria-labelledby="offcanvasCategoryLabel">
        <div class="offcanvas-header border-bottom border-dark">
            <h5 class="offcanvas-title text-uppercase" id="offcanvasCategoryLabel">Thể loại</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="accordion accordion-flush ct-show" id="type_category_offcanvas">
                <?php foreach ($productType as $key => $value): ?>
                    <?php $idEncrypted = \common\components\encrypt\CryptHelper::encryptString($value['id']) ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="offcanvas-flush-heading-<?= $idEncrypted ?>">
                            <button class="accordion-button collapsed text-uppercase fw-light btn-title-category"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-type="<?= $idEncrypted ?>"
                                    data-type-name="<?= $value['name'] ?>"
                                    data-bs-target="#offcanvas-flush-collapse-<?= $idEncrypted ?>"
                                    aria-expanded="false" aria-controls="offcanvas-flush-collapse-<?= $idEncrypted ?>">
                                <?= Yii::t('app', $value['name']) ?>
                            </button>
                        </h2>
                        <div id="offcanvas-flush-collapse-<?= $idEncrypted ?>"
                             class="accordion-collapse collapse ps-4 ps-md-5 py-3"
                             aria-labelledby="offcanvas-flush-heading-<?= $idEncrypted ?>"
                             data-bs-parent="#type_category_offcanvas">
                            <?php foreach (\frontend\models\ProductCategory::getCategoryByTypeId($value['id']) as $key => $cate): ?>
                                <label class="category-checkbox"><?= $cate['name'] ?>
                                    <input type="checkbox"
                                           value="<?= $cate['id'] ?>">
                                    <span class="checkmark"></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="col-12 d-md-none m-0 p-0 text-center position-relative h-tool border-dark border-bottom">
        <button class="btn bg-transparent border-0 rounded-0 float-start text-uppercase p-0 py-auto m-0 fs-6 fw-bold btn-offcanvas"
                type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCategory"
                aria-controls="offcanvasCategory">
            Thể loại <i class="fas fa-caret-down"></i>
        </button>
        <?php if (!empty($paramCate)): ?>
            <span class="fw-bold text-uppercase fs-6"
                  id="offcanvas-category-name"><?= ProductType::getTypeNameById(CryptHelper::decryptString($paramCate))[0]['name'] ?></span>
        <?php else: ?>
            <span class="fw-bold text-uppercase fs-6" id="offcanvas-category-name">Sản phẩm</span>
        <?php endif; ?>
        <div class="dropdown float-end offcanvas-dropdown">
            <button class="btn bg-transparent border-0 rounded-0 p-0 dropdown-toggle fs-6 fw-bold" type="button"
                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-sliders-h"></i> LỌC
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    <button class="dropdown-item btn border-0 rounded-0 sortByDate">Mới nhất</button>
                </li>
                <li>
                    <button class="dropdown-item btn border-0 rounded-0 highToLow">Giá giảm dần</button>
                </li>
                <li>
                    <button class="dropdown-item btn border-0 rounded-0 lowToHigh">Giá tăng dần</button>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-12 col-md-3 m-0 p-0 d-md-block d-none">
        <div class="w-100 px-3 py-2 m-0 border-bottom border-dark">
            <span class="fw-bold fs-5 p-0 text-uppercase">Thể loại</span>
        </div>
        <div class="accordion accordion-flush w-100 pb-5" id="type_category">
            <?php foreach ($productType as $key => $value): ?>
                <?php $idEncrypted = \common\components\encrypt\CryptHelper::encryptString($value['id']) ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading-<?= $idEncrypted ?>">
                        <button class="accordion-button collapsed text-uppercase fw-light btn-title-category"
                                type="button"
                                data-bs-toggle="collapse"
                                data-type="<?= $idEncrypted ?>"
                                data-type-name="<?= $value['name'] ?>"
                                data-bs-target="#flush-collapse-<?= $idEncrypted ?>"
                                aria-expanded="false" aria-controls="flush-collapse-<?= $idEncrypted ?>">
                            <?= Yii::t('app', $value['name']) ?>
                        </button>
                    </h2>
                    <div id="flush-collapse-<?= $idEncrypted ?>"
                         class="accordion-collapse collapse ps-4 ps-md-5 py-3"
                         aria-labelledby="flush-heading-<?= $idEncrypted ?>" data-bs-parent="#type_category">
                        <?php foreach (\frontend\models\ProductCategory::getCategoryByTypeId($value['id']) as $key => $cate): ?>
                            <label class="category-checkbox"><?= $cate['name'] ?>
                                <input type="checkbox"
                                       value="<?= $cate['id'] ?>">
                                <span class="checkmark"></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-12 col-md-9 m-0 p-0">
        <div class="px-3 w-100 d-md-block d-none" style="height:47px">
            <div class="w-100 py-2 border-bottom border-dark mb-2">
                <?php if (!empty($paramCate)): ?>
                    <span class="fw-bold text-uppercase fs-5"
                          id="category-name"><?= ProductType::getTypeNameById(CryptHelper::decryptString($paramCate))[0]['name'] ?></span>
                <?php else: ?>
                    <span class="fw-bold text-uppercase fs-5" id="category-name">Sản phẩm</span>
                <?php endif; ?>
                <div class="dropdown float-end">
                    <button class="btn bg-transparent border-0 rounded-0 p-0 dropdown-toggle" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-sliders-h"></i> LỌC
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <button class="dropdown-item btn border-0 rounded-0 sortByDate">Mới nhất</button>
                        </li>
                        <li>
                            <button class="dropdown-item btn border-0 rounded-0 highToLow">Giá giảm dần</button>
                        </li>
                        <li>
                            <button class="dropdown-item btn border-0 rounded-0 lowToHigh">Giá tăng dần</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <input type='hidden' id='current_page' class="w-100">
        <div id="result" class="w-100 row m-0 p-0 my-3">


<!--            <div class="col-12 col-sm-6 col-lg-4 mx-0 my-3 position-relative product-card overflow-hidden">-->
<!--                <div class="position-relative overflow-hidden w-100">-->
<!--                    <a href="javascript:void(0)"  class="text-decoration-none text-dark px-0 w-100 position-relative img-shadow">-->
<!--                        <div class="position-relative product-img w-100">-->
<!--                            <img class="img-product" src="--><?//= $imgUrl ?><!--/product/clothes/shirt/ao-so-mi-lados.jpg">-->
<!--                        </div>-->
<!--                        <div class="pr-inf px-2 px-lg-1 px-xl-2 py-2 w-100 border-top">-->
<!--                            <span class="px-0 fw-bold mt-2 p-price"><span class="text-decoration-line-through text-dark fw-light fs-regular-price">100.000.000</span> 100.000.000 VNĐ</span>-->
<!--                            <p class="m-0 product-name">arrRes.product[i]. name name name namename namename namename namename</p>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="product-button row m-0">-->
<!--                    <a href="javascript:void(0)" class="btn rounded-0 btnAdd col-4 col-md-3"><i class="fas fa-cart-plus"></i></a>-->
<!--                    <a href="javascript:void(0)" class="btn rounded-0 btnBuyNow col-4 col-md-6"><i class="fas fa-dollar-sign d-md-none"></i><span class="d-none d-md-inline-block"><i class="fas fa-dollar-sign"></i> Mua ngay</span></a>-->
<!--                    <a href="javascript:void(0)" class="btn rounded-0 btnAdd col-4 col-md-3"><i class="far fa-heart"></i></a>-->
<!--                </div>-->
<!--            </div>-->






        </div>
        <div class="mt-2 text-center w-100" id="pagination">
            <input type='hidden' id='current_page'>
            <div id='page_navigation' class="text-end"></div>
        </div>
    </div>
</div>
<script>
</script>
<script type="text/javascript" src="<?= Url::toRoute('js/product.js') ?>"></script>