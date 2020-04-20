<div class="featured">
    <div class="tabbed_container">
        <div class="tabs">
            <ul class="clearfix">
                <li class="active">Рекомендуемые</li>
                <li>В наличии</li>
                <li>Лучший рейтинг</li>
            </ul>
            <div class="tabs_line"><span></span></div>
        </div>

    @if ($recommended)
        <!-- Product Panel -->
            <div class="product_panel panel active">
                <div class="featured_slider slider">
                    <!-- Slider Item -->
                    @foreach($recommended as $product)
                        <div class="featured_slider_item">
                            <div class="border_active"></div>
                            <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/featured_1.png" alt="{{$product->name}}"></div>
                                <div class="product_content">
                                    <div class="product_price discount">{!! $product->prices[0]->price !!} Р<span>{!! $product->prices[1]->price !!} Р</span></div>
                                    <div class="product_name"><div><a href="{{ url('/product/' . $product->id) }}">{!! $product->name !!}</a></div></div>
                                    <div class="product_extras">
                                        <button class="product_cart_button">Добавить в корзину</button>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    @if ($product->discount > 0)
                                        <li class="product_mark product_discount">{!! $product->discount !!}%</li>
                                    @endif
                                    @if ($product->is_new)
                                        <li class="product_mark product_new">{!! $product->is_new !!}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="featured_slider_dots_cover"></div>
            </div>
    @endif
    <!-- Product Panel -->

    @if ($availability)
        <!-- Product Panel -->
            <div class="product_panel panel">
                <div class="featured_slider slider">
                    <!-- Slider Item -->
                    @foreach($availability as $product)
                        <div class="featured_slider_item">
                            <div class="border_active"></div>
                            <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/featured_1.png" alt="{{$product->name}}"></div>
                                <div class="product_content">
                                    <div class="product_price discount">{!! $product->prices[0]->price !!} Р<span>{!! $product->prices[1]->price !!} Р</span></div>
                                    <div class="product_name"><div><a href="product.html">{!! $product->name !!}</a></div></div>
                                    <div class="product_extras">
                                        <button class="product_cart_button">Добавить в корзину</button>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    @if ($product->discount > 0)
                                        <li class="product_mark product_discount">{!! $product->discount !!}%</li>
                                    @endif
                                    @if ($product->is_new)
                                        <li class="product_mark product_new">{!! $product->is_new !!}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="featured_slider_dots_cover"></div>
            </div>
    @endif

    <!-- Product Panel -->

    @if ($best_rating)
        <!-- Product Panel -->
            <div class="product_panel panel">
                <div class="featured_slider slider">
                    <!-- Slider Item -->
                    @foreach($best_rating as $product)
                        <div class="featured_slider_item">
                            <div class="border_active"></div>
                            <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/featured_1.png" alt="{{$product->name}}"></div>
                                <div class="product_content">
                                    <div class="product_price discount">{!! $product->prices[0]->price !!} Р<span>{!! $product->prices[1]->price !!} Р</span></div>
                                    <div class="product_name"><div><a href="product.html">{!! $product->name !!}</a></div></div>
                                    <div class="product_extras">
                                        <button class="product_cart_button">Добавить в корзину</button>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    @if ($product->discount > 0)
                                        <li class="product_mark product_discount">{!! $product->discount !!}%</li>
                                    @endif
                                    @if ($product->is_new)
                                        <li class="product_mark product_new">{!! $product->is_new !!}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="featured_slider_dots_cover"></div>
            </div>
    @endif

    </div>
</div>