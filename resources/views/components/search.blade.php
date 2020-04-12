<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
    <div class="header_search">
        <div class="header_search_content">
            <div class="header_search_form_container">
                <form action="#" class="header_search_form clearfix">
                    <input type="search" required="required" class="header_search_input" placeholder="Введите поисковое слово...">
                    <div class="custom_dropdown">
                        <div class="custom_dropdown_list">
                            <span class="custom_dropdown_placeholder clc">Все категории</span>
                            <i class="fas fa-chevron-down"></i>
                            <ul class="custom_list clc">

                                <li><a class="clc" href="#">Все категории</a></li>
                                    @foreach($categoriesItems as $categoriesItem)
                                <li><a class="clc" href="#">{!! $categoriesItem['name'] !!}</a></li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
                </form>
            </div>
        </div>
    </div>
</div>