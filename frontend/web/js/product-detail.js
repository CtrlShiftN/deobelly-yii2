//accept press number into input
$("#amountInput").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
});
//validate amount
$('#amountInput').change(function () {
    if($(this).val() == 0) {
        $(this).val(1);
        $('#notify').html('');
    } else if($(this).val() > parseInt($('#quantity').attr('data-quantity'))) {
        $(this).val(parseInt($('#quantity').attr('data-quantity')));
        $('#notify').html('Sản phẩm không đủ để đáp ứng yêu cầu!');
        setTimeout(function(){$('#notify').html(''); }, 3000);
    } else {
        $('#notify').html('');
    }
});
//reduce the number of
function DESC() {
    if($('#amountInput').val() > 1) {
        let amount = parseInt($('#amountInput').val());
        $('#amountInput').val(amount - 1);
    }
};
//increase the number
function ASC() {
    if($('#amountInput').val() < parseInt($('#quantity').attr('data-quantity'))) {
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