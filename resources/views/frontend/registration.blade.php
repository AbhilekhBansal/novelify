@extends('frontend.layout')
@section('meta_title','Registration')
@section('container')

<main class="login-bg" id="registration">

    <div class="register-form-area">
        
        <div class="register-form text-center">

            <div class="register-heading">
                <span>Sign Up</span>
                <p>Create your account to get full access</p>
            </div>
            <form action="{{url('registration_process')}}" method="POST">
                <div class="input-box">
                    <div class="single-input-fields">
                        <label>Full name</label>
                        @if($errors->has('name'))
                        <div class="err_span">{{ $errors->first('name') }}</div>
                        @endif
                        <input type="text" name="name" placeholder="Enter full name" value="{{ old('name') }}">
                        @if($errors->has('email'))
                            <div class="err_span">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="single-input-fields">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                        @if($errors->has('phone'))
                            <div class="err_span">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                    <div class="single-input-fields">
                        <label>Phone</label>
                        <input type="number" name="phone" minlength="10" maxlength="10" placeholder="Enter phone no." value="{{ old('phone') }}">
                        @if($errors->has('password'))
                            <div class="err_span">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="single-input-fields">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter Password">
                        
                    </div>
                    @csrf
                </div>
    
                <div class="register-footer">
                    <p> Already have an account? <a href="{{url('/login#login')}}"> Login</a> here</p>
                    <button id="btn_tyuhn" class="submit-btn3">Sign Up</button>
                </div>
            </form>
            
        </div>
    </div>
    {{-- @php
       
        if($msg !=="")
        {
            echo '<input type="hidden" id="msg" value="'.$msg.'">';
        }
    @endphp --}}
</main>
{{-- <script
  src="https://code.jquery.com/jquery-3.7.0.js"
  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
  crossorigin="anonymous"></script>
   <script>
    var m=jQuery('#msg').val();
    if(m =="success"){
        alert(m);
    }
    
   </script> --}}
@endsection