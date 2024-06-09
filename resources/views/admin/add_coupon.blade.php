@extends('admin.layout')
@section('meta_title','Add Coupon - Admin')
@section('coupon_select','active')
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
                        <label for="title" class="control-label mb-1">Coupon Name</label>
                        <input id="title" name="title" type="text" class="form-control " value="{{$result?->title}}">
                        @error('title')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="code" class="control-label mb-1">Coupon Code</label>
                        <input id="code" name="code" type="text" class="form-control " value="{{$result?->code}}">
                        @error('code')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="value" class="control-label mb-1">Coupon value</label>
                        <input id="value" name="value" type="text" class="form-control " value="{{$result?->value}}">
                        @error('value')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="type" class="control-label mb-1">Coupon Type</label>
                        <select name="type" id="type" class="form-control ">
                            <option value="">Select Option</option>
                            
                            @if($result?->type=="Value")
                                <option selected value="Value">Value</option>
                                <option value="Per">Per</option>
                            @else
                                <option value="Value">Value</option>
                                <option selected value="Per">Per</option>
                            @endif
                            
                          </select>
                        @error('type')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="min_order_amt" class="control-label mb-1">Min. Order Amount</label>
                        <input id="min_order_amt" name="min_order_amt" type="text" class="form-control " value="{{$result?->min_order_amt}}">
                        @error('min_order_amt')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="is_one_time" class="control-label mb-1">Is One Time</label>
                        <select name="is_one_time" id="is_one_time" class="form-control ">
                            <option value="">Select Option</option>
                            
                            @if($result?->is_one_time==1)
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            @else
                            <option value="1">Yes</option>
                            <option selected value="0">No</option>
                            @endif
                            
                          </select>
                        @error('value')
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
@endsection