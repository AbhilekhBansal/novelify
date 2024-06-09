
<?php $__env->startSection('meta_title','Add Category - Admin'); ?>
<?php $__env->startSection('category_select','active'); ?>
<?php $__env->startSection('container'); ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><?php echo e($title); ?></div>
        <div class="card-body">
            
            
            
            <form action="<?php echo e($action); ?>" method="POST" >
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col form-group has-success">
                        <input id="id" name="id"  value="<?php echo e($result?->id); ?>" hidden>
                        <label for="category_name" class="control-label mb-1">Category Name</label>
                        <input id="category_name" name="category_name" type="text" class="form-control " value="<?php echo e($result?->category_name); ?>">
                        <?php $__errorArgs = ['category_name'];
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
                        <label for="parent_category_id" class="control-label mb-1">Parent Category</label>
                        <select name="parent_category_id" id="parent_category_id" class="form-control ">
                            <option value="">Select Parent Category</option>
                            <option selected value="0">Make Parent *</option>
                            <?php $__currentLoopData = $parent_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($result?->parent_category_id == $val->id): ?>
                                <option selected value="<?php echo e($val->id); ?>"><?php echo e($val->category_name); ?></option>
                                
                                
                                <?php endif; ?>
                                <option value="<?php echo e($val->id); ?>"><?php echo e($val->category_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col form-group">
                        <label for="category_slug" class="control-label mb-1">Category slug</label>
                        <input id="category_slug" name="category_slug" type="tel" class="form-control " value="<?php echo e($result?->category_slug); ?>">
                        <?php $__errorArgs = ['category_slug'];
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
                    
                    <div class="col-6 form-group">
                        <label for="categroy_image" class="control-label mb-1">Category Image</label>
                        <input id="categroy_image" name="categroy_image" type="file" class="form-control ">
                        <?php $__errorArgs = ['categroy_image'];
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
                    <?php if(!$result?->category_image == ''): ?>
                    <div class="col">
                        <img src="<?php echo e(asset('images/'.$result?->category_image)); ?>" style="width: 200px;
                        margin: 10px;">
                    </div>
                    <?php endif; ?>
                    <div class="col-3">
                        <label for="checkbox"  class="control-label mb-1">New Tag</label><br>
                        <label class="switch switch-3d switch-danger mr-3">
                            <input type="checkbox" id="new_tag" class="switch-input" value="1" name='new_tag' <?php echo e($result?->tag == '1' ? ' checked' : ''); ?> >
                            <span class="switch-label"></span>
                            <span class="switch-handle"></span>
                        </label>
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
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/admin/add_category.blade.php ENDPATH**/ ?>