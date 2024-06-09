
<?php $__env->startSection('meta_title',$title.' - Admin'); ?>
<?php $__env->startSection('product_select','active'); ?>
<?php $__env->startSection('container'); ?>
<style>
    .add_more{
        background: yellow;
        color: black;
        padding: 7px;
        margin: 0 10px 5px 0;
        float: right;
    }
    .remove{
        background: red;
        color: white;
        padding: 7px 4px;
        margin-top: 30px;
    }
</style>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><?php echo e($title); ?></div>
        <div class="card-body">
            
            
            
            <form action="<?php echo e($action); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col form-group has-success">
                        <input id="id" name="id"  value="<?php echo e($result?->id); ?>" hidden>
                        <label for="name" class="control-label mb-1">Product Name</label>
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
                        <label for="image" class="control-label mb-1">Image</label>
                        <input id="image" name="image" type="file" class="form-control " value="<?php echo e($result?->image); ?>">
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
                        <label for="slug" class="control-label mb-1">Slug</label>
                        <input id="slug" name="slug" type="text" class="form-control " value="<?php echo e($result?->slug); ?>">
                        <?php $__errorArgs = ['slug'];
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
                        <label for="category" class="control-label mb-1">Category</label>
                        <select name="category" id="category" class="form-control ">
                            <option value="">Select Category</option>
                            <?php $__currentLoopData = $cat_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($result?->category_id==$item->id): ?>
                                <option selected value="<?php echo e($item->id); ?>"><?php echo e($item->category_name); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->category_name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        
                        <?php $__errorArgs = ['category'];
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
                        <label for="price" class="control-label mb-1">Price</label>
                        <input id="price" name="price" type="text" class="form-control " value="<?php echo e($result?->price); ?>">
                        <?php $__errorArgs = ['price'];
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
                        <label for="rating" class="control-label mb-1">Rating</label>
                        <select name="rating" id="rating" class="form-control ">
                            <option value="">Select Rating</option>

                            <option <?php if($result?->rating==1): ?> selected <?php endif; ?>; value="1">1</option>
                            <option <?php if($result?->rating==2): ?> selected <?php endif; ?>; value="2">2</option>
                            <option <?php if($result?->rating==3): ?> selected <?php endif; ?>; value="3">3</option>
                            <option <?php if($result?->rating==4): ?> selected <?php endif; ?>; value="4">4</option>
                            <option <?php if($result?->rating==5): ?> selected <?php endif; ?>; value="5">5</option>
                            
                          </select>
                        <?php $__errorArgs = ['rating'];
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
                        <label for="feature" class="control-label mb-1">Is Feature</label>
                        <select name="feature" id="feature" class="form-control ">
                            <option value="">Select Option</option>
                            
                            <?php if($result?->feature==1): ?>
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            <?php else: ?>
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                           
                            <?php endif; ?>
                            
                          </select>
                        <?php $__errorArgs = ['feature'];
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
                        <label for="is_promo" class="control-label mb-1">Is Promo</label>
                        <select name="is_promo" id="is_promo" class="form-control ">
                            <option value="">Select Option</option>
                            
                            <?php if($result?->is_promo==1): ?>
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            <?php else: ?>
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                           
                            <?php endif; ?>
                            
                          </select>
                        <?php $__errorArgs = ['is_promo'];
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
                        <label for="is_discounted" class="control-label mb-1">Is Discounted</label>
                        <select name="is_discounted" id="is_discounted" class="form-control ">
                            <option value="">Select Option</option>
                            
                            <?php if($result?->is_discounted==1): ?>
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            <?php else: ?>
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                           
                            <?php endif; ?>
                            
                          </select>
                        <?php $__errorArgs = ['is_discounted'];
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
                        <label for="is_trending" class="control-label mb-1">Is Trending</label>
                        <select name="is_trending" id="is_trending" class="form-control ">
                            <option value="">Select Option</option>
                            
                            <?php if($result?->is_trending==1): ?>
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            <?php else: ?>
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                           
                            <?php endif; ?>
                            
                          </select>
                        <?php $__errorArgs = ['is_trending'];
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
                        <label for="keyword" class="control-label mb-1">keywords</label>
                        <input id="keyword" name="keyword" type="text" class="form-control ckeditor" value="<?php echo e($result?->keywords); ?>" placeholder="Use , to separate keywords">
                        <?php $__errorArgs = ['keyword'];
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
                        <label for="author" class="control-label mb-1">Author</label>
                        <input id="author" name="author" type="text" class="form-control ckeditor" value="<?php echo e($result?->author); ?>" placeholder="Author Name">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="author_desc" class="control-label mb-1">Author Description</label>
                        <textarea id="author_desc" name="author_desc" type="text" class="form-control ckeditor" ><?php echo e($result?->author_desc); ?></textarea>
                        <?php $__errorArgs = ['author_desc'];
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
                        <textarea id="desc" name="desc" type="text" class="form-control ckeditor" ><?php echo e($result?->desc); ?></textarea>
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
                
                <div class="multi-img-box">
                    <div class="row">
                        <?php if(!$product_images==''): ?>
                            <?php ($count_id=1); ?>
                            <?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-3 form-group" id="input-0<?php echo e($count_id); ?>">
                                    <label for="images" class="control-label mb-1">Image <?php echo e($count_id++); ?></label><br>
                                    <img src="<?php echo e(asset('images/'.$image->images)); ?>" alt="<?php echo e($image->images); ?>" style="width:100px">
                                </div>
                                <div class="col-3 form-group" id="remove-0<?php echo e($image->id); ?>">
                                    <a href="<?php echo e(url('/admin/product/product_images_delete/'.$image->id)); ?>"><input class="remove" type="button" value="Delete" ></a>
                                </div>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="row multiple_images">
                        
                    </div>
                    
                        <input class="add_more" type="button" value="Add Images" onclick="add_more()">
                    
                </div>
                
                <div class="row">
                    <div>
                        <button id="" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                           Submit
                        </button>  
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
  var count=1;
  jQuery(document).ready(function($) {
  $('#more_images').on('click', function() {
    if ($(this).prop('checked')) {
      var html='',html2='';
      
      html='<div class="col-12 form-group" id="input-1"><label for="image" class="control-label mb-1">Image 1</label><input id="image" name="images[]" type="file" class="form-control " value="<?php echo e($result?->images); ?>"></div>';    

      html2='<input class="add_more" type="button" value="Add More" onclick="add_more()">';
      jQuery('.multiple_images').html(html);
      jQuery('.multi-img-box').append(html2);

    }
  });
});
function add_more(){
    var html='';
      jQuery('.multiple_images').append('<div class="col-9 form-group" id="input-'+count+'"><label for="images" class="control-label mb-1">Image '+count+'</label><input id="images" name="images[]" type="file" class="form-control " value="<?php echo e($result?->images); ?>"></div><div class="col-3 form-group" id="remove-'+count+'"><input class="remove" type="button" value="Remove" onclick="remove('+count+')"></div>');
      count++;
}
function remove(key){
    
      jQuery('#input-'+key).remove();
      jQuery('#remove-'+key).remove();
      count--;
}

function Delete(key){
    alert('soon be deleted');
    jQuery('#remove-'+key).remove();
}

jQuery(document).ready(function($) {
  $('#more_images').on('click', function() {
    if (!$(this).prop('checked')) {
        jQuery('.multiple_images').remove();
        jQuery('.multi-img-box').remove();
        
    }
  });
});
</script>
<script src="<?php echo e(url('admin_assets/ckeditor/ckeditor.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/admin/add_product.blade.php ENDPATH**/ ?>