@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/category.css">

<div class="category-page">
    <div class="container">
        <x-breadcrumbs :items="[
            ['label' => 'Главная', 'url' => '/'],
            ['label' => 'Каталог', 'url' => '/catalog'],
            ['label' => $categoryName],
        ]" separator="•" />

        <h1 class="category-page-title">{{ $categoryName }}</h1>

        <div class="category-content">
            <aside class="filters-sidebar">
                @foreach($filters as $filter)
                <div class="filter-section">
                    @if($filter['type'] === 'range')
                        <div class="filter-title filter-toggle">
                            <span>Цена, ₽</span>
                            <span class="filter-toggle-icon"></span>
                        </div>
                        <div class="price-filter-content">
                            <div class="price-range">
                                <input type="number" class="price-input" value="{{ $priceMin }}" min="0">
                                <span class="price-separator">-</span>
                                <input type="number" class="price-input" value="{{ $priceMax }}" min="0">
                            </div>
                            <div class="price-slider">
                                <div class="slider-track"></div>
                                <input type="range" min="0" max="300000" value="{{ $priceMin }}" class="slider-min">
                                <input type="range" min="0" max="300000" value="{{ $priceMax }}" class="slider-max">
                            </div>
                        </div>
                    @elseif($filter['type'] === 'radio')
                        <div class="filter-title filter-toggle">
                            <span>{{ $filter['title'] }}</span>
                            <span class="filter-toggle-icon"></span>
                        </div>
                        <div class="filter-content">
                            <div class="filter-options">
                                @foreach($filter['options'] as $option)
                                <label class="filter-option">
                                    <input type="radio" name="{{ $filter['name'] }}" class="filter-radio" {{ $option['selected'] ? 'checked' : '' }}>
                                    <span class="custom-radio"></span>
                                    <span class="filter-label-text">{{ $option['label'] }}</span>
                                </label>
                                @endforeach
                            </div>
                            @if($filter['show_all'] ?? false)
                            <a href="#" class="filter-show-all">Показать всё</a>
                            @endif
                        </div>
                    @else
                        <div class="filter-title filter-toggle">
                            <span>{{ $filter['title'] }}</span>
                            <span class="filter-toggle-icon"></span>
                        </div>
                        <div class="filter-content">
                            <div class="filter-options">
                                @foreach($filter['options'] as $option)
                                <label class="filter-option">
                                    <input type="checkbox" class="filter-checkbox" {{ $option['checked'] ? 'checked' : '' }}>
                                    <span class="custom-checkbox"></span>
                                    <span class="filter-label-text">{{ $option['label'] }}</span>
                                </label>
                                @endforeach
                            </div>
                            @if($filter['show_all'] ?? false)
                            <a href="#" class="filter-show-all">Показать всё</a>
                            @endif
                        </div>
                    @endif
                </div>
                @endforeach
            </aside>

            <main class="products-main">
                <div class="products-header">
                    <div class="sort-options">
                        <span class="sort-label">Сортировка:</span>
                        <select class="sort-select" onchange="location.href = '?sort=' + this.value + '&per_page={{ $perPage }}&price_min={{ $priceMin }}&price_max={{ $priceMax }}';">
                            <option value="default" {{ $sort === 'default' ? 'selected' : '' }}>По умолчанию</option>
                            <option value="price" {{ in_array($sort, ['price','price_asc']) ? 'selected' : '' }}>По цене</option>
                            <option value="name" {{ $sort === 'name' ? 'selected' : '' }}>По названию</option>
                        </select>
                    </div>
                    <div class="items-per-page">
                        <span class="items-label">Выводить товаров:</span>
                        <select class="items-select" onchange="location.href = '?per_page=' + this.value + '&sort={{ $sort }}&price_min={{ $priceMin }}&price_max={{ $priceMax }}';">
                            <option value="3" {{ $perPage == 3 ? 'selected' : '' }}>3</option>
                            <option value="6" {{ $perPage == 6 ? 'selected' : '' }}>6</option>
                            <option value="9" {{ $perPage == 9 ? 'selected' : '' }}>9</option>
                            <option value="12" {{ $perPage == 12 ? 'selected' : '' }}>12</option>
                        </select>
                    </div>
                </div>

                <div class="products-grid">
                    @foreach($products as $product)
                    <x-product-card :product="$product" :link="'/product/' . $product['id']" />
                    @endforeach
                </div>

                <div class="pagination">
                    @if($currentPage > 1)
                    <a href="{{ request()->fullUrlWithQuery(['page' => $currentPage - 1]) }}" class="pagination-btn pagination-prev">
                        <img src="/images/arrow-left.svg" alt="Previous" width="16" height="16">
                    </a>
                    @else
                    <button class="pagination-btn pagination-prev" disabled>
                        <img src="/images/arrow-left.svg" alt="Previous" width="16" height="16">
                    </button>
                    @endif

                    @foreach($pages as $page)
                        @if($page === '...')
                            <span class="pagination-ellipsis">...</span>
                        @elseif($page == $currentPage)
                            <button class="pagination-btn active">{{ $page }}</button>
                        @else
                            <a href="{{ request()->fullUrlWithQuery(['page' => $page]) }}" class="pagination-btn">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if($currentPage < $totalPages)
                    <a href="{{ request()->fullUrlWithQuery(['page' => $currentPage + 1]) }}" class="pagination-btn pagination-next">
                        <img src="/images/arrow-right.svg" alt="Next" width="16" height="16">
                    </a>
                    @else
                    <button class="pagination-btn pagination-next" disabled>
                        <img src="/images/arrow-right.svg" alt="Next" width="16" height="16">
                    </button>
                    @endif
                </div>
            </main>
        </div>
    </div>
</div>

<script>
(function () {
    const minInput = document.querySelector('.price-range .price-input:first-of-type');
    const maxInput = document.querySelector('.price-range .price-input:last-of-type');
    const minSlider = document.querySelector('.price-slider .slider-min');
    const maxSlider = document.querySelector('.price-slider .slider-max');
    if (!minInput || !maxInput || !minSlider || !maxSlider) return;

    const perPage = '{{ $perPage }}';
    const sort = '{{ $sort }}';

    function reloadWithRange() {
        const min = parseInt(minInput.value, 10) || 0;
        const max = parseInt(maxInput.value, 10) || 0;
        location.href = '?price_min=' + min + '&price_max=' + max + '&per_page=' + perPage + '&sort=' + encodeURIComponent(sort);
    }

    function clamp(source) {
        let min = parseInt(minInput.value, 10) || 0;
        let max = parseInt(maxInput.value, 10) || 0;
        if (min > max) {
            if (source === minInput) {
                minInput.value = max;
                minSlider.value = max;
            } else {
                maxInput.value = min;
                maxSlider.value = min;
            }
        } else {
            minSlider.value = minInput.value;
            maxSlider.value = maxInput.value;
        }
    }

    minInput.addEventListener('input', function () { minSlider.value = this.value; clamp(this); });
    maxInput.addEventListener('input', function () { maxSlider.value = this.value; clamp(this); });
    minSlider.addEventListener('input', function () { minInput.value = this.value; clamp(this); });
    maxSlider.addEventListener('input', function () { maxInput.value = this.value; clamp(this); });
    minInput.addEventListener('change', reloadWithRange);
    maxInput.addEventListener('change', reloadWithRange);
    minSlider.addEventListener('change', reloadWithRange);
    maxSlider.addEventListener('change', reloadWithRange);
})();
</script>

<script>
(function () {
    document.querySelectorAll('.filter-toggle').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            const section = toggle.closest('.filter-section');
            if (section) section.classList.toggle('collapsed');
        });
    });
})();
</script>
@endsection
