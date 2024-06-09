@extends('admin.layout')
@section('meta_title','Add Testimonial - Admin')
@section('testimonial_select','active')
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
                        <label for="image" class="control-label mb-1">Image</label>
                        <input id="image" name="image" type="file" class="form-control">
                        @if($result !='')
                            <img src="{{asset('images/'.$result?->image)}}" width="80px" >
                        @endif
                        @error('image')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="name" class="control-label mb-1">Name</label>
                        <input id="name" name="name" type="text" class="form-control " value="{{$result?->name}}">
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="designation" class="control-label mb-1">Designation</label>
                        <input id="designation" name="designation" type="text" class="form-control " value="{{$result?->position}}">
                        @error('designation')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="col form-group">
                        <label for="review" class="control-label mb-1">Review</label>
                        <textarea class="form-control " name="review" id="review" rows="5">{{$result?->review}}</textarea>
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
@endsection