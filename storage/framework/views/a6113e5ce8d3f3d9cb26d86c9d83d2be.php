
<?php $__env->startSection('meta_title',$about->meta_title); ?>
<?php $__env->startSection('meta_desc',$about->meta_desc); ?>
<?php $__env->startSection('container'); ?>
<style>
    .about-row{
        padding: 20px
    }
    .about-img{
        align-items: center;
        display: flex;
    }
    .about-img img{
        width: 520px
    }
    .about-desc{
        margin-top: 10px;
        padding-left: 40px;
    }
    .about-desc h1 b{
        color: #ff2020;
        font-size: 20px
    }
    .about-desc p{
        text-align: justify;
    }
</style>
<div class="about-section">
    <div class="row about-row">
        <div class="col-6 about-desc">
            <h1><b>ABOUT US</b></h1>
            <h4><?php echo e($about->title); ?></h4>
            <p><?php echo e($about->about_desc); ?></p>
        </div>
        <div class="col-6 about-img">
            <img src="<?php echo e(asset('images/'.$about->about_image)); ?>" alt="<?php echo e($about->about_image); ?>" >
        </div>
    </div>
</div>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/frontend/about.blade.php ENDPATH**/ ?>