let consigneeName, consigneeTel, consigneeEmail, specificAddressOrder, province, district, village, productId,
    colorId, sizeId, quantity, logistic_method, notes, cartId;
cartId = $('.row-product').map(function () {
    return this.getAttribute('data-cart-id');
}).get();
productId = $('.row-product').map(function () {
    return this.getAttribute('data-id');
}).get();
colorId = $('.product-color').map(function () {
    return this.getAttribute('data-color');
}).get();
sizeId = $('.product-size').map(function () {
    return this.getAttribute('data-size');
}).get();
quantity = $('.product-quantity').map(function () {
    return this.getAttribute('data-quantity');
}).get();
let total_price = 0;
for (let i = 0; i < $('.price').length; i++) {
    total_price += parseInt($('#total_price_' + i).attr('data-total-price'));
}
$('#total_price_cart,#total_price_product').html(new Intl.NumberFormat(['ban', 'id']).format(total_price) + 'đ');
$('#shipping_fee').html($('#shipping_fee').attr('data-fee') + 'đ');
$('#total_price').html(new Intl.NumberFormat(['ban', 'id']).format(parseInt($('#shipping_fee').attr('data-fee')) + total_price) + 'đ')

$("#telInput").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
});
$('#sm-home-delivery,#sm-receive-at-store').on('click', function () {
    $(this).parent().find('button').trigger('click')
})


function validateConsigneeContact() {
    if (consigneeName === '' || consigneeTel === '' || consigneeEmail === '') {
        $('#consignee-contact').addClass('bg-lighter-danger');
        $('#notify-consignee-information').removeClass('d-none');
        setTimeout(function () {
            $('#consignee-contact').removeClass('bg-lighter-danger');
            $('#notify-consignee-information').addClass('d-none');
        }, 3000);
        $('html').scrollTop($("#consignee-contact").offset().top - 120);
        return false;
    }
    return true;
}

function validateInformationDelivery() {
    if (province === '' || province === null || district === '' || district === null || village === '' || village === null || specificAddressOrder === '') {
        $('#flush-home-delivery').addClass('bg-lighter-danger');
        $('#notify-consignee-address').removeClass('d-none');
        setTimeout(function () {
            $('#flush-home-delivery').removeClass('bg-lighter-danger');
            $('#notify-consignee-address').addClass('d-none');
        }, 3000);
        $('html').scrollTop($("#flush-home-delivery").offset().top - 120);
        return false;
    }
    return true;
}

$('#order').click(function () {
    logistic_method = $('input[name=payment-methods]:checked').val();
    consigneeName = $('#orderform-name').val();
    consigneeTel = $('#orderform-tel').val();
    consigneeEmail = $('#orderform-email').val();
    if ($('#sm-home-delivery').prop('checked')) {
        province = $('#province-id').val();
        district = $('#district-id').val();
        village = $('#village-id').val();
        specificAddressOrder = $('#orderform-specific_address').val();
        notes = $('#orderform-notes').val();
        if (validateConsigneeContact() && validateInformationDelivery()) {
            createOrder();
        }
    } else {
        province = district = village = specificAddressOrder = null;
        if (validateConsigneeContact()) {
            createOrder();
        }
    }
});

function createOrder() {
    let request = $.ajax({
        url: '/api/ajax/create-order',
        method: 'POST',
        data: {
            cartId: cartId,
            productId: productId,
            colorId: colorId,
            sizeId: sizeId,
            quantity: quantity,
            name: consigneeName,
            tel: consigneeTel,
            email: consigneeEmail,
            logistic_method: logistic_method,
            province: province,
            district: district,
            village: village,
            specificAddress: specificAddressOrder,
            notes: notes,
        },
    });
    request.done(function (response) {
        // TODO: return done or fail
        alert('Đặt hàng thành công');
        window.location.href = "/site";
    });
    request.fail(function (jqXHR, textStatus, response) {
        console.log('jq', jqXHR);
        console.log('sta', textStatus);
        // TODO: return done or fail
    });
}