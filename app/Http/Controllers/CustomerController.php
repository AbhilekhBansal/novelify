<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function view(Request $request)
    {
        $result= Customer::all();
        $data = compact('result');
        return view('admin.customer')->with($data);
        
    }
    
    public function show(Request $request,$id)
    {
        $customer = Customer::find($id);
        if(is_null($customer)){
            session()->flash('message','Data not found');
            return redirect()->back();
        }else{ 
            $title="Customers";
            $result= $customer;
            $data = compact('title','result');
            return view('admin.customer-view')->with($data);
        }
        
        
    }


    public function status(request $request,$status,$id)
    {
        $customer = Customer::find($id);
        if(!is_null($customer)){
            $customer->status=$status;
            $customer->save();
        }
        session()->flash('message','Status Updated');
        session()->flash('class','success');
        return redirect()->back();
    }


}
