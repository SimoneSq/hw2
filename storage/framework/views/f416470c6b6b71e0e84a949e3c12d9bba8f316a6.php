

<?php $__env->startSection('title', 'Home'); ?> 


<?php $__env->startSection('script'); ?>    
    <link rel='stylesheet' href='<?php echo e(asset('css/home.css')); ?>'>
    <script src='<?php echo e(asset('js/home.js')); ?>' defer></script>
    <script> const URL_HOME = "<?php echo e(route('home')); ?>"; </script>    
    <script> const URL_HOME_LOAD = "<?php echo e(route('home_load')); ?>"; </script>     

<?php $__env->stopSection(); ?>

<?php $__env->startSection('info'); ?>
    <h1>
        <strong>Scopri il mondo della lotta</strong></br>
        <em>Notizie, articoli e molto altro...</em></br>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <a href="<?php echo e(route('home/cinema')); ?>">Cinema</a>
    <a href="<?php echo e(route('home/info')); ?>">Info</a>
    <a href="<?php echo e(route('home/blog')); ?>">Blog</a>
    <?php if(session('username')): ?>
    <a class='user-button' href="<?php echo e(route('logout')); ?>"><?php echo e(session('username')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_t'); ?>
    <a href="<?php echo e(route('home/cinema')); ?>">Cinema</a>
    <a href="<?php echo e(route('home/info')); ?>">Info</a>
    <a href="<?php echo e(route('home/blog')); ?>">Blog</a>
    <?php if(session('username')): ?>
    <a href="<?php echo e(route('logout')); ?>"><?php echo e(session('username')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenuto'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <div id="media"></div>
    <p>Per informazioni generali contattare lo staff</p>
    <em>Creato da Simone Squillaci</em>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\game1\Desktop\hw2\resources\views/home.blade.php ENDPATH**/ ?>