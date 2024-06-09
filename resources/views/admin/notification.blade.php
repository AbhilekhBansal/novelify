@extends('admin.layout')
@section('meta_title','Add Slider - Admin')
@section('slider_select','active')
@section('container')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">{{$title}}</div>
        <div class="card-body">
            
            {{-- <div class="card-title">
                <h3 class="text-center title-2">Add Category</h3>
            </div> --}}
            
            <form action="{{$action}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col form-group has-success">
                        <input id="id" name="id"  value="{{$result?->id}}" hidden>
                        <label for="image" class="control-label mb-1">Slider Image</label>
                        <input id="image" name="image" type="file" class="form-control">
                        @if(!$result?->image=="")
                        <img src="{{asset("images/".$result?->image)}}" style="width:100px">
                        @endif
                    </div>
                    <div class="col form-group">
                        <label for="heading" class="control-label mb-1">Heading</label>
                        <input id="heading" name="heading" type="text" class="form-control " value="{{$result?->heading}}">
                       
                    </div>
                    <div class="col form-group">
                        <label for="title" class="control-label mb-1">Title</label>
                        <input id="title" name="title" type="text" class="form-control " value="{{$result?->title}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="slider_text" class="control-label mb-1">Slider Text</label>
                        <textarea name="slider_text" id="slider_text" cols="30" rows="10"class="form-control ckeditor" >{{$result?->slider_text}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="btn_link" class="control-label mb-1">Button Link</label>
                        <input id="btn_link" name="btn_link" type="text" class="form-control " value="{{$result?->btn_link}}">
                    </div>
                </div>

                
                

                
                <div>
                    <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                       Submit
                    </button>

                    
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{url('admin_assets/ckeditor/ckeditor.js')}}"></script>
@endsection