<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="/css/catalog.css">

<div class="catalog-page">
    <div class="container">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <a href="/" class="breadcrumb-link">Главная</a>
            <span class="breadcrumb-separator">></span>
            <span class="breadcrumb-current">Каталог</span>
        </div>

        <!-- Page Title -->
        <h1 class="catalog-page-title">Каталог</h1>

        <!-- Catalog Grid -->
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
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\GIT\timber-home\resources\views/catalog.blade.php ENDPATH**/ ?>