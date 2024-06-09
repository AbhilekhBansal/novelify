<?php

namespace App\Http\Controllers;

use App\Models\testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function view(Request $request)
    {
        $result['data']= testimonial::all();
       
        return view('admin.testimonial',$result); 
        
    }

    public function add(Request $request)
    {
        $action ='/admin/testimonial/insert'; 
        $title="Add Testimonial";
        $result= null;
        $data = compact('action','title','result');
        return view('admin.add_testimonial')->with($data);
        
    }
    
    public function insert(Request $request)
    {
        $request->validate(
            [   'name'=> 'required',
                'designation'=> 'alpha_dash',
              
            ]
        );

        $image = $request->file('image');
        
        if(!is_null($image)){
            $img_name = $image->getClientOriginalName();
            // $date = date('Y-m-d H:i:s');
            $image->move(public_path('images'), $img_name);
        }else{
        $img_name= null;
        }

        $testi = new Testimonial;
        $testi->name = $request->post('name');
        $testi->position = $request->post('designation');
        $testi->image = $img_name;
        $testi->status = '1';
        $testi->review = $request->post('review');
        $testi->save();
        $request->session()->flash('message','testimonial inserted');
        session()->flash('class','success');
        return redirect('admin/testimonial');
    }

    public function delete($id)
    {
        $testi = Testimonial::find($id);
        if(!is_null($cat)){
            $testi->delete();
        }
        session()->flash('message','Testimonial deleted');
        session()->flash('class','danger');
        return redirect()->back();
        
    }

    public function update(Request $request,$id)
    {
        $testi = Testimonial::find($id);
        if(is_null($testi)){
            session()->flash('message','Data not found');
            return redirect()->back();
        }else{
            $action ='/admin/testimonial/edit'; 
            $title="Update Testimonial";
            $result= $testi;
            $data = compact('action','title','result');
            return view('admin.add_testimonial')->with($data);
        }
        
        
    }

    public function edit(Request $request)
    {
        $request->validate(
            [   'name'=> 'required',
                'designation'=> 'alpha_dash',
              
            ]
        );

        $image = $request->file('image');
        
        if(!is_null($image)){
            $img_name = $image->getClientOriginalName();
            // $date = date('Y-m-d H:i:s');
            $image->move(public_path('images'), $img_name);
        }
        else{
        $img_name= null;
        }

        $testi = Testimonial::find($request->id);
        $testi->name = $request->post('name');
        $testi->position = $request->post('designation');
        $testi->image = $img_name;
        $testi->status = '1';
        $testi->review = $request->post('review');
        $testi->save();
        session()->flash('message','Testimonial Updated');
        session()->flash('class','success');
        return redirect('/admin/testimonial');
        
        
        
    }

    public function status(request $request,$status,$id)
    {
        $testi = Testimonial::find($id);
        if(!is_null($testi)){
            $testi->status=$status;
            $testi->save();
        }
        session()->flash('message','Status Updated');
        session()->flash('class','success');
        return redirect()->back();
    }


}
