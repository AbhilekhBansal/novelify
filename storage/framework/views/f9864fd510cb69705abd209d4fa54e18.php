<?php $__env->startSection('meta_title','Search'); ?>
<?php $__env->startSection('container'); ?>


<div class="hero-area section-bg2">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="slider-area">
            <div class="slider-height1 slider-bg4 d-flex align-items-center justify-content-center">
              <div class="hero-caption hero-caption2">
               
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                      Novel
                    </li>
                    <li class="breadcrumb-item">
                      <a href=""><?php echo e($str); ?></a>
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="listing-area pt-50 pb-50">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="latest-items latest-items2">
            <div class="row">
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="properties pb-30">
                  <div class="properties-card shadow-3" >
                    <div class="properties-img">
                      <a href="<?php echo e(url('product-details/'.$product->slug)); ?>">
                        <img src="<?php echo e(asset('images/'.$product->image)); ?>" alt="<?php echo e($product->image); ?>">
                      </a>
                      <div class="socal_icon">
                        <a href="javascript:void(0)" onclick="home_add_to_cart('<?php echo e($product->id); ?>','<?php echo e($product->price); ?>','1')">
                          <i class="ti-shopping-cart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-user"></i>
                        </a>
                        <a href="#">
                          <i class="fa-thin fas fa-up-right-and-down-left-from-center"></i>
                        </a>
                      </div>
                    </div>
                    <div class="properties-caption properties-caption2">
                      <h3>
                        <a href="<?php echo e(url('product-details/'.$product->slug)); ?>"><?php echo e($product->name); ?></a>
                      </h3>
                      <div class="properties-footer">
                        <div class="price">
                          <span>₹<?php echo e($product->price); ?>

                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <form id="frmadd_to_cart">
    <input type="hidden" name="product_id" id="product_id" value="">
    <input type="hidden" name="product_price" id="product_price" value="">
    <input type="hidden" name="quantity" id="quantity" value="1">
    <?php echo csrf_field(); ?>
  </form>
  
  
  
  
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/frontend/search.blade.php ENDPATH**/ ?>