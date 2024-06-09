<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function update(Request $request)
    {
        $result['contact'] = contact::find(1);
        // prx($result);
        if(is_null($result['contact'])){
            session()->flash('message','Data not found');
            return redirect()->back();
        }else{
            return view('admin.add_contact',$result);
        }
        
        
    }

    public function edit(Request $request)
    {
        $request->validate(
            [   'address'=> 'required',
                'phone'=> 'required',
                'email'=> 'required',
            ]
        );

        $image = $request->file('image');

        if(!is_null($image)){

            $img_name = $image->getClientOriginalName();
            $image->move(public_path('images'), $img_name);

        }else{
            $img_name=null;
        }    

        $contact = contact::find($request->id);
        $contact->address = $request->post('address');
        $contact->ft_image = $img_name;
        $contact->phone = $request->post('phone');
        $contact->alt_phone = $request->post('alt_phone');
        $contact->email = $request->post('email');
        $contact->alt_email = $request->post('alt_email');
        $contact->whatsapp = $request->post('whatsapp');
        $contact->map = $request->post('map');
        $contact->meta_title = $request->post('meta_title');
        $contact->meta_desc = $request->post('meta_desc');	
        $contact->yt_link = $request->post('yt_link');
        $contact->fb_link = $request->post('fb_link');
        $contact->insta_link = $request->post('insta_link');
        $contact->linked_link = $request->post('linked_link');
        $contact->pt_link = $request->post('pt_link');
        $contact->x_link = $request->post('x_link');

        $contact->save();

        session()->flash('message','Contact Details Updated');
        session()->flash('class','success');
        return redirect('/admin/contact');
        
        
        
    }
}
