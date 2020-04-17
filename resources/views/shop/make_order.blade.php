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
    <link rel="stylesheet" type="text/css" href="/styles/develop.css">
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

                                    <div class="cart_items">
                                        <ul class="cart_list">
                                                <li class="cart_item clearfix j-cart_item">
                                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="fio" class="col-md-4 col-form-label text-md-right">ФИО</label>
                                                                <input id="fio" type="text" name="fio" class="form-control mdb-autocomplete" value="{!! $user->fio !!}">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                                                <input id="email" type="email" name="email" class="form-control mdb-autocomplete" value="{!! $user->email !!}">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="phone" class="col-md-4 col-form-label text-md-right">Телефон</label>
                                                                <input id="phone" type="tel" name="phone" class="form-control mdb-autocomplete" value="{!! $user->phone !!}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                        </ul>
                                    </div>

                                    <div class="cart_items">
                                        <ul class="cart_list">
                                            <li class="cart_item clearfix j-cart_item">
                                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="city_delivery" class="col-md-4 col-form-label text-md-right">Город</label>
                                                            <input id="city_delivery" name="city_delivery" class="form-control mdb-autocomplete">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img class="j-image-delivery hidden" src="/images/deliveries/sdek.jpg" height="100px" width="200px" data-id="1">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img class="j-image-delivery hidden" src="/images/deliveries/ruspost.jpeg" height="100px" width="200px" data-id="2">
                                                        </div>
                                                        <input type="hidden" id="delivery" name="delivery">
                                                        <input type="hidden" name="receiverCityId" id="receiverCityId" value="">
                                                        <input type="hidden" name="weight" id="weight" value="0.3">
                                                        <!-- Длина места, см. -->
                                                        <input type="hidden" name="length" id="length" value="10">
                                                        <!-- Ширина места, см. -->
                                                        <input type="hidden" name="width" id="width" value="7">
                                                        <!-- Высота места, см. -->
                                                        <input type="hidden" name="height" id="height" value="5">
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Order Total -->
                                    <div class="order_total row">
                                        <div class="order_total_content text-md-left col-lg-4">
                                            <div class="order_total_title">Сумма:</div>
                                            <div class="order_total_amount">{!! Session::get('cart.total') !!} Р</div>
                                        </div>
                                        <div class="order_total_content text-md-center col-lg-4">
                                            <div class="order_total_title">Доставка:</div>
                                            <div class="order_total_amount j-order_total_amount"></div>
                                        </div>
                                        <div class="order_total_content text-md-right col-lg-4">
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
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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