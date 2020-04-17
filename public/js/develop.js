$(document).ready(function() {

    initQuantityAsc();
    initAddProduct();
    initDeleteProduct();
    initClearCart();
    initQuantityDesc();
    initQuantityCount();
    initMakeOrder();
    /*
    Добавление в корзину
     */
    function initAddProduct() {

        $('.j-button-add-product').click(function () {
            var data = $('#add-product-form').serializeArray();
            $.post( "/ajax/add_product", data, function(result) {
                $('.cart_price').html(result.total + ' Р');
                $('.j-cart_count > span').html(result.quantity);
            });
        });
    }

    /*
     Удаление товара из корзины
     */
    function initDeleteProduct() {

        $(document).on('click', '.j-button-delete-product', function () {
            var product_id = $(this).attr('data-id');
            var data = $('#cart-form-' + product_id).serializeArray();
            $.post("/ajax/delete_product", data, function (result) {
                $('.cart_price').html(result.total + ' Р');
                $('.j-cart_count > span').html(result.quantity);
                $('.j-cart_container').html(result.view);
            });
        });
    }
    /*
    Очистка корзины
     */
    function initClearCart() {

        $(document).on('click', '.j-button-clear-cart', function () {
            var data = $('#cart-form').serializeArray();
            $.post( "/ajax/destroy_cart", data, function() {
                $('.cart_price').html('0 Р');
                $('.j-cart_count > span').html('0');
                $('.j-cart-form').html('Корзина пуста');
            });
        });
    }



    /*
    Выход из аккаунта
     */
    $('.j-link-out-form').click(function () {
        $('.j-submit-out-form').click();
    });


    /*
     Обновление инпута с количеством товара
     */

    function initQuantityAsc() {
        $(document).on('click', '.j-quantity_inc' , function () {

            var product_id = $(this).data('id');
            var originalVal = $('.j-quantity_input-' + product_id).val();
            var endVal = parseFloat(originalVal) + 1;
            $('.j-quantity_input-' + product_id).val(endVal);
            var data = $('#cart-form-' + product_id).serializeArray();
            $.post( "/ajax/quantity_product", data, function(result) {
                $('.cart_price').html(result.total + ' Р');
                $('.j-cart_count > span').html(result.quantity);
                $('.j-cart_container').html(result.view);
                $('.j-cart_container').show();
            });
        });
    }

    function initQuantityDesc() {
        $(document).on('click', '.j-quantity_dec' , function () {

            var product_id = $(this).data('id');
            var originalVal = $('.j-quantity_input-' + product_id).val();
            if (originalVal > 1) {
                var endVal = parseFloat(originalVal) - 1;
                $('.j-quantity_input-' + product_id).val(endVal);
                var data = $('#cart-form-' + product_id).serializeArray();
                $.post("/ajax/quantity_product", data, function (result) {
                    $('.cart_price').html(result.total + ' Р');
                    $('.j-cart_count > span').html(result.quantity);
                    $('.j-cart_container').html(result.view);
                });
            }
        });
    }

    function initQuantityCount() {
        $(document).on('focusout', '#quantity_input' , function () {
            var product_id = $(this).data('id');

            var originalVal = $('.j-quantity_input-' + product_id).val();
            if(originalVal < 1){
                $('.j-quantity_input-' + product_id).val(1);
            }

            var data = $('#cart-form-' + product_id).serializeArray();
            $.post( "/ajax/quantity_product", data, function(result) {
                $('.cart_price').html(result.total + ' Р');
                $('.j-cart_count > span').html(result.quantity);
                $('.j-cart_container').html(result.view);
            });
        });
    }

    /*
     Оформление заказа
     */

    function initMakeOrder() {
        $(document).on('click', '.j-cart_make_order' , function () {
            var data = $('#cart-make_order-form').serializeArray();
            $.post( "/ajax/make_order", data, function(result) {
                $('.cart_price').html('0 Р');
                $('.j-cart_count > span').html('0');
                $('.j-cart_container').html('Заказ № ' + result + ' оформлен.');
            });
        });
    }

    var popup = $(".popup__overlay");
    var btn = $(".j-profile_button_info");
    var close = $(".close");

    btn.on("click", function(e){
        e.preventDefault();
        popup.removeClass("hidden");
    });

    /*popup.on("click", function(e){
        e.preventDefault();
        if (){
            popup.addClass("hidden");
        }
    });*/

    /*btn.on("click", function(event) {
        e = event || window.event
        if (e.target == this) {
            popup.addClass("hidden");
        }
    });*/

    /*btn.click(function(e){
        e.preventDefault();
        popup.addClass("hidden");
    });*/

    var image_delivery = $('.j-image-delivery');
    var border_img_delivery = 'j-image-border-active';
    var input_delivery = $('#delivery');
    var form_make_order = $('#cart-make_order-form');

    image_delivery.on('click', function () {
        image_delivery.removeClass(border_img_delivery);
        $(this).addClass(border_img_delivery);
        $('#delivery').val($(this).data('id'));
        var data = form_make_order.serializeArray();
        $.post( "/ajax/delivery_calc", data, function(result) {
            $('.j-order_total_amount').html(result.result.price + ' Р');
        });
    });


    $("#city_delivery").autocomplete({

        source : function(request, response) {
            var request = form_make_order.serializeArray();
            console.log(request);
            $.post( "/ajax/city_delivery", request, function(data){

                response(jQuery.map(data, function(item) {
                    return {
                        label : item.full_name + ", " + item.obl_name,
                        value : item.full_name,
                        id : item.id
                    }
                }));
            });
        },
        minLength : 2,
        select: function (event, result) {
            $('#receiverCityId').val(result.item.id);
            $('.j-image-delivery').removeClass('hidden');
        }
    });
});