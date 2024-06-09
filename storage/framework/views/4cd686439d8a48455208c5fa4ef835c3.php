
<?php $__env->startSection('meta_title','Add Coupon - Admin'); ?>
<?php $__env->startSection('coupon_select','active'); ?>
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
                        <label for="title" class="control-label mb-1">Coupon Name</label>
                        <input id="title" name="title" type="text" class="form-control " value="<?php echo e($result?->title); ?>">
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
                        <label for="code" class="control-label mb-1">Coupon Code</label>
                        <input id="code" name="code" type="text" class="form-control " value="<?php echo e($result?->code); ?>">
                        <?php $__errorArgs = ['code'];
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
                        <label for="value" class="control-label mb-1">Coupon value</label>
                        <input id="value" name="value" type="text" class="form-control " value="<?php echo e($result?->value); ?>">
                        <?php $__errorArgs = ['value'];
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
                        <label for="type" class="control-label mb-1">Coupon Type</label>
                        <select name="type" id="type" class="form-control ">
                            <option value="">Select Option</option>
                            
                            <?php if($result?->type=="Value"): ?>
                                <option selected value="Value">Value</option>
                                <option value="Per">Per</option>
                            <?php else: ?>
                                <option value="Value">Value</option>
                                <option selected value="Per">Per</option>
                            <?php endif; ?>
                            
                          </select>
                        <?php $__errorArgs = ['type'];
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
                        <label for="min_order_amt" class="control-label mb-1">Min. Order Amount</label>
                        <input id="min_order_amt" name="min_order_amt" type="text" class="form-control " value="<?php echo e($result?->min_order_amt); ?>">
                        <?php $__errorArgs = ['min_order_amt'];
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
                        <label for="is_one_time" class="control-label mb-1">Is One Time</label>
                        <select name="is_one_time" id="is_one_time" class="form-control ">
                            <option value="">Select Option</option>
                            
                            <?php if($result?->is_one_time==1): ?>
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            <?php else: ?>
                            <option value="1">Yes</option>
                            <option selected value="0">No</option>
                            <?php endif; ?>
                            
                          </select>
                        <?php $__errorArgs = ['value'];
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/admin/add_coupon.blade.php ENDPATH**/ ?>