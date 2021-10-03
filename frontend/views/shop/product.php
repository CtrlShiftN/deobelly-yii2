<?php

/* @var $this yii\web\View */

use common\components\helpers\ParamHelper;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Product');
$this->params['breadcrumbs'][] = $this->title;
$cdnUrl = Yii::$app->params['frontend'];
$imgUrl = Yii::$app->params['common'] . "/media";
$this->registerCssFile(Url::toRoute('css/product.css'));
$this->registerCss("
.p-active {
    border-color: #dc3545 !important;
}

#pagination .p-active a {
    color: #fff !important;
}

.p-inactive {
    cursor: not-allowed;
}

.p-inactive a, .p-inactive span {
    color: #dee2e6 !important;
    border-color: #dee2e6 !important;
}

.page_link, .previous_link, .next_link,
.last_link, .first_link {
    padding: 4px 8px;
    text-decoration: none !important;
    color: #000;
}

.page_link:hover, .previous_link:hover, .next_link:hover,
.last_link:hover, .first_link:hover {
    color: #000;
}

#page_navigation {
    line-height: 42px;
}
");
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
<div class="row">
    <div class="col-12 col-md-3 m-0 p-0">
        <div class="accordion accordion-flush" id="type_category">
            <?php foreach ($titleCategory as $key => $value): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading-<?= $value['id'] ?>">
                        <button class="accordion-button collapsed text-uppercase fw-light btn-title-category"
                                type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?= $value['id'] ?>"
                                aria-expanded="false" aria-controls="flush-collapse-<?= $value['id'] ?>">
                            <?= Yii::t('app', $value['name']) ?>
                        </button>
                    </h2>
                    <?php $code = str_split($value['code'], 2)[0]; ?>
                    <div id="flush-collapse-<?= $value['id'] ?>" class="accordion-collapse collapse ps-4 ps-md-5 py-3"
                         aria-labelledby="flush-heading-<?= $value['id'] ?>" data-bs-parent="#type_category">
                        <?php foreach (\frontend\models\ProductCategory::getAllCategoriesByCode($code) as $key => $cate): ?>
                            <label class="category-checkbox"><?= $cate['name'] ?>
                                <input type='hidden' class="big-cate w-100" value="<?= $code ?>">
                                <?php $code_cate = str_split($cate['code'], 3)[0]; ?>
                                <input type="checkbox" value="<?= $code_cate ?>">
                                <span class="checkmark"></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-12 col-md-9 m-0 p-0 row">
        <input type='hidden' id='current_page' class="w-100">
        <div id="result" class="w-100 row m-0 p-0 my-3">
        </div>
        <div class="mt-2 text-center w-100" id="pagination">
            <input type='hidden' id='current_page'>
            <div id='page_navigation' class="text-end"></div>
        </div>

<!--        <div class="col-12 col-sm-6 col-lg-4 mx-0 my-4"><a href="javascript:void(0)"-->
<!--                                                           class="text-decoration-none text-dark px-0 w-100">-->
<!--                <div class="position-relative product-card w-100">-->
<!--                    <img class="img-product shadow" src="--><?//= $cdnUrl ?><!--/img/index/slider-responsive-3.jpg">-->
<!--                </div>-->
<!--                <span class="px-0 fw-bold mt-2 w-100"><span class="text-decoration-line-through text-dark fw-light">100.000.000</span> 100.000.000 VNĐ</span>-->
<!--                <div class="row px-0 w-100 m-0">-->
<!--                    <div class="col-10 p-0 pe-1">-->
<!--                        <p class="fs-5 m-0 product-name">Áo vest công sở</p>-->
<!--                    </div>-->
<!--                    <div class="col-2 p-0">-->
<!--                        <button type="button" class="btn rounded-0 border-0 w-100 h-100 p-0 fs-4"><i-->
<!--                                    class="far fa-heart"></i>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
    </div>
</div>
</div>

<script>
    var cdnUrl = '<?= $cdnUrl ?>';
    var imgUrl = '<?= $imgUrl ?>';
    var show_per_page = <?= \common\components\SystemConstant::LIMIT_PER_PAGE ?>;
    var category,bigCate, cursor;

    <?php if(!empty($paramCate)): ?>
    var productCategory = '<?= $paramCate ?>';
    //$('button[data-category=<?//= $paramCate ?>//]').attr("aria-expanded","true");
    <?php else: ?>
    var productCategory = null;
    <?php endif; ?>

    jQuery(document).ready(function () {
        $('#current_page').val(0);
        requestData();
    });

    var checkboxes = $('input[type=checkbox]');
    $('.accordion-button').click(function () {
        checkboxes.prop("checked", false);
        cursor = category = bigCate = null;
        requestData();
    });

    var categoryCb = $('.category-checkbox input[type=checkbox]');
    categoryCb.change(function () {
        category = getCheckedBoxes(categoryCb);
        // TODO: big cate
        bigCate = $(this).siblings('.big-cate').val();
        // sort = cursor = null;
        console.log(bigCate);
        requestData();
    });

    //get value from checkboxes
    function getCheckedBoxes(checkbox) {
        return checkbox.filter(":checked")
            .map(function () {
                return this.value;
            })
            .get();
    }

    function requestData() {
        let request = $.ajax({
            url: "<?= $cdnUrl ?>/api/ajax/product-filter-ajax", // send request to
            method: "POST", // sending method
            data: {cate: category, cursor: cursor, bigCate: bigCate}, // sending data
        });

        request.done(function (response) {
            let arrRes = $.parseJSON(response);
            console.log(arrRes.sqlCm);
            if (arrRes.status === 1) {
                $('#pagination').show();
                let result = "";
                for (let i = 0; i < arrRes.product.length; i++) {
                    //format price
                    var regular_price = new Intl.NumberFormat(['ban', 'id']).format(arrRes.product[i].regular_price);
                    result += '<div class="col-12 col-sm-6 col-lg-4 mx-0 my-4"><a href="' + cdnUrl + '/shop/product-detail?detail=' + arrRes.product[i].id + '" class="text-decoration-none text-dark px-0 w-100"><div class="position-relative product-card w-100 mb-2"><img class="img-product shadow" src="' + imgUrl + '/' + arrRes.product[i].image + '"></div>';
                    if (arrRes.product[i].sale_price !== null) {
                        var sale_price = new Intl.NumberFormat(['ban', 'id']).format(arrRes.product[i].sale_price);
                        result += '<span class="px-0 fw-bold mt-2"><span class="text-decoration-line-through text-dark fw-light fs-regular-price">' + regular_price + '</span> ' + sale_price + ' VNĐ</span>';
                    } else {
                        result += '<span class="px-0 fw-bold mt-2">' + regular_price + ' VNĐ</span>';
                    }
                    result += '<div class="row px-0 w-100 m-0"><div class="col-10 p-0 pe-1"><p class="fs-5 m-0 product-name">' + arrRes.product[i].name + '</p></div><div class="col-2 p-0"><button type="button" class="btn rounded-0 border-0 w-100 h-100 p-0 fs-4"><i class="far fa-heart"></i></button></div></div></a></div>';
                }
                $("#result").html(result);
                //show pagination
                var number_of_items = arrRes.count;
                var number_of_pages = Math.ceil(number_of_items / show_per_page);
                jQuery(document).ready(function () {
                    var navigation_html = '<a class="first_link" href="javascript:first();">&#10094;&#10094;</a> <a class="previous_link" href="javascript:previous();">&#10094;</a>';
                    var current_link = 0;
                    while (number_of_pages > current_link) {
                        navigation_html += ' <a class="page_link" href="javascript:go_to_page(' + current_link + ')" id="page' + (current_link + 1) + '">' + (current_link + 1) + '</a>';
                        current_link++;
                    }
                    navigation_html += ' <a class="next_link" href="javascript:next();">&#10095;</a> <a class="last_link" href="javascript:last(' + number_of_pages + ');">&#10095;&#10095;</a>';
                    $('#page_navigation').html(navigation_html);
                    var active = parseInt($('#current_page').val()) + 1;
                    $('#page' + active + '').addClass('p-active bg-dark text-light');
                    //hide button when first or last page is active
                    if (active == 1) {
                        $('.first_link, .previous_link').css({
                            'display': 'none',
                        });
                    } else if (active == current_link) {
                        $('.next_link, .last_link').css({
                            'display': 'none',
                        });
                    }
                    if (number_of_pages == 1) {
                        $('#page_navigation').hide();
                    } else {
                        $('#page_navigation').show();
                    }
                    if (number_of_pages > 3) {
                        if (active < 2) {
                            $('.page_link').addClass('d-none');
                            let i = 1;
                            while (i < 4) {
                                $('#page' + i + '').removeClass('d-none');
                                i++;
                            }
                        } else if (active > current_link - 1) {
                            $('.page_link').addClass('d-none');
                            let i = current_link;
                            while (i > current_link - 3) {
                                $('#page' + i + '').removeClass('d-none');
                                i--;
                            }
                        } else {
                            $('.page_link').addClass('d-none');
                            $('#page' + (active - 1) + ',#page' + active + ',#page' + (active + 1) + '').removeClass('d-none');
                        }
                    }
                    $('html').scrollTop(0);
                });
            } else {
                var result = '<div class="text-center col-12 p-0"><h1 class="mainColor"><i class="fab fa-sistrix"></i></h1><h5 class="mainColor"><i>Không có sản phẩm để hiển thị</i></h5><h5 class="mainColor"><i>Bạn hãy thử tìm kiếm lại!</i></h5></div>';
                $('#pagination').hide();
                $("#result").html(result);
                $('html').scrollTop(0);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus); // check errors
        });
    }


    function first() {
        if ($('#current_page').val() != 0) {
            go_to_page(0);
        }
    }

    function previous() {
        let new_page = parseInt($('#current_page').val()) - 1;
        if ($('#current_page').val() != 0) {
            go_to_page(new_page);
        }
    }

    function next() {
        let new_page = parseInt($('#current_page').val()) + 1;
        if ($('#current_page').val() != ($("#page_navigation").children(".page_link").length - 1)) {
            go_to_page(new_page);
        }
    }

    function last() {
        let number_of_pages = $("#page_navigation").children(".page_link").length;
        if ($('#current_page').val() != number_of_pages - 1) {
            go_to_page(number_of_pages - 1);
        }
    }

    function go_to_page(page_num) {
        cursor = page_num;
        $('#current_page').val(page_num);
        requestData();
    }
</script>