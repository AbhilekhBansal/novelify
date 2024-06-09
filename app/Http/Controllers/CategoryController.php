<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function view(Request $request)
    {
        $result['data']= Category::all();
       
        return view('admin.category',$result);
        
    }

    public function add(Request $request)
    {
        $action ='/admin/category/insert'; 
        $title="Add Category";
        $result= null;
        $new_tag= 0;
        $parent_data=DB::table('category')->where(['status' => 1])->get();
        $data = compact('action','title','result','parent_data','new_tag');
        return view('admin.add_category')->with($data);
        
    }
    
    public function insert(Request $request)
    {
        $request->validate(
            [   'category_name'=> 'required',
                'category_slug'=> 'required|unique:category',
                'parent_category_id'=> 'required',
              
            ]
        );

        $image = $request->file('category_image');
        
        if(!is_null($image)){
            $img_name = $image->getClientOriginalName();
            $image->move(public_path('images'), $img_name);
        }else{
        $img_name= null;
        }
        
        $cat = new category;
        $cat->category_name = $request->post('category_name');
        $cat->category_slug = $request->post('category_slug');
        $cat->parent_category_id = $request->post('parent_category_id');
        $cat->category_image = $img_name;
        $cat->status = 1;
        $cat->tag = $request->post('new_tag');
        $cat->save();
        $request->session()->flash('message','Category created');
        session()->flash('class','success');
        return redirect('admin/category');
    }

    public function delete($id)
    {
        $cat = category::find($id);
        if(!is_null($cat)){
            $cat->delete();
        }
        session()->flash('message','Category deleted');
        session()->flash('class','danger');
        return redirect()->back();
        
    }

    public function update(Request $request,$id)
    {
        $cat = category::find($id);
        if(is_null($cat)){
            session()->flash('message','Data not found');
            return redirect()->back();
        }else{
            $action ='/admin/category/edit'; 
            $title="Update Category";
            $result= $cat;
            $parent_data=DB::table('category')->where(['status' => 1])->get();
            $data = compact('action','title','result','parent_data');
            return view('admin.add_category')->with($data);
        }
        
        
    }

    public function edit(Request $request)
    {
        $request->validate(
            [   'category_name'=> 'required',
                'category_slug'=> 'required',
                
              
            ]
        );

        $image = $request->file('category_image');
        
        if(!is_null($image)){
            $img_name = $image->getClientOriginalName();
            $image->move(public_path('images'), $img_name);
        }else{
        $img_name= null;
        }
        $cat = category::find($request->id);
        $cat->category_name = $request->post('category_name');
        $cat->category_slug = $request->post('category_slug');
        $cat->parent_category_id = $request->post('parent_category_id');
        $cat->category_image = $img_name;
        $cat->status = 1;
        $cat->tag = $request->post('new_tag');
        $cat->save();
        session()->flash('message','Category Updated');
        session()->flash('class','success');
        return redirect('/admin/category');
        
        
        
    }

    public function status(request $request,$status,$id)
    {
        $cat = category::find($id);
        if(!is_null($cat)){
            $cat->status=$status;
            $cat->save();
        }
        session()->flash('message','Status Updated');
        session()->flash('class','success');
        return redirect()->back();
        
    }
}
