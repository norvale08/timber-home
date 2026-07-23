<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Timber Home' }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 0 40px;
        }
        header {
            background-color: #fff;
            color: #000;
            padding: 0;
            height: 120px;
            width: 100%;
            position: relative;
        }
        header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background-color: #e5e5e5;
        }
        .header-stripe {
            height: 1px;
            background-color: #e5e5e5;
            width: 100%;
            margin-top: 20px;
            margin-left: 20px;
        }
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
            padding-top: 20px;
        }
        .header-left {
            display: flex;
            align-items: center;
            gap: 3rem;
            margin-left: 40px;
        }
        .logo {
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 35px;
            width: auto;
        }
        nav {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        nav a {
            color: #000;
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: opacity 0.3s;
        }
        nav a:hover {
            opacity: 0.8;
        }
        .cart-icon-box {
            border-radius: 8px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .cart-icon-box:hover {
            background-color: #e0e0e0;
        }
        main {
            min-height: calc(100vh - 200px);
        }
        footer {
            background-color: #fff;
            color: #000;
            text-align: center;
            padding: 2rem 0;
            margin-top: 3rem;
            border-top: 1px solid #e5e7eb;
        }
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .footer-logo {
            display: flex;
            align-items: center;
        }
        .footer-logo img {
            height: auto;
            max-width: 150px;
        }
        .copyright {
            font-size: 0.875rem;
            opacity: 0.8;
        }
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn-primary {
            background-color: #2d5016;
            color: white;
        }
        .btn-primary:hover {
            background-color: #1e3a0f;
        }
        .btn-outline {
            background-color: transparent;
            border: 2px solid #000;
            color: #000;
        }
        .btn-outline:hover {
            background-color: #000;
            color: white;
        }
    </style>
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
                <div class="footer-logo">
                    <img src="/images/Логотип.png" alt="Логотип">
                </div>
                <div class="copyright">&copy; {{ date('Y') }} Timber Home. Все права защищены.</div>
            </div>
        </div>
    </footer>
</body>
</html>
