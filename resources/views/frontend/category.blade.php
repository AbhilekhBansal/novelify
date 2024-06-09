@extends('frontend.layout')
@section('meta_title',$slug)
@section('container')


<div class="hero-area section-bg2">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="slider-area">
            <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
              <div class="hero-caption hero-caption2">
                <h2 style="text-transform: uppercase;">{{$slug}}</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                      Novel
                    </li>
                    <li class="breadcrumb-item">
                      <a href="">{{$slug}}</a>
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
        <div class="col-xl-3 col-lg-4 col-md-4">
          <div class="category-listing mb-50">
            <div class="single-listing">
              <div class="select-Categories pb-30">
                <div class="select-job-items2 mb-30">
                  <div class="col-xl-12">
                    <form action="">
                      <div class="small-tittle">
                        <h4>Sort By</h4>
                      </div>
                      <select name="select2" style="display: none;" onchange="sort_by()" id="sort_by_value">
                        
                        @if($sort_txt!==null)
                          <option selected value="">{{$sort_txt}}</option>
                        @else
                        <option value="">Default</option>
                        @endif
                        <option value="Price-lowest">Price-lowest</option>
                        <option value="Price-highest">Price-highest</option>
                        <option value="Most-rated">Most Rated</option>
                        <option value="Latest">Latest</option>
                       
                      </select>
                    </form>
                  </div>
                </div>
              </div> 
              <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow mb-40">
                <div class="small-tittle">
                  <h4>Filter by Price</h4>
                </div>
                
                {{-- new price filter start --}}
                <div class="wrapper">
                  <fieldset class="filter-price">
                
                    <div class="price-field">
                      <input type="range" min="100" max="1004" value="" step="1" id="lower" onchange="sort_price_fliter()">
                      <input type="range" min="104" max="1000" value="" step="1" id="upper" onchange="sort_price_fliter()">
                      
                    </div>
                    <div class="price-wrap">
                      
                      {{-- <button class="price_fliter_btn" type='button' onclick="sort_price_fliter()">Filter</button> --}}
                      <div class="price-container">
                        <div class="price-wrap-1">
                          <label for="start">₹</label>
                          <input id="start">
                        </div>
                        <div class="price-wrap_line">to</div>
                        <div class="price-wrap-2">
                          <label for="end">₹</label>
                          <input id="end">
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </div>
                {{-- new price filter end --}}
              </aside>
              <div class="select-Categories pb-30">
                <div class="small-tittle mb-20">
                  <h4>Filter by Genres</h4>
                </div>
                <ul class="genre_filter">
                  @foreach($category as $cat)
                    @if("category/".$slug == $cat->category_slug)  
                      <li class="cat_left_active"><a href="{{url(''.$cat->category_slug.'')}}"><i class="fa-regular fa-circle"></i><b>{{$cat->category_name}}</b></a></li>
                    @else
                      <li><a href="{{url(''.$cat->category_slug.'')}}"><i class="fa-regular fa-circle"></i>{{$cat->category_name}}</a></li>
                    @endif
                  @endforeach
                </ul>
                
              </div>
              
              
            </div>
          </div>
        </div>
        
        <div class="col-xl-9 col-lg-8 col-md-8">
          <div class="latest-items latest-items2">
            <div class="row">
              @foreach($products as $product)
              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="properties pb-30">
                  <div class="properties-card shadow-3" >
                    <div class="properties-img">
                      <a href="{{url('product-details/'.$product->slug)}}">
                        <img src="{{asset('images/'.$product->image)}}" alt="{{$product->image}}">
                      </a>
                      <div class="socal_icon">
                        <a href="javascript:void(0)" onclick="home_add_to_cart('{{$product->id}}','{{$product->price}}','1')">
                          <i class="ti-shopping-cart"></i>
                        </a>
                        <a href="javascript:void(0)" onclick="add_to_wish('{{$product->id}}','{{$product->price}}','1')">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="fa-thin fas fa-up-right-and-down-left-from-center"></i>
                        </a>
                      </div>
                    </div>
                    <div class="properties-caption properties-caption2">
                      <h3>
                        <a href="{{url('product-details/'.$product->slug)}}">{{$product->name}}</a>
                      </h3>
                      <div class="properties-footer">
                        <div class="price">
                          <span>₹{{$product->price}}
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
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
    @csrf
  </form>
  <form id="categoryFilter">
    <input type="hidden" name="sort" id="sort" value="{{$sort}}">
    <input type="hidden" name="filter_price_from" id="filter_price_from" value='{{$filter_price_from}}'>
    <input type="hidden" name="filter_price_to" id="filter_price_to" value='{{$filter_price_to}}'>
  </form>
  {{-- <script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
  
    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        // If the checkbox is checked, uncheck other checkboxes
        if (this.checked) {
          checkboxes.forEach(otherCheckbox => {
            if (otherCheckbox !== this) {
              otherCheckbox.checked = false;
            }
          });
        }
      });
    });
  </script> --}}
  
  
  @endsection