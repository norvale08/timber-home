@props(['category'])

<div class="catalog-item">
    <div class="catalog-content">
        <div class="catalog-title">{{ $category['name'] }}</div>
        <div class="catalog-description">{{ $category['description'] }}</div>
        <a href="/catalog/{{ $category['slug'] }}" class="catalog-link">
            Перейти
            <img src="/images/arrow-right-fill.svg" alt="Go" width="16" height="16">
        </a>
    </div>
    <div class="catalog-image"></div>
</div>
