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
                    <a href="/catalog">Подробнее</a>
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
            <x-carousel-nav />
        </div>
        <div class="products-carousel">
            @foreach($products as $product)
            <x-product-card :product="$product" />
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
            <x-catalog-card :category="$category" />
            @endforeach
        </div>
    </div>
</section>

<!-- News Section -->
<section class="section">
    <div class="container">
        <div class="news-header">
            <h2 class="section-title">Новости</h2>
            <x-carousel-nav />
        </div>
        <div class="news-carousel">
            @foreach($news as $item)
            <x-blog-card :post="$item" />
            @endforeach
        </div>
        <div class="news-footer">
            <a href="/news" class="news-all-link">Все новости</a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Products carousel
    const productsCarousel = document.querySelector('.products-carousel');
    const productsHeader = document.querySelector('.products-header');
    
    if (productsCarousel && productsHeader) {
        const prevBtn = productsHeader.querySelector('.carousel-nav button:first-child');
        const nextBtn = productsHeader.querySelector('.carousel-nav button:last-child');
        
        if (prevBtn && nextBtn) {
            const scrollAmount = 267 + 17.6; // card width + gap

            prevBtn.addEventListener('click', function(e) {
                e.preventDefault();
                productsCarousel.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            });

            nextBtn.addEventListener('click', function(e) {
                e.preventDefault();
                productsCarousel.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            });
        }
    }

    // News carousel
    const newsCarousel = document.querySelector('.news-carousel');
    const newsHeader = document.querySelector('.news-header');

    if (newsCarousel && newsHeader) {
        const prevBtn = newsHeader.querySelector('.carousel-nav button:first-child');
        const nextBtn = newsHeader.querySelector('.carousel-nav button:last-child');

        if (prevBtn && nextBtn) {
            const scrollAmount = 352 + 17.6; // card width + gap

            prevBtn.addEventListener('click', function(e) {
                e.preventDefault();
                newsCarousel.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            });

            nextBtn.addEventListener('click', function(e) {
                e.preventDefault();
                newsCarousel.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            });
        }
    }
});
</script>
@endsection
