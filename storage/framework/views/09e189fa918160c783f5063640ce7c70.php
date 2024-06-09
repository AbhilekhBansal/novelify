
<?php $__env->startSection('meta_title','Contact - Admin'); ?>
<?php $__env->startSection('contact_select','active'); ?>
<?php $__env->startSection('container'); ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><b>Update Contact Details</b></div>
        <div class="card-body">
            
            
            
            <form action="<?php echo e(url('/admin/contact/edit')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col form-group has-success">
                        <input id="id" name="id"  value="<?php echo e($contact?->id); ?>" hidden>
                        <label for="address" class="control-label mb-1">Address</label>
                        <input id="address" name="address" type="text" class="form-control" value="<?php echo e($contact->address); ?>">
                    </div>
                </div>    
                <div class="row">
                    <div class="col form-group">
                        <label for="phone" class="control-label mb-1">Phone</label>
                        <input id="image" name="phone" type="text" class="form-control " value="<?php echo e($contact->phone); ?>">
                        <?php $__errorArgs = ['phone'];
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
                        <label for="alt_phone" class="control-label mb-1">Alt phone</label>
                        <input id="alt_phone" name="alt_phone" type="text" class="form-control " value="<?php echo e($contact->alt_phone); ?>">
                        <?php $__errorArgs = ['alt_phone'];
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
                        <label for="email" class="control-label mb-1">Email</label>
                        <input id="email" name="email" type="email" class="form-control " value="<?php echo e($contact->email); ?>">
                        <?php $__errorArgs = ['email'];
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
                        <label for="alt_email" class="control-label mb-1">Alt email</label>
                        <input id="alt_email" name="alt_email" type="email" class="form-control " value="<?php echo e($contact->alt_email); ?>">
                        <?php $__errorArgs = ['alt_email'];
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
                    <div class="col-3 form-group">
                        <label for="whatsapp" class="control-label mb-1">Whatsapp no:</label>
                        <input id="whatsapp" name="whatsapp" type="phone" class="form-control " value="<?php echo e($contact->whatsapp); ?>">
                        <?php $__errorArgs = ['whatsapp'];
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
                        <label for="map" class="control-label mb-1">Map Link</label>
                        <input id="map" name="map" type="text" class="form-control " value="<?php echo e($contact->map); ?>">
                        <?php $__errorArgs = ['map'];
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
                        <input id="meta_title" name="meta_title" type="text" class="form-control " value="<?php echo e($contact?->meta_title); ?>">
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
                        <input id="meta_desc" name="meta_desc" type="text" class="form-control " value="<?php echo e($contact?->meta_desc); ?>">
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
                <hr style=" border-top: 2px dashed  #4272d7;">
                <div class="row">
                    <div class="col form-group has-success">
                        <label class="control-label mb-1">Other Details & links</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="image" class="control-label mb-1">Footer Image</label>
                        <input id="image" name="image" type="file" class="form-control " value="<?php echo e($contact->ft_image); ?>">
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
                        <img src="<?php echo e(asset('images/'.$contact->ft_image)); ?>" width="80px" >
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="yt_link" class="control-label mb-1">Youtube Link</label>
                        <input id="yt_link" name="yt_link" type="text" class="form-control " value="<?php echo e($contact->yt_link); ?>">
                    </div>
                    <div class="col form-group">
                        <label for="fb_link" class="control-label mb-1">Facebook Link</label>
                        <input id="fb_link" name="fb_link" type="text" class="form-control " value="<?php echo e($contact->fb_link); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="insta_link" class="control-label mb-1">Instagram Link</label>
                        <input id="insta_link" name="insta_link" type="text" class="form-control " value="<?php echo e($contact->insta_link); ?>">
                    </div>
                    <div class="col form-group">
                        <label for="x_link" class="control-label mb-1">X Link</label>
                        <input id="x_link" name="x_link" type="text" class="form-control " value="<?php echo e($contact->x_link); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="pt_link" class="control-label mb-1">Pinterest Link</label>
                        <input id="pt_link" name="pt_link" type="text" class="form-control " value="<?php echo e($contact->pt_link); ?>">
                    </div>
                    <div class="col form-group">
                        <label for="linked_link" class="control-label mb-1">Linkeden Link</label>
                        <input id="linked_link" name="linked_link" type="text" class="form-control " value="<?php echo e($contact->linked_link); ?>">
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
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/admin/add_contact.blade.php ENDPATH**/ ?>