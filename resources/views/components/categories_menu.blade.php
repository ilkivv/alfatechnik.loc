<div class="cat_menu_container">
    <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
        <div class="cat_burger"><span></span><span></span><span></span></div>
        <div class="cat_menu_text">Категории</div>
    </div>

    <ul class="cat_menu">
        @foreach($categoriesItems as $categoriesItem)
            <li @if(isset($categoriesItem['childrens']))class="hassubs"@endif>
                <a href="{{url($categoriesItem['url'])}}">{!! $categoriesItem['name'] !!}<i class="fas fa-chevron-right ml-auto"></i></a>
                @if(isset($categoriesItem['childrens']))
                <ul>
                    @foreach($categoriesItem['childrens'] as $subcategory)
                    <li @if(isset($subcategory['childrens']))class="hassubs"@endif>
                        <a href="{{url($subcategory['url'])}}">{!! $subcategory['name'] !!}<i class="fas fa-chevron-right"></i></a>
                        @if(isset($subcategory['childrens']))
                        <ul>
                            @foreach($subcategory['childrens'] as $children)
                            <li><a href="{{url($children['url'])}}">{!! $children['name'] !!}<i class="fas fa-chevron-right"></i></a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>

@include('components.menu')

<!-- Menu Trigger -->

@include('components.menu_trigger')