@extends('layouts.app')

@section('title')



@stop

@section('styles')

    <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
    <link href="/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/styles/shop_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/shop_responsive.css">

@stop

@section('content')

    <!-- Home -->

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="/images/shop_background.jpg"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">{!! $category['name'] !!}</h2>
        </div>
    </div>

    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <!-- Shop Sidebar -->
                    @include('components.filter')

                </div>

                <div class="col-lg-9">

                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span>{!! $category['count'] !!}</span> товара (ов) найдено</div>
                            <div class="shop_sorting">
                                <span>Сортировать по:</span>
                                <ul>
                                    <li>
                                        <span class="sorting_text">наличию<i class="fas fa-chevron-down"></i></span>
                                        <ul>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>наличию</li>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>имени</li>
                                            <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>цене</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product_grid">
                            <div class="product_grid_border"></div>
                        @foreach($categories as $category)
                            {{ print_r($category) }}
                            @if ($category->products->isEmpty())
                                {{ print_r(count_r($category->products)) }}
                            @endif
                            @foreach($category['products'] as $product)
                                <!-- Product Item -->
                                    <div class="product_item is_new discount">
                                        <div class="product_border"></div>
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="/images/new_5.jpg" alt="{{ $product->name }}"></div>
                                        <div class="product_content">
                                            <div class="product_price">{!! $product->prices->first()->price !!}</div>
                                            <div class="product_name"><div><a href="{{url('/product/'.$product->id)}}" tabindex="0">{!! $product->name !!}</a></div></div>
                                        </div>
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="product_marks">
                                            @if(isset($product->discount) && $product->discount > 0)
                                                <li class="product_mark product_discount">-{!! $product->discount !!}%</li>
                                            @endif
                                            @if($product->is_new)
                                                <li class="product_mark product_new">New</li>
                                            @endif
                                        </ul>
                                    </div>
                            @endforeach
                        @endforeach
                        </div>

                        <!-- Shop Page Navigation -->
                        <div class="shop_page_nav d-flex flex-row">
                            <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
                            <ul class="page_nav d-flex flex-row">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">21</a></li>
                            </ul>
                            <div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')

    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/styles/bootstrap4/popper.js"></script>
    <script src="/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="/plugins/greensock/TweenMax.min.js"></script>
    <script src="/plugins/greensock/TimelineMax.min.js"></script>
    <script src="/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="/plugins/greensock/animation.gsap.min.js"></script>
    <script src="/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="/plugins/easing/easing.js"></script>
    <script src="/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="/js/shop_custom.js"></script>

@stop