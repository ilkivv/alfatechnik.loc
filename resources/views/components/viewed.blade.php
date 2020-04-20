@if ($viewed)
<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Недавно просмотренные</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="viewed_slider_container">

                    <!-- Recently Viewed Slider -->

                    <div class="owl-carousel owl-theme viewed_slider">
                        @foreach($viewed as $product)
                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="/images/view_1.jpg" alt="{{ $product->name }}"></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">{!! $product->prices->first()->price !!} Р<span>{!! $product->prices[1]->price !!} Р</span></div>
                                    <div class="viewed_name"><a href="{{ url('/product/' . $product->id) }}">{!! $product->name !!}</a></div>
                                </div>
                                <ul class="item_marks">
                                    @if ($product->discount > 0)
                                    <li class="item_mark item_discount">-{!! $product->discount !!}%</li>
                                    @endif
                                    @if ($product->is_new)
                                    <li class="item_mark item_new">new</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif