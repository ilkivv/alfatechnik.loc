@extends('layouts.app')

@section('title')
    Профиль
@stop

@section('description')

@stop

@section('styles')

    <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
    <link href="/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/cart_responsive.css">
    <link rel="stylesheet" type="text/css" href="/styles/develop.css">
@stop

@section('content')

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container j-cart_container">
                        <div class="cart_title">Корзина</div>
                        @if($orders)
                            <div class="j-cart-form">
                                @foreach($orders as $order)
                                    <div class="order_total row">
                                        <div class="col-lg-2 order_total_content text-md-left">
                                            <div class="order_total_title">Заказ</div>
                                            <div class="order_total_amount">№ {!! $order->id !!}</div>
                                        </div>
                                        <div class="col-lg-4 order_total_content text-md-center">
                                            <div class="order_total_title">Количество товара</div>
                                            <div class="order_total_amount">{!! $order->count !!} шт.</div>
                                        </div>
                                        <div class="col-lg-3 order_total_content text-md-center">
                                            <div class="order_total_title">Итого</div>
                                            <div class="order_total_amount">{!! $order->price !!} Р</div>
                                        </div>
                                        <div class="col-lg-2 order_total_content text-md-center">
                                            <div class="order_total_title">Скидка</div>
                                            <div class="order_total_amount">{!! $order->discount !!} Р</div>
                                        </div>
                                        <div class="col-lg-1 order_total_content text-md-left">
                                            <button class="button-profile profile_button_info j-profile_button_info">сведения</button>
                                        </div>
                                    </div>
                                    @foreach($order->items as $product)
                                        <div class="popup__overlay hidden">
                                            <div class="order-item-show-info">
                                                <div class="order_total_title">Количество товара</div>
                                                <a href="{{ url('/product/' . $product->product->id) }}"><div class="order_total_amount">{!! $product->product->name !!} шт.</div></a>
                                                <div class="order_total_title">Количество товара</div>
                                                <div class="order_total_amount">{!! $product->quantity !!} шт.</div>
                                                <div class="order_total_title">Количество товара</div>
                                                <div class="order_total_amount">{!! $product->price !!} шт.</div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                            <!-- Order Total -->
                            </div>
                        @else
                            Список заказов пуст
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('components.newsletter')

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