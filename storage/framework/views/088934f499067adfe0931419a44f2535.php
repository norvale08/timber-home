<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="/css/blog.css">

<div class="blog-page">
    <div class="container">
        <h1 class="blog-title">Блог</h1>

        <div class="blog-grid">
            <?php $__currentLoopData = $blogPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/blog/<?php echo e($post['id']); ?>" class="blog-card-link">
                <div class="blog-card">
                    <div class="blog-image"></div>
                    <div class="blog-content">
                        <div class="blog-date"><?php echo e($post['date']); ?></div>
                        <h3 class="blog-post-title"><?php echo e($post['title']); ?></h3>
                        <p class="blog-description"><?php echo e($post['description']); ?></p>
                    </div>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

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
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\GIT\timber-home\resources\views/blog.blade.php ENDPATH**/ ?>