

<?php $__env->startSection('title', 'Info'); ?>

<?php $__env->startSection('script'); ?>
    <link rel='stylesheet' href='<?php echo e(asset('css/info.css')); ?>'>
    <script src='<?php echo e(asset('js/info.js')); ?>' defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <a href="<?php echo e(route('info/cinema')); ?>">Cinema</a>
    <a href="<?php echo e(route('info/blog')); ?>">Blog</a>
    <a href="<?php echo e(route('info/home')); ?>">Home</a>
    <?php if(session('username')): ?>
    <a class='user-button' href="<?php echo e(route('logout')); ?>"><?php echo e(session('username')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_t'); ?>
    <a href="<?php echo e(route('info/cinema')); ?>">Cinema</a>
    <a href="<?php echo e(route('info/blog')); ?>">Blog</a>
    <a href="<?php echo e(route('info/home')); ?>">Home</a>   
    <?php if(session('username')): ?>
    <a href="<?php echo e(route('logout')); ?>"><?php echo e(session('username')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenuto'); ?>
    <h1 class="title-info">Informazioni generali account:</h1>
    <div id="general_info">
        <div id='info-cont'>
            <p class='personal-info'>Utente:</p>
            <p><?php echo e(session('username')); ?></p>
        </div>
        <div id='info-cont'>
            <p class='personal-info'>Nome:</p>
            <p><?php echo e(session('nome')); ?></p>
        </div>
        <div id='info-cont'>
            <p class='personal-info'>Cognome:</p>
            <p><?php echo e(session('cognome')); ?></p>
        </div>
        <div id='info-cont'>
            <p class='personal-info'>Email:</p>
            <p><?php echo e(session('email')); ?></p>
        </div>
    </div>

    <div id="count">
        <p id='contatore_commenti'>Numero Commenti:</p>
        <p id='n_comment'> </p>
    </div>

    <div class="scroll-box">
            
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <p>Per informazioni generali contattare lo staff</p>
    <em>Creato da Simone Squillaci</em>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\game1\Desktop\hw2\resources\views/info.blade.php ENDPATH**/ ?>