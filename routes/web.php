<?php

use Illuminate\Support\Facades\Route;
// admin
use App\http\Controllers\AdminController;
use App\http\Controllers\CategoryController;
use App\http\Controllers\CouponController;
use App\http\Controllers\ProductController;
use App\http\Controllers\CustomerController;
use App\http\Controllers\SliderController;
use App\http\Controllers\notificationController;
use App\http\Controllers\AboutController;
use App\http\Controllers\ContactController;
use App\http\Controllers\TestimonialController;
//website
use App\http\Controllers\FrontController;
use App\http\Controllers\userController;
use App\http\Controllers\indexController;
use App\Models\Customer;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Admin Routes

Route::get("/admin",[AdminController::class,"index"]);
Route::post("/admin/auth",[AdminController::class,"auth"])->name("admin.auth");

Route::group(['middleware'=>'Admin_Auth'],function(){
    Route::get("/admin/dashboard",[AdminController::class,"view"])->name('dashboard');
    Route::get("/admin/logout",function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error','Logout Successsfuly');
        return redirect('admin');    
        
        });
    //category routes
    Route::get("/admin/category",[CategoryController::class,"view"])->name('category');
    Route::get("/admin/category/add",[CategoryController::class,"add"])->name('category.add');
    Route::POST("/admin/category/insert",[CategoryController::class,"insert"]);
    Route::get("/admin/category/delete/{id}",[CategoryController::class,'delete'])->name('category.delete');
    Route::get("/admin/category/update/{id}",[CategoryController::class,'update'])->name('category.update');
    Route::POST("/admin/category/edit",[CategoryController::class,'edit'])->name('category.edit');
    Route::get("/admin/category/status/{status}/{id}",[CategoryController::class,'status']);
    //coupon routes
    Route::get("/admin/coupon",[CouponController::class,"view"])->name('coupon');
    Route::get("/admin/coupon/add",[CouponController::class,"add"])->name('coupon.add');
    Route::POST("/admin/coupon/insert",[CouponController::class,"insert"]);
    Route::get("/admin/coupon/delete/{id}",[CouponController::class,'delete'])->name('coupon.delete');
    Route::get("/admin/coupon/update/{id}",[CouponController::class,'update'])->name('coupon.update');
    Route::POST("/admin/coupon/edit",[CouponController::class,'edit'])->name('coupon.edit');
    Route::get("/admin/coupon/status/{status}/{id}",[CouponController::class,'status']);
    //product routes
    Route::get("/admin/product",[ProductController::class,"view"])->name('product');
    Route::get("/admin/product/add",[ProductController::class,"add"])->name('product.add');
    Route::POST("/admin/product/insert",[ProductController::class,"insert"]);
    Route::get("/admin/product/delete/{id}",[ProductController::class,'delete'])->name('product.delete');
    Route::get("/admin/product/update/{id}",[ProductController::class,'update'])->name('product.update');
    Route::POST("/admin/product/edit",[ProductController::class,'edit'])->name('prodcuct.edit');
    Route::get("/admin/product/status/{status}/{id}",[ProductController::class,'status']);
    Route::get("/admin/product/feature/{status}/{id}",[ProductController::class,'feature']);
    Route::get("/admin/product/product_images_delete/{id}",[ProductController::class,'product_images_delete']);
    //about routes
    Route::get("/admin/about",[AboutController::class,"update"])->name('about');
    Route::POST("/admin/about/edit",[AboutController::class,'edit'])->name('about.edit');
    //contact routes
    Route::get("/admin/contact",[ContactController::class,"update"])->name('contact');
    Route::POST("/admin/contact/edit",[ContactController::class,'edit'])->name('contact.edit');
    //testimonial routes
    Route::get("/admin/testimonial",[TestimonialController::class,"view"])->name('testimonial');
    Route::get("/admin/testimonial/add",[TestimonialController::class,"add"])->name('testimonial.add');
    Route::POST("/admin/testimonial/insert",[TestimonialController::class,"insert"]);
    Route::get("/admin/testimonial/delete/{id}",[TestimonialController::class,'delete'])->name('testimonial.delete');
    Route::get("/admin/testimonial/update/{id}",[TestimonialController::class,'update'])->name('testimonial.update');
    Route::POST("/admin/testimonial/edit",[TestimonialController::class,'edit'])->name('testimonial.edit');
    Route::get("/admin/testimonial/status/{status}/{id}",[TestimonialController::class,'status']);
    //Customer routes
    Route::get("/admin/customer",[CustomerController::class,"view"])->name('customer');
    Route::get("/admin/customer/show/{id}",[CustomerController::class,'show'])->name('customer.show');
    Route::get("/admin/customer/status/{status}/{id}",[CustomerController::class,'status']);
    //slider routes
    Route::get("/admin/slider",[SliderController::class,"view"])->name('slider');
    Route::get("/admin/slider/add",[SliderController::class,"add"])->name('slider.add');
    Route::POST("/admin/slider/insert",[SliderController::class,"insert"]);
    Route::get("/admin/slider/delete/{id}",[SliderController::class,'delete'])->name('slider.delete');
    Route::get("/admin/slider/update/{id}",[SliderController::class,'update'])->name('slider.update');
    Route::POST("/admin/slider/edit",[SliderController::class,'edit'])->name('slider.edit');
    Route::get("/admin/slider/status/{status}/{id}",[SliderController::class,'status']);
    //notification
    // Route::get("/admin/notification",[notificationController::class,"view"])->name('notification');
    Route::get("/admin/notification/add",[notificationController::class,"add"])->name('notification');
    Route::POST("/admin/notification/insert",[notificationController::class,"insert"]);
    Route::get("/admin/notification/delete/{id}",[notificationController::class,'delete'])->name('notification.delete');
    Route::get("/admin/notification/update/{id}",[notificationController::class,'update'])->name('notification.update');
    Route::POST("/admin/notification/edit",[notificationController::class,'edit'])->name('notification.edit');
    Route::get("/admin/notification/status/{status}/{id}",[notificationController::class,'status']);


   

});

// Frontend Routes
// home page
Route::get("/",[FrontController::class,'index']);
Route::get("/home",[FrontController::class,'index']);
//about us
Route::get("/about",[FrontController::class,'about']);
//copyright
Route::get("/policy",[FrontController::class,'policy']);
//product
// Route::get("/product/{slug}",[FrontController::class,'product_view']);
Route::get("/product-details/{slug}",[FrontController::class,'product_detail_view']);
//footer details
Route::get("/footer_detail",[FrontController::class,'footer_detail']);
//add to cart
Route::POST("add_to_cart",[FrontController::class,'add_to_cart']);
Route::get("cart",[FrontController::class,'cart']);
//wishlist
Route::get("wishlist",[FrontController::class,'wishlist']);
Route::POST("add_to_wish",[FrontController::class,'add_to_wish']);
//category
Route::get("/category/{slug}",[FrontController::class,'category']);
//search 
Route::get("search/{str}",[FrontController::class,'search']);
//registration
Route::get("registration",[FrontController::class,'registration']);
Route::post("registration_process",[FrontController::class,'registration_process']);
//login
Route::get("login",[FrontController::class,'login']);
Route::post("login_process",[FrontController::class,'login_process']);
//logout
Route::get("/logout",function () {
    session()->forget('FORNT_USER_LOGIN');
    session()->forget('FORNT_USER_ID');
    session()->forget('FORNT_USER_NAME');
    return redirect('/');    
    });
//email verification
Route::get("verification/{id}",[FrontController::class,'verification']);
//Forgot Password
Route::post("forgot_pass",[FrontController::class,'forgot_pass']);
Route::get("forgot_password_change/{id}",[FrontController::class,'forgot_password_change']);
Route::POST("forgot_password_change_proccess",[FrontController::class,'forgot_password_change_proccess']);
//checkout
Route::get("checkout",[FrontController::class,'checkout']);
//coupon apply
Route::POST("apply_coupon_code",[FrontController::class,'apply_coupon_code']);
//place order
Route::POST("place_order",[FrontController::class,'place_order']);
Route::get("/order_placed",[FrontController::class,'order_placed']);
Route::get("/order_fail",[FrontController::class,'order_fail']);
//Gateway payment
Route::get("/instamojo_payment_redirect",[FrontController::class,'instamojo_payment_redirect']);
//review
Route::POST("/review_submit",[FrontController::class,'review_submit']);



Route::get("/abhi",[FrontController::class,'index']);
Route::get("/index",[indexController::class,'views']);
Route::get("/customer/add",[userController::class,'create']);
Route::post("/customer/store",[userController::class,'store']);
Route::get("/customer-view",[userController::class,'view']);
Route::get("/customer/trash",[userController::class,'trash_view']);
Route::get("/customer/delete/{id}",[userController::class,'delete'])->name('customer.delete');
Route::get("/customer/forcedelete/{id}",[userController::class,'forceDelete'])->name('customer.forcedelete');
Route::get("/customer/edit/{id}",[userController::class,'edit'])->name('customer.edit');
Route::get("/customer/restore/{id}",[userController::class,'restore'])->name('customer.restore');
Route::POST("/customer/update/{id}",[userController::class,'update'])->name('customer.update');
Route::get("/array",[indexController::class,'array']);




// Route::get('/about',function(){

//     return view('about');
// });

// Route::get("/users",function() {
//     $Customers = Customer::all();
//     echo "<pre>";
//     print_r ($Customers->toArray());
//     $Customers = new Customer;
//     $Customers->name = $_REQUEST
// });
