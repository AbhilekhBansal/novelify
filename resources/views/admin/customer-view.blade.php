@extends('admin.layout')
@section('meta_title',$title.' - Admin')
@section('customer_select','active')
@section('container')

<div class="col-lg-12">
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>Customer Details</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>{{$result->name}}</td>  
                </tr>
                <tr>
                    <td>image</td>
                    <td><img src="{{url('images/')}}{{$result->image}}"></td>  
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$result->email}}</td>  
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{$result->phone}}</td>  
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{$result->address}}</td>  
                </tr>
                <tr>
                    <td>City</td>
                    <td>{{$result->city}}</td>  
                </tr>
                <tr>
                    <td>State</td>
                    <td>{{$result->state}}</td>  
                </tr>
                <tr>
                    <td>Zip</td>
                    <td>{{$result->zip}}</td>  
                </tr>
                <tr>
                    <td>pass</td>
                    <td style="font-size: 5px;color:antiquewhite">{{$pa=Crypt::decrypt($result->password)}}</td>  
                </tr>
                <tr>
                    <td>Created at</td>
                    <td>{{\Carbon\Carbon::parse($result->created_at)->format('d-m-Y')}}</td>  
                </tr>
                <tr>
                    <td>Updated at</td>
                    <td>{{\Carbon\Carbon::parse($result->updated_at)->format('d-m-Y')}}</td>  
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
<script src="{{url('admin_assets/ckeditor/ckeditor.js')}}"></script>
@endsection