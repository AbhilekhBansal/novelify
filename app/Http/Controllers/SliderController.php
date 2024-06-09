<?php

namespace App\Http\Controllers;

use App\Models\slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function view(Request $request)
    {
        $result['data']= slider::all();
       
        return view('admin.slider',$result);
        
    }

    public function add(Request $request)
    {
        $action ='/admin/slider/insert'; 
        $title="Add slider";
        $result= null;
        $data = compact('action','title','result');
        return view('admin.add_slider')->with($data);
        
    }
    
    public function insert(Request $request)
    {
        $request->validate(
            [   'heading'=> 'required',
                'title'=> 'required',
                'btn_link'=> 'required',
              
            ]
        );

        $image = $request->file('image');
        
        if(!is_null($image)){
            $img_name = $image->getClientOriginalName();
            $image->move(public_path('images'), $img_name);
        }else{
        $img_name= null;
        }

        $slider = new slider;
        $slider->image =  $img_name;
        $slider->heading = $request->post('heading');
        $slider->title = $request->post('title');
        $slider->slider_text = $request->post('slider_text');
        $slider->btn_link = $request->post('btn_link');
        $slider->status = 1;
        $slider->save();
        $request->session()->flash('message','Slider inserted');
        session()->flash('class','success');
        return redirect('admin/slider');
    }

    public function delete($id)
    {
        $slider = slider::find($id);
        if(!is_null($slider)){
            $slider->delete();
        }
        session()->flash('message','slider deleted');
        session()->flash('class','danger');
        return redirect()->back();
        
    }

    public function update(Request $request,$id)
    {
        $slider = slider::find($id);
        if(is_null($slider)){
            session()->flash('message','Data not found');
            return redirect()->back();
        }else{
            $action ='/admin/slider/edit'; 
            $title="Update slider";
            $result= $slider;
            $data = compact('action','title','result');
            return view('admin.add_slider')->with($data);
        }
        
        
    }

    public function edit(Request $request)
    {
        $request->validate(
            [   'heading'=> 'required',
                'title'=> 'required',
                'btn_link'=> 'required',
              
            ]
        );

        $image = $request->file('image');

        if($image != ''){

        $img_name = $image->getClientOriginalName();
        $image->move(public_path('images'), $img_name);

        $slider = slider::find($request->id);
        $slider->image =  $img_name;
        $slider->heading = $request->post('heading');
        $slider->title = $request->post('title');
        $slider->slider_text = $request->post('slider_text');
        $slider->btn_link = $request->post('btn_link');
        $slider->status = 1;
        $slider->save();
        }
        else{
            $slider = slider::find($request->id);
            $slider->heading = $request->post('heading');
            $slider->title = $request->post('title');
            $slider->slider_text = $request->post('slider_text');
            $slider->btn_link = $request->post('btn_link');
            $slider->status = 1;
            $slider->save();
        }
        session()->flash('message','Slider Updated');
        session()->flash('class','success');
        return redirect('/admin/slider');
        
        
        
    }

    public function status(request $request,$status,$id)
    {
        $slider = slider::find($id);
        if(!is_null($slider)){
            $slider->status=$status;
            $slider->save();
        }
        session()->flash('message','Status Updated');
        session()->flash('class','success');
        return redirect()->back();
        
    }
}
