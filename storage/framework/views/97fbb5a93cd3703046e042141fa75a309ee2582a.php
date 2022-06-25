<!doctype html>
<html>
    <head>
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <?php echo $__env->yieldContent('script'); ?>
    </head>
    <body>

        <header>
            <nav>
                <div id="logo">TysonLover</div>
                <div id="links">
                    <?php echo $__env->yieldContent('menu'); ?>
                </div>

                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </nav>
            <div id='view' class='hidden'>
                    <?php echo $__env->yieldContent('menu_t'); ?>
                </div>
        </header>

        <section>
            <?php echo $__env->yieldContent('contenuto'); ?>
        </section>
        
        <footer>
            <?php echo $__env->yieldContent('footer'); ?>
        </footer>
    </body>
</html><?php /**PATH C:\Users\game1\Desktop\hw2\resources\views/layouts/page.blade.php ENDPATH**/ ?>