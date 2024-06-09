@extends('frontend.layout')
@section('meta_title',$about->meta_title)
@section('meta_desc',$about->meta_desc)
@section('container')
<style>
    .about-row{
        padding: 20px
    }
    .about-img{
        align-items: center;
        display: flex;
    }
    .about-img img{
        width: 520px
    }
    .about-desc{
        margin-top: 10px;
        padding-left: 40px;
    }
    .about-desc h1 b{
        color: #ff2020;
        font-size: 20px
    }
    .about-desc p{
        text-align: justify;
    }
</style>
<div class="about-section">
    <div class="row about-row">
        <div class="col-6 about-desc">
            <h1><b>ABOUT US</b></h1>
            <h4>{{$about->title}}</h4>
            <p>{{$about->about_desc}}</p>
        </div>
        <div class="col-6 about-img">
            <img src="{{asset('images/'.$about->about_image)}}" alt="{{$about->about_image}}" >
        </div>
    </div>
</div>






@endsection
