<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;


class ProductController extends Controller
{
    public function view(Request $request)
    {
        $result= Product::all();
        $cat_data=DB::table('category')->where(['status' => 1])->get();
        $data = compact('result','cat_data');
        return view('admin.product')->with($data);
        
    }

    public function add(Request $request)
    {
        $action ='/admin/product/insert'; 
        $title="Add Product";
        $result= null;
        $product_images=null;
        $cat_data=DB::table('category')->where(['status' => 1])->get();
        $data = compact('action','title','result','cat_data','product_images');
        return view('admin.add_product')->with($data);
        
    }
    
    public function insert(Request $request)
    {
        $request->validate(
            [   'name'=> 'required',
                'slug'=> 'required|unique:products,slug',
                'price'=> 'required',
                'category'=> 'required|integer',
              
            ]
        );

        $image = $request->file('image');
        
        if(!is_null($image)){
            $img_name = $image->getClientOriginalName();
            $date = date('Y-m-d H:i:s');
            $image->move(public_path('images'), $date+$img_name);
        }else{
        $img_name= null;
        }
        $product = new Product;
        $product->name = $request->post('name');
        $product->image = $img_name;
        $product->category_id = $request->post('category');
        $product->author = $request->post('author');
        $product->author_desc = $request->post('author_desc');
        $product->desc = $request->post('desc');
        $product->price = $request->post('price');
        $product->slug = $request->post('slug');
        $product->rating = $request->post('rating');
        $product->feature = $request->post('feature');
        $product->is_promo = $request->post('is_promo');
        $product->is_discounted = $request->post('is_discounted');
        $product->is_trending = $request->post('is_trending');
        $product->keywords = $request->post('keyword');
        $product->status = "1";
        $product->save();
        $product_id = $product->id;
        
        if(!$request->images==""){
           
            foreach($request->images as $img){
                $img_name = $img->getClientOriginalName();
                $date = date('Y-m-d');
                $img->move(public_path('images'),$date.$img_name);
                $arr = ['product_id'=>$product_id,'images'=>$date.$img_name]; 
                DB::table('product_images')->insert($arr);
            }
            
        }
        
        $request->session()->flash('message','product inserted');
        session()->flash('class','success');
        return redirect('admin/product');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if(!is_null($product)){
            $product->delete();
        }
        session()->flash('message','product deleted');
        session()->flash('class','danger');
        return redirect()->back();
        
    }

    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        if(is_null($product)){
            session()->flash('message','Data not found');
            return redirect()->back();
        }else{
            $action ='/admin/product/edit'; 
            $title="Update product";
            $result= $product;
            $cat_data=DB::table('category')->where(['status' => 1])->get();
            $product_images=DB::table('product_images')->where(['product_id' =>$result->id])->get();
            // prx($product_images);
            $data = compact('action','title','result','cat_data','product_images');
            // prx($product_images);
            return view('admin.add_product')->with($data);
        }
        
        
    }

    public function edit(Request $request)
    {
        $request->validate(
            [   'name'=> 'required',
                'slug'=> 'required|',
                'price'=> 'required',
                'category'=> 'required|integer',
              
            ]
        );
        $image = $request->file('image');

        if($image != ''){

        $img_name = $image->getClientOriginalName();
        $image->move(public_path('images'), $img_name);

        $product = Product::find($request->id);
        $product->name = $request->post('name');
        $product->image = $img_name;
        $product->category_id = $request->post('category');
        $product->author = $request->post('author');
        $product->author_desc = $request->post('author_desc');
        $product->desc = $request->post('desc');
        $product->price = $request->post('price');
        $product->slug = $request->post('slug');
        $product->rating = $request->post('rating');
        $product->feature = $request->post('feature');
        $product->is_promo = $request->post('is_promo');
        $product->is_discounted = $request->post('is_discounted');
        $product->is_trending = $request->post('is_trending');
        $product->keywords = $request->post('keyword');
        $product->save();
        }
        else{
        $product = Product::find($request->id);
        $product->name = $request->post('name');
        $product->category_id = $request->post('category');
        $product->author = $request->post('author');
        $product->author_desc = $request->post('author_desc');
        $product->desc = $request->post('desc');
        $product->price = $request->post('price');
        $product->slug = $request->post('slug');
        $product->rating = $request->post('rating');
        $product->feature = $request->post('feature');
        $product->is_promo = $request->post('is_promo');
        $product->is_discounted = $request->post('is_discounted');
        $product->is_trending = $request->post('is_trending');
        $product->keywords = $request->post('keyword');
        $product->save();
        }

        if(!$request->images==""){
            $date = date('Y-m-d');
            foreach($request->images as $img){
                $img_name = $img->getClientOriginalName();
                $img->move(public_path('images'),$date.$img_name);
                $arr = ['product_id'=>$request->id,'images'=>$date.$img_name]; 
                DB::table('product_images')->insert($arr);
            }
            
        }

        session()->flash('message','product Updated');
        session()->flash('class','success');
        return redirect('/admin/product');
        
        
        
    }

    public function status(request $request,$status,$id)
    {
        $product = Product::find($id);
        if(!is_null($product)){
            $product->status=$status;
            $product->save();
        }
        session()->flash('message','Status Updated');
        session()->flash('class','success');
        return redirect()->back();
    }

    public function product_images_delete(request $request,$id)
    {
        $product = DB::table('product_images')->where('id', $id)->get();
        if(File::exists('images/'.$product[0]->images)){
            // Storage::delete('images/'.$product[0]->images);
            File::delete('images/'.$product[0]->images);
            DB::table('product_images')->where('id', $id)->delete();
        }else{
            dd('File does not exists.');
            die();
        }
        
        session()->flash('message','Deleted successfully');
        return redirect()->back();
    }

    public function getProducts(Request $request){

        $result= Product::all();
        // $cat_data=DB::table('category')->where(['status' => 1])->get();
        // $data = compact('result','cat_data');
        return response()->json(['status'=>200,'data'=>$result]);
    }
}
