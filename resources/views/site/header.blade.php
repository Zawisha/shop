<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="user-menu">
                <ul>
                    @if(  Auth::user() )
                    <li><a href="{{ route('user_panel') }}"><i class="fa fa-user"></i> Мой аккаунт</a></li>
                        @else
                        <li><a href="{{ route('login') }}"><i class="fa fa-user"></i> Войти</a></li>
                        <li><a href="{{ route('register') }}"><i class="fa fa-user"></i> Регистрация</a></li>
                    @endif
                    <li><a href="{{ route('cart') }}"><i class="fa fa-user"></i> Моя корзина</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>