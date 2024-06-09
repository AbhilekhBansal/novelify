<?php $__env->startSection('meta_title','My Cart'); ?>
<?php $__env->startSection('container'); ?>





<div class="hero-area section-bg2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="slider-area">
                    <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                        <div class="hero-caption hero-caption2">
                            <h2>Cart</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                    <li class="breadcrumb-item"><a >Cart</a></li>
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
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
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
                                <div class="product_count">
                                   
                                    <input class="input-number" type="number" id="qty-<?php echo e($list->id); ?>" onchange="updateQTY('<?php echo e($list->id); ?>','<?php echo e($list->price); ?>')" value="<?php echo e($list->quantity); ?>" min="1" max="10">
                                   
                                </div>
                                

                               
                            </td>
                            <td>
                                <h5 id="total_price_<?php echo e($list->id); ?>">₹<?php echo e($g_total=$list->price * $list->quantity); ?></h5>
                            </td><p hidden><?php echo e($gtotal=$gtotal+$g_total); ?></p>
                            <td>
                                <a href="javascript:void(0)" onclick="deleteCartProduct('<?php echo e($list->id); ?>','0','<?php echo e($list->price); ?>')"><button class="remove-btn"><i class="fa-solid fa-xmark"></i></button></a>
                            </td>
                        </tr> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Grand total</h5>
                            </td>
                            <td>
                                <h5>₹<?php echo e($gtotal); ?></h5>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
                <div class="checkout_btn_inner float-right">
                    <a class="btn" href="#" style="margin-bottom: 10px;">Continue Shopping</a>
                    <a class="btn checkout_btn" href="<?php echo e(url('checkout')); ?>" style="margin-bottom: 10px;">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<form id="frmadd_to_cart">
    <input type="hidden" name="product_id" id="product_id" value="">
    <input type="hidden" name="product_price" id="product_price" value="">
    <input type="hidden" name="quantity" id="quantity" value="">
    <?php echo csrf_field(); ?>
</form>
<?php else: ?>
<div class="empty_cart">
    <img class="centerki" src="<?php echo e(asset('assets/img/gallery/empty_cart2.png')); ?>" alt="">
    <h1 class="text-center centerk">Your cart is empty</h1>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/frontend/cart.blade.php ENDPATH**/ ?>