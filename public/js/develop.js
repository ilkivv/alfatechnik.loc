$(document).ready(function() {

    $('.j-button-addcart').click(function (e) {
        //e.preventDefault();
        var data = $('#add-cart-form').serializeArray();
        console.log(data);
        $.post( "/add_cart", data, function(result) {

        });
    });

});