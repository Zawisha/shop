
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="footer-about-us">
                <h2><span>YourTemplate</span></h2>
                <p>Большое разнообразие шаблонов на любой вкус.</p>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="footer-menu">
                <h2 class="footer-wid-title">Навигация пользователя </h2>
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


        <div class="col-md-3 col-sm-6">
            <div class="footer-newsletter">
                <h2 class="footer-wid-title">Подпишись</h2>
                <p>Подпишись на нашу рассылку и получай уникальные предложения</p>
                <div class="newsletter-form">
                    <form action="#">
                        <input type="email" placeholder="Введите Ваш email">
                        <input type="submit" value="Подписаться">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>