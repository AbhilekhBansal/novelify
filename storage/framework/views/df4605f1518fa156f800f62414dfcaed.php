<?php $__env->startSection('meta_title','Registration'); ?>
<?php $__env->startSection('container'); ?>

<main class="login-bg" id="registration">

    <div class="register-form-area">
        
        <div class="register-form text-center">

            <div class="register-heading">
                <span>Sign Up</span>
                <p>Create your account to get full access</p>
            </div>
            <form action="<?php echo e(url('registration_process')); ?>" method="POST">
                <div class="input-box">
                    <div class="single-input-fields">
                        <label>Full name</label>
                        <?php if($errors->has('name')): ?>
                        <div class="err_span"><?php echo e($errors->first('name')); ?></div>
                        <?php endif; ?>
                        <input type="text" name="name" placeholder="Enter full name" value="<?php echo e(old('name')); ?>">
                        <?php if($errors->has('email')): ?>
                            <div class="err_span"><?php echo e($errors->first('email')); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="single-input-fields">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="Enter email address" value="<?php echo e(old('email')); ?>">
                        <?php if($errors->has('phone')): ?>
                            <div class="err_span"><?php echo e($errors->first('phone')); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="single-input-fields">
                        <label>Phone</label>
                        <input type="number" name="phone" minlength="10" maxlength="10" placeholder="Enter phone no." value="<?php echo e(old('phone')); ?>">
                        <?php if($errors->has('password')): ?>
                            <div class="err_span"><?php echo e($errors->first('password')); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="single-input-fields">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter Password">
                        
                    </div>
                    <?php echo csrf_field(); ?>
                </div>
    
                <div class="register-footer">
                    <p> Already have an account? <a href="<?php echo e(url('/login#login')); ?>"> Login</a> here</p>
                    <button id="btn_tyuhn" class="submit-btn3">Sign Up</button>
                </div>
            </form>
            
        </div>
    </div>
    
</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/frontend/registration.blade.php ENDPATH**/ ?>