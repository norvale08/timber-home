<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($title ?? 'Laravel'); ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        header {
            background-color: #7c3aed;
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
        }
        nav a:hover {
            text-decoration: underline;
        }
        main {
            padding: 2rem 0;
            min-height: calc(100vh - 200px);
        }
        footer {
            background-color: #1f2937;
            color: white;
            text-align: center;
            padding: 1.5rem 0;
            margin-top: auto;
        }
        .content {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <h1>Laravel Blade</h1>
                <div>
                    <a href="<?php echo e(route('home')); ?>">Home</a>
                    <a href="<?php echo e(route('about')); ?>">About</a>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <?php echo e(date('Y')); ?> Laravel Project. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
<?php /**PATH D:\GIT\timber-home\resources\views/layouts/app.blade.php ENDPATH**/ ?>