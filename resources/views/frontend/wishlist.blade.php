@extends('frontend.layout')
@section('meta_title','My Wishlist')
@section('container')





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
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
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
@if(isset($result[0]))
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
                            {{-- <th scope="col">Quantity</th> --}}
                            <th scope="col">Add</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <p hidden>{{$gtotal=0,$count= 0;}}</p>
                        @foreach($result as $list)
                        <tr id="cart-product-{{$list->id}}">
                            <td>
                                <p id="count">{{$count=$count+1;}}</p>
                            </td>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <a href="{{url('product-details/'.$list->slug)}}"><img src="{{asset('images/'.$list->image)}}" alt="{{$list->image}}" /></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="{{url('product-details/'.$list->slug)}}"><p>{{$list->name}}</p></a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>₹{{$list->price}}</h5>
                            </td>
                            {{-- <td>
                                <div class="product_count">
                                   
                                    <input class="input-number" type="number" id="qty-{{$list->id}}" onchange="updateQTY('{{$list->id}}','{{$list->price}}')" value="{{$list->quantity}}" min="1" max="10">
                                   
                                </div>
                                

                               
                            </td>
                            <td>
                                <h5 id="total_price_{{$list->id}}">₹{{$g_total=$list->price * $list->quantity}}</h5>
                            </td><p hidden>{{$gtotal=$gtotal+$g_total}}</p> --}}
                            <td>
                                <a href="javascript:void(0)" onclick="home_add_to_cart('{{$list->id}}','{{$list->price}}','1'); ">
                                    <button class="remove-btn"><i class="ti-shopping-cart"></i></button>
                                  </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="deleteWishProduct('{{$list->id}}','0','{{$list->price}}')"><button class="remove-btn"><i class="fa-solid fa-xmark"></i></button></a>
                            </td>
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Grand total</h5>
                            </td>
                            <td>
                                <h5>₹{{$gtotal}}</h5>
                            </td>
                        </tr> --}}
                        {{-- <tr class="shipping_area">
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Shipping</h5>
                            </td>
                            <td>
                                <div class="shipping_box">
                                    <ul class="list">
                                        <li>
                                            Flat Rate: ₹5.00
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                        <li>
                                            Free Shipping
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                        <li>
                                            Flat Rate: ₹10.00
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                        <li class="active">
                                            Local Delivery: ₹2.00
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                    </ul>
                                    <h6>
                                        Calculate Shipping
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </h6>
                                    <select class="shipping_select">
                                        <option value="1">Bangladesh</option>
                                        <option value="2">India</option>
                                        <option value="4">Pakistan</option>
                                    </select>
                                    <select class="shipping_select section_bg">
                                        <option value="1">Select a State</option>
                                        <option value="2">Select a State</option>
                                        <option value="4">Select a State</option>
                                    </select>
                                    <input class="post_code" type="text" placeholder="Postcode/Zipcode" />
                                    <a class="btn" href="#">Update Details</a>
                                </div>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
                {{-- <div class="checkout_btn_inner float-right">
                    <a class="btn" href="#" style="margin-bottom: 10px;">Continue Shopping</a>
                    <a class="btn checkout_btn" href="{{url('checkout')}}" style="margin-bottom: 10px;">Proceed to checkout</a>
                </div> --}}
            </div>
        </div>
    </div>
</section>
<form id="frmadd_to_cart">
    <input type="hidden" name="product_id" id="product_id" value="">
    <input type="hidden" name="product_price" id="product_price" value="">
    <input type="hidden" name="quantity" id="quantity" value="1">
    <input type="hidden" name="w_delete" id="w_delete" value="">
    @csrf
</form>
@else
<div class="empty_cart">
    <img class="centerki" src="{{asset('assets/img/gallery/empty_cart2.png')}}" alt="">
    <h1 class="text-center centerk">Your Wishlist is empty</h1>
</div>
@endif
@endsection