$(".amountInput").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
});
let product;
let total_price = 0;
product = $('.row-product');
totalPrice();

function totalPrice() {
    let total_price = 0;
    if (product.length < 1) {
        $("#totalPrice").html(total_price + 'đ');
    } else {
        total_price = 0;
        for (let i = 0; i < product.length; i++) {78
            total_price += parseInt($('.total-price_' + i).attr('data-total-price'));
        }
        let total_price_format = new Intl.NumberFormat(['ban', 'id']).format(total_price);
        $("#totalPrice").html(total_price_format + 'đ');
    }
}

document.querySelectorAll('.btnDESC').forEach(item => {
    item.addEventListener('click', event => {
        let id = item.getAttribute("data-id");
        if ($('#amount'+id).val() > 1) {
            $('#amount'+id).val(parseInt($('#amount'+id).val()) - 1);
        }
    });
});

document.querySelectorAll('.btnASC').forEach(item => {
    item.addEventListener('click', event => {
        let id = item.getAttribute("data-id");
        // if ($('#amountInput').val() < parseInt($('#quantity').attr('data-quantity'))) {
        $('#amount'+id).val(parseInt($('#amount'+id).val()) + 1);
        // }
    });
});