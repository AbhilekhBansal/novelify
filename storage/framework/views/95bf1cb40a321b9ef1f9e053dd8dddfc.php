<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>Login</title>
    <!-- Bootstrap CSS-->
    <link href="<?php echo e(url("admin_assets/vendor/bootstrap-4.1/bootstrap.min.css")); ?>" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="<?php echo e(url("admin_assets/css/theme.css")); ?>" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo ">
                            <a href="#">
                                
                                
                            </a><?php echo e(Config::get('constant.site_name')); ?>  
                        </div>
                        <div class="login-form">
                            <form action="<?php echo e(route("admin.auth")); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                </div>
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                               <?php if(session()->has('error')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo e(session('error')); ?>

                                </div>
                                <?php endif; ?>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?php echo e(url("admin_assets/vendor/jquery-3.2.1.min.js")); ?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo e(url("admin_assets/vendor/bootstrap-4.1/popper.min.js")); ?>"></script>
    <script src="<?php echo e(url("admin_assets/vendor/bootstrap-4.1/bootstrap.min.js")); ?>"></script>
    <!-- Vendor JS       -->
    
    <script src="<?php echo e(url("admin_assets/vendor/wow/wow.min.js")); ?>"></script>
    


    <!-- Main JS-->
    <script src="<?php echo e(url("admin_assets/js/main.js")); ?>"></script>

</body>

</html>
<!-- end document--><?php /**PATH C:\xampp\htdocs\web1\resources\views/admin/login.blade.php ENDPATH**/ ?>