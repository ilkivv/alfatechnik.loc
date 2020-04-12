<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
        <div class="wishlist d-flex flex-row align-items-center justify-content-end">
            <div class="wishlist_icon"><img src="/images/heart.png" alt=""></div>
            <div class="wishlist_content">
                <div class="wishlist_text"><a href="{{ route('wishlist') }}">Избранное</a></div>
                <div class="wishlist_count">115</div>
            </div>
        </div>

        <!-- Cart -->
        @include('components.cart')

    </div>
</div>