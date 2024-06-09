
<?php $__env->startSection('meta_title','Add Slider - Admin'); ?>
<?php $__env->startSection('slider_select','active'); ?>
<?php $__env->startSection('container'); ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><?php echo e($title); ?></div>
        <div class="card-body">
            
            
            
            <form action="<?php echo e($action); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col form-group has-success">
                        <input id="id" name="id"  value="<?php echo e($result?->id); ?>" hidden>
                        <label for="image" class="control-label mb-1">Slider Image</label>
                        <input id="image" name="image" type="file" class="form-control">
                        <?php if(!$result?->image==""): ?>
                        <img src="<?php echo e(asset("images/".$result?->image)); ?>" style="width:100px">
                        <?php endif; ?>
                    </div>
                    <div class="col form-group">
                        <label for="heading" class="control-label mb-1">Heading</label>
                        <input id="heading" name="heading" type="text" class="form-control " value="<?php echo e($result?->heading); ?>">
                       
                    </div>
                    <div class="col form-group">
                        <label for="title" class="control-label mb-1">Title</label>
                        <input id="title" name="title" type="text" class="form-control " value="<?php echo e($result?->title); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="slider_text" class="control-label mb-1">Slider Text</label>
                        <textarea name="slider_text" id="slider_text" cols="30" rows="10"class="form-control ckeditor" ><?php echo e($result?->slider_text); ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="btn_link" class="control-label mb-1">Button Link</label>
                        <input id="btn_link" name="btn_link" type="text" class="form-control " value="<?php echo e($result?->btn_link); ?>">
                    </div>
                </div>

                
                

                
                <div>
                    <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                       Submit
                    </button>

                    
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo e(url('admin_assets/ckeditor/ckeditor.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/admin/add_slider.blade.php ENDPATH**/ ?>