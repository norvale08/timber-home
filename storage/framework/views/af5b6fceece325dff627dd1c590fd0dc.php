<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="/css/category.css">

<div class="category-page">
    <div class="container">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <a href="/" class="breadcrumb-link">Главная</a>
            <span class="breadcrumb-separator">></span>
            <a href="/catalog" class="breadcrumb-link">Каталог</a>
            <span class="breadcrumb-separator">></span>
            <span class="breadcrumb-current"><?php echo e($categoryName); ?></span>
        </div>

        <!-- Page Title -->
        <h1 class="category-page-title"><?php echo e($categoryName); ?></h1>

        <div class="category-content">
            <!-- Filters Sidebar -->
            <aside class="filters-sidebar">
                <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="filter-section">
                    <?php if($filter['type'] === 'range'): ?>
                        <div class="filter-title"><?php echo e($filter['title']); ?></div>
                        <div class="price-range">
                            <input type="number" class="price-input" value="<?php echo e($filter['min']); ?>" min="0">
                            <span class="price-separator">—</span>
                            <input type="number" class="price-input" value="<?php echo e($filter['max']); ?>" min="0">
                        </div>
                        <div class="price-slider">
                            <input type="range" min="0" max="300000" value="<?php echo e($filter['min']); ?>" class="slider-min">
                            <input type="range" min="0" max="300000" value="<?php echo e($filter['max']); ?>" class="slider-max">
                        </div>
                    <?php else: ?>
                        <div class="filter-title"><?php echo e($filter['title']); ?></div>
                        <div class="filter-options">
                            <?php $__currentLoopData = $filter['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="filter-option">
                                <input type="checkbox" class="filter-checkbox">
                                <span><?php echo e($option); ?></span>
                            </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php if($filter['show_all'] ?? false): ?>
                        <a href="#" class="filter-show-all">Показать все</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </aside>

            <!-- Products Section -->
            <main class="products-main">
                <!-- Sort and View Options -->
                <div class="products-header">
                    <div class="sort-options">
                        <span class="sort-label">Сортировка:</span>
                        <select class="sort-select">
                            <option>По умолчанию</option>
                            <option>По цене (возрастание)</option>
                            <option>По цене (убывание)</option>
                            <option>По названию</option>
                        </select>
                    </div>
                    <div class="items-per-page">
                        <span class="items-label">Выводить товаров:</span>
                        <select class="items-select">
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="products-grid">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="/product/<?php echo e($product['id']); ?>" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image">
                                <?php if($product['new'] ?? false): ?>
                                <span class="product-badge new">NEW</span>
                                <?php endif; ?>
                            </div>
                            <div class="product-info">
                                <?php if($product['in_stock'] ?? true): ?>
                                <div class="product-stock">В наличии</div>
                                <?php else: ?>
                                <div class="product-stock out-of-stock">Нет в наличии</div>
                                <?php endif; ?>
                                <div class="product-name"><?php echo e($product['name']); ?></div>
                                <div class="product-price">
                                    <span class="current-price"><?php echo e($product['price']); ?> P</span>
                                    <?php if($product['old_price'] ?? null): ?>
                                    <span class="old-price"><?php echo e($product['old_price']); ?> P</span>
                                    <?php endif; ?>
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
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <button class="pagination-btn pagination-prev">
                        <img src="/images/arrow-left.svg" alt="Previous" width="16" height="16">
                    </button>
                    <button class="pagination-btn active">1</button>
                    <button class="pagination-btn">2</button>
                    <button class="pagination-btn">3</button>
                    <button class="pagination-btn">4</button>
                    <button class="pagination-btn">5</button>
                    <span class="pagination-ellipsis">...</span>
                    <button class="pagination-btn">12</button>
                    <button class="pagination-btn pagination-next">
                        <img src="/images/arrow-right.svg" alt="Next" width="16" height="16">
                    </button>
                </div>
            </main>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\GIT\timber-home\resources\views/category.blade.php ENDPATH**/ ?>