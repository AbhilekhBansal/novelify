
<?php $__env->startSection('meta_title','Add Testimonial - Admin'); ?>
<?php $__env->startSection('testimonial_select','active'); ?>
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
                        <label for="image" class="control-label mb-1">Image</label>
                        <input id="image" name="image" type="file" class="form-control">
                        <?php if($result !=''): ?>
                            <img src="<?php echo e(asset('images/'.$result?->image)); ?>" width="80px" >
                        <?php endif; ?>
                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col form-group">
                        <label for="name" class="control-label mb-1">Name</label>
                        <input id="name" name="name" type="text" class="form-control " value="<?php echo e($result?->name); ?>">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col form-group">
                        <label for="designation" class="control-label mb-1">Designation</label>
                        <input id="designation" name="designation" type="text" class="form-control " value="<?php echo e($result?->position); ?>">
                        <?php $__errorArgs = ['designation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col form-group">
                        <label for="review" class="control-label mb-1">Review</label>
                        <textarea class="form-control " name="review" id="review" rows="5"><?php echo e($result?->review); ?></textarea>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/admin/add_testimonial.blade.php ENDPATH**/ ?>