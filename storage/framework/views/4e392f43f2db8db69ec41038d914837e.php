<?php $__env->startSection('content'); ?>
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
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-card">
                <div class="product-image">
                    <span class="product-badge new">NEW</span>
                </div>
                <div class="product-info">
                    <div class="product-stock">В наличии</div>
                    <div class="product-name"><?php echo e($product['name']); ?></div>
                    <div class="product-price">
                        <span class="current-price"><?php echo e($product['price']); ?> P</span>
                        <span class="old-price"><?php echo e($product['old_price'] ?? 1600); ?> P</span>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- Catalog Section -->
<section class="section">
    <div class="container">
        <h2 class="section-title">Каталог</h2>
        <div class="catalog-grid">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="catalog-item">
                <div class="catalog-content">
                    <div class="catalog-title"><?php echo e($category['name']); ?></div>
                    <div class="catalog-description"><?php echo e($category['description']); ?></div>
                    <a href="/catalog/<?php echo e($category['slug']); ?>" class="catalog-link">
                        Перейти
                        <img src="/images/arrow-right-fill.png" alt="Go" width="16" height="16">
                    </a>
                </div>
                <div class="catalog-image"></div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="section">
    <div class="container">
        <div class="news-header">
            <h2 class="section-title">Новости</h2>
            <div class="carousel-nav">
                <button class="carousel-btn">
                    <img src="/images/arrow-left.png" alt="Previous" width="24" height="24">
                </button>
                <button class="carousel-btn">
                    <img src="/images/arrow-right.png" alt="Next" width="24" height="24">
                </button>
            </div>
        </div>
        <div class="news-carousel">
            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="news-card">
                <div class="news-content">
                    <div class="news-title"><?php echo e($item['title']); ?></div>
                    <div class="news-description"><?php echo e($item['description']); ?></div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            const scrollAmount = 318 + 24; // card width + gap

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
            const scrollAmount = 432 + 24; // card width + gap

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\GIT\timber-home\resources\views/home.blade.php ENDPATH**/ ?>