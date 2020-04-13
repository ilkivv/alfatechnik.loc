<div class="top_bar">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-row">
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="/images/phone.png" alt=""></div>+8 952 883 65 65</div>
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="/images/mail.png" alt=""></div><a href="mailto:alfa@gmail.com">alfa@gmail.com</a></div>
                <div class="top_bar_content ml-auto">
                    <div class="top_bar_menu">
                    </div>
                    <div class="top_bar_user">
                        <div class="user_icon"><img src="/images/user.svg" alt=""></div>

                            @guest
                                <div><a href="{{ route('login') }}">Авторизация</a></div>
                                @if (Route::has('register'))
                                    <div><a href="{{ route('register') }}">Регистрация</a></div>
                                @endif
                            @else
                                <div><a href="">{{ Auth::user()->name }}</a></div>
                                <div>
                                    <a class="j-link-out-form" href="#">Выйти</a>
                                    <form action="{{ route('logout') }}" method="post" hidden>
                                        {{ csrf_field() }}
                                        <button class="j-submit-out-form" type="submit" hidden/>
                                    </form>
                                </div>

                            @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>