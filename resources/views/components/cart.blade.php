<div class="cart">
    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
        <div class="cart_icon">
            <img src="/images/cart.png" alt="">
            <div class="cart_count"><span>10</span></div>
        </div>
        <div class="cart_content">
            <div class="cart_text"><a href="{{ route('cart') }}">Корзина</a></div>
            <div class="cart_price">@if(Session::has('cart.total')){!! Session::get('cart.total') !!} Р@else {!! 0 !!} Р@endif</div>
        </div>
    </div>
</div>