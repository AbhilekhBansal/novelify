@extends('admin.layout')
@section('meta_title','Add Category - Admin')
@section('category_select','active')
@section('container')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">{{$title}}</div>
        <div class="card-body">
            
            {{-- <div class="card-title">
                <h3 class="text-center title-2">Add Category</h3>
            </div> --}}
            
            <form action="{{$action}}" method="POST" >
                @csrf
                <div class="row">
                    <div class="col form-group has-success">
                        <input id="id" name="id"  value="{{$result?->id}}" hidden>
                        <label for="category_name" class="control-label mb-1">Category Name</label>
                        <input id="category_name" name="category_name" type="text" class="form-control " value="{{$result?->category_name}}">
                        @error('category_name')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="parent_category_id" class="control-label mb-1">Parent Category</label>
                        <select name="parent_category_id" id="parent_category_id" class="form-control ">
                            <option value="">Select Parent Category</option>
                            <option selected value="0">Make Parent *</option>
                            @foreach($parent_data as $val)
                                @if($result?->parent_category_id == $val->id)
                                <option selected value="{{$val->id}}">{{$val->category_name}}</option>
                                {{-- @elseif($result?->parent_category_id == 0) --}}
                                
                                @endif
                                <option value="{{$val->id}}">{{$val->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col form-group">
                        <label for="category_slug" class="control-label mb-1">Category slug</label>
                        <input id="category_slug" name="category_slug" type="tel" class="form-control " value="{{$result?->category_slug}}">
                        @error('category_slug')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-6 form-group">
                        <label for="categroy_image" class="control-label mb-1">Category Image</label>
                        <input id="categroy_image" name="categroy_image" type="file" class="form-control ">
                        @error('categroy_image')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    @if(!$result?->category_image == '')
                    <div class="col">
                        <img src="{{asset('images/'.$result?->category_image)}}" style="width: 200px;
                        margin: 10px;">
                    </div>
                    @endif
                    <div class="col-3">
                        <label for="checkbox"  class="control-label mb-1">New Tag</label><br>
                        <label class="switch switch-3d switch-danger mr-3">
                            <input type="checkbox" id="new_tag" class="switch-input" value="1" name='new_tag' {{ $result?->tag == '1' ? ' checked' : '';}} >
                            <span class="switch-label"></span>
                            <span class="switch-handle"></span>
                        </label>
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