$(document).ready(function () {

    //add product btn
    $('.add-product-btn').on('click', function (e) {

        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');
        var stock = $(this).data('stock');

        var price = Number($(this).data('price'), 2);

        $(this).removeClass('btn-primary').addClass('btn-default disabled');
        var html =
            `<tr>
                <td><input type="hidden" name="items[${id}][item_id]" value="${id}">${name}</td>
                <td><input  type="number" name="items[${id}][quantity]" data-price="${price}" class="form-control input-sm product-quantity" min="1" max="${stock}" value="1"></td>
                <td class="product-price">${price}</td>
                <td><button class="btn btn-danger btn-sm btn-icon remove-product-btn" data-id="${id}"><span class="flaticon2-trash"></span></button></td>
            </tr>`;

        $('.order-list').append(html);

        //to calculate total price
        calculateTotal();
    });

    //disabled btn
    $('body').on('click', '.disabled', function (e) {

        e.preventDefault();

    }); //end of disabled

    //remove product btn
    $('body').on('click', '.remove-product-btn', function (e) {

        e.preventDefault();
        var id = $(this).data('id');

        $(this).closest('tr').remove();
        $('#product-' + id).removeClass('btn-default disabled').addClass('btn-primary');

        //to calculate total price
        calculateTotal();

    }); //end of remove product btn

    //change product quantity
    $('body').on('keyup change', '.product-quantity', function () {

        var quantity = Number($(this).val(), 2); //2
        var unitPrice = parseFloat($(this).data('price')); //150
        console.log(unitPrice);
        $(this).closest('tr').find('.product-price').html(Number(quantity * unitPrice, 2));
        $(this).closest('tr').find('.product-price').html(Number(quantity * unitPrice, 2));
        calculateTotal();

    }); //end of product quantity change

    //list all order products

    $('.order-products').on('click', function (e) {

        e.preventDefault();

        $('#loading').css('display', 'flex');

        var url = $(this).data('url');
        var method = $(this).data('method');
        $('#order_item_model').modal('show');

        $.ajax({
            url: url,
            method: method,
            success: function (data) {
                $('#loading').css('display', 'none');
                $('#order-product-list').empty();
                $('#order-product-list').append(data);

            }
        })

    }); //end of order products click




    //print order
    $(document).on('click', '.print-btn', function () {

        $('#print-area').printThis();

    }); //end of click function

}); //end of document ready

//calculate the total
function calculateTotal() {

    var price = 0;

    $('.order-list .product-price').each(function (index) {

        price += parseFloat($(this).html());

    }); //end of product price


    $('.total-price').html(Number(price, 2));





    //check if price > 0
    if (price > 0) {

        $('#add-order-form-btn').removeClass('disabled')

    } else {

        $('#add-order-form-btn').addClass('disabled')

    } //end of else
    return price;
} //end of calculate total


$("#tax_amount").on('input', function () {

    var tax = document.getElementById('tax_amount').value;

    var total = (calculateTotal() * tax) / 100;

    $('#total_price_tax').html(total);

    $('#amount_price_tax').html(calculateTotal() - total);



});



$("#paid_amount").on('input', function () {

    var tax = document.getElementById('tax_amount').value;

    var paid_amount = document.getElementById('paid_amount').value;

    var total = (calculateTotal() * tax) / 100;

    var amount_price_tax = (calculateTotal() - total);

    var result = amount_price_tax - paid_amount;

    $('#pemaining_price').html(result);

});
