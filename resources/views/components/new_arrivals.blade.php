
<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">Новые поступления</div>
                        <ul class="clearfix">
                            <li class="active">Популярные</li>
                            <li>{!! $random_cat_1->name !!}</li>
                            <li>{!! $random_cat_2->name !!}</li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9" style="z-index:1;">
                        @if ($new_arrivals)
                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="arrivals_slider slider">
                                    @foreach($new_arrivals as $product)
                                    <!-- Slider Item -->
                                    <div class="arrivals_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_1.jpg" alt="{{ $product->name }}"></div>
                                            <div class="product_content">
                                                <div class="product_price">{!! $product->prices[0]->price !!}</div>
                                                <div class="product_name"><div><a href="{{ url('/product/'. $product->id) }}">{!! $product->name !!}</a></div></div>
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
                                                <li class="product_mark product_new">new</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>
                        @endif
                            <!-- Product Panel -->
                        @if ($random_cat_1)
                            <!-- Product Panel -->
                                <div class="product_panel panel">
                                    <div class="arrivals_slider slider">
                                    @foreach($random_cat_1->products as $product)
                                        <!-- Slider Item -->
                                            <div class="arrivals_slider_item">
                                                <div class="border_active"></div>
                                                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_1.jpg" alt="{{ $product->name }}"></div>
                                                    <div class="product_content">
                                                        <div class="product_price">{!! $product->prices[0]->price !!}</div>
                                                        <div class="product_name"><div><a href="{{ url('/product/'. $product->id) }}">{!! $product->name !!}</a></div></div>
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
                                                            <li class="product_mark product_new">new</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>
                        @endif

                            <!-- Product Panel -->
                        @if ($random_cat_2)
                            <!-- Product Panel -->
                                <div class="product_panel panel">
                                    <div class="arrivals_slider slider">
                                    @foreach($random_cat_2->products as $product)
                                        <!-- Slider Item -->
                                            <div class="arrivals_slider_item">
                                                <div class="border_active"></div>
                                                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_1.jpg" alt="{{ $product->name }}"></div>
                                                    <div class="product_content">
                                                        <div class="product_price">{!! $product->prices[0]->price !!}</div>
                                                        <div class="product_name"><div><a href="{{ url('/product/'. $product->id) }}">{!! $product->name !!}</a></div></div>
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
                                                            <li class="product_mark product_new">new</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>
                            @endif

                        </div>

                        <div class="col-lg-3">
                            <div class="arrivals_single clearfix">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <div class="arrivals_single_image"><img src="images/new_single.png" alt="{{ $super_product->name }}"></div>
                                    <div class="arrivals_single_content">
                                        <div class="arrivals_single_category"><a href="{{ url($super_product->category->url) }}">{!! $super_product->category->name !!}</a></div>
                                        <div class="arrivals_single_name_container clearfix">
                                            <div class="arrivals_single_name"><a href="{{ url('/product/' . $super_product->id) }}">{!! $super_product->name !!}</a></div>
                                            <div class="arrivals_single_price text-right">{!! $super_product->prices->first()->price !!} Р</div>
                                        </div>
                                        <div class="rating_r rating_r_4 arrivals_single_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <form action="#"><button class="arrivals_single_button">Добавить в корзину</button></form>
                                    </div>
                                    <div class="arrivals_single_fav product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="arrivals_single_marks product_marks">
                                        @if ($super_product->is_new)
                                        <li class="arrivals_single_mark product_mark product_new">new</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>