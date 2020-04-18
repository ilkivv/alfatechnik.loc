<div class="cart_title">Корзина</div>
@if(Session::has('cart'))
    <div class="j-cart-form">
        <div class="cart_items">
            <ul class="cart_list">
                @foreach(Session::get('cart.products') as $product)

                    <li class="cart_item clearfix j-cart_item">
                        <form id="cart-form-{{$product->id}}" method="post">
                            {{ csrf_field() }}
                            <div class="cart_item_image"><img src="/images/shopping_cart.jpg" alt=""></div>
                            <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                <div class="cart_item_name cart_info_col">
                                    <div class="cart_item_title">Наименование</div>
                                    <a href="{{ url('/product/' . $product->id) }}"><div class="cart_item_text">{!! $product->name !!}</div></a>
                                </div>
                                <div class="cart_item_quantity cart_info_col">
                                    <div class="cart_item_title">Количество</div>
                                    <div class="product_quantity clearfix">
                                        <span>Количество: </span>
                                        <input id="quantity_input" class="j-quantity_input-{{ $product->id }}" name="quantity" type="text" pattern="[0-9]*" value="{!! $product->quantity_item !!}" data-id="{{ $product->id }}">
                                        <div class="quantity_buttons">
                                            <div id="quantity_inc_button" data-id="{{ $product->id }}" class="quantity_inc j-quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                            <div id="quantity_dec_button" data-id="{{ $product->id }}" class="quantity_dec j-quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart_item_price cart_info_col">
                                    <div class="cart_item_title">Стоимость</div>
                                    <div class="cart_item_text">{!! $product->price_item !!}</div>
                                </div>
                                <div class="cart_item_total cart_info_col">
                                    <div class="cart_item_title">Цена</div>
                                    <div class="cart_item_text">{!! $product->total_item !!}</div>
                                </div>
                                <div class="cart_item_color cart_info_col">
                                    <div class="cart_item_title">Удалить</div>
                                    <button type="button" class="button cart_button_clear j-button-delete-product" data-id="{{$product->id}}">Удалить</button>
                                </div>
                            </div>
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                        </form>
                    </li>

                @endforeach
            </ul>
        </div>
        <form id="cart-form" method="post">
        {{ csrf_field() }}
        <!-- Order Total -->
            <div class="order_total">
                <div class="order_total_content text-md-right">
                    <div class="order_total_title">Итого:</div>
                    <div class="order_total_amount">{!! Session::get('cart.total') !!} Р</div>
                </div>
            </div>

            <div class="cart_buttons">
                <button type="button" class="button cart_button_clear j-button-clear-cart">Очистить</button>
                <a href="{{route('make_order')}}"><button type="button" class="button cart_button_checkout j-cart_button_order">Оформить заказ</button></a>
            </div>
        </form>
    </div>
@else
    Корзина пуста
@endif