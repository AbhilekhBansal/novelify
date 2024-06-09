<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title><?php echo $__env->yieldContent('meta_title'); ?></title>
    <!-- Fontfaces CSS-->
    <link href="<?php echo e(url("admin_assets/css/font-face.css")); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(url("admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css")); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(url("admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css")); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(url("admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css")); ?>" rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link href="<?php echo e(url("admin_assets/vendor/bootstrap-4.1/bootstrap.min.css")); ?>" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="<?php echo e(url("admin_assets/css/theme.css")); ?>" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="">
                            
                            <?php echo e(Config::get('constant.site_name')); ?>

                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="<?php echo $__env->yieldContent('dashboard_select'); ?>">
                            <a  href="<?php echo e(route('dashboard')); ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('notification_select'); ?>">
                            <a  href="<?php echo e(route('notification')); ?>">
                                <i class="fas fa-bell"></i>Mng Notification</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('slider_select'); ?>">
                            <a  href="<?php echo e(route('slider')); ?>">
                                <i class="fas fa-image"></i>Mng Slider</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('contact_select'); ?>">
                            
                                <i class="fas fa-address-book"></i>Mng Contact</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('about_select'); ?>">
                            
                                <i class="fas fa-address-card"></i>Mng About</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('category_select'); ?>">
                            <a  href="<?php echo e(route('category')); ?>">
                                <i class="fas fa-list"></i>Mng Category</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('product_select'); ?>">
                            <a  href="<?php echo e(route('product')); ?>">
                                <i class="fas fa-brands fa-book"></i>Mng Product</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('coupon_select'); ?>">
                            <a  href="<?php echo e(route('coupon')); ?>">
                                <i class="fas fa-tag"></i>Mng Coupons</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('customer_select'); ?>">
                            <a  href="<?php echo e(route('coupon')); ?>">
                                <i class="fas fa-user"></i>Mng Customers</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="">
                    
                    <?php echo e(Config::get('constant.site_name')); ?> 
                </a> <p><pre> </pre>Admin Panel</p> 
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="<?php echo $__env->yieldContent('dashboard_select'); ?>">
                            <a  href="<?php echo e(route('dashboard')); ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('notification_select'); ?>">
                            <a  href="<?php echo e(route('notification')); ?>">
                                <i class="fas fa-bell"></i>Mng Notification</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('slider_select'); ?>">
                            <a  href="<?php echo e(route('slider')); ?>">
                                <i class="fas fa-image"></i>Mng Slider</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('contact_select'); ?>">
                            <a  href="contact">
                                <i class="fas fa-address-book"></i>Mng Contact</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('about_select'); ?>">
                            <a  href="about">
                                <i class="fas fa-address-card"></i>Mng About</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('category_select'); ?>">
                            <a  href="<?php echo e(route('category')); ?>">
                                <i class="fas fa-list"></i>Mng Category</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('product_select'); ?>">
                            <a  href="<?php echo e(route('product')); ?>">
                                <i class="fas fa-brands fa-book"></i>Mng Product</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('coupon_select'); ?>">
                            <a  href="<?php echo e(route('coupon')); ?>">
                                <i class="fas fa-tag"></i>Mng Coupons</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('customer_select'); ?>">
                            <a  href="<?php echo e(route('customer')); ?>">
                                <i class="fas fa-user"></i>Mng Customers</a>
                        </li>
                        <li class="<?php echo $__env->yieldContent('testimonial_select'); ?>">
                            <a  href="<?php echo e(route('testimonial')); ?>">
                                <i class="fas fa-users"></i>Mng Testimonial</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    
                                    
                                    
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image" style="padding-top: 10px;width: 55px;height: 55px;">
                                            <img src="<?php echo e(url("admin_assets/images/icon/admin_img.png")); ?>" alt="" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" ><?php echo e(session()->get('ADMIN_NAME')); ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?php echo e(url("admin_assets/images/icon/admin_img.png")); ?>" alt="" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a><?php echo e(session()->get('ADMIN_NAME')); ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo e(session()->get('ADMIN_EMAIL')); ?></span>
                                                </div>
                                            </div>
                                            
                                            <div class="account-dropdown__footer">
                                                <a href="logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       <?php $__env->startSection('container'); ?>
                       <?php echo $__env->yieldSection(); ?>
                    </div>
                </div>   
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2023 Abhi. All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?php echo e(url("admin_assets/vendor/jquery-3.2.1.min.js")); ?>"></script>
    <script src="<?php echo e(url("admin_assets/vendor/bootstrap-4.1/popper.min.js")); ?>"></script>
    <script src="<?php echo e(url("admin_assets/vendor/bootstrap-4.1/bootstrap.min.js")); ?>"></script>
    <script src="<?php echo e(url("admin_assets/vendor/wow/wow.min.js")); ?>"></script>
    <script src="<?php echo e(url("admin_assets/js/main.js")); ?>"></script>
    

</body>

</html>
<!-- end document--><?php /**PATH C:\xampp\htdocs\web1\resources\views/admin/layout.blade.php ENDPATH**/ ?>