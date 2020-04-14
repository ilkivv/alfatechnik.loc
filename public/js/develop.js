$(document).ready(function() {

    /*
    Добавление в корзину
     */
    $('.j-button-add-product').click(function () {
        var data = $('#add-product-form').serializeArray();
        $.post( "/ajax/add_product", data, function(result) {
            $('.cart_price').html(result.total + ' Р');
            $('.j-cart_count > span').html(result.quantity);
        });
    });

    /*
     Удаление товара из корзины
     */
    $('.j-button-delete-product').click(function () {
        var product_id = $(this).attr('data-id');
        var data = $('#cart-form-' + product_id).serializeArray();
        $.post( "/ajax/delete_product", data, function(result) {
            $('.cart_price').html(result.total + ' Р');
            $('.j-cart_count > span').html(result.quantity);
            $('.j-cart_container').html(result.view);
        });
    });

    /*
    Очистка корзины
     */
    $(document).on('click', '.j-button-clear-cart', function () {
        var data = $('#cart-form').serializeArray();
        $.post( "/ajax/destroy_cart", data, function() {
            $('.cart_price').html('0 Р');
            $('.j-cart_count > span').html('0');
            $('.j-cart-form').html('Корзина пуста');
        });
    });

    /*
    Выход из аккаунта
     */
    $('.j-link-out-form').click(function () {
        $('.j-submit-out-form').click();
    });


    /*
     Обновление инпута с количеством товара
     */
     var incButton = $('j-quantity_inc');




    incButton.on('click', function () {
        alert(100);
            /*var product_id = $(this).find('.j-quantity_input').attr('data-id');
            var data = $('#cart-form-' + product_id).serializeArray();
            console.log($(this));
            console.log(product_id);
            console.log(data);
        $.post( "/ajax/quantity_product", data, function(result) {
            $('.cart_price').html(result.total + ' Р');
            $('.j-cart_count > span').html(result.quantity);
            $('.j-cart_container').html(result.view);
            $('.j-cart_container').show();
        });*/
        });

    /*$(document).on('click', '.j-quantity_inc', function () {
        var product_id = $('.j-quantity_input').attr('data-id');
        var data = $('#cart-form-' + product_id).serializeArray();
        $.post( "/ajax/quantity_product", data, function(result) {
            $('.cart_price').html(result.total + ' Р');
            $('.j-cart_count > span').html(result.quantity);
            $('.j-cart_container').html(result.view);
        });
    });*/

    /*$('.j-quantity_input').change(function () {
        var product_id = $(this).attr('data-id');
        var data = $('#cart-form-' + product_id).serializeArray();
        $.post( "/ajax/quantity_product", data, function() {
            $('.cart_price').html('0 Р');
            $('.j-cart_count > span').html('0');
            $('.j-cart-form').html('Корзина пуста');
        });
    });*/

});