

<?php $__env->startSection('script'); ?>    
<link rel='stylesheet' href='<?php echo e(asset('css/login.css')); ?>'>
<script> const URL_LOGIN = "<?php echo e(route('login')); ?>"; </script>    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('contenuto'); ?>
    <main>
        <form name='form-login' method='post' id="main-item">
            <?php echo csrf_field(); ?>
            <h1>Login</h1>
            <div id="div-login">
                <input type='text' id="input" name='username' placeholder="Nome utente">
            </div>
            <div id="div-login">
                <input type='password'id="input" name='password' placeholder="Password">

                <?php if($valid_username === false && $valid_password === true): ?>
                    <p id='errore'> Inserire username</p>
                <?php endif; ?>

                <?php if($valid_password === false && $valid_username === true): ?>
                    <p id='errore'> Inserire password</p>
                <?php endif; ?>

                <?php if($global_valid === false && $valid_password === true && $valid_username === true): ?>
                    <p id='errore'> Utente o password errato</p>
                <?php endif; ?>
                        
            </div>
       
            <button type='submit'>Accedi</button>
        </form>  
        <div id="iscrizione">
                        <p>Non hai un account?<a href="<?php echo e(route('registrazione')); ?>"> iscriviti</a><p>
        </div>
     </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\game1\Desktop\hw2\resources\views/login.blade.php ENDPATH**/ ?>