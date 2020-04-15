@extends('layouts.app')

@section('title')
    оформление заказа
@stop

@section('description')

@stop

@section('styles')

    <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
    <link href="/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/cart_responsive.css">
@stop

@section('content')

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container j-cart_container">
                        <div class="cart_title">Корзина</div>
                        @if(Session::has('cart'))
                            <form id="cart-make_order-form" method="post">
                                <div class="j-cart-form">
                                    <div class="cart_items">
                                        <ul class="cart_list">
                                            @foreach(Session::get('cart.products') as $product)

                                                <li class="cart_item clearfix j-cart_item">
                                                    {{ csrf_field() }}
                                                    <div class="cart_item_image"><img src="/images/shopping_cart.jpg" alt=""></div>
                                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                        <div class="cart_item_name cart_info_col">
                                                            <div class="cart_item_title">Наименование</div>
                                                            <a href="{{ url('/product/' . $product->id) }}"><div class="cart_item_text">{!! $product->name !!}</div></a>
                                                        </div>
                                                        <div class="cart_item_quantity cart_info_col">
                                                            <div class="cart_item_title">Количество</div>
                                                            <div class="cart_item_text">{!! $product->quantity_item !!}</div>
                                                        </div>
                                                        <div class="cart_item_price cart_info_col">
                                                            <div class="cart_item_title">Стоимость</div>
                                                            <div class="cart_item_text">{!! $product->price_item !!}</div>
                                                        </div>
                                                        <div class="cart_item_total cart_info_col">
                                                            <div class="cart_item_title">Цена</div>
                                                            <div class="cart_item_text">{!! $product->total_item !!}</div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">

                                                </li>

                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- Order Total -->
                                    <div class="order_total">
                                        <div class="order_total_content text-md-right">
                                            <div class="order_total_title">Итого:</div>
                                            <div class="order_total_amount">{!! Session::get('cart.total') !!} Р</div>
                                        </div>
                                    </div>

                                    <div class="cart_buttons">
                                        <button type="button" class="button cart_button_checkout j-cart_make_order">Купить</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            Корзина пуста
                        @endif
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
    <script src="/plugins/easing/easing.js"></script>
    <script src="/js/cart_custom.js"></script>

@stop