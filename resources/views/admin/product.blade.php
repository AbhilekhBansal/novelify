@extends('admin/layout')
@section('meta_title','Product - Admin')
@section('product_select','active')
@section('container')
<h3>Manage Products</h3>
<div class="row m-t-30">
    
    <div class="col-md-12">
        <!-- DATA TABLE-->
        
            @if(session('message')!="")
            <div class="sufee-alert alert with-close alert-{{session('class')}} alert-dismissible fade show" style="display: inline-flex;" id="alert_box">
                {{session('message')}}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @endif
            <h4 class="add-btn m-2"><a href="/admin/product/add"><button type="button" class="btn btn-primary btn-sm">Add Product</button></a></h4>
        
        
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Sr.no:</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>rating</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td><img src="{{asset('images/'.$item->image)}}" width="80px"></td>
                        <td>₹{{$item->price}}</td>
                        <td>{{$item->rating}}★</td>
                        <td>
                            @foreach($cat_data as $i)
                                @if($i?->id==$item->category_id)
                                {{$i->category_name}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @if($item->status == 1)
                                <a href="{{url('/admin/product/status/0')}}/{{$item->id}}"><button type="button" class="btn btn-outline-success btn-sm m-2">Active</button></a>
                            @elseif($item->status == 0)
                                <a href="{{url('/admin/product/status/1')}}/{{$item->id}}"><button type="button" class="btn btn-outline-warning btn-sm m-2">Deactive</button></a>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('product.update',['id'=>$item->id])}}"><button type="button" class="btn btn-outline-primary btn-sm m-2">Edit</button></a>
                            <a href="{{route('product.delete',['id'=>$item->id])}}"><button type="button" class="btn btn-outline-danger btn-sm m-2">Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
<script>
    setTimeout(() => {
  const box = document.getElementById('alert_box');

  // 👇️ removes element from DOM
  box.style.display = 'none';

  // 👇️ hides element (still takes up space on page)
  // box.style.visibility = 'hidden';
}, 1000); // 👈️ time in milliseconds

</script>
@endsection