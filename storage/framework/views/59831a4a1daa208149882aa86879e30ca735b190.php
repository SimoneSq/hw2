

<?php $__env->startSection('title', 'Cinema'); ?>

<?php $__env->startSection('script'); ?>
    <link rel='stylesheet' href='<?php echo e(asset('css/cinema.css')); ?>'>
    <script src='<?php echo e(asset('js/cinema.js')); ?>' defer></script>
    <script> const URL_CINEMA = "<?php echo e(route('cinema')); ?>"; </script>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>  

<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <a href="<?php echo e(route('cinema/info')); ?>">Info</a>  
    <a href="<?php echo e(route('cinema/blog')); ?>">Blog</a>
    <a href="<?php echo e(route('cinema/home')); ?>">Home</a>
    <?php if(session('username')): ?>
    <a class='user-button' href="<?php echo e(route('logout')); ?>"><?php echo e(session('username')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_t'); ?>
    <a href="<?php echo e(route('cinema/info')); ?>">Info</a>  
    <a href="<?php echo e(route('cinema/blog')); ?>">Blog</a>   
    <a href="<?php echo e(route('cinema/home')); ?>">Home</a> 
    <?php if(session('username')): ?>
    <a href="<?php echo e(route('logout')); ?>"><?php echo e(session('username')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenuto'); ?>
    <h1 class="title-cinema">Sezione Cinema</h1>

    <iframe width="740" height="460" src="https://www.youtube.com/embed/" title="YouTube video player" 
        frameborder="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <span id='pref' class='hidden'></span>
    
    <div id="div-cinema">
        <input type='text' id="input" name='video_search' placeholder="Ricerca contenuto">
    </div>
    <button id="send-request" type='submit'>Cerca</button>

    <div id='sep' class='hidden'> </div>
    <div id='video-container'> 

    </div>

    <div id='sep_div'> </div>
    <div id='div-cons'>
        <h1 id='title-sub'>Consigliati</h1>
        <button id='show-cons'></button>
    </div>
    <div id='video-suggeriti'> 
        
    </div>
        
    <div id='sep_div'> </div>
    <div id='div-cons'>
        <h1 id='title-sub'>Preferiti</h1>
        <button id='show-pref'></button>
    </div>
    <div id='video-preferiti'> 
        
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <p>Per informazioni generali contattare lo staff</p>
    <em>Creato da Simone Squillaci</em>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\game1\Desktop\hw2\resources\views/cinema.blade.php ENDPATH**/ ?>