<?php $__env->startSection('meta_title','My Wishlist'); ?>
<?php $__env->startSection('container'); ?>





<div class="hero-area section-bg2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="slider-area">
                    <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                        <div class="hero-caption hero-caption2">
                            <h2>My Wishlist</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                    <li class="breadcrumb-item"><a >Wishlist</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(isset($result[0])): ?>
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sr.no.</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            
                            <th scope="col">Add</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <p hidden><?php echo e($gtotal=0,$count= 0); ?></p>
                        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="cart-product-<?php echo e($list->id); ?>">
                            <td>
                                <p id="count"><?php echo e($count=$count+1); ?></p>
                            </td>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <a href="<?php echo e(url('product-details/'.$list->slug)); ?>"><img src="<?php echo e(asset('images/'.$list->image)); ?>" alt="<?php echo e($list->image); ?>" /></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="<?php echo e(url('product-details/'.$list->slug)); ?>"><p><?php echo e($list->name); ?></p></a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>₹<?php echo e($list->price); ?></h5>
                            </td>
                            
                            <td>
                                <a href="javascript:void(0)" onclick="home_add_to_cart('<?php echo e($list->id); ?>','<?php echo e($list->price); ?>','1'); ">
                                    <button class="remove-btn"><i class="ti-shopping-cart"></i></button>
                                  </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="deleteWishProduct('<?php echo e($list->id); ?>','0','<?php echo e($list->price); ?>')"><button class="remove-btn"><i class="fa-solid fa-xmark"></i></button></a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</section>
<form id="frmadd_to_cart">
    <input type="hidden" name="product_id" id="product_id" value="">
    <input type="hidden" name="product_price" id="product_price" value="">
    <input type="hidden" name="quantity" id="quantity" value="1">
    <input type="hidden" name="w_delete" id="w_delete" value="">
    <?php echo csrf_field(); ?>
</form>
<?php else: ?>
<div class="empty_cart">
    <img class="centerki" src="<?php echo e(asset('assets/img/gallery/empty_cart2.png')); ?>" alt="">
    <h1 class="text-center centerk">Your Wishlist is empty</h1>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/frontend/wishlist.blade.php ENDPATH**/ ?>