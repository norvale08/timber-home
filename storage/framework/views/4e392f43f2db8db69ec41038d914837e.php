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
        <h2 class="section-title">Товары</h2>
        <div class="products-carousel">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-card">
                <div class="product-image">🪵</div>
                <div class="product-info">
                    <div class="product-name"><?php echo e($product['name']); ?></div>
                    <div class="product-price"><?php echo e($product['price']); ?> P</div>
                    <button class="btn-add-cart">В корзину</button>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="catalog-item">
                <div class="catalog-icon"><?php echo e($category['icon']); ?></div>
                <div class="catalog-title"><?php echo e($category['name']); ?></div>
                <div class="catalog-description"><?php echo e($category['description']); ?></div>
                <a href="/catalog/<?php echo e($category['slug']); ?>" class="catalog-link">Перейти →</a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="news-card">
                <div class="news-image">📰</div>
                <div class="news-content">
                    <div class="news-title"><?php echo e($item['title']); ?></div>
                    <div class="news-description"><?php echo e($item['description']); ?></div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="carousel-nav">
            <button class="carousel-btn">←</button>
            <button class="carousel-btn">→</button>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\GIT\timber-home\resources\views/home.blade.php ENDPATH**/ ?>