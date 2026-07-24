<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($title ?? 'Timber Home'); ?></title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="header-left">
                    <a href="/" class="logo">
                        <img src="/images/Логотип.png" alt="Логотип">
                    </a>
                    <nav>
                        <a href="/">Главная</a>
                        <a href="/catalog">Каталог</a>
                        <a href="/blog">Блог</a>
                        <a href="#" onclick="openModal(); return false;">Контакты</a>
                    </nav>
                </div>
                <div class="cart-icon-box">
                    <img src="/images/cart-icon.png" alt="Cart" >
                </div>
            </div>
            <div class="header-stripe"></div>
        </div>
    </header>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-top">
                    <div class="footer-logo">
                        <img src="/images/Логотип.png" alt="Логотип">
                    </div>
                </div>
                <div class="footer-divider"></div>
                <div class="footer-bottom">
                    <div class="footer-links">
                        <div class="copyright">&copy; 2025, «Название компании»</div>
                        <div class="copyleft">Политика конфиденциальности</div>
                        <div class="copyleft">Реквизиты</div>
                    </div>
                    <div class="copyleft">Разработано в Вятка IT</div>
                </div>
            </div>
        </div>
    </footer>

    <?php if (isset($component)) { $__componentOriginal733eb5874b0445fe3ae6962156b571ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal733eb5874b0445fe3ae6962156b571ec = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.contact-modal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('contact-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal733eb5874b0445fe3ae6962156b571ec)): ?>
<?php $attributes = $__attributesOriginal733eb5874b0445fe3ae6962156b571ec; ?>
<?php unset($__attributesOriginal733eb5874b0445fe3ae6962156b571ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal733eb5874b0445fe3ae6962156b571ec)): ?>
<?php $component = $__componentOriginal733eb5874b0445fe3ae6962156b571ec; ?>
<?php unset($__componentOriginal733eb5874b0445fe3ae6962156b571ec); ?>
<?php endif; ?>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('contactModal');
        const closeModalBtn = document.getElementById('closeModal');

        function openModal() {
            if (modal) {
                modal.classList.add('show');
            }
        }

        function closeModal() {
            if (modal) {
                modal.classList.remove('show');
            }
        }

        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', closeModal);
        }

        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });
        }

        window.openModal = openModal;
    });
    </script>
</body>
</html>
<?php /**PATH D:\GIT\timber-home\resources\views/layouts/app.blade.php ENDPATH**/ ?>