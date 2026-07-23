<?php $__env->startSection('content'); ?>
    <div class="content">
        <h1><?php echo e($title); ?></h1>
        <p><?php echo e($message); ?></p>
        
        <div style="margin-top: 2rem;">
            <h2>Features</h2>
            <ul style="margin-left: 1.5rem; margin-top: 1rem;">
                <li>Blade Templates</li>
                <li>Routing</li>
                <li>Controllers</li>
                <li>MVC Architecture</li>
            </ul>
        </div>

        <div style="margin-top: 2rem;">
            <p>Current Date: <?php echo e(date('F j, Y')); ?></p>
            <p>Environment: <?php echo e(app()->environment()); ?></p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\GIT\timber-home\resources\views/home.blade.php ENDPATH**/ ?>