@extends('frontend.layout')
@section('meta_title','Novelify')
@section('container')
<style>
    .carousel-item{
        background: url("{{url('images/bg-1.png')}}") no-repeat ;
        /* background-repeat: no-repeat; */
        /* background-attachment: fixed;  */
        background-size: 100% 100%;
    }
</style>
{{-- slider section --}}
<section class="slider-area ">
    <div class="slider-active">
      @foreach($slider as $slide)
      <div class="single-slider slider-height d-flex align-items-center" style="background: url('{{asset('images/'.$slide->image)}}')">
        <div class="container">
          <div class="rowr">
            <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8  col-sm-10">
              <div class="hero-caption text-center">
                <span>{{$slide->heading}}</span>
                <h1 data-animation="bounceIn" data-delay="0.2s">{{$slide->title}}</h1>
                <p data-animation="fadeInUp" data-delay="0.4s">{!! $slide->slider_text !!}</p>
                <a href="{{$slide->btn_link}}" class="btn_1 hero-btn" data-animation="fadeInUp" data-delay="0.7s">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</section>


{{-- all New Webtoons section --}}
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
            @foreach($home_cat as $list)
            <li  data-filter="{{$list->category_slug}}">{{$list->category_name}}</li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="row property__gallery">
        @foreach($home_product as $p_list)
        <div class="col-md-4 col-lg-2 mix @foreach($home_cat as $list)
        @if($p_list->category_id == $list->id)
        {{$list->category_slug}}
        @endif
        @endforeach
        itemx">
          <div class="product__item">
            <div class="product__item__pic set-bg">
                <img class="set-bg product_item_img" src="{{asset('images/'.$p_list->image)}}" alt="{{$p_list->image}}">
                @if($p_list->is_promo == 1)
                <div class="label new">New</div>
                @endif
              <ul class="product__hover">
                <li><a href="{{url('product-details/'.$p_list->slug)}}"><i class="fa-thin fas fa-up-right-and-down-left-from-center"></i></a></li>
                <li><a href="javascript:void(0)" onclick="add_to_wish('{{$p_list->id}}','{{$p_list->price}}','1')"><span class="ti-heart"></span></a></li>
                <li><a href="javascript:void(0)" onclick="home_add_to_cart('{{$p_list->id}}','{{$p_list->price}}','1')"><span class="ti-shopping-cart"></span></a></li>
              </ul>
            </div>
            <div class="product__item__text">
              <h6><a href="{{url('product-details/'.$p_list->slug)}}">{{$p_list->name}}</a></h6>
              <div class="rating">
                @for($r=0;$r<$p_list->rating;$r++)
                <i class="fa fa-star"></i>
                @endfor
              </div>
              <div class="product__price">₹{{$p_list->price}}</div>
            </div>
          </div>
        </div>
        @endforeach
        <!-- Other product items -->
      </div>
    </div>
</section>
<!--feature section-->
{{ $cont=1;}}
<section class="feature-bg">  
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              @foreach($feature_product as $f_product)
                {{-- start card --}}
              <div class="carousel-item {{ $cont==1 ? "active" : "" }}">
                <div class="row">
                    <div class="col-md-6 feature_image">
                        <img src="{{asset('images/'.$f_product->image)}}" alt="{{$f_product->image}}" style="">
                    </div>
                    <div class="col-md-6 feature_content">
                        <h3>{{$f_product->name}}</h3>
                        <p>By {{$f_product->author}}</p>
                        <div class="price">
                          <span>₹ {{$f_product->price}}</span>
                          <a href="{{url('product-details/'.$f_product->slug)}}" class="border-btn btn_on_white" >View Details</a>
                        </div>  
                    </div>
                </div>
              </div>
              {{-- end card --}}{{$cont++}}
               @endforeach
               
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
{{-- You may like section  --}}
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
        @foreach($home_product as $p_list)
        @if($p_list->is_promo==1)
        <div class="properties pb-30 ">
          <div class="properties-card">
            <div class="properties-img">
              <a href="{{url('product-details/'.$p_list->slug)}}">
                <img src="{{asset('images/'.$p_list->image)}}" alt="{{$p_list->image}}">
              </a>
              <div class="socal_icon">
                
                <a href="javascript:void(0)" onclick="add_to_wish('{{$p_list->id}}','{{$p_list->price}}','1')">
                  <i class="ti-heart"></i>
                </a>
                <a href="javascript:void(0)" onclick="home_add_to_cart('{{$p_list->id}}','{{$p_list->price}}','1')">
                  <i class="ti-shopping-cart"></i>
                </a>
                
              </div>
            </div>
            <div class="properties-caption properties-caption2">
              <h3>
                <a href="{{url('product-details/'.$p_list->slug)}}"><b>{{$p_list->name}}</b></a>
              </h3>
              <div class="properties-footer">
                <div class="price">
                  <span>₹{{$p_list->price}}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
        @endforeach
      </div>
    </div>
    {{-- add to cart detail submit frorm --}}
<form id="frmadd_to_cart">
  <input type="hidden" name="product_id" id="product_id" value="">
  <input type="hidden" name="product_price" id="product_price" value="">
  <input type="hidden" name="quantity" id="quantity" value="1">
  @csrf
</form>
</section>

{{-- testimonial section  --}}
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

{{-- LOgin Modal --}}
{{-- <div class="container">
  <div class="actions">
    <a href="/login" data-target="login" class="btn nav login modal">Login</a>
    <a href="/register" data-target="register" class="btn nav register modal">Register</a>
  </div>
</div>
<div class="modal">
  <div class="content">
    <form>
      <a class="nav login" data-target="login">Log In</a>
      <a class="nav register" data-target="register">Register</a>

      <div class="email">
        <label for="email">Email</label>
        <input id="email" type="email"/>
      </div>
      <label for="username">Username</label>
      <input id="username" />
      <label for="password">Password</label>
      <input id="password" type="password" />
      <button type="submit">
        <span class="login">Log In</span>
        <span class="register">Register</span>
        <span class="loading">Loading</span>
      </button>
      <div class="text-center">
        <a href="/forgot">Forgot Password?</a>
      </div>
    </form>
  </div>
  <div class="success-check"></div>
</div> --}}

@endsection
