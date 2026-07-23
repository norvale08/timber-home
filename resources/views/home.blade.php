@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/home.css">

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Строим тёплые деревянные дома</h1>
                <p>Учитывая ключевые сценарии поведения, существующая теория в значительной степени обусловливает важность дальнейших направлений развития.</p>
                <div class="hero-features">
                    <div class="feature-item">
                        <div class="feature-icon"></div>
                        <p>Построим дом по вашему дизайн-проекту</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon"></div>
                        <p>Уникальный дизайн с удобной планировкой</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon"></div>
                        <p>Подберем мебель и подключим технику</p>
                    </div>
                </div>
                <div class="btn-hero">
                    <a href="/catalog" >Подробнее</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="section">
    <div class="container">
        <h2 class="section-title">Товары</h2>
        <div class="products-carousel">
            @foreach($products as $product)
            <div class="product-card">
                <div class="product-image">🪵</div>
                <div class="product-info">
                    <div class="product-name">{{ $product['name'] }}</div>
                    <div class="product-price">{{ $product['price'] }} P</div>
                    <button class="btn-add-cart">В корзину</button>
                </div>
            </div>
            @endforeach
        </div>
        <div class="carousel-nav">
            <button class="carousel-btn">←</button>
            <button class="carousel-btn">→</button>
        </div>
    </div>
</section>

<!-- Catalog Section -->
<section class="section">
    <div class="container">
        <h2 class="section-title">Каталог</h2>
        <div class="catalog-grid">
            @foreach($categories as $category)
            <div class="catalog-item">
                <div class="catalog-icon">{{ $category['icon'] }}</div>
                <div class="catalog-title">{{ $category['name'] }}</div>
                <div class="catalog-description">{{ $category['description'] }}</div>
                <a href="/catalog/{{ $category['slug'] }}" class="catalog-link">Перейти →</a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- News Section -->
<section class="section news-section">
    <div class="container">
        <div class="news-header">
            <h2>Новости</h2>
            <a href="/news" class="btn btn-outline">Все новости</a>
        </div>
        <div class="news-carousel">
            @foreach($news as $item)
            <div class="news-card">
                <div class="news-image">📰</div>
                <div class="news-content">
                    <div class="news-title">{{ $item['title'] }}</div>
                    <div class="news-description">{{ $item['description'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="carousel-nav">
            <button class="carousel-btn">←</button>
            <button class="carousel-btn">→</button>
        </div>
    </div>
</section>
@endsection
