<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Illuminate\Http\Request;

class notificationController extends Controller
{
    //
    

    public function update(Request $request,$id)
    {
        $slider = notification::find($id);
        if(is_null($slider)){
            session()->flash('message','Data not found');
            return redirect()->back();
        }else{
            $action ='/admin/slider/edit'; 
            $title="Update slider";
            $result= $slider;
            $data = compact('action','title','result');
            return view('admin.notification')->with($data);
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

        $slider = notification::find($request->id);
        $slider->image =  $img_name;
        $slider->heading = $request->post('heading');
        $slider->title = $request->post('title');
        $slider->slider_text = $request->post('slider_text');
        $slider->btn_link = $request->post('btn_link');
        $slider->status = 1;
        $slider->save();
        }
        else{
            $slider = notification::find($request->id);
            $slider->heading = $request->post('heading');
            $slider->title = $request->post('title');
            $slider->slider_text = $request->post('slider_text');
            $slider->btn_link = $request->post('btn_link');
            $slider->status = 1;
            $slider->save();
        }
        session()->flash('message','Slider Updated');
        session()->flash('class','success');
        return redirect('/admin/notification');
        
        
        
    }
}
