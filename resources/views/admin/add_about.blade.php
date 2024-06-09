@extends('admin.layout')
@section('meta_title','About - Admin')
@section('about_select','active')
@section('container')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><b>Update About</b></div>
        <div class="card-body">
            
            {{-- <div class="card-title">
                <h3 class="text-center title-2">Add Category</h3>
            </div> --}}
            
            <form action="{{url('/admin/about/edit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col form-group has-success">
                        <input id="id" name="id"  value="{{$about?->id}}" hidden>
                        <label for="title" class="control-label mb-1">Title</label>
                        <input id="title" name="title" type="text" class="form-control " value="{{$about?->title}}">
                        @error('title')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="image" class="control-label mb-1">Image</label>
                        <input id="image" name="image" type="file" class="form-control " value="{{$about?->about_image}}">
                        @if($about !='')
                            <img src="{{asset('images/'.$about?->about_image)}}" width="80px" >
                        @endif
                        @error('image')
                            <div class="alert alert-danger" role="alert">
                            {{$message}}
                            </div>
                        @enderror
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="desc" class="control-label mb-1">Description</label>
                        <textarea id="desc" name="desc" type="text" class="form-control ckeditor" >{{$about?->about_desc}}</textarea>
                        @error('desc')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group has-success">
                        <label for="meta_title" class="control-label mb-1">Meta Title</label>
                        <input id="meta_title" name="meta_title" type="text" class="form-control " value="{{$about?->meta_title}}">
                        @error('meta_title')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col form-group has-success">
                        <label for="meta_desc" class="control-label mb-1">Meta Desc</label>
                        <input id="meta_desc" name="meta_desc" type="text" class="form-control " value="{{$about?->meta_desc}}">
                        @error('meta_desc')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
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