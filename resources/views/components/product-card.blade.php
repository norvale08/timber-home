@props(['product', 'link' => null])

@if($link)
<a href="{{ $link }}" class="product-card-link">
@endif
    <div class="product-card">
        <div class="product-image">
            @if($product['new'] ?? false)
            <span class="product-badge new">NEW</span>
            @endif
        </div>
        <div class="product-info">
            <x-stock-status :in-stock="$product['in_stock'] ?? true" />
            <div class="product-name">{{ $product['name'] }}</div>
            <div class="product-price">
                <span class="current-price">{{ $product['price'] }} ₽</span>
                @if($product['old_price'] ?? null)
                <span class="old-price">{{ $product['old_price'] }} ₽</span>
                @endif
            </div>
            <div class="product-actions">
                <x-quantity-selector />
                <button type="button" class="btn-add-cart">
                    <img src="/images/cart-icon-white.png" alt="Cart" width="20" height="20">
                    В корзину
                </button>
            </div>
        </div>
    </div>
@if($link)
</a>
@endif
