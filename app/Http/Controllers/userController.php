<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cust;

class userController extends Controller
{
    function create(){
        $url = url('/customer/store');
        $title="Registration Form";
        $Customers = null;
        $data = compact('url','title','Customers');
      //  dd($data);

    return view('form')->with($data);
    }

    public function home(){
        return view('home');
    }

    function store(request $request){
        
        $request->validate(
            [   'name'=> 'required',
                'phone'=> 'required',
                'email'=> 'required|email',
                'address'=> 'required',    
                
            ]);
        
        $data = $request->all();

        $image = $request->file('image');
        $img_name = $image->getClientOriginalName();
        $image->move(public_path('images'), $img_name);

        $Customers = new Cust;
        $Customers->name = $request['name'];
        $Customers->phone = $request['phone'];
        $Customers->image = $img_name;
        $Customers->email = $request['email'];
        $Customers->address = $request['address'];
        $Customers->save();
        
        // echo 'data is submitted';
        return response()->json(['success'=>'Data is successfully added']);
        
    }

    public function view(){
        $Customers = Cust::all();
        $dataa = compact('Customers');
        
        return view('/customer-view')->with($dataa);
    }

    public function trash_view(){
        $Customers = Cust::onlyTrashed()->get();
        $dataa = compact('Customers');
        
        return view('/customer-trash')->with($dataa);
    }

    public function delete($id){
        $Customers = Cust::find($id);
        if(!is_null($Customers)){
            $Customers->delete();
        }
        return redirect()->back();
    }

    public function forceDelete($id){
        $Customers = Cust::withTrashed()->find($id);
        if(!is_null($Customers)){
            $Customers->forceDelete();
        }
        return redirect()->back();
    }


    public function edit($id){
        $Customers = Cust::find($id);
        if(is_null($Customers)){
            echo 'Customer Not Found';
            // return redirect()->back();
        }else{
            $url  = url('/customer/update').'/'.$id;
            $title = "Edit Form";
            $data= compact('url','Customers','title');

            return view('form')->with($data);
        }
        
    }

    public function restore($id){
        $Customers = Cust::withTrashed()->find($id);
        if(!is_null($Customers)){
            $Customers->restore();
        }
        return redirect()->back();
        
    }

    public function update($id,request $request){
        $request->validate(
            [   'name'=> 'required',
                'phone'=> 'required',
                'email'=> 'required|email',
                'address'=> 'required',
                
            ]

        );
        $image = $request->file('image');
        if($image != ''){

        
        $img_name = $image->getClientOriginalName();
        $image->move(public_path('images'), $img_name);

        $Customers = Cust::find($id);
        $Customers->name = $request->name;
        $Customers->phone = $request->phone;
        $Customers->image = $img_name;
        $Customers->email = $request->email;
        $Customers->address = $request->address;
        $Customers->save();

        }else{
            $Customers = Cust::find($id);
        $Customers->name = $request->name;
        $Customers->phone = $request->phone;
        $Customers->email = $request->email;
        $Customers->address = $request->address;
        $Customers->save();
        }
        
        

    }
}
