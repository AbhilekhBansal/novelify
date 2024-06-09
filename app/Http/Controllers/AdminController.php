<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }else{
            // $request->session()->flash('error','Access Denied');
            return view('admin.login');
        }
        return view('admin.login');
        
    }

    public function auth(request $request)
    {
        $request->validate(
            [ 
                'email'=> 'required|email',     
            ]
        );

        $email= $request->post("email");
        $password= $request->post("password");

       // $result= Admin::where(['email'=>$email,'password'=>$password])->get();
       $result= Admin::where(['email'=>$email])->first();
        if(isset($result)){
            if(Hash::check($request->post("password"),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                $request->session()->put('ADMIN_NAME',$result->name);
                $request->session()->put('ADMIN_EMAIL',$result->email);
                return redirect('admin/dashboard');
            }else{
                $request->session()->flash('error','Please enter correct password');
                return redirect('admin');
            }
        }else{
            $request->session()->flash('error','Please enter valid login');
            return redirect('admin');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function view(Request $request)
    {
        //
        return view('admin.dashboard');
    }

    // public function updatepass()
    // {
    //     //
    //    $r= Admin::find(1);
    //    $r->password=Hash::make('abhi@123');
    //    $r->save();
    // }

    public function updatepass(){

        $data=admin::first();
        dd( $data);
        die();
        $data->password=Hash::make('Abhi@123');
        $data->save();

        
    }
    
}
