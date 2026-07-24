<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="/css/article.css">

<div class="article-page">
    <div class="container">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <a href="/" class="breadcrumb-link">Главная</a>
            <span class="breadcrumb-separator">></span>
            <a href="/blog" class="breadcrumb-link">Блог</a>
            <span class="breadcrumb-separator">></span>
            <span class="breadcrumb-current"><?php echo e($article['title']); ?></span>
        </div>

        <!-- Article Title -->
        <h1 class="article-title"><?php echo e($article['title']); ?></h1>

        <!-- Article Content -->
        <article class="article-content">
            <p class="article-intro"><?php echo e($article['content']); ?></p>

            <!-- Image Placeholder -->
            <div class="article-image-placeholder"></div>
            <p class="image-caption">Подпись к фотографии</p>

            <!-- Article Sections -->
            <?php $__currentLoopData = $article['sections']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($section['type'] === 'text'): ?>
                    <p class="article-text"><?php echo e($section['content']); ?></p>
                <?php elseif($section['type'] === 'heading2'): ?>
                    <h2 class="article-heading2"><?php echo e($section['content']); ?></h2>
                <?php elseif($section['type'] === 'heading3'): ?>
                    <h3 class="article-heading3"><?php echo e($section['content']); ?></h3>
                <?php elseif($section['type'] === 'list'): ?>
                    <ul class="article-list">
                        <?php $__currentLoopData = $section['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($item); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </article>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\GIT\timber-home\resources\views/article.blade.php ENDPATH**/ ?>