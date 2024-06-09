@extends('admin/layout')
@section('meta_title','Category - Admin')
@section('category_select','active')
@section('container')
<h3>Manage Category</h3>
<div class="row m-t-30">
    
    <div class="col-md-12">
        <!-- DATA TABLE-->

            @if(session('message')!="")
            <div class="sufee-alert alert with-close alert-{{session('class')}} alert-dismissible fade show" style="display: inline-flex;">
                {{session('message')}}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @endif
            <h4 class="add-btn m-2"><a href="/admin/category/add"><button type="button" class="btn btn-primary btn-sm">Add Category</button></a></h4>
        
        
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Sr.no:</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->category_name}}</td>
                        <td>{{$item->category_slug}}</td>
                        <td>
                            @if($item->status == 1)
                                <a href="{{url('/admin/category/status/0')}}/{{$item->id}}"><button type="button" class="btn btn-outline-success btn-sm m-2">Active</button></a>
                                @elseif($item->status == 0)
                                <a href="{{url('/admin/category/status/1')}}/{{$item->id}}"><button type="button" class="btn btn-outline-warning btn-sm m-2">Deactive</button></a>

                            @endif

                        </td>
                        <td>
                            <a href="{{route('category.update',['id'=>$item->id])}}"><button type="button" class="btn btn-outline-primary btn-sm m-2">Edit</button></a>
                            <a href="{{route('category.delete',['id'=>$item->id])}}"><button type="button" class="btn btn-outline-danger btn-sm m-2">Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection