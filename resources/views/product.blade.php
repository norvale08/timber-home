@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/product.css">

<div class="product-page">
    <div class="container">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <a href="/" class="breadcrumb-link">Главная</a>
            <span class="breadcrumb-separator">></span>
            <a href="/catalog" class="breadcrumb-link">Каталог</a>
            <span class="breadcrumb-separator">></span>
            <span class="breadcrumb-current">{{ $product['name'] }}</span>
        </div>

        <!-- Product Details -->
        <div class="product-details">
            <!-- Product Gallery -->
            <div class="product-gallery">
                <div class="gallery-main">
                    <div class="gallery-image">
                        @if($product['new'] ?? false)
                        <span class="product-badge new">NEW</span>
                        @endif
                        @if($product['hit'] ?? false)
                        <span class="product-badge hit">HIT</span>
                        @endif
                    </div>
                    <div class="gallery-nav">
                        <button class="gallery-btn gallery-prev">
                            <img src="/images/arrow-left.svg" alt="Previous" width="24" height="24">
                        </button>
                        <button class="gallery-btn gallery-next">
                            <img src="/images/arrow-right.svg" alt="Next" width="24" height="24">
                        </button>
                    </div>
                </div>
                <div class="gallery-thumbnails">
                    <div class="thumbnail active"></div>
                    <div class="thumbnail"></div>
                    <div class="thumbnail"></div>
                    <div class="thumbnail"></div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="product-info">
                <h1 class="product-title">{{ $product['name'] }}</h1>
                <div class="product-article">{{ $product['article'] }}</div>
                @if($product['in_stock'] ?? true)
                <div class="product-stock">В наличии</div>
                @else
                <div class="product-stock out-of-stock">Нет в наличии</div>
                @endif

                <!-- Characteristics Table -->
                <div class="product-characteristics">
                    @foreach($product['characteristics'] as $char)
                    <div class="characteristic-row">
                        <span class="characteristic-name">{{ $char['name'] }}:</span>
                        <span class="characteristic-value">{{ $char['value'] }}</span>
                    </div>
                    @endforeach
                </div>

                <!-- Color Selection -->
                <div class="color-selection">
                    <label class="color-label">Цвет:</label>
                    <select class="color-select">
                        @foreach($product['colors'] as $color)
                        <option {{ $color === $product['selected_color'] ? 'selected' : '' }}>{{ $color }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Price -->
                <div class="product-price">
                    <span class="current-price">{{ $product['price'] }} P</span>
                    @if($product['old_price'] ?? null)
                    <span class="old-price">{{ $product['old_price'] }} P</span>
                    @endif
                </div>

                <!-- Quantity and Actions -->
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
                    <button class="btn-buy-one-click">Купить в 1 клик</button>
                </div>
            </div>
        </div>

        <!-- Product Tabs -->
        <div class="product-tabs">
            <div class="tabs-header">
                <button class="tab-btn active" data-tab="description">ОПИСАНИЕ</button>
                <button class="tab-btn" data-tab="characteristics">ХАРАКТЕРИСТИКИ</button>
                <button class="tab-btn" data-tab="documents">ДОКУМЕНТЫ</button>
                <button class="tab-btn" data-tab="delivery">ОПЛАТА И ДОСТАВКА</button>
            </div>
            <div class="tabs-content">
                <div class="tab-content active" id="description">
                    <p>{{ $product['description'] }}</p>
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

        <!-- Similar Products -->
        <div class="similar-products">
            <div class="similar-header">
                <h2 class="similar-title">Похожие товары</h2>
                <div class="carousel-nav">
                    <button class="carousel-btn">
                        <img src="/images/arrow-left.svg" alt="Previous" width="24" height="24">
                    </button>
                    <button class="carousel-btn">
                        <img src="/images/arrow-right.svg" alt="Next" width="24" height="24">
                    </button>
                </div>
            </div>
            <div class="similar-carousel">
                @foreach($similarProducts as $product)
                <div class="product-card">
                    <div class="product-image">
                        @if($product['new'] ?? false)
                        <span class="product-badge new">NEW</span>
                        @endif
                    </div>
                    <div class="product-info">
                        @if($product['in_stock'] ?? true)
                        <div class="product-stock">В наличии</div>
                        @else
                        <div class="product-stock out-of-stock">Нет в наличии</div>
                        @endif
                        <div class="product-name">{{ $product['name'] }}</div>
                        <div class="product-price">
                            <span class="current-price">{{ $product['price'] }} P</span>
                            @if($product['old_price'] ?? null)
                            <span class="old-price">{{ $product['old_price'] }} P</span>
                            @endif
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
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tab switching
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
});
</script>
@endsection
