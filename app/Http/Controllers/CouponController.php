<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function view(Request $request)
    {
        $result['data']= Coupon::all();
       
        return view('admin.coupon',$result); 
        
    }

    public function add(Request $request)
    {
        $action ='/admin/coupon/insert'; 
        $title="Add Coupon";
        $result= null;
        $data = compact('action','title','result');
        return view('admin.add_coupon')->with($data);
        
    }
    
    public function insert(Request $request)
    {
        $request->validate(
            [   'title'=> 'required',
                'code'=> 'required|unique:coupons',
                'value'=> 'required',
              
            ]
        );

        $cat = new Coupon;
        $cat->title = $request->post('title');
        $cat->code = $request->post('code');
        $cat->value = $request->post('value');
        $cat->status = '1';
        $cat->type = $request->post('type');
        $cat->min_order_amt = $request->post('min_order_amt');
        $cat->is_one_time = $request->post('is_one_time');
        $cat->save();
        $request->session()->flash('message','Coupon inserted');
        session()->flash('class','success');
        return redirect('admin/coupon');
    }

    public function delete($id)
    {
        $cat = Coupon::find($id);
        if(!is_null($cat)){
            $cat->delete();
        }
        session()->flash('message','Coupon deleted');
        session()->flash('class','danger');
        return redirect()->back();
        
    }

    public function update(Request $request,$id)
    {
        $cat = Coupon::find($id);
        if(is_null($cat)){
            session()->flash('message','Data not found');
            return redirect()->back();
        }else{
            $action ='/admin/coupon/edit'; 
            $title="Update Coupon";
            $result= $cat;
            $data = compact('action','title','result');
            return view('admin.add_coupon')->with($data);
        }
        
        
    }

    public function edit(Request $request)
    {
        $request->validate(
            [   'title'=> 'required',
                'code'=> 'required',
                'value'=> 'required',
              
            ]
        );

        $cat = Coupon::find($request->id);
        $cat->title = $request->post('title');
        $cat->code = $request->post('code');
        $cat->value = $request->post('value');
        $cat->type = $request->post('type');
        $cat->min_order_amt = $request->post('min_order_amt');
        $cat->is_one_time = $request->post('is_one_time');
        $cat->save();
        session()->flash('message','Coupon Updated');
        session()->flash('class','success');
        return redirect('/admin/coupon');
        
        
        
    }

    public function status(request $request,$status,$id)
    {
        $cat = Coupon::find($id);
        if(!is_null($cat)){
            $cat->status=$status;
            $cat->save();
        }
        session()->flash('message','Status Updated');
        session()->flash('class','success');
        return redirect()->back();
    }
}
