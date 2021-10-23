let product, amount, id;
let total_price = 0;
product = $('.row-product');

$(".amountInput").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
});
totalPrice();

function totalPrice() {
    let total_price = 0;
    if (product.length < 1) {
        $("#totalPrice").html(total_price + 'đ');
    } else {
        total_price = 0;
        for (let i = 0; i < product.length; i++) {
            78
            total_price += parseInt($('.total-price_' + i).attr('data-total-price'));
        }
        let total_price_format = new Intl.NumberFormat(['ban', 'id']).format(total_price);
        $("#totalPrice").html(total_price_format + 'đ');
    }
}

document.querySelectorAll('.btnDESC').forEach(item => {
    item.addEventListener('click', event => {
        let id = item.getAttribute("data-id");
        let idAmount = $('#amount' + id);
        if (idAmount.val() > 1) {
            idAmount.val(parseInt(idAmount.val()) - 1);
        }
        updateAmount(id, idAmount.val(), $('.price_' + id).attr('data-price'));
        location.reload();
    });
});

document.querySelectorAll('.btnASC').forEach(item => {
    item.addEventListener('click', event => {
        let id = item.getAttribute("data-id");
        let idAmount = $('#amount' + id);
        if (idAmount.val() < parseInt($('.existing-product' + id).attr('data-existing-product'))) {
            $('#notify_'+id).addClass('d-none');
            idAmount.val(parseInt(idAmount.val()) + 1);
            updateAmount(id, idAmount.val(), $('.price_' + id).attr('data-price'));
            location.reload();
        } else {
            idAmount.val(parseInt($('.existing-product' + id).attr('data-existing-product')));
            $('#notify_'+id).removeClass('d-none');
            setTimeout(function (){
                $('#notify_'+id).addClass('d-none');
            },2000)
        }
    });
});

document.querySelectorAll('.amountInput').forEach(item => {
    item.addEventListener('change', event => {
        let id = item.getAttribute("data-id");
        let idAmount = $('#amount' + id);
        if (idAmount.val() == 0) {
            idAmount.val(1);
            $('#notify_' + id).addClass('d-none');
            updateAmount(id, idAmount.val(), $('.price_' + id).attr('data-price'));
            location.reload();
        } else if(idAmount.val() > parseInt($('.existing-product' + id).attr('data-existing-product')))
        {
            idAmount.val(parseInt($('.existing-product' + id).attr('data-existing-product')));
            $('#notify_'+id).removeClass('d-none');
            setTimeout(function (){
                $('#notify_'+id).addClass('d-none');
                updateAmount(id, idAmount.val(), $('.price_' + id).attr('data-price'));
                location.reload();
            },2000)
        }
        else {
            $('#notify_'+id).addClass('d-none');
            let amount = parseInt($('#amount' + id).val());
            idAmount.val(amount);
            updateAmount(id, idAmount.val(), $('.price_' + id).attr('data-price'));
            location.reload();
        }
    });
});

function updateAmount(id, amount, price) {
    $.ajax({
        url: "/api/ajax/update-amount-product-in-cart",
        method: "POST",
        data: {
            id: id,
            amount: amount,
            price: price,
        },
    });
}