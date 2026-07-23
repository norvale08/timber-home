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
        <div class="products-header">
            <h2 class="section-title">Товары</h2>
            <div class="carousel-nav">
                <button class="carousel-btn">
                    <img src="/images/arrow-left.png" alt="Previous" width="24" height="24">
                </button>
                <button class="carousel-btn">
                    <img src="/images/arrow-right.png" alt="Next" width="24" height="24">
                </button>
            </div>
        </div>
        <div class="products-carousel">
            @foreach($products as $product)
            <div class="product-card">
                <div class="product-image">
                    <span class="product-badge new">NEW</span>
                </div>
                <div class="product-info">
                    <div class="product-stock">В наличии</div>
                    <div class="product-name">{{ $product['name'] }}</div>
                    <div class="product-price">
                        <span class="current-price">{{ $product['price'] }} P</span>
                        <span class="old-price">{{ $product['old_price'] ?? 1600 }} P</span>
                    </div>
                    <div class="product-actions">
                        <div class="quantity-selector">
                            <button class="qty-btn">-</button>
                            <span class="qty-value">1</span>
                            <button class="qty-btn">+</button>
                        </div>
                        <button class="btn-add-cart">
                            <img src="/images/cart-icon-white.png" alt="Cart" width="20" height="20">
                            В корзину
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
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
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.products-carousel');
    const prevBtn = document.querySelector('.carousel-nav button:first-child');
    const nextBtn = document.querySelector('.carousel-nav button:last-child');

    if (carousel && prevBtn && nextBtn) {
        const scrollAmount = 318 + 24; // card width + gap

        prevBtn.addEventListener('click', function() {
            carousel.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });

        nextBtn.addEventListener('click', function() {
            carousel.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
    }
});
</script>
@endsection
