@extends('layouts.app')

@section('content')
<style>
    .hero {
        background-color: #f5f5f5;
        color: #000;
        padding: 4rem 0;
        min-height: 500px;
        display: flex;
        align-items: center;
    }
    .hero-content {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 2rem;
    }
    .hero-text h1 {
        font-size: 3.5rem;
        font-weight: bold;
        margin-bottom: 1rem;
        color: #000;
    }
    .hero-text p {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #333;
        margin-bottom: 2rem;
    }
    .hero-features {
        display: flex;
        gap: 2rem;
        margin-bottom: 2rem;
    }
    .feature-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        max-width: 180px;
    }
    .feature-icon {
        width: 60px;
        height: 60px;
        border: 2px dashed #999;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 0.5rem;
        font-size: 1.5rem;
        color: #555;
    }
    .feature-item p {
        font-size: 0.9rem;
        color: #333;
        line-height: 1.4;
    }
    .btn-hero {
        background-color: #000;
        color: #fff;
        padding: 1rem 2rem;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.3s;
    }
    .btn-hero:hover {
        background-color: #333;
    }
    .section {
        padding: 4rem 0;
    }
    .section-title {
        font-size: 2rem;
        margin-bottom: 2rem;
        color: #000;
        text-align: center;
        font-weight: bold;
    }
    .products-carousel {
        display: flex;
        gap: 1.5rem;
        overflow-x: auto;
        padding: 1rem 0;
        scroll-snap-type: x mandatory;
    }
    .product-card {
        flex: 0 0 280px;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        overflow: hidden;
        scroll-snap-align: start;
        transition: box-shadow 0.3s;
    }
    .product-card:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .product-image {
        height: 200px;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
    }
    .product-info {
        padding: 1rem;
    }
    .product-name {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    .product-price {
        color: #000;
        font-weight: bold;
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
    }
    .btn-add-cart {
        width: 100%;
        background: #000;
        color: white;
        border: none;
        padding: 0.75rem;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 500;
        transition: background 0.3s;
    }
    .btn-add-cart:hover {
        background: #333;
    }
    .carousel-nav {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 1rem;
    }
    .carousel-btn {
        background: #000;
        color: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 1.25rem;
        transition: background 0.3s;
    }
    .carousel-btn:hover {
        background: #333;
    }
    .catalog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }
    .catalog-item {
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .catalog-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .catalog-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }
    .catalog-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #000;
    }
    .catalog-description {
        color: #6b7280;
        margin-bottom: 1rem;
    }
    .catalog-link {
        color: #000;
        text-decoration: none;
        font-weight: 500;
        transition: opacity 0.3s;
    }
    .catalog-link:hover {
        opacity: 0.8;
    }
    .news-section {
        background: #f9fafb;
    }
    .news-carousel {
        display: flex;
        gap: 1.5rem;
        overflow-x: auto;
        padding: 1rem 0;
        scroll-snap-type: x mandatory;
    }
    .news-card {
        flex: 0 0 350px;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        overflow: hidden;
        scroll-snap-align: start;
        transition: box-shadow 0.3s;
    }
    .news-card:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .news-image {
        height: 180px;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
    }
    .news-content {
        padding: 1.5rem;
    }
    .news-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: #1f2937;
    }
    .news-description {
        color: #6b7280;
        line-height: 1.6;
    }
    .news-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }
    .news-header h2 {
        margin: 0;
        color: #000;
        font-weight: bold;
    }
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Строим тёплые деревянные дома</h1>
                <p>Профессиональное строительство экологичных домов из натурального дерева. Надёжно, красиво и долговечно.</p>
                <div class="hero-features">
                    <div class="feature-item">
                        <div class="feature-icon">�</div>
                        <p>Построим дом по вашему дизайн-проекту</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">✏️</div>
                        <p>Уникальный дизайн с удобной планировкой</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">🛋️</div>
                        <p>Подберем мебель и подключим технику</p>
                    </div>
                </div>
                <a href="/catalog" class="btn-hero">Подробнее</a>
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
