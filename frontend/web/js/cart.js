$(".amountInput").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
});
let product;
let total_price = 0;
let productCb = $('.row-product input[type=checkbox]');
product = getCheckedBoxes(productCb);
totalPrice();
$('#checkAll').change(function () {
    if ($('#checkAll').prop('checked') === false) {
        productCb.prop('checked', false);
        product = getCheckedBoxes(productCb);
        totalPrice();
    } else {
        productCb.prop('checked', true);
        product = getCheckedBoxes(productCb);
        totalPrice();
    }
});
productCb.change(function () {
    product = getCheckedBoxes(productCb);
    totalPrice();
});

//get value from checkboxes
function getCheckedBoxes(checkbox) {
    return checkbox.filter(":checked")
        .map(function () {
            return this.value;
        })
        .get();
}

function totalPrice() {
    let total_price = 0;
    if (product.length < 1) {
        $("#totalProduct").html(product.length);
        $("#totalPrice").html(total_price + 'đ');
    } else {
        total_price = 0;
        for (let i = 0; i < product.length; i++) {
            total_price += parseInt($('.total-price_' + product[i]).attr('data-total-price'));
        }
        let total_price_format = new Intl.NumberFormat(['ban', 'id']).format(total_price);
        $("#totalProduct").html(product.length);
        $("#totalPrice").html(total_price_format + 'đ');
    }
}

//reduce the number of
function reduceProductQuantity() {
    if ($('#amountInput').val() > 1) {
        let amount = parseInt($('#amountInput').val());
        $('#amountInput').val(amount - 1);
        totalPrice();
    }
}

//increase the number
function increaseProductQuantity() {
    // if ($('#amountInput').val() < parseInt($('#quantity').attr('data-quantity'))) {
    let amount = parseInt($('#amountInput').val());
    $('#amountInput').val(amount + 1);
    // }
    totalPrice()
}