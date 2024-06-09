<?php $__env->startSection('meta_title','Login'); ?>
<?php $__env->startSection('container'); ?>

<main class="login-bg" id="login">
<?php
if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_pwd'])){
    $login_email=$_COOKIE['login_email'];
    $login_pwd=$_COOKIE['login_pwd'];
    $is_remember="checked='ckecked'";
}else{
    $login_email='';
    $login_pwd='';
    $is_remember="";
}
?>
    <div class="login-form-area">
        <div class="login-form">
            <form action="<?php echo e(url('login_process')); ?>" method="POST">
            <div class="login-heading">
                <span>Login</span>
                <?php if(session('ret_msg') !==""): ?>
                <p style="color:red;"><?php echo e(session('ret_msg')); ?></p>
                <?php else: ?>
                <p>Enter Login details to get access</p>
                <?php endif; ?>
            </div>

            <div class="input-box">
                <div class="single-input-fields">
                    <label>Username or Email Address</label>
                    <?php if($errors->has('user_email')): ?>
                    <div class="err_span"><?php echo e($errors->first('user_email')); ?></div>
                    <?php endif; ?>
                    <input type="text" name="user_email" placeholder="Username / Email address" value="<?php echo e(old('user_email')); ?><?php echo e($login_email); ?>">
                </div>
                <div class="single-input-fields">
                    <label>Password</label>
                    <?php if($errors->has('password')): ?>
                    <div class="err_span"><?php echo e($errors->first('password')); ?></div>
                    <?php endif; ?>
                    <input type="password" name="password" value="<?php echo e($login_pwd); ?>" placeholder="Enter Password">
                </div>
                <div class="single-input-fields login-check">
                    <input type="checkbox" id="fruit1" name="keep_log" <?php echo e($is_remember); ?>>
                    <label for="fruit1">Remember me?</label>
                    
                    <button type="button" class="forgot-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="background: none;color: #ff2626!important;font-size: 14px!important;border: none;">Forgot Password?</button>
                </div>
            </div>
            <?php echo csrf_field(); ?>
            <div class="login-footer">
                <p>Don’t have an account? <a href="<?php echo e(url('/registration#registration')); ?>">Sign Up</a> here</p>
                <button class="submit-btn3" type="submit">Login</button>
                <input type="hidden" name="sub_txt" value="login">
            </div>
        </form>
        </div>
    </div>
    
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" style="margin-top: 20px;">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalCenterTitle">Forgot Password</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(url('forgot_pass')); ?>" method="post">
                    <div class="forgot-input-fields">
                        <label>Username or Email Address</label> <?php if(Session::get('error_code')): ?>
                        <div class="err_span"><?php echo e(Session::get('error_code')); ?></div>
                        <?php endif; ?><br>
                        <input type="text" name="f_email" placeholder="Enter your Email address" required>
                        <?php echo csrf_field(); ?>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="submit" style="background:red;padding: 8px;color:white;font-size: 14px!important;border: none;">Submit</button>
                      </div>
                </form>
             
            </div>
           
          </div>
        </div>
      </div>
      
     \
    
      
    <?php
       
    if($msg !=="")
    {
        echo '<input type="hidden" id="msg" value="'.$msg.'">';
    }
?>
</main>

<script>    
  src="https://code.jquery.com/jquery-3.7.0.js"
  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
  crossorigin="anonymous">
</script>
   <script>
    var m=jQuery('#msg').val();
    if(m =="success"){
        alert("Registration Successful");
    }
    
   </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/frontend/login.blade.php ENDPATH**/ ?>