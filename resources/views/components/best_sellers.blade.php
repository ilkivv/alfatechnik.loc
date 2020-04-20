<div class="best_sellers">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">Лучшие товары</div>
                        <ul class="clearfix">
                            <li class="active">Топ 20</li>
                            <li>{!! $best_sellers_random_1->name !!}</li>
                            <li>{!! $best_sellers_random_2->name !!}</li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>

                    <div class="bestsellers_panel panel active">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                            @foreach($top_20 as $product)
                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="images/best_1.png" alt="{{ $product->name }}"></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="{{ url('/product/' . $product->category->url) }}">{!! $product->category->name !!}</a></div>
                                        <div class="bestsellers_name"><a href="{{ url('/product/' . $product->id) }}">{{ $product->name }}</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">{!! $product->prices->first()->price!!}<span>{!! $product->prices[1]->price!!}</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    @if ($product->discount > 0)
                                    <li class="bestsellers_mark bestsellers_discount">-{!! $product->discount !!}%</li>
                                    @endif
                                    @if ($product->is_new)
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                    @endif
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bestsellers_panel panel">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                        @foreach($best_sellers_random_1->products as $product)
                            <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="images/best_1.png" alt="{{ $product->name }}"></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="{{ url($best_sellers_random_1->url) }}">{!! $best_sellers_random_1->name !!}</a></div>
                                            <div class="bestsellers_name"><a href="{{ url('/product/' . $product->id) }}">{{ $product->name }}</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">{!! $product->prices->first()->price!!}<span>{!! $product->prices[1]->price!!}</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        @if ($product->discount > 0)
                                            <li class="bestsellers_mark bestsellers_discount">-{!! $product->discount !!}%</li>
                                        @endif
                                        @if ($product->is_new)
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        @endif
                                    </ul>
                                </div>
                        @endforeach
                        </div>
                    </div>

                    <div class="bestsellers_panel panel">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                        @foreach($best_sellers_random_2->products as $product)
                            <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="images/best_1.png" alt="{{ $product->name }}"></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="{{ url($best_sellers_random_2->url) }}">{!! $best_sellers_random_2->name !!}</a></div>
                                            <div class="bestsellers_name"><a href="{{ url('/product/' . $product->id) }}">{{ $product->name }}</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">{!! $product->prices->first()->price!!}<span>{!! $product->prices[1]->price!!}</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        @if ($product->discount > 0)
                                            <li class="bestsellers_mark bestsellers_discount">-{!! $product->discount !!}%</li>
                                        @endif
                                        @if ($product->is_new)
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        @endif
                                    </ul>
                                </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>