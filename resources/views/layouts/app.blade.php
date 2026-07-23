<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Timber Home' }}</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="header-left">
                    <a href="/" class="logo">
                        <img src="/images/Логотип.png" alt="Логотип">
                    </a>
                    <nav>
                        <a href="/">Главная</a>
                        <a href="/catalog">Каталог</a>
                        <a href="/blog">Блог</a>
                        <a href="/contacts">Контакты</a>
                    </nav>
                </div>
                <div class="cart-icon-box">
                    <img src="/images/cart-icon.png" alt="Cart" >
                </div>
            </div>
            <div class="header-stripe"></div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-top">
                    <div class="footer-logo">
                        <img src="/images/Логотип.png" alt="Логотип">
                    </div>
                </div>
                <div class="footer-divider"></div>
                <div class="footer-bottom">
                    <div class="footer-links">
                        <div class="copyright">&copy; 2025, «Название компании»</div>
                        <div class="copyleft">Политика конфиденциальности</div>
                        <div class="copyleft">Реквизиты</div>
                    </div>
                    <div class="copyleft">Разработано в Вятка IT</div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
