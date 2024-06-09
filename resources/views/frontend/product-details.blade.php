@extends('frontend.layout')
@section('meta_title',$product[0]->name)
@section('container')
<style>
    .services-area2 .single-services{
        background: url("{{url('images/bg-1.png')}}") no-repeat ;
        background-size: 100% 100%;
    }
</style>
<div class="hero-area section-bg2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="slider-area">
                    <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                        <div class="hero-caption hero-caption2">
                            <h2>Product Details</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Product Details</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(!$product == '')
<div class="services-area2 pt-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">

                        <div class="single-services d-flex align-items-center mb-0">
                            <div class="img_sec row">
                                <div class="small-img col">
                                    <ul>
                                        <li><img class="mini-img" src="{{asset('images/'.$product[0]->image)}}" alt="{{$product[0]->image}}" onclick="small_img(this,'{{asset('images/'.$product[0]->image)}}')"></li>
                                        @foreach($product_images as $img)
                                            <li><img class="mini-img" src="{{asset('images/'.$img->images)}}" alt="{{$img->images}}" onclick="small_img(this,'{{asset('images/'.$img->images)}}')"></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="features-img col">    
                                    <img class="large_img" src="{{asset('images/'.$product[0]->image)}}" alt="{{$product[0]->image}}" style="width: 245px; height:370px">
                                </div>
                            </div>
                            
                            <div class="features-caption">
                                <h3>{{$product[0]->name}}</h3>
                                <p>By {{$product[0]->author}}</p>
                                <div class="price">
                                    <span>₹{{$product[0]->price}}</span>
                                </div>
                                <!-- Change the `data-field` of buttons and `name` of input field's for multiple plus minus buttons-->
                                <div class="input-group plus-minus-input">
                                    <div class="input-group-button">
                                    <button type="button" class="button hollow circle" data-quantity="minus" data-field="quantity">
                                        <i class="fa fas fa-minus" aria-hidden="true"></i>
                                    </button>
                                    </div>
                                    <input class="input-group-field quant-box" type="number" name="quantity" value="1" maxlength="1" minlength="0">
                                    <div class="input-group-button">
                                    <button type="button" class="button hollow circle" data-quantity="plus" data-field="quantity">
                                        <i class="fa fas fa-plus" aria-hidden="true"></i>
                                    </button>
                                    </div>
                                </div>
  
  
                                <div class="review">
                                    <p><b>Rating - </b></p>
                                    <div class="rating">
                                    @if($avg_rating>0)
                                        @for ( $i= 0;$i<intval($avg_rating); $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    @else
                                        @for ( $i= 0;$i<intval($product[0]->rating); $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    @endif
                                       
                                        {{-- <i class="fas fa-star-half-alt"></i> --}}
                                    </div>
                                    
                                </div>
                                <a href="javascript:void(0)" onclick="add_to_cart()" class="white-btn mr-10">Add to Cart</a>
                                <a href="javascript:void(0)" onclick="add_to_wish('{{$product[0]->id}}','{{$product[0]->price}}','1')" class="border-btn heart_backg"><i class="fa-regular fa-heart"></i></a>
                                <a href="javascript:void(0)" onclick="share_btn()" class="border-btn share-btn"><i class="fas fa-share-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- add to cart detail submit frorm --}}
<form id="frmadd_to_cart">
    <input type="hidden" name="product_id" id="product_id" value="{{$product[0]->id}}">
    <input type="hidden" name="product_price" id="product_price" value="{{$product[0]->price}}">
    <input type="hidden" name="quantity" id="quantity" value="1">
    @csrf
</form>


<section class="our-client section-padding best-selling">
    <div class="container">
        <div class="row">
            <div class="offset-xl-1 col-xl-10">
                <div class="nav-button f-left">

                    <nav>
                        <div class="nav nav-tabs " id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-one-tab" data-bs-toggle="tab" href="#nav-one"
                                role="tab" aria-controls="nav-one" aria-selected="true">Description</a>
                            <a class="nav-link" id="nav-two-tab" data-bs-toggle="tab" href="#nav-two" role="tab"
                                aria-controls="nav-two" aria-selected="false">Author</a>
                            <a class="nav-link" id="nav-three-tab" data-bs-toggle="tab" href="#nav-three" role="tab"
                                aria-controls="nav-three" aria-selected="false">Reviews</a>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">

                <div class="row">
                    <div class="offset-xl-1 col-lg-9">
                        @if( !$product[0]->desc == '')
                        <p>{!! $product[0]->desc !!}</p>
                        @else
                        <p>Discription not available</p>
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">

                <div class="row">
                    <div class="offset-xl-1 col-lg-9">
                        @if( !$product[0]->author_desc == '')
                        <p>{!! $product[0]->author_desc !!}</p>
                        @else
                        <p>Discription not available</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">

                <div class="row">
                    <div class="offset-xl-1 col-lg-9">
                        {{-- start review section --}}
                        @foreach($reviews as $review)
                        <div class="product_review">
                            <div class="review-top">
                                <ul>
                                    <li><a class="review-icon"><span class="ti-user"></span></a></li>
                                    <li><h3>{{$review->name}}</h3></li>
                                    <li><p>- {{ $review->added_on}}</p></li>
                                </ul>
                            </div>
                            <div class="review-bottom">
                                <p>{{ $review->review}}</p>
                            </div>

                        </div>
                        @endforeach
                        {{-- end review section --}}
                        <form id="reviewForm" >
                            <div class="form-group">
                              <div class=" inputGroupContainer">
                                <input type="text" name="product_id" value="{{$product[0]->id}}" hidden>
                                <div class="input-group" style="align-items: center;">
                                    Rating
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rating" value="5" />
                                        <label for="star5" >5 stars</label>
                                        <input type="radio" id="star4" name="rating" value="4" />
                                        <label for="star4" >4 stars</label>
                                        <input type="radio" id="star3" name="rating" value="3" />
                                        <label for="star3" >3 stars</label>
                                        <input type="radio" id="star2" name="rating" value="2" />
                                        <label for="star2" >2 stars</label>
                                        <input type="radio" id="star1" name="rating" value="1" />
                                        <label for="star1" >1 star</label>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class=" inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                  </span>
                                  <input name="name" placeholder="Name" class="form-control" type="text">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class=" inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fa fa-pencil"></i>
                                  </span>
                                  <textarea class="form-control" name="review" rows="3" placeholder="Write your review"></textarea>
                                </div>
                              </div>
                            </div>
                            @csrf
                            <button type="button" class="review-btn" onclick="review_form()">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@else
<H2>Product Data does not available</H2>
@endif

@if(isset($related_products[0]))
<div class="container">
    <h2 style="text-align:center;color: #ff2020;text-decoration:underline;margin-bottom:15px" class="active">Related Products</h2>
    <div class="row col-md-12">
        @foreach ($related_products as $item)
        <div class="col-md-3 ">
            <div class="fea-img">
                <a href="{{url('product-details/'.$item->slug)}}"><img src="{{asset('images/'.$item->image)}}" alt="{{$item->image}}"></a>
            </div>
            <a href="">
                <div class="related-text">
                    <a href="{{url('product-details/'.$item->slug)}}"><p>{{$item->name}}</p></a>
                </div>
            </a>
        </div>
        @endforeach 
    </div>
</div>

@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://use.fontawesome.com/a6f0361695.js"></script>
<script>
    const labels = document.querySelectorAll(".rate label");
    labels.forEach(label => {
        label.addEventListener("click", event => {
            event.preventDefault(); // Prevent default label behavior
            
            // Get the associated radio input and check it
            const input = label.previousElementSibling;
            input.checked = true;
        });
    });
</script>
<script>
    $(document).ready(function () {
      // Get the input field and minus/plus buttons
      const quantityInput = $("input[name='quantity']");
      const minusButton = $("button[data-quantity='minus']");
      const plusButton = $("button[data-quantity='plus']");
  
      // Handle minus button click
      minusButton.on("click", function () {
        let currentQuantity = parseInt(quantityInput.val());
        if (currentQuantity > 1) {
          quantityInput.val(currentQuantity - 1);
        }
      });
  
      // Handle plus button click
      plusButton.on("click", function () {
        let currentQuantity = parseInt(quantityInput.val());
        if(currentQuantity < 10){
            quantityInput.val(currentQuantity + 1);
        }
        
      });
    });
  </script>
  <script>
    function small_img(smallImg, imgSrc){
        var container = document.querySelector('.img_sec');
        var imagesInContainer = container.querySelectorAll('img');
        imagesInContainer.forEach(function(img) {
            img.style.opacity = 1;
            img.style.border = "thin solid white";
        });

        var sm_img = smallImg.closest('.img_sec');
        smallImg.style.opacity = 0.5;
        smallImg.style.border = "2px solid red";
        var largeImage = sm_img.querySelector('.large_img');
        largeImage.src = imgSrc;
        
    }
  </script>
    @endsection