<div class="main_nav_menu ml-auto">
    <ul class="standard_dropdown main_nav_dropdown">
        @foreach($menuItems as $menuItem)
            <li><a href="{!! url($menuItem['url']) !!}">{!! $menuItem['name'] !!}<i class="fas fa-chevron-down"></i></a></li>
        @endforeach
    </ul>
</div>