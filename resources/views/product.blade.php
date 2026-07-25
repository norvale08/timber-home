@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/components/breadcrumbs.css">
<link rel="stylesheet" href="/css/components/product-card.css">
<link rel="stylesheet" href="/css/components/carousel.css">
<link rel="stylesheet" href="/css/product.css?v=2">

<div class="product-page">
    <div class="container">
        <x-breadcrumbs :items="[
            ['label' => 'Главная', 'url' => '/'],
            ['label' => 'Каталог', 'url' => '/catalog'],
            ['label' => $product['name']],
        ]" />

        <div class="product-details">
            <div class="product-gallery">
                <div class="gallery-main">
                    <div class="gallery-image">
                        @if($product['new'] ?? false)
                        <div class="gallery-badges">
                            <span class="product-badge new">NEW</span>
                            <span class="product-badge new">NEW</span>
                            <span class="product-badge new">NEW</span>
                        </div>
                        @endif
                        @if($product['hit'] ?? false)
                        <span class="product-badge hit">HIT</span>
                        @endif
                        <button type="button" class="favorite-btn" aria-label="В избранное">
                            <img src="/images/heart.svg" alt="В избранное" width="20" height="20">
                        </button>
                    </div>
                    <div class="gallery-nav">
                        <button class="gallery-btn gallery-prev" aria-label="Предыдущее">
                            <img src="/images/arrow-left.svg" alt="" width="24" height="24">
                        </button>
                        <button class="gallery-btn gallery-next" aria-label="Следующее">
                            <img src="/images/arrow-right.svg" alt="" width="24" height="24">
                        </button>
                    </div>
                </div>
                <div class="gallery-dots">
                    <button class="gallery-dot active" data-index="0" aria-label="Слайд 1"></button>
                    <button class="gallery-dot" data-index="1" aria-label="Слайд 2"></button>
                    <button class="gallery-dot" data-index="2" aria-label="Слайд 3"></button>
                    <button class="gallery-dot" data-index="3" aria-label="Слайд 4"></button>
                    <button class="gallery-dot" data-index="4" aria-label="Слайд 5"></button>
                </div>
            </div>

            <div class="product-info product-summary">
                <div class="product-header">
                    <div class="product-meta">
                        <span class="product-article">{{ $product['article'] }}</span>
                        <span class="product-stock-badge {{ ($product['in_stock'] ?? true) ? '' : 'out-of-stock' }}">
                            <span class="stock-dot"></span>
                            {{ ($product['in_stock'] ?? true) ? 'В наличии' : 'Нет в наличии' }}
                        </span>
                    </div>
                    <h1 class="product-title">{{ $product['name'] }}</h1>
                    <p class="product-description">{{ $product['description'] }}</p>
                </div>

                <div class="product-characteristics">
                    @foreach($product['characteristics'] as $char)
                    <div class="characteristic-row">
                        <span class="characteristic-name">{{ $char['name'] }}</span>
                        <span class="characteristic-value">{{ $char['value'] }}</span>
                    </div>
                    @endforeach
                </div>

                <div class="property-select">
                    <label class="property-label" for="propertySelect">Свойство</label>
                    <select class="property-dropdown" id="propertySelect">
                        @foreach($product['colors'] as $color)
                        <option {{ $color === $product['selected_color'] ? 'selected' : '' }}>{{ $color }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="product-price">
                    <span class="current-price">{{ $product['price'] }} ₽</span>
                    @if($product['old_price'] ?? null)
                    <span class="old-price">{{ $product['old_price'] }} ₽</span>
                    @endif
                </div>

                <div class="product-actions">
                    <div class="actions-row">
                        <x-quantity-selector />
                        <button type="button" class="btn-add-cart">
                            <img src="/images/cart-icon-white.png" alt="Cart" width="20" height="20">
                            В корзину
                        </button>
                    </div>
                    <button type="button" class="btn-buy-one-click">Купить в 1 клик</button>
                </div>
            </div>
        </div>

        <div class="product-tabs">
            <div class="tabs-header">
                <button class="tab-btn active" data-tab="description">ОПИСАНИЕ</button>
                <button class="tab-btn" data-tab="characteristics">ХАРАКТЕРИСТИКИ</button>
                <button class="tab-btn" data-tab="documents">ДОКУМЕНТЫ</button>
                <button class="tab-btn" data-tab="delivery">ОПЛАТА И ДОСТАВКА</button>
            </div>
            <div class="tabs-content">
                <div class="tab-content active" id="description">
                    @foreach($product['full_description'] as $paragraph)
                    <p >{{ $paragraph }}</p>
                    @endforeach
                </div>
                <div class="tab-content" id="characteristics">
                    <div class="characteristics-table">
                        @foreach($product['characteristics'] as $char)
                        <div class="characteristic-row">
                            <span class="characteristic-name">{{ $char['name'] }}</span>
                            <span class="characteristic-value">{{ $char['value'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-content" id="documents">
                    <p>Документы отсутствуют</p>
                </div>
                <div class="tab-content" id="delivery">
                    <p>Информация об оплате и доставке</p>
                </div>
            </div>
        </div>

        <div class="similar-products">
            <div class="similar-header">
                <h2 class="similar-title">Похожие товары</h2>
                <x-carousel-nav />
            </div>
            <div class="similar-carousel">
                @foreach($similarProducts as $product)
                <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const galleryPrev = document.querySelector('.gallery-prev');
    const galleryNext = document.querySelector('.gallery-next');
    const galleryDots = document.querySelectorAll('.gallery-dot');
    let currentIndex = 0;
    const totalImages = galleryDots.length;

    function updateGallery(index) {
        currentIndex = index;
        if (currentIndex < 0) currentIndex = totalImages - 1;
        if (currentIndex >= totalImages) currentIndex = 0;

        galleryDots.forEach((dot, i) => {
            dot.classList.toggle('active', i === currentIndex);
        });
    }

    if (galleryPrev) {
        galleryPrev.addEventListener('click', function() {
            updateGallery(currentIndex - 1);
        });
    }

    if (galleryNext) {
        galleryNext.addEventListener('click', function() {
            updateGallery(currentIndex + 1);
        });
    }

    galleryDots.forEach(dot => {
        dot.addEventListener('click', function() {
            const index = parseInt(this.dataset.index);
            updateGallery(index);
        });
    });

    const similarCarousel = document.querySelector('.similar-carousel');
    const carouselBtns = document.querySelectorAll('.similar-header .carousel-btn');

    if (similarCarousel) {
        const scrollAmount = 283;

        carouselBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const direction = this.dataset.direction;
                if (direction === 'prev') {
                    similarCarousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                } else if (direction === 'next') {
                    similarCarousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                }
            });
        });
    }

    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const tabId = this.dataset.tab;

            tabBtns.forEach(b => b.classList.remove('active'));
            tabContents.forEach(c => c.classList.remove('active'));

            this.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        });
    });

    const favoriteBtn = document.querySelector('.favorite-btn');
    if (favoriteBtn) {
        favoriteBtn.addEventListener('click', function() {
            const img = this.querySelector('img');
            this.classList.toggle('active');
            if (this.classList.contains('active')) {
                img.src = '/images/heart-fill.svg';
            } else {
                img.src = '/images/heart.svg';
            }
        });
    }
});
</script>
@endsection
