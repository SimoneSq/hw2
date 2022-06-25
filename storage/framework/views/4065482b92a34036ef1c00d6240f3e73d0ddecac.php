

<?php $__env->startSection('title', 'Blog'); ?> 

<?php $__env->startSection('script'); ?>    
    <link rel='stylesheet' href='<?php echo e(asset('css/blog.css')); ?>'>
    <script src='<?php echo e(asset('js/blog.js')); ?>' defer></script>
    <script> const URL_BLOG = "<?php echo e(route('blog')); ?>"; </script>    
    <script> const URL_BLOG_LOAD = "<?php echo e(route('comment_load')); ?>"; </script>    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('info'); ?>
    <h1>
        <strong>Scopri il mondo della lotta</strong></br>
        <em>Notizie, articoli e molto altro...</em></br>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <a href="<?php echo e(route('blog/cinema')); ?>">Cinema</a>
    <a href="<?php echo e(route('blog/info')); ?>">Info</a>
    <a href="<?php echo e(route('blog/home')); ?>">Home</a>
    <?php if(session('username')): ?>
    <a class='user-button' href="<?php echo e(route('logout')); ?>"><?php echo e(session('username')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_t'); ?>
    <a href="<?php echo e(route('blog/cinema')); ?>">Cinema</a>
    <a href="<?php echo e(route('blog/info')); ?>">Info</a>
    <a href="<?php echo e(route('blog/home')); ?>">Home</a>
    <?php if(session('username')): ?>
    <a href="<?php echo e(route('logout')); ?>"><?php echo e(session('username')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenuto'); ?>
    <div class="scroll-box">
            
    </div>
    <textarea type="text" id="input" name='comment' placeholder="  Inserisci commento"></textarea>
    <button id="send-comment" type='submit'>Commenta</button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <p>Per informazioni generali contattare lo staff</p>
    <em>Creato da Simone Squillaci</em>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\game1\Desktop\hw2\resources\views/blog.blade.php ENDPATH**/ ?>