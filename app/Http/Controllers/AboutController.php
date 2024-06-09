<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function update(Request $request)
    {
        $result['about'] = about::find(1);
        // prx($result);
        if(is_null($result['about'])){
            session()->flash('message','Data not found');
            return redirect()->back();
        }else{
            return view('admin.add_about',$result);
        }
        
        
    }

    public function edit(Request $request)
    {
        $request->validate(
            [   'title'=> 'required',
                'desc'=> 'required',
            ]
        );

        $image = $request->file('image');

        if(!is_null($image)){

            $img_name = $image->getClientOriginalName();
            $image->move(public_path('images'), $img_name);

            $about = about::find($request->id);
            $about->title = $request->post('title');
            $about->about_image = $img_name;
            $about->about_desc = $request->post('desc');
            $about->meta_title = $request->post('meta_title');
            $about->meta_desc = $request->post('meta_desc');
            $about->save();
        }else{
            $about = about::find($request->id);
            $about->title = $request->post('title');
            $about->about_image = "";
            $about->about_desc = $request->post('desc');
            $about->meta_title = $request->post('meta_title');
            $about->meta_desc = $request->post('meta_desc');
            $about->save();
        }    
        session()->flash('message','About Updated');
        session()->flash('class','success');
        return redirect('/admin/about');
        
        
        
    }
}
