@extends('admin.layout')
@section('meta_title','Contact - Admin')
@section('contact_select','active')
@section('container')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><b>Update Contact Details</b></div>
        <div class="card-body">
            
            {{-- <div class="card-title">
                <h3 class="text-center title-2">Add Category</h3>
            </div> --}}
            
            <form action="{{url('/admin/contact/edit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col form-group has-success">
                        <input id="id" name="id"  value="{{$contact?->id}}" hidden>
                        <label for="address" class="control-label mb-1">Address</label>
                        <input id="address" name="address" type="text" class="form-control" value="{{$contact->address}}">
                    </div>
                </div>    
                <div class="row">
                    <div class="col form-group">
                        <label for="phone" class="control-label mb-1">Phone</label>
                        <input id="image" name="phone" type="text" class="form-control " value="{{$contact->phone}}">
                        @error('phone')
                            <div class="alert alert-danger" role="alert">
                            {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="alt_phone" class="control-label mb-1">Alt phone</label>
                        <input id="alt_phone" name="alt_phone" type="text" class="form-control " value="{{$contact->alt_phone}}">
                        @error('alt_phone')
                            <div class="alert alert-danger" role="alert">
                            {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="email" class="control-label mb-1">Email</label>
                        <input id="email" name="email" type="email" class="form-control " value="{{$contact->email}}">
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                            {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="alt_email" class="control-label mb-1">Alt email</label>
                        <input id="alt_email" name="alt_email" type="email" class="form-control " value="{{$contact->alt_email}}">
                        @error('alt_email')
                            <div class="alert alert-danger" role="alert">
                            {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 form-group">
                        <label for="whatsapp" class="control-label mb-1">Whatsapp no:</label>
                        <input id="whatsapp" name="whatsapp" type="phone" class="form-control " value="{{$contact->whatsapp}}">
                        @error('whatsapp')
                            <div class="alert alert-danger" role="alert">
                            {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="map" class="control-label mb-1">Map Link</label>
                        <input id="map" name="map" type="text" class="form-control " value="{{$contact->map}}">
                        @error('map')
                            <div class="alert alert-danger" role="alert">
                            {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group has-success">
                        <label for="meta_title" class="control-label mb-1">Meta Title</label>
                        <input id="meta_title" name="meta_title" type="text" class="form-control " value="{{$contact?->meta_title}}">
                        @error('meta_title')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col form-group has-success">
                        <label for="meta_desc" class="control-label mb-1">Meta Desc</label>
                        <input id="meta_desc" name="meta_desc" type="text" class="form-control " value="{{$contact?->meta_desc}}">
                        @error('meta_desc')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <hr style=" border-top: 2px dashed  #4272d7;">
                <div class="row">
                    <div class="col form-group has-success">
                        <label class="control-label mb-1">Other Details & links</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="image" class="control-label mb-1">Footer Image</label>
                        <input id="image" name="image" type="file" class="form-control " value="{{$contact->ft_image}}">
                        @error('image')
                            <div class="alert alert-danger" role="alert">
                            {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <img src="{{asset('images/'.$contact->ft_image)}}" width="80px" >
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="yt_link" class="control-label mb-1">Youtube Link</label>
                        <input id="yt_link" name="yt_link" type="text" class="form-control " value="{{$contact->yt_link}}">
                    </div>
                    <div class="col form-group">
                        <label for="fb_link" class="control-label mb-1">Facebook Link</label>
                        <input id="fb_link" name="fb_link" type="text" class="form-control " value="{{$contact->fb_link}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="insta_link" class="control-label mb-1">Instagram Link</label>
                        <input id="insta_link" name="insta_link" type="text" class="form-control " value="{{$contact->insta_link}}">
                    </div>
                    <div class="col form-group">
                        <label for="x_link" class="control-label mb-1">X Link</label>
                        <input id="x_link" name="x_link" type="text" class="form-control " value="{{$contact->x_link}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="pt_link" class="control-label mb-1">Pinterest Link</label>
                        <input id="pt_link" name="pt_link" type="text" class="form-control " value="{{$contact->pt_link}}">
                    </div>
                    <div class="col form-group">
                        <label for="linked_link" class="control-label mb-1">Linkeden Link</label>
                        <input id="linked_link" name="linked_link" type="text" class="form-control " value="{{$contact->linked_link}}">
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