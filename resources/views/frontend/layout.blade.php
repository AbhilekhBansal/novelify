<!doctype html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('meta_title')</title>
    <meta name="description" content="@yield('meta_desc')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{url("assets/img/logo/favicon.png")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{url("assets/css/bootstrap.min.css")}}"> --}}
    <link rel="stylesheet" href="{{url("assets/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{url("assets/css/slicknav.css")}}">
    <link rel="stylesheet" href="{{url("assets/css/flaticon.css")}}">
    <link rel="stylesheet" href="{{url("assets/css/animate.min.css")}}">
    {{-- <link rel="stylesheet" href="{{url("assets/css/price_rangs.css")}}"> --}}
    <link rel="stylesheet" href="{{url("assets/css/magnific-popup.css")}}">
    <link rel="stylesheet" href="{{url("assets/css/fontawesome-all.min.css")}}">
    <link rel="stylesheet" href="{{url("assets/css/themify-icons.css")}}">
    <link rel="stylesheet" href="{{url("assets/css/slick.css")}}">
    <link rel="stylesheet" href="{{url("assets/css/nice-select.css")}}">
    <link rel="stylesheet" href="{{url("assets/css/style.css")}}">
    <style>
      .sub-2{
        left: 140px!important;
      }
      .header-area .header-mid .menu-wrapper .header-right .cart::after {
        content: "{{ getAddToCartTotalItem() > 0 ? getAddToCartTotalItem() : null}}";

        /*  */
      }
      .err_span{
          float: right;
          color: red;
      }
    
     
  </style>
    
  </head>
  <body>
    {{-- <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center"><div class="preloader-inner position-relative">
        <div class="preloader-circle"></div>
        <div class="preloader-img pere-text">
          <img src="{{url('assets/img/logo/favicon.png')}}" alt="loder"></div>
        </div>
      </div>
  </div> --}}
    <header>
      <div class="header-area">
        <div class="header-top d-none d-sm-block">
          <div class="container">
            <div class="row">
              <div class="col-xl-12">
                <div class="d-flex justify-content-between flex-wrap align-items-center">
                  <div class="header-info-left">
                    <ul>
                      <li>
                        <a href="{{url('/about')}}">About Us</a>
                      </li>
                      <li>
                        <a href="{{url('/policy')}}">Privacy</a>
                      </li>
                      <li>
                        <a href="#">FAQ</a>
                      </li>
                      <li>
                        <a href="#">Careers</a>
                      </li>
                    </ul>
                  </div>
                  <div class="header-info-right d-flex">
                    <ul class="order-list">
                      <li>
                        <a href="{{url('/wishlist')}}">My Wishlist</a>
                      </li>
                    </ul>
                    {!! social_link() !!}
                    {{-- <ul class="header-social">
                      <li>
                        <a href="#">
                          <i class="fab fa-facebook"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-instagram"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-twitter"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-linkedin-in"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-youtube"></i>
                        </a>
                      </li>
                    </ul> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="header-mid header-sticky">
          <div class="container">
            <div class="menu-wrapper" style="margin: -28px;la~">
              <div class="logo">
                <a href="{{url('/')}}">
                  <img src="{{asset('images/logo.png')}}" alt="noval_logo.png" style="width: 170px;">
                </a>
              </div>
              <div class="main-menu d-none d-lg-block">
                <nav>
                  
                    {!! getTopNavCat() !!}
                    
                    
                  
                </nav>
              </div>
              <div class="header-right">
                <ul>
                  <li>
                    <div class="nav-search search-switch hearer_icon">
                      <a id="search_1" href="javascript:void(0)">
                        <span class="ti-search"  crossorigin="anonymous"></span>
                      </a>
                    </div>
                  </li>
                  <li class="cart" id="sh-cart">
                    <a href="{{url('/cart')}}">
                      <span class="ti-shopping-cart "></span>
                    </a>
                  </li>
                  @if(session()->has('FORNT_USER_LOGIN')!=null)
                  <li>
                    <a href="{{url('/logout')}}">
                      <span><i class="fas logout  fa-right-from-bracket"></i></span>
                    </a>
                  </li>
                  @else
                  <li>
                    <a href="{{url('/login#login')}}">
                      <span class="ti-user"></span>
                    </a>
                  </li>
                  @endif
                </ul>
              </div>
            </div>
            <div class="search_input" id="search_input_box">
              <form class="search-inner d-flex justify-content-between " >
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="button" onclick="search_filter()" class="btn">search</button>
                <i class="fa-solid fa-xmark" id="close_search" title="Close Search" style="padding-top: 10px;"></i>
              </form>
            </div>
            <div class="col-12">
              <div class="mobile_menu d-block d-lg-none"></div>
            </div>
          </div>
        </div>
        <div class="header-bottom text-center">
          <p><marquee width="80%" direction="left" height="20px">
            This is a sample scrolling text that has scrolls texts to left.<a href="#" class="browse-btn">Shop Now</a>
            </marquee>
          </p>
        </div>
      </div>
    </header>
    <main>
      @section('container')
      @show
      {{-- services section  --}}
      {{-- <div class="categories-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".2s">
                <div class="cat-icon">
                  <img src="https://preview.colorlib.com/theme/capitalshop/assets/img/icon/services1.svg" alt="">
                </div>
                <div class="cat-cap">
                  <h5>Fast & Free Delivery</h5>
                  <p>Free delivery on all orders</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".2s">
                <div class="cat-icon">
                  <img src="https://preview.colorlib.com/theme/capitalshop/assets/img/icon/services2.svg" alt="">
                </div>
                <div class="cat-cap">
                  <h5>Secure Payment</h5>
                  <p>Free delivery on all orders</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".4s">
                <div class="cat-icon">
                  <img src="https://preview.colorlib.com/theme/capitalshop/assets/img/icon/services3.svg" alt="">
                </div>
                <div class="cat-cap">
                  <h5>Money Back Guarantee</h5>
                  <p>Free delivery on all orders</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".5s">
                <div class="cat-icon">
                  <img src="https://preview.colorlib.com/theme/capitalshop/assets/img/icon/services4.svg" alt="">
                </div>
                <div class="cat-cap">
                  <h5>Online Support</h5>
                  <p>Free delivery on all orders</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </main>
    <footer>
      <div class="footer-wrapper gray-bg">
        <div class="footer-area footer-padding">
          <section class="subscribe-area">
            <div class="container">
              <div class="row justify-content-between subscribe-padding">
                <div class="col-xxl-3 col-xl-3 col-lg-4">
                  <div class="subscribe-caption">
                    <h3>Subscribe Newsletter</h3>
                    <p>Subscribe newsletter to get 5% on all products.</p>
                  </div>
                </div>
                <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9">
                  <div class="subscribe-caption">
                    <form action="#">
                      <input type="text" placeholder="Enter your email">
                      <button class="subscribe-btn">Subscribe</button>
                    </form>
                  </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-lg-4">
                  <div class="footer-social">
                    <a href="https://bit.ly/sai4ull">
                      <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#">
                      <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#">
                      <i class="fab fa-youtube"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-8">
                <div class="single-footer-caption mb-50">
                  <div class="single-footer-caption mb-20">
                    <div class="footer-logo mb-35">
                      <a href="">
                        <img src="{{asset('images/logo.png')}}" alt="noval_logo.png" style="width: 280px;
                        background: white;">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                <div class="single-footer-caption mb-50">
                  <div class="footer-tittle">
                    <h4>Trending Categories</h4>
                    <ul>
                      {!! footer_cat() !!}
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                <div class="single-footer-caption mb-50">
                  <div class="footer-tittle">
                    <h4>Recommended Books</h4>
                    <ul>
                      {!! footer_recommended_books() !!}
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                <div class="single-footer-caption mb-50">
                  <div class="footer-tittle">
                    {{-- <h4>Baby Collection</h4> --}}
                    <ul>
                      {{-- <li>
                        <a href="#">Clothing Fashion</a>
                      </li>
                      <li>
                        <a href="#">Winter</a>
                      </li>
                      <li>
                        <a href="#">Summer</a>
                      </li>
                      <li>
                        <a href="#">Formal</a>
                      </li>
                      <li>
                        <a href="#">Casual</a>
                      </li> --}}
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                <div class="single-footer-caption mb-50">
                  <div class="footer-tittle">
                    <h4>Quick Links</h4>
                    <ul>
                      <li>
                        <a href="{{url('/policy')}}">Copyright Policy</a>
                      </li>
                      <li>
                        <a href="#">Support</a>
                      </li>
                      
                      <li>
                        <a href="{{url('/about')}}">About</a>
                      </li>
                      <li>
                        <a href="#">Contact Us</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom-area">
          <div class="container">
            <div class="footer-border">
              <div class="row">
                <div class="col-xl-12 ">
                  <div class="footer-copy-right text-center">
                    <p>Copyright &copy; <script>
                        document.write(new Date().getFullYear());
                      </script> All rights reserved | This website is made with <i class="fa fa-heart color-danger" aria-hidden="true"></i> </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <div id="back-top">
      <a class="wrapper" title="Go to Top" href="#">
        <div class="arrows-container">
          <div class="arrow arrow-one"></div>
          <div class="arrow arrow-two"></div>
        </div>
      </a>
    </div>
    <script src="{{url("assets/js/vendor/modernizr-3.5.0.min.js")}}"></script>
    <script src="{{url("assets/js/vendor/jquery-1.12.4.min.js")}}"></script>
    <script src="{{url("assets/js/popper.min.js")}}"></script>
    <script src="{{url("assets/js/bootstrap.min.js")}}"></script>
    <script src="{{url("assets/js/owl.carousel.min.js")}}"></script>
    <script src="{{url("assets/js/slick.min.js")}}"></script>
    <script src="{{url("assets/js/jquery.slicknav.min.js")}}"></script>
    <script src="{{url("assets/js/wow.min.js")}}"></script>
    <script src="{{url("assets/js/jquery.magnific-popup.js")}}"></script>
    <script src="{{url("assets/js/jquery.nice-select.min.js")}}"></script>
    <script src="{{url("assets/js/jquery.counterup.min.js")}}"></script>
    <script src="{{url("assets/js/waypoints.min.js")}}"></script>
    {{-- <script src="{{url("assets/js/price_rangs.js")}}"></script> --}}
    {{-- <script src="{{url("assets/js/contact.js")}}"></script> --}}
    {{-- <script src="{{url("assets/js/jquery.form.js")}}"></script> --}}
    {{-- <script src="{{url("assets/js/jquery.validate.min.js")}}"></script> --}}
    {{-- <script src="{{url("assets/js/mail-script.js")}}"></script> --}}
    {{-- <script src="{{url("assets/js/jquery.ajaxchimp.min.js")}}"></script> --}}
    <script src="{{url("assets/js/plugins.js")}}"></script>
    <script src="{{url("assets/js/main.js")}}"></script>
   
    <script>
      // Get all the filter controls
      const filterControls = document.querySelectorAll('.filter__controls li');
    
      // Get all the product items
      const productItems = document.querySelectorAll('.property__gallery .itemx');
      
      // Add click event listener to each filter control
      filterControls.forEach((control) => {
        control.addEventListener('click', function () {
          // Get the data-filter attribute value
          const filter = this.getAttribute('data-filter');
          // document.write(filter);
          // Show or hide product items based on the filter value
          productItems.forEach((item) => {
            if (item.classList.contains(filter) || filter === '*') {
              item.style.display = 'block';
            } else {
              item.style.display = 'none';
            }
          });
    
          // Update the active class on the filter controls
          filterControls.forEach((control) => {
            control.classList.remove('active');
          });
          this.classList.add('active');
        });
      });
    </script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    

 
  </body>
  <!-- Mirrored from preview.colorlib.com/theme/capitalshop/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Jul 2023 05:13:18 GMT -->
</html>