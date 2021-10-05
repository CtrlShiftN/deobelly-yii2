<?php

/* @var $this yii\web\View */

use common\components\helpers\ParamHelper;
use frontend\models\ProductCategory;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Product');
$this->params['breadcrumbs'][] = $this->title;
$cdnUrl = Yii::$app->params['frontend'];
$imgUrl = Yii::$app->params['common'] . "/media";
$this->registerCssFile(Url::toRoute('css/product.css'));
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
                                    data-bs-target="#offcanvas-flush-collapse-<?= $idEncrypted ?>"
                                    aria-expanded="false" aria-controls="offcanvas-flush-collapse-<?= $idEncrypted ?>">
                                <?= Yii::t('app', $value['name']) ?>
                            </button>
<!--                            <input type='hidden' class="big-cate w-100" value="--><?//= $value['code'] ?><!--">-->
<!--                            <input type='hidden' class="big-cate-name w-100"-->
<!--                                   value="--><?//= ProductCategory::getBigCategoryName($value['code']) ?><!--">-->
                        </h2>
                        <div id="offcanvas-flush-collapse-<?= $idEncrypted ?>"
                             class="accordion-collapse collapse ps-4 ps-md-5 py-3"
                             aria-labelledby="offcanvas-flush-heading-<?= $idEncrypted ?>"
                             data-bs-parent="#type_category_offcanvas">
                            <?php foreach (\frontend\models\ProductCategory::getCategoryByTypeId($value['id']) as $key => $cate): ?>
                                <label class="category-checkbox"><?= $cate['name'] ?>
                                    <input type="checkbox" value="<?= \common\components\encrypt\CryptHelper::encryptString($cate['id']) ?>">
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
        <span class="fw-bold text-uppercase fs-6" id="offcanvas-category-name">Sản phẩm</span>
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
        <div class="w-100 px-3 py-2 mb-2 border-bottom border-dark">
            <span class="fw-bold fs-5 p-0 text-uppercase">Thể loại</span>
        </div>
        <div class="accordion accordion-flush w-100" id="type_category">
            <?php foreach ($productType as $key => $value): ?>
                <?php $idEncrypted = \common\components\encrypt\CryptHelper::encryptString($value['id']) ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading-<?= $idEncrypted ?>">
                        <button class="accordion-button collapsed text-uppercase fw-light btn-title-category"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse-<?= $idEncrypted ?>"
                                aria-expanded="false" aria-controls="flush-collapse-<?= $idEncrypted ?>">
                            <?= Yii::t('app', $value['name']) ?>
                        </button>
<!--                        <input type='hidden' class="big-cate w-100" value="--><?//= $value['code'] ?><!--">-->
<!--                        <input type='hidden' class="big-cate-name w-100"-->
<!--                               value="--><?//= ProductCategory::getBigCategoryName($value['code']) ?><!--">-->
                    </h2>
                    <div id="flush-collapse-<?= $idEncrypted ?>"
                         class="accordion-collapse collapse ps-4 ps-md-5 py-3"
                         aria-labelledby="flush-heading-<?= $idEncrypted ?>" data-bs-parent="#type_category">
                        <?php foreach (\frontend\models\ProductCategory::getCategoryByTypeId($value['id']) as $key => $cate): ?>
                            <label class="category-checkbox"><?= $cate['name'] ?>
                                <input type="checkbox" value="<?= \common\components\encrypt\CryptHelper::encryptString($cate['id']) ?>">
                                <span class="checkmark"></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-12 col-md-9 m-0 p-0 row">
        <div class="px-3 w-100 d-md-block d-none">
            <div class="w-100 py-2 border-bottom border-dark mb-2">
                <span class="fw-bold text-uppercase fs-5" id="category-name">Sản phẩm</span>
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
        </div>
        <div class="mt-2 text-center w-100" id="pagination">
            <input type='hidden' id='current_page'>
            <div id='page_navigation' class="text-end"></div>
        </div>
    </div>
</div>
<script>
    var cdnUrl = '<?= $cdnUrl ?>';
    var imgUrl = '<?= $imgUrl ?>';
    var buyNow = '<?= Yii::t('app', 'Buy now') ?>';
    var addToCart = '<?= Yii::t('app', 'Add to cart') ?>';
    var show_per_page = <?= \common\components\SystemConstant::LIMIT_PER_PAGE ?>;
    var category, bigCate, bigCateName, cursor, sort, productCategory;

    <?php if(!empty($paramCate)): ?>
    productCategory = '<?= $paramCate ?>';
    <?php else: ?>
    productCategory = null;
    <?php endif; ?>

    //jQuery(document).ready(function () {
    //    $('#current_page').val(0);
    //    requestData();
    //});
    //
    //var checkboxes = $('input[type=checkbox]');
    //$('.accordion-button').click(function () {
    //    checkboxes.prop("checked", false);
    //    $('#current_page').val(0);
    //    cursor = category = sort = null;
    //    if (!$(this).hasClass('collapsed')) {
    //        bigCate = $(this).parent().children('.big-cate').val();
    //        bigCateName = $(this).parent().children('.big-cate-name').val();
    //    } else {
    //        bigCate = bigCateName = null;
    //    }
    //    requestData();
    //});
    //
    //var categoryCb = $('.category-checkbox input[type=checkbox]');
    //categoryCb.change(function () {
    //    category = getCheckedBoxes(categoryCb);
    //    $('#current_page').val(0);
    //    cursor = sort = null;
    //    requestData();
    //});
    //
    //// sort
    //$(".lowToHigh").click(function () {
    //    sort = 1;
    //    $('#current_page').val(0);
    //    cursor = null;
    //    requestData();
    //});
    //$(".highToLow").click(function () {
    //    sort = 2;
    //    $('#current_page').val(0);
    //    cursor = null;
    //    requestData();
    //});
    //$(".sortByDate").click(function () {
    //    sort = 3;
    //    $('#current_page').val(0);
    //    cursor = null;
    //    requestData();
    //});
    //
    ////get value from checkboxes
    //function getCheckedBoxes(checkbox) {
    //    return checkbox.filter(":checked")
    //        .map(function () {
    //            return this.value;
    //        })
    //        .get();
    //}
    //
    //function requestData() {
    //    let request = $.ajax({
    //        url: "<?//= $cdnUrl ?>///api/ajax/product-filter-ajax", // send request to
    //        method: "POST", // sending method
    //        data: {
    //            cate: category,
    //            cursor: cursor,
    //            bigCate: bigCate,
    //            sort: sort,
    //        }, // sending data
    //    });
    //
    //    request.done(function (response) {
    //        let arrRes = $.parseJSON(response);
    //        if (bigCateName !== null) {
    //            $('#category-name').html(bigCateName);
    //            $('#offcanvas-category-name').html(bigCateName);
    //        } else {
    //            $('#category-name').html('Sản phẩm');
    //            $('#offcanvas-category-name').html('Sản phẩm');
    //        }
    //        if (arrRes.status === 1) {
    //            $('#pagination').show();
    //            let result = "";
    //            for (let i = 0; i < arrRes.product.length; i++) {
    //                //format price
    //                var regular_price = new Intl.NumberFormat(['ban', 'id']).format(arrRes.product[i].regular_price);
    //                result += '<div class="col-12 col-sm-6 col-lg-4 mx-0 my-4 position-relative product-card overflow-hidden"><a href="' + cdnUrl + '/shop/product-detail?detail=' + arrRes.product[i].id + '" class="text-decoration-none text-dark px-0 w-100" target="_blank"><div class="position-relative product-img w-100 mb-2"><img class="img-product shadow" src="' + imgUrl + '/' + arrRes.product[i].image + '"></div>';
    //                if (arrRes.product[i].sale_price !== arrRes.product[i].regular_price) {
    //                    var sale_price = new Intl.NumberFormat(['ban', 'id']).format(arrRes.product[i].sale_price);
    //                    result += '<span class="px-0 fw-bold mt-2 p-price"><span class="text-decoration-line-through text-dark fw-light fs-regular-price">' + regular_price + '</span> ' + sale_price + ' VNĐ</span>';
    //                } else {
    //                    result += '<span class="px-0 fw-bold mt-2 p-price">' + regular_price + ' VNĐ</span>';
    //                }
    //                result += '<p class="fs-5 m-0 product-name">' + arrRes.product[i].name + '</p></a><div class="product-button"><a href="#" class="btn btn-dark rounded-0 btnBuyNow w-75">' + buyNow + '</a><a href="#" class="btn btn-dark rounded-0 btnAdd w-75 mt-2"><i class="fas fa-cart-plus"></i> ' + addToCart + '</a></div><button type="button" class="btn bg-white rounded-0 border p-2 py-1 fs-4 favor position-absolute" onclick="favor()"><i class="far fa-heart"></i></button></div>';
    //            }
    //            $("#result").html(result);
    //            //show pagination
    //            var number_of_items = arrRes.count;
    //            var number_of_pages = Math.ceil(number_of_items / show_per_page);
    //            jQuery(document).ready(function () {
    //                var navigation_html = '<a class="first_link" href="javascript:first();">&#10094;&#10094;</a> <a class="previous_link" href="javascript:previous();">&#10094;</a>';
    //                var current_link = 0;
    //                while (number_of_pages > current_link) {
    //                    navigation_html += ' <a class="page_link" href="javascript:go_to_page(' + current_link + ')" id="page' + (current_link + 1) + '">' + (current_link + 1) + '</a>';
    //                    current_link++;
    //                }
    //                navigation_html += ' <a class="next_link" href="javascript:next();">&#10095;</a> <a class="last_link" href="javascript:last(' + number_of_pages + ');">&#10095;&#10095;</a>';
    //                $('#page_navigation').html(navigation_html);
    //                var active = parseInt($('#current_page').val()) + 1;
    //                $('#page' + active + '').addClass('p-active bg-dark text-light');
    //                //hide button when first or last page is active
    //                if (active == 1) {
    //                    $('.first_link, .previous_link').css({
    //                        'display': 'none',
    //                    });
    //                } else if (active == current_link) {
    //                    $('.next_link, .last_link').css({
    //                        'display': 'none',
    //                    });
    //                }
    //                if (number_of_pages == 1) {
    //                    $('#page_navigation').hide();
    //                } else {
    //                    $('#page_navigation').show();
    //                }
    //                if (number_of_pages > 3) {
    //                    if (active < 2) {
    //                        $('.page_link').addClass('d-none');
    //                        let i = 1;
    //                        while (i < 4) {
    //                            $('#page' + i + '').removeClass('d-none');
    //                            i++;
    //                        }
    //                    } else if (active > current_link - 1) {
    //                        $('.page_link').addClass('d-none');
    //                        let i = current_link;
    //                        while (i > current_link - 3) {
    //                            $('#page' + i + '').removeClass('d-none');
    //                            i--;
    //                        }
    //                    } else {
    //                        $('.page_link').addClass('d-none');
    //                        $('#page' + (active - 1) + ',#page' + active + ',#page' + (active + 1) + '').removeClass('d-none');
    //                    }
    //                }
    //            });
    //        } else {
    //            var result = '<div class="text-center col-12 p-0"><h1 class="mainColor"><i class="fab fa-sistrix"></i></h1><h5 class="mainColor"><i>Không có sản phẩm để hiển thị</i></h5><h5 class="mainColor"><i>Bạn hãy thử tìm kiếm lại!</i></h5></div>';
    //            $('#pagination').hide();
    //            $("#result").html(result);
    //        }
    //    });
    //    request.fail(function (jqXHR, textStatus) {
    //        alert("Request failed: " + textStatus); // check errors
    //    });
    //}
    //
    //
    //function first() {
    //    if ($('#current_page').val() != 0) {
    //        go_to_page(0);
    //    }
    //}
    //
    //function previous() {
    //    let new_page = parseInt($('#current_page').val()) - 1;
    //    if ($('#current_page').val() != 0) {
    //        go_to_page(new_page);
    //    }
    //}
    //
    //function next() {
    //    let new_page = parseInt($('#current_page').val()) + 1;
    //    if ($('#current_page').val() != ($("#page_navigation").children(".page_link").length - 1)) {
    //        go_to_page(new_page);
    //    }
    //}
    //
    //function last() {
    //    let number_of_pages = $("#page_navigation").children(".page_link").length;
    //    if ($('#current_page').val() != number_of_pages - 1) {
    //        go_to_page(number_of_pages - 1);
    //    }
    //}
    //
    //function go_to_page(page_num) {
    //    cursor = page_num;
    //    $('#current_page').val(page_num);
    //    requestData();
    //}
    //
    //function favor() {
    //    if (!$(this).hasClass('favored')) {
    //        $(this).removeClass('bg-white').addClass('favored bg-danger text-light');
    //    } else {
    //        $(this).removeClass('favored bg-danger text-light').addClass('bg-white');
    //    }
    //}
</script>