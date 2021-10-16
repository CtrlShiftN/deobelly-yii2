function responsive() {
    $('#bestsellers .product-card').removeClass('d-none');
    $('#onSale .product-card').removeClass('d-none');
    if (window.matchMedia('(min-width: 1200px) and (max-width: 1400px)').matches || window.matchMedia('(min-width: 576px) and (max-width: 992px)').matches) {
        if ($('#bestsellers .product-card').length > 4) {
            $("#bestsellers .product-card:last").addClass('d-none');
        }
        if ($('#onSale .product-card').length > 4) {
            $("#onSale .product-card:last").addClass('d-none');
        }
    } else if (window.matchMedia('(min-width: 992px) and (max-width: 1200px)').matches || window.matchMedia('(max-width: 576px)').matches) {
        if ($('#bestsellers .product-card').length > 3) {
            $("#bestsellers .product-card:first, #bestsellers .product-card:last").addClass('d-none');
        }
        if ($('#onSale .product-card').length > 3) {
            $("#onSale .product-card:first, #onSale .product-card:last").addClass('d-none');
        }
    }
}

$(document).ready(function () {
    responsive();
});
$(window).resize(function () {
    responsive();
});
//accept press number into input
$("#amountInput").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
});
//validate amount
$('#amountInput').change(function () {
    if ($(this).val() == 0) {
        $(this).val(1);
        $('#notify').html('');
    } else if ($(this).val() > parseInt($('#quantity').attr('data-quantity'))) {
        $(this).val(parseInt($('#quantity').attr('data-quantity')));
        $('#notify').html('Sản phẩm không đủ để đáp ứng yêu cầu!');
        setTimeout(function () {
            $('#notify').html('');
        }, 3000);
    } else {
        $('#notify').html('');
    }
});

//reduce the number of
function reduceProductQuantity() {
    if ($('#amountInput').val() > 1) {
        let amount = parseInt($('#amountInput').val());
        $('#amountInput').val(amount - 1);
    }
};

//increase the number
function increaseProductQuantity() {
    if ($('#amountInput').val() < parseInt($('#quantity').attr('data-quantity'))) {
        let amount = parseInt($('#amountInput').val());
        $('#amountInput').val(amount + 1);
    }
};

var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 5,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    breakpoints: {
        0: {
            slidesPerView: 3,
        },
        992: {
            slidesPerView: 4,
        },
    }
});
var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    thumbs: {
        swiper: galleryThumbs
    },
});
// change carousel item height
// gallery-top
let productCarouselTopWidth = $('.gallery-top').outerWidth();
$('.gallery-top').css('height', productCarouselTopWidth);

// gallery-thumbs
let productCarouselThumbsItemWith = $('.gallery-thumbs .swiper-slide').outerWidth();
$('.gallery-thumbs').css('height', productCarouselThumbsItemWith);

// activation zoom plugin
var $easyzoom = $('.easyzoom').easyZoom();

$('.btn-color').click(function () {
    if (!$(this).hasClass('btn-color-selected')) {
        $(this).addClass('btn-color-selected').css({}).siblings().removeClass('btn-color-selected');
        $('#color').html("<span class='text-dark fw-bold fs-note'>Màu:</span> " + $(this).attr('data-name-color'));
    } else {
        $(this).removeClass('btn-color-selected');
        $('#color').html('');
    }
});
$('.btn-size').click(function () {
    if (!$(this).hasClass('btn-size-selected')) {
        $(this).addClass('btn-size-selected').siblings().removeClass('btn-size-selected');
        $('#size').html("<span class='text-dark fw-bold fs-note'>Size:</span> " + $(this).attr('data-size'));
    } else {
        $(this).removeClass('btn-size-selected');
        $('#size').html('');
    }
});
let items = document.querySelectorAll('.carouselProduct .carousel-item')
items.forEach((el) => {
    const minPerSlide = 6
    let next = el.nextElementSibling
    for (var i = 1; i < minPerSlide; i++) {
        if (!next) {
            next = items[0]
        }
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
});

if (parseInt($('#quantity').attr('data-quantity')) == 0) {
    $('#btnAdd,#btnBuyNow').css('pointer-events', 'none');
    $('#notify').html('Sản phẩm không đủ để đáp ứng yêu cầu!');
    $('#outOfStock').addClass('d-inline-block');
} else {
    $('#outOfStock').addClass('d-none');
}