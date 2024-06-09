@extends('admin.layout')
@section('meta_title',$title.' - Admin')
@section('product_select','active')
@section('container')
<style>
    .add_more{
        background: yellow;
        color: black;
        padding: 7px;
        margin: 0 10px 5px 0;
        float: right;
    }
    .remove{
        background: red;
        color: white;
        padding: 7px 4px;
        margin-top: 30px;
    }
</style>
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
                        <label for="name" class="control-label mb-1">Product Name</label>
                        <input id="name" name="name" type="text" class="form-control " value="{{$result?->name}}">
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="image" class="control-label mb-1">Image</label>
                        <input id="image" name="image" type="file" class="form-control " value="{{$result?->image}}">
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
                        <label for="slug" class="control-label mb-1">Slug</label>
                        <input id="slug" name="slug" type="text" class="form-control " value="{{$result?->slug}}">
                        @error('slug')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                    @enderror
                    </div>
                    

                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="category" class="control-label mb-1">Category</label>
                        <select name="category" id="category" class="form-control ">
                            <option value="">Select Category</option>
                            @foreach($cat_data as $item)
                            @if($result?->category_id==$item->id)
                                <option selected value="{{$item->id}}">{{$item->category_name}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                                @endif
                            @endforeach
                          </select>
                        
                        @error('category')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                    @enderror
                    </div>
                    <div class="col form-group">
                        <label for="price" class="control-label mb-1">Price</label>
                        <input id="price" name="price" type="text" class="form-control " value="{{$result?->price}}">
                        @error('price')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                    @enderror
                    </div>
                    <div class="col form-group">
                        <label for="rating" class="control-label mb-1">Rating</label>
                        <select name="rating" id="rating" class="form-control ">
                            <option value="">Select Rating</option>

                            <option @if($result?->rating==1) selected @endif; value="1">1</option>
                            <option @if($result?->rating==2) selected @endif; value="2">2</option>
                            <option @if($result?->rating==3) selected @endif; value="3">3</option>
                            <option @if($result?->rating==4) selected @endif; value="4">4</option>
                            <option @if($result?->rating==5) selected @endif; value="5">5</option>
                            
                          </select>
                        @error('rating')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                    @enderror
                    </div>
                    <div class="col form-group">
                        <label for="feature" class="control-label mb-1">Is Feature</label>
                        <select name="feature" id="feature" class="form-control ">
                            <option value="">Select Option</option>
                            
                            @if($result?->feature==1)
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            @else
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                           
                            @endif
                            
                          </select>
                        @error('feature')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                    @enderror
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="is_promo" class="control-label mb-1">Is Promo</label>
                        <select name="is_promo" id="is_promo" class="form-control ">
                            <option value="">Select Option</option>
                            
                            @if($result?->is_promo==1)
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            @else
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                           
                            @endif
                            
                          </select>
                        @error('is_promo')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                    @enderror
                    </div>
                    <div class="col form-group">
                        <label for="is_discounted" class="control-label mb-1">Is Discounted</label>
                        <select name="is_discounted" id="is_discounted" class="form-control ">
                            <option value="">Select Option</option>
                            
                            @if($result?->is_discounted==1)
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            @else
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                           
                            @endif
                            
                          </select>
                        @error('is_discounted')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                    @enderror
                    </div>
                    <div class="col form-group">
                        <label for="is_trending" class="control-label mb-1">Is Trending</label>
                        <select name="is_trending" id="is_trending" class="form-control ">
                            <option value="">Select Option</option>
                            
                            @if($result?->is_trending==1)
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            @else
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                           
                            @endif
                            
                          </select>
                        @error('is_trending')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                    @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="keyword" class="control-label mb-1">keywords</label>
                        <input id="keyword" name="keyword" type="text" class="form-control ckeditor" value="{{$result?->keywords}}" placeholder="Use , to separate keywords">
                        @error('keyword')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                    @enderror
                    </div>
                    <div class="col form-group">
                        <label for="author" class="control-label mb-1">Author</label>
                        <input id="author" name="author" type="text" class="form-control ckeditor" value="{{$result?->author}}" placeholder="Author Name">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="author_desc" class="control-label mb-1">Author Description</label>
                        <textarea id="author_desc" name="author_desc" type="text" class="form-control ckeditor" >{{$result?->author_desc}}</textarea>
                        @error('author_desc')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                    @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="desc" class="control-label mb-1">Description</label>
                        <textarea id="desc" name="desc" type="text" class="form-control ckeditor" >{{$result?->desc}}</textarea>
                        @error('desc')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                    @enderror
                    </div>
                </div> 
                {{-- @if($product_images?->isEmpty())
                    <div class="multiple-images">
                        <input type="checkbox" id="more_images"  value="yes" >
                        <label for="more_images" lass="form-label"> check if you want to add more images</label>
                    </div>
                @endif     --}}
                <div class="multi-img-box">
                    <div class="row">
                        @if(!$product_images=='')
                            @php($count_id=1)
                            @foreach($product_images as $image)
                                <div class="col-3 form-group" id="input-0{{$count_id}}">
                                    <label for="images" class="control-label mb-1">Image {{$count_id++}}</label><br>
                                    <img src="{{asset('images/'.$image->images)}}" alt="{{$image->images}}" style="width:100px">
                                </div>
                                <div class="col-3 form-group" id="remove-0{{$image->id}}">
                                    <a href="{{url('/admin/product/product_images_delete/'.$image->id)}}"><input class="remove" type="button" value="Delete" ></a>
                                </div>
                                
                            @endforeach
                        @endif
                    </div>
                    <div class="row multiple_images">
                        
                    </div>
                    
                        <input class="add_more" type="button" value="Add Images" onclick="add_more()">
                    
                </div>
                
                <div class="row">
                    <div>
                        <button id="" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                           Submit
                        </button>  
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
  var count=1;
  jQuery(document).ready(function($) {
  $('#more_images').on('click', function() {
    if ($(this).prop('checked')) {
      var html='',html2='';
      
      html='<div class="col-12 form-group" id="input-1"><label for="image" class="control-label mb-1">Image 1</label><input id="image" name="images[]" type="file" class="form-control " value="{{$result?->images}}"></div>';    

      html2='<input class="add_more" type="button" value="Add More" onclick="add_more()">';
      jQuery('.multiple_images').html(html);
      jQuery('.multi-img-box').append(html2);

    }
  });
});
function add_more(){
    var html='';
      jQuery('.multiple_images').append('<div class="col-9 form-group" id="input-'+count+'"><label for="images" class="control-label mb-1">Image '+count+'</label><input id="images" name="images[]" type="file" class="form-control " value="{{$result?->images}}"></div><div class="col-3 form-group" id="remove-'+count+'"><input class="remove" type="button" value="Remove" onclick="remove('+count+')"></div>');
      count++;
}
function remove(key){
    
      jQuery('#input-'+key).remove();
      jQuery('#remove-'+key).remove();
      count--;
}

function Delete(key){
    alert('soon be deleted');
    jQuery('#remove-'+key).remove();
}

jQuery(document).ready(function($) {
  $('#more_images').on('click', function() {
    if (!$(this).prop('checked')) {
        jQuery('.multiple_images').remove();
        jQuery('.multi-img-box').remove();
        
    }
  });
});
</script>
<script src="{{url('admin_assets/ckeditor/ckeditor.js')}}"></script>

@endsection