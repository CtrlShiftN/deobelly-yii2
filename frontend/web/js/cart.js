$(".amountInput").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
});
let product;
let total_price = 0;
product = $('.row-product');
totalPrice();

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