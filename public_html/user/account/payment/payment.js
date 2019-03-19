function getCurrency(id_page) {
    var select = document.getElementById('currency');
    var price_input = document.getElementById('price');
    var currency = select.value;
    $.ajax({
        type: "POST",
        url: "/account/payment/payment_handler.php",
        data: {
            getCurrency: true,
            id_page: id_page,
            currency:currency
        },
        success: function (result) {
            console.log(result);
            price_input.value = result;
        }
    });

}

function getFormData(id_page,form) {
    var currency = document.getElementById('currency').value;
    var price = document.getElementById('price').value;
    var data = document.getElementById('data');
    var signature = document.getElementById('signature');
    $.ajax({
        type: "POST",
        url: "/account/payment/payment_handler.php",
        data: {
            getData: true,
            id_page: id_page,
            currency:currency,
            price:price
        },
        success: function (result) {
            console.log(result);
            var json = JSON.parse(result);
            data.value = json.data;
            signature.value = json.signature;
            form.submit();
        }
    });

}
