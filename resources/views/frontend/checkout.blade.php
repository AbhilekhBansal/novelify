@extends('frontend.layout')
@section('meta_title','Checkout Page')
@section('container')

<style>
    .form-control{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif!important;
    }
</style>
        <section class="checkout_area">
            <div class="container">
                @if(session()->has('FORNT_USER_LOGIN')==null)
                <div class="returning_customer">
                    <div class="check_title">
                        <h2>
                            Returning Customer?
                            <a href="{{url('login')}}">login here</a>
                        </h2>
                    </div>
                    @if(session('ret_msg') !=="")
                        <p style="color:red;">{{ session('ret_msg') }}</p>
                    @else
                        <p>
                            If you have shopped with us before, please enter your details in the
                            boxes below. If you are a new customer, please proceed to the
                            Billing & Shipping section.
                        </p>
                    @endif    
                    {{-- <form class="row contact_form" action="{{url('login_process')}}" method="POST">
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" name="user_email" value="" placeholder="User Email"/>
                            
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="password" class="form-control" name="password" value="" placeholder="Password"/>
                            
                        </div>
                        <div class="col-md-12 form-group d-flex flex-wrap">
                            <button class="submit-btn3" type="submit">Login</button> --}}
                            {{-- <div class="checkout-cap ml-5">
                                <input type="checkbox" id="fruit01" name="keep-log">
                                <label for="fruit01">Create an account?</label>
                            </div> --}}
                            {{-- @csrf
                        </div>
                    </form> --}}
                </div>
                @endif
                
                <div class="billing_details">
                    <div class="row">
                        <form class="row" id="frmPlaceOrder" name="order_place" >
                            <div class="col-lg-8">
                                <h3>Billing Details</h3> 
                                <div id="formMsg" style="color:red"></div>
                                <div class="row">
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control"  placeholder="Full name" name="name" value="{{$customer['name']}}"  required/>
                                        <span class="text-danger">@error('name')
                                            {{$message}}
                                        @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 form-group p_star">
                                        <input type="text" class="form-control"  placeholder="Mobile No:" name="phone" value="{{$customer['phone']}}"  required/>
                                        <span class="text-danger">@error('phone')
                                            {{$message}}
                                        @enderror
                                    </span>
                                    </div>
                                    <div class="col-md-6 form-group p_star">
                                        <input type="text" class="form-control"  placeholder="Email" name="email" value="{{$customer['email']}}"  required/>
                                        <span class="text-danger">@error('email')
                                            {{$message}}
                                        @enderror
                                    </span>
                                    </div>
                                
                                    <div class="col-md-9 form-group p_star">
                                        <input type="text" class="form-control"  placeholder="Address" name="address" value="{{$customer['address']}}"  required/>
                                        <span class="text-danger">@error('address')
                                            {{$message}}
                                        @enderror
                                    </span>
                                    </div>
                                    <div class="col-md-3 form-group p_star">
                                        <input type="text" class="form-control"  placeholder="City" name="city" value="{{$customer['city']}}"  required/>
                                        <span class="text-danger">@error('city')
                                            {{$message}}
                                        @enderror
                                    </span>
                                    </div>
                                    <div class="col-md-3 form-group p_star">
                                        <input type="text" class="form-control"  placeholder="State" name="state" value="{{$customer['state']}}"  required/>
                                        <span class="text-danger">
                                            @error('state')
                                            {{$message}}
                                        @enderror
                                    </span>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <input type="text" class="form-control"   name="zip" placeholder="Postcode/ZIP" value="{{$customer['zip']}}"  required/>
                                        <span class="text-danger">@error('zip')
                                            {{$message}}
                                        @enderror
                                    </span>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <div class="checkout-cap">
                                            <input type="checkbox" id="fruit1" name="save_profile">
                                            <label for="fruit1">Want to save in profile?</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <div class="creat_account">
                                            <h3>Shipping Details</h3>
                                            <div class="checkout-cap">
                                                <input type="checkbox" id="f-option3" name="selector" />
                                                <label for="f-option3">Ship to a different address?</label>
                                            </div>
                                        </div>
                                        <textarea class="form-control" name="message" id="message" rows="1"
                                            placeholder="Order Notes"></textarea>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-4" style="background:#f4f4f4">
                                <div class="order_box">
                                    <h2>Your Order</h2>
                                    <ul class="list">
                                        <li>
                                            <a >Product<span>Total</span>
                                            </a>
                                        </li>@php 
                                                $total=0;
                                            @endphp
                                        @foreach($totalItem as $res)
                                        <li>
                                            <a >{{$res->name}}
                                                <span class="middle">x {{$res->quantity}}</span>
                                                <span class="last">₹{{$res->price*$res->quantity}}</span>
                                            </a>
                                        </li>@php $total += $res->price*$res->quantity @endphp
                                        @endforeach
                                    </ul>
                                    <ul class="list list_2">
                                        {{-- <li>
                                            <a href="">Shipping
                                                <span>Flat rate: ₹50</span>
                                            </a>
                                        </li> --}}
                                        <li class="hide show_coupon_code">
                                            <a style="display: inline">Coupon Code<a href="javascript:void(0)" class="remove_btn" onclick="remove_coupon_code()">remove</a> <span id="coupon_code_str" style="float: right;"></span>
                                            </a>
                                        </li>
                                        <li class="total_price_box1">
                                            <a >Total<span id="total_price">₹{{$total}}</span>
                                            </a>
                                        </li>
                                        <li class="hide total_price_box2">
                                            <a >Total<span >₹{{$total}}</span>
                                            </a>
                                            <input type="hidden" name="totalPrice" value="{{$total}}">
                                        </li>
                                    </ul>
            
                                </div>
                                <div class="cupon_area">
                                    <h2>Coupons</h2>
                                    <div class="check_title">
                                        <h2> Have a coupon?
                                            <a href="">Enter your Coupon code here</a>
                                        </h2>
                                    </div>
                                    <div id="coupon_code_msg"></div>
                                    <input type="text" id="coupon_code" name="coupon_code" placeholder="Enter coupon code" />
                                    <input class="btn btn-sp apply_coupon_code_box" type="button" onclick="applyCouponCode()" value="Apply Coupon">
                                </div>
                                <div class="payment-method">
                                    <h2>Payment Method</h2>
                                    <div class="payment_item">
                                        <div class="radion_btn">
                                            <input type="radio" id="f-option5" name="payment_gateway" checked value="COD"/>
                                            <label for="f-option5">Cash On Delivery</label>
                                            <div class="check"></div>
                                        </div>
                                    </div>
                                    <div class="payment_item ">
                                        <div class="radion_btn">
                                            <input type="radio" id="f-option6" name="payment_gateway" value="Gateway"/>
                                            <label for="f-option6">Via Instamojo</label>
                                            <img src="assets/img/gallery/card.html" alt="" />
                                            <div class="check"></div>
                                        </div>
                                    
                                    </div>
                                    <div class="creat_account checkout-cap">
                                        <input type="checkbox" id="f-option8" name="selector" />
                                        <label for="f-option8">I’ve read and accept the <a href="#" style="color: #ff2020">terms & conditions*</a>
                                        </label>
                                    </div>
                                    <input class="btn btn-sp" type="button" name="submit" onclick="test()" value="Proceed to Paypal">
                                </div>
                                <div id="order_placed_msg1" style="color: #ff2020;font-weight:700"></div>
                                <div id="order_placed_msg"></div>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
           
        </section>
        <script>
            // Get all elements with the class "hide"
const hiddenElements = document.querySelectorAll('.hide');

// Loop through the elements and hide them
hiddenElements.forEach(element => {
  element.style.display = 'none';
});




</script>


@endsection