<div class="trends">
    <div class="trends_background" style="background-image:url(images/trends_background.jpg)"></div>
    <div class="trends_overlay"></div>
    <div class="container">
        <div class="row">

            <!-- Trends Content -->
            <div class="col-lg-3">
                <div class="trends_container">
                    <h2 class="trends_title">Тренды 2020</h2>
                    <div class="trends_text"><p>Купите трендовые товары 2020 года.</p></div>
                    <div class="trends_slider_nav">
                        <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                        <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                </div>
            </div>

            <!-- Trends Slider -->
            <div class="col-lg-9">
                <div class="trends_slider_container">

                    <!-- Trends Slider -->

                    <div class="owl-carousel owl-theme trends_slider">
                        @foreach($trends as $product)
                        <!-- Trends Slider Item -->
                        <div class="owl-item">
                            <div class="trends_item is_new">
                                <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/trends_1.jpg" alt="{{ $product->name }}"></div>
                                <div class="trends_content">
                                    <div class="trends_category"><a href="{{ url($product->category->url) }}">{!! $product->category->name !!}</a></div>
                                    <div class="trends_info clearfix">
                                        <div class="trends_name"><a href="{{ url('/product/' . $product->id) }}">{!! $product->name !!}</a></div>
                                        <div class="trends_price">{!! $product->prices->first()->price !!} Р</div>
                                    </div>
                                </div>
                                <ul class="trends_marks">
                                    @if ($product->discount > 0)
                                    <li class="trends_mark trends_discount">-{!! $product->discount !!}%</li>
                                    @endif
                                    @if ($product->is_new)
                                    <li class="trends_mark trends_new">new</li>
                                    @endif
                                </ul>
                                <div class="trends_fav"><i class="fas fa-heart"></i></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>