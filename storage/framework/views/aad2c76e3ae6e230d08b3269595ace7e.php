
<?php $__env->startSection('meta_title','About - Admin'); ?>
<?php $__env->startSection('about_select','active'); ?>
<?php $__env->startSection('container'); ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><b>Update About</b></div>
        <div class="card-body">
            
            
            
            <form action="<?php echo e(url('/admin/about/edit')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col form-group has-success">
                        <input id="id" name="id"  value="<?php echo e($about?->id); ?>" hidden>
                        <label for="title" class="control-label mb-1">Title</label>
                        <input id="title" name="title" type="text" class="form-control " value="<?php echo e($about?->title); ?>">
                        <?php $__errorArgs = ['title'];
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
                        <label for="image" class="control-label mb-1">Image</label>
                        <input id="image" name="image" type="file" class="form-control " value="<?php echo e($about?->about_image); ?>">
                        <?php if($about !=''): ?>
                            <img src="<?php echo e(asset('images/'.$about?->about_image)); ?>" width="80px" >
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
                    
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="desc" class="control-label mb-1">Description</label>
                        <textarea id="desc" name="desc" type="text" class="form-control ckeditor" ><?php echo e($about?->about_desc); ?></textarea>
                        <?php $__errorArgs = ['desc'];
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
                    <div class="col form-group has-success">
                        <label for="meta_title" class="control-label mb-1">Meta Title</label>
                        <input id="meta_title" name="meta_title" type="text" class="form-control " value="<?php echo e($about?->meta_title); ?>">
                        <?php $__errorArgs = ['meta_title'];
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
                    <div class="col form-group has-success">
                        <label for="meta_desc" class="control-label mb-1">Meta Desc</label>
                        <input id="meta_desc" name="meta_desc" type="text" class="form-control " value="<?php echo e($about?->meta_desc); ?>">
                        <?php $__errorArgs = ['meta_desc'];
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
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/admin/add_about.blade.php ENDPATH**/ ?>