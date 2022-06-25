<!doctype html>
<html>
    <head>
        <title><?php echo e(config('app.name', 'Laravel')); ?> <?php echo $__env->yieldContent('title'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <?php echo $__env->yieldContent('script'); ?>
    </head>
    
    <body>

        <header>
                <div id="logo">TysonLover</div>
        </header>

        <section>
            <?php echo $__env->yieldContent('contenuto'); ?>
        </section>

        <footer>
        <div id="logo-footer">TysonLover account</div>
        <div id="footer-info">O46001862 Squillaci Simone</div>
        </footer>
    </body>
</html><?php /**PATH C:\Users\game1\Desktop\hw2\resources\views/layouts/sign.blade.php ENDPATH**/ ?>