
<?php $__env->startSection('meta_title','Novelify'); ?>
<?php $__env->startSection('container'); ?>
<style>
    .carousel-item{
        background: url("<?php echo e(url('images/bg-1.png')); ?>") no-repeat ;
        /* background-repeat: no-repeat; */
        /* background-attachment: fixed;  */
        background-size: 100% 100%;
    }
</style>

<section class="slider-area ">
    <div class="slider-active">
      <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="single-slider slider-height d-flex align-items-center" style="background: url('<?php echo e(asset('images/'.$slide->image)); ?>')">
        <div class="container">
          <div class="rowr">
            <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8  col-sm-10">
              <div class="hero-caption text-center">
                <span><?php echo e($slide->heading); ?></span>
                <h1 data-animation="bounceIn" data-delay="0.2s"><?php echo e($slide->title); ?></h1>
                <p data-animation="fadeInUp" data-delay="0.4s"><?php echo $slide->slider_text; ?></p>
                <a href="<?php echo e($slide->btn_link); ?>" class="btn_1 hero-btn" data-animation="fadeInUp" data-delay="0.7s">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>



<section class="product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-title">
            <h4><u style="color:#111111; text-decoration-color: #ff2020">Product by Genres</u></h4>
          </div>
        </div>
        <div class="col-lg-8">
          <ul class="filter__controls">
            <li class="active" data-filter="*">All</li>
            <?php $__currentLoopData = $home_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li  data-filter="<?php echo e($list->category_slug); ?>"><?php echo e($list->category_name); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
      </div>
      <div class="row property__gallery">
        <?php $__currentLoopData = $home_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 col-lg-2 mix <?php $__currentLoopData = $home_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($p_list->category_id == $list->id): ?>
        <?php echo e($list->category_slug); ?>

        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        itemx">
          <div class="product__item">
            <div class="product__item__pic set-bg">
                <img class="set-bg product_item_img" src="<?php echo e(asset('images/'.$p_list->image)); ?>" alt="<?php echo e($p_list->image); ?>">
                <?php if($p_list->is_promo == 1): ?>
                <div class="label new">New</div>
                <?php endif; ?>
              <ul class="product__hover">
                <li><a href="<?php echo e(url('product-details/'.$p_list->slug)); ?>"><i class="fa-thin fas fa-up-right-and-down-left-from-center"></i></a></li>
                <li><a href="javascript:void(0)" onclick="add_to_wish('<?php echo e($p_list->id); ?>','<?php echo e($p_list->price); ?>','1')"><span class="ti-heart"></span></a></li>
                <li><a href="javascript:void(0)" onclick="home_add_to_cart('<?php echo e($p_list->id); ?>','<?php echo e($p_list->price); ?>','1')"><span class="ti-shopping-cart"></span></a></li>
              </ul>
            </div>
            <div class="product__item__text">
              <h6><a href="<?php echo e(url('product-details/'.$p_list->slug)); ?>"><?php echo e($p_list->name); ?></a></h6>
              <div class="rating">
                <?php for($r=0;$r<$p_list->rating;$r++): ?>
                <i class="fa fa-star"></i>
                <?php endfor; ?>
              </div>
              <div class="product__price">₹<?php echo e($p_list->price); ?></div>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- Other product items -->
      </div>
    </div>
</section>
<!--feature section-->
<?php echo e($cont=1); ?>

<section class="feature-bg">  
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php $__currentLoopData = $feature_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
              <div class="carousel-item <?php echo e($cont==1 ? "active" : ""); ?>">
                <div class="row">
                    <div class="col-md-6 feature_image">
                        <img src="<?php echo e(asset('images/'.$f_product->image)); ?>" alt="<?php echo e($f_product->image); ?>" style="">
                    </div>
                    <div class="col-md-6 feature_content">
                        <h3><?php echo e($f_product->name); ?></h3>
                        <p>By <?php echo e($f_product->author); ?></p>
                        <div class="price">
                          <span>₹ <?php echo e($f_product->price); ?></span>
                          <a href="<?php echo e(url('product-details/'.$f_product->slug)); ?>" class="border-btn btn_on_white" >View Details</a>
                        </div>  
                    </div>
                </div>
              </div>
              <?php echo e($cont++); ?>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
</section>

<section class="latest-items section-padding fix">
    <div class="row">
      <div class="col-xl-12">
        <div class="section-tittle text-center mb-40">
          <h2>You May Like</h2>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="latest-items-active">
        <?php $__currentLoopData = $home_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($p_list->is_promo==1): ?>
        <div class="properties pb-30 ">
          <div class="properties-card">
            <div class="properties-img">
              <a href="<?php echo e(url('product-details/'.$p_list->slug)); ?>">
                <img src="<?php echo e(asset('images/'.$p_list->image)); ?>" alt="<?php echo e($p_list->image); ?>">
              </a>
              <div class="socal_icon">
                
                <a href="javascript:void(0)" onclick="add_to_wish('<?php echo e($p_list->id); ?>','<?php echo e($p_list->price); ?>','1')">
                  <i class="ti-heart"></i>
                </a>
                <a href="javascript:void(0)" onclick="home_add_to_cart('<?php echo e($p_list->id); ?>','<?php echo e($p_list->price); ?>','1')">
                  <i class="ti-shopping-cart"></i>
                </a>
                
              </div>
            </div>
            <div class="properties-caption properties-caption2">
              <h3>
                <a href="<?php echo e(url('product-details/'.$p_list->slug)); ?>"><b><?php echo e($p_list->name); ?></b></a>
              </h3>
              <div class="properties-footer">
                <div class="price">
                  <span>₹<?php echo e($p_list->price); ?>

                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
    
<form id="frmadd_to_cart">
  <input type="hidden" name="product_id" id="product_id" value="">
  <input type="hidden" name="product_price" id="product_price" value="">
  <input type="hidden" name="quantity" id="quantity" value="1">
  <?php echo csrf_field(); ?>
</form>
</section>


<div class="testimonial-area testimonial-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-10 col-md-11">
          <div class="h1-testimonial-active">
            <div class="single-testimonial text-center">
              <div class="testimonial-caption ">
                <div class="testimonial-top-cap">
                  <h2>Customer Testimonial</h2>
                  <p>Everybody is different, which is why we offer styles for every body. Laborum fuga incidunt laboriosam voluptas iure, delectus dignissimos facilis neque nulla earum.</p>
                </div>
                <div class="testimonial-founder d-flex align-items-center justify-content-center">
                  <div class="founder-img">
                    <img src="https://preview.colorlib.com/theme/capitalshop/assets/img/gallery/founder-img.png" alt="">
                  </div>
                  <div class="founder-text">
                    <span>Petey Cruiser</span>
                    <p>Designer at Colorlib</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="single-testimonial text-center">
              <div class="testimonial-caption ">
                <div class="testimonial-top-cap">
                  <h2>Customer Testimonial</h2>
                  <p>Everybody is different, which is why we offer styles for every body. Laborum fuga incidunt laboriosam voluptas iure, delectus dignissimos facilis neque nulla earum.</p>
                </div>
                <div class="testimonial-founder d-flex align-items-center justify-content-center">
                  <div class="founder-img">
                    <img src="https://preview.colorlib.com/theme/capitalshop/assets/img/gallery/founder-img.png" alt="">
                  </div>
                  <div class="founder-text">
                    <span>Petey Cruiser</span>
                    <p>Designer at Colorlib</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web1\resources\views/frontend/index.blade.php ENDPATH**/ ?>