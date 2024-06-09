<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Crypt;
use Mail;

class FrontController extends Controller
{

    public function index(request $request)
    { 
        
        $result['home_cat'] = DB::table('category')
                ->where(['status'=>1])
                ->where(['parent_category_id'=>2])
                ->get();
        $result['home_product'] = DB::table('products')
                ->where(['status'=>1])
                ->get();
        $result['feature_product'] = DB::table('products')
                ->where(['status'=>1])
                ->where(['feature'=>1])
                ->get();
        $result['slider'] = DB::table('sliders')
                ->where(['status'=>1])
                ->get();                   
                // echo "<pre>";
                // print_r($result);
                // die();
        return view('frontend.index',$result);
        
    }

//     public function product_view(request $request)
//     { 

//         return view('frontend.product');
        
//     }

    public function product_detail_view(request $request,$slug)
    { 
        $result['product'] = DB::table('products')
                ->where(['status'=>1])
                ->where(['slug'=>$slug])
                ->get();
        $result['related_products']= DB::table('products')
                ->where(['status'=>1])
                ->where(['category_id'=>$result['product']['0']->category_id])
                ->where('id','!=',''.$result['product']['0']->id.'')
                ->get();
        $result['reviews'] = DB::table('reviews')
                ->where(['status'=>1])
                ->where(['p_id'=>$result['product'][0]->id])
                ->get();   
        $result['product_images'] = DB::table('product_images')
                ->where(['product_id'=>$result['product']['0']->id])
                ->get();
                //avarage rating 
                $temp=0;
                foreach($result['reviews'] as $rating){
                        $temp += $rating->rating;
                }
        if($temp>0){
                $result['avg_rating']= $temp/count($result['reviews']);
        }else{
                $result['avg_rating']= 0;  
        }    
                   
        // prx($result['product_images']);

        return view('frontend.product-details',$result);
        
    }
    

    public function add_to_cart(request $request)
    { 
        if($request->session()->has('FORNT_USER_LOGIN')){
                $uid=$request->session()->get('FORNT_USER_ID');
                $user_type = "Reg";
        }else{
                $uid=getUserTempId();
                $user_type = "Not-reg";
        }
        $product_id =$request->POST('product_id');
        $product_price =$request->POST('product_price');
        $quantity =$request->POST('quantity');

        $check = DB::table('cart')
                ->where(['user_id'=>$uid])
                ->where(['user_type'=>$user_type])
                ->where(['product_id'=>$product_id])
                ->where(['price'=>$product_price])
                ->get();
        if(isset($check[0])){
                $update_id = $check[0]->id;
                if($quantity==0){
                        DB::table('cart')
                        ->where(['id'=>$update_id])
                        ->delete();
                        $msg ="Removed"; 
                }else{
                        DB::table('cart')
                        ->where(['id'=>$update_id])
                        ->update(['quantity'=>$quantity]);
                        $msg ="updated"; 
                }

                               
        }else{
                $id = DB::table('cart')->insertGetId([
                        'user_id'=>$uid,
                        'user_type'=>$user_type,
                        'product_id'=>$product_id,
                        'price'=>$product_price,
                        'quantity'=>$quantity,
                        'status'=>'Not_Paid',
                        'added_on'=>date('Y-m-d h:i:s')
                ]);
                $msg = "Added";
        }
        return response()->json(['msg'=>$msg]);

        
    }
    //for view cart items
    public function cart(request $request){
        if($request->session()->has('FORNT_USER_LOGIN')){
                $uid=$request->session()->get('FORNT_USER_ID');
                $user_type = "Reg";
        }else{
                $uid=getUserTempId();
                $user_type = "Not-reg";
        }

        $res['result'] = DB::table('cart')
        ->leftJoin('products','products.id','=','cart.product_id')
        ->where(['user_id'=>$uid])
        ->where(['cart.status'=>'Not_Paid'])
        ->select('products.id','cart.quantity','products.name','products.image','products.price','products.slug')
        ->get();

        // prx( $result);

        return view('frontend.cart',$res);
    } 
    public function temp(){

    }
    public function category(request $request,$slug)
    { 
        $sort='';
        $sort_txt=null;
        $filter_price_from="";
        $filter_price_to="";
       
        
        $query = DB::table('category');
        $query = $query->leftJoin('products','category.id','=','products.category_id');
        $query = $query->where(['products.status'=>1]);
        $query = $query->where(['category.status'=>1]);
        $query = $query->where(['category_slug'=>'category/'.$slug]);
        
        if($request->get('sort')!==null){
                $sort=$request->get('sort');
        
                if($sort=='Price-lowest'){
                        $query = $query->orderBy('products.price','asc');
                        $sort_txt = "Price-lowest";
                }elseif($sort=='Price-highest'){
                        $query = $query->orderBy('products.price','desc');
                        $sort_txt = "Price-highest";
                }elseif($sort=='Most-rated'){
                        $query = $query->orderBy('products.rating','desc');
                        $sort_txt = "Most-rated";
                }elseif($sort=='Latest'){
                        $query = $query->orderBy('products.created_at','desc');
                        $sort_txt = "Latest";
                }
        }
        if($request->get('filter_price_from')!==null && $request->get('filter_price_to')!==null){
                $filter_price_from=$request->get('filter_price_from');
                $filter_price_to=$request->get('filter_price_to');

                if($filter_price_from>0 && $filter_price_to>0){
                        $query = $query->whereBetween('products.price',[$filter_price_from,$filter_price_to]);
                        
                }

        }        

        $result['category'] = DB::table('category')
                ->where(['status'=>1])
                ->where(['parent_category_id'=>2])
                ->get();

        $query = $query->get();
        $result['products'] = $query;
        // prx($result['products']);
        $result['slug'] = $slug;
        $result['sort'] = $sort;
        $result['sort_txt'] = $sort_txt;
        $result['filter_price_from'] = $filter_price_from;
        $result['filter_price_to'] = $filter_price_to;
        return view('frontend.category',$result);
        
    }

    public function search(request $request,$str)
    { 
        $query = DB::table('category');
        $query = $query->leftJoin('products','category.id','=','products.category_id');
        $query = $query->where('name','like',"%$str%");
        $query = $query->orwhere('author','like',"%$str%");
        $query = $query->orwhere('author_desc','like',"%$str%");
        $query = $query->orwhere('desc','like',"%$str%");
        $query = $query->orwhere('keywords','like',"%$str%");
        $query = $query->where(['category.status'=>1]);
        $query = $query->where(['products.status'=>1]);
        $query = $query->get();
        $result['products'] = $query;
        $result['str'] = $str;

        // prx($result['products']);
        return view('frontend.search',$result);
    }

    public function login(request $request)
    { 
        $result=[];
        $result['msg'] = "";
	$result['ret_msg'] = "";
        return view('frontend.login',$result);
    }
    
    public function login_process(request $request)
    { 
		$ret_msg="";  
		$valid=Validator::make($request->all(),[
                "user_email"=>"required|email",
                "password"=>"required",
       ]);
       
       if(!$valid->passes()){
        return redirect()->back()->withInput()->withErrors($valid);
       }else{
                $result = DB::table('customers')
                        ->where(["email"=>$request->user_email])
                        ->get();
                if(isset($result[0])){
                    $db_pwd=Crypt::decrypt($result[0]->password);
                    $status=$result[0]->status;
                    $is_verify=$result[0]->is_verify;
                        if($is_verify==0){
                                return  redirect()->back()->with('ret_msg','Please verify your email');
                        }
                        if($status==0){
                                return  redirect()->back()->with('ret_msg','your account has been deactivated');
                                }

                    if($db_pwd==$request->password){
                        if($request->keep_log===null){
                                setcookie('login_email',$request->user_email,7);
                                setcookie('login_pwd',$request->password,7);
                        }else{
                                setcookie('login_email',$request->user_email,time()+60*60*24*7);
                                setcookie('login_pwd',$request->password,time()+60*60*24*7);
                        }


                        $request->session()->put('FORNT_USER_LOGIN',true);
                        $request->session()->put('FORNT_USER_ID',$result[0]->id);
                        $request->session()->put('FORNT_USER_NAME',$result[0]->name);

                        $getUserTempId = getUserTempId();
                        DB::table('cart')
                                ->where(["user_id"=>$getUserTempId,
                                        "user_type"=>'Not-reg'])
                                ->update(['user_id'=>$result[0]->id,'user_type'=>'Reg']);

                        if($request->sub_txt=='login'){
                                return redirect('/');
                        }else{
                                return redirect()->back();
                        }       
                        
                    }else{
                        $ret_msg="Please enter valid password";
                    }
                }else{
                      $ret_msg="Please enter valid email ID";
                }
                // prx($ret_msg);			
		return  redirect()->back()->with('ret_msg',$ret_msg);
        }
       
    }

    public function registration(request $request)
    { 
		if($request->session()->has('FORNT_USER_LOGIN')!=null){
			return redirect('/');
		}
        $result=[];
        $result['msg'] = "";
        return view('frontend.registration',$result);
    }

    

    public function registration_process(request $request)
    { 
       $valid=Validator::make($request->all(),[
                "name"=>"required",
                "email"=>"required|email|unique:customers,email",
                "phone"=>"required|numeric|digits:10",
                "password"=>"required",
       ]);
       if(!$valid->passes()){
        return redirect()->back()->withInput()->withErrors($valid);
       }else{
		$rand_int=rand(11111111,99999999);
                $arr=[
                        "name"=>$request->name,
                        "email"=>$request->email,
                        "phone"=>$request->phone,
                        "password"=>Crypt::encrypt($request->password),
                        "status"=>"1",
			"is_verify"=>"0",
                        "is_forgot_password"=>"0",
			"rand_id"=>$rand_int,
                        "created_at"=>date('y-m-d h:m:s'),
                        "updated_at"=>date('y-m-d h:m:s')
                ];
                $query=DB::table('customers')->insert($arr);
                if($query){
                        //mailer formate
                        $data= ['name'=>$request->name,'rand_id'=>$rand_int];
                        $user['to']=$request->email;
                        Mail::send('frontend/email_verification',$data,function($message) use 
                        ($user){
                                $message->to($user['to']);
                                $message->subject('Email verification');
                        });
                        //end here
                        //email_verification is the template file that we are going to be view in user's mail


                        $result=[];
                        $result['msg'] = "success";
                        return redirect('login')->with($result);
                                     
                }
       }
    }

    public function verification(Request $request,$id){
        $result = DB::table('customers')
                ->where(["rand_id"=>$id])
                ->where(["is_verify"=>0])
                ->get();
        if(isset($result[0])){
                DB::table('customers')
                ->where(["id"=>$result[0]->id])
                ->update(['is_verify'=>1,'rand_id'=>'']);
           
                return view('frontend.verification');
        }else{
                return redirect('/');
        }
    }

    public function forgot_pass(Request $request){
        $rand_int=rand(11111111,99999999);
        $result = DB::table('customers')
                        ->where(["email"=>$request->f_email])
                        ->get();
                if(isset($result[0])){
                        DB::table('customers')
                                ->where(["email"=>$request->f_email])
                                ->update(['is_forgot_password'=>1,'rand_id'=>$rand_int,'is_verify'=>0]);

                        $data= ['name'=>$result[0]->name,'rand_id'=>$rand_int];
                        $user['to']=$request->f_email;
                        Mail::send('frontend/forgot_pass',$data,function($message) use 
                        ($user){
                                $message->to($user['to']);
                                $message->subject('Forgot Password');
                        });
                        return Redirect::back()->with('success_code', "Check your Email for password change");
                }else{
                        return Redirect::back()->with('error_code', "Your Email can't be found");
                }
        }
    
        public function forgot_password_change(Request $request,$id){
                $result = DB::table('customers')
                        ->where(["rand_id"=>$id])
                        ->where(["is_forgot_password"=>1])
                        ->where(["is_verify"=>0])
                        ->get();
                        
                if(isset($result[0])){
                        $request->session()->put('FORGOT_PASS_USER_ID',$result[0]->id);

                        return view('frontend.forgot_password_change');
                }else{
                        return redirect('/');
                }
        }

        public function forgot_password_change_proccess(Request $request){

                if($request->password == $request->c_password){
                        
                        DB::table('customers')
                                ->where(["id"=>$request->session()->get('FORGOT_PASS_USER_ID')])
                                ->update([
                                        'password'=>Crypt::encrypt($request->password),
                                        'rand_id'=>'',
                                        'is_forgot_password'=>0,
                                        'is_verify'=>1
                                ]);

                        return redirect('/');
                }else{
                        return redirect()->back()->with('msg','Please enter same password in conform password');
                }
                
        }

        public function checkout(Request $request){
               
                if(!getAddToCartTotalItem() == ''){
                        if($request->session()->has('FORNT_USER_LOGIN')){
                                $uid=$request->session()->get('FORNT_USER_ID');
                                $customer_info = DB::table('customers')
                                        ->where(["id"=>$uid])
                                        ->get();
                                $result['customer']['name'] = $customer_info[0]->name;
                                $result['customer']['email'] = $customer_info[0]->email;
                                $result['customer']['phone'] = $customer_info[0]->phone;
                                $result['customer']['address'] = $customer_info[0]->address;
                                $result['customer']['city'] = $customer_info[0]->city;
                                $result['customer']['state'] = $customer_info[0]->state;
                                $result['customer']['zip'] = $customer_info[0]->zip;
                                $result['customer']['name'] = $customer_info[0]->name;
                                $result['customer']['name'] = $customer_info[0]->name;
                        }else{
                                $uid=getUserTempId();
                                $result['customer']['name'] = '';
                                $result['customer']['email'] = '';
                                $result['customer']['phone'] = '';
                                $result['customer']['address'] = '';
                                $result['customer']['city'] = '';
                                $result['customer']['state'] = '';
                                $result['customer']['zip'] = '';
                                $result['customer']['name'] = '';
                                $result['customer']['name'] = '';
                               
                        }
                        $result['totalItem'] = DB::table('cart')
                                ->leftJoin('products','products.id','=','cart.product_id')
                                ->where(['user_id'=>$uid])
                                ->where(['cart.status'=>'Not_Paid'])
                                ->select('products.id','cart.quantity','products.name','products.image','products.price','products.slug')
                                ->get();

                        return view('frontend.checkout',$result);
                }else{
                        return redirect('/');
                }
        }

        public function apply_coupon_code(request $request)
        {       
                $arr =apply_coupon_code($request->coupon_code);
                $arr = json_decode($arr,true);
                return response()->json(['status'=>$arr['status'],'msg'=>$arr['msg'],'TotalPrice'=>$arr['TotalPrice']]);
        }
        
        public function place_order(Request $request){
                $payment_url='';
                $valid=Validator::make($request->all(),[
                        "name"=>"required",
                        "email"=>"required|email",
                        "phone"=>"required|numeric|digits:10",
                        "address"=>"required",
                        "city"=>"required",
                        "state"=>"required",
                        "zip"=>"required",
               ]);
               if(!$valid->passes()){
                return redirect()->back()->withInput()->withErrors($valid);
               }
                if($request->session()->has('FORNT_USER_LOGIN')){
                        $coupon_value=0;
                        if($request->coupon_code!=''){
                                $arr =apply_coupon_code($request->coupon_code);
                                $arr = json_decode($arr,true);
                                if($arr['status']=="success"){
                                        $coupon_value=$arr['coupon_code_value'];
                                }else{
                                        return response()->json(['status'=>"error",'msg'=>$arr['msg']]);  
                                }
                        }



                        $uid=$request->session()->get('FORNT_USER_ID');
                        $res['totalItem'] = DB::table('cart')
                                        ->leftJoin('products','products.id','=','cart.product_id')
                                        ->where(['user_id'=>$uid])
                                        ->where(['cart.status'=>'Not_Paid'])
                                        ->select('products.id','cart.quantity','products.name','products.image','products.price','products.slug')
                                        ->get();
                        $totalPrice=0;
                        $productDetailArr=[];
                        $i=0;                
                        foreach($res['totalItem'] as $list){
                                $totalPrice += ($list->price*$list->quantity);

                        }
                        date_default_timezone_set("Asia/Calcutta");//India time (GMT+5:30)
                        $arr=[
                                "customers_id"=>$uid,
                                "name"=>$request->name,
                                "email"=>$request->email,
                                "phone"=>$request->phone,
                                "address"=>$request->address,
                                "city"=>$request->city,
                                "state"=>$request->state,
                                "zip"=>$request->zip,
                                "coupon_code"=>$request->coupon_code,
                                "coupon_value"=>$coupon_value,
                                "payment_type"=>$request->payment_gateway,
                                "payment_status"=>"Pending",
                                "total_amt"=>$totalPrice,
                                "order_status"=>1,
                                'added_on'=>date('Y-m-d h:i:s')
                                

                        ];
                        $order_id=DB::table('orders')->insertGetId($arr); 
                        if($order_id>0){
                                foreach($res['totalItem'] as $list){
                                        $productDetailArr['order_id']=$order_id;
                                        $productDetailArr['product_id']=$list->id;
                                        $productDetailArr['price']=$list->price;
                                        $productDetailArr['qty']=$list->quantity;
                                        DB::table('orders_details')->insertGetId($productDetailArr);
                                }
                                //payment Gateway
                                if($request->payment_gateway=='Gateway'){
                                        $final_amt=$request->totalPrice;
                                        $ch = curl_init();
                                        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
                                        curl_setopt($ch, CURLOPT_HEADER, FALSE);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                                        curl_setopt($ch, CURLOPT_HTTPHEADER,
                                            array("X-Api-Key:test_b4c8cd3bf7c215b4402d518cdb1",
                                                "X-Auth-Token:test_0b5dfb3a3c4611b89716d046791"));
                                        $payload = Array(
                                            'purpose' => 'Buy Product',
                                            'amount' => $final_amt,
                                            'phone' => $request->phone,
                                            'buyer_name' =>$request->name,
                                            'redirect_url' => 'http://127.0.0.1:8000/instamojo_payment_redirect',
                                            'send_email' => true,
                                            'send_sms' => true,
                                            'email' => $request->email,
                                            'allow_repeated_payments' => false
                                        );
                                        curl_setopt($ch, CURLOPT_POST, true);
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
                                        $response = curl_exec($ch);
                                        curl_close($ch); 
                                        $response=json_decode($response);
                                        
                                        if(isset($response->payment_request->id)){
                                            $txn_id=$response->payment_request->id;
                                            DB::table('orders')
                                            ->where(['id'=>$order_id])
                                            ->update(['txn_id'=>$txn_id]);
                                            $payment_url=$response->payment_request->longurl;
                                        }else{
                                            $msg='' ;
                                            foreach($response->message as $key=>$val){
                                                $msg.=strtoupper($key).": ".$val[0].'<br/>';
                                            }
                                            return response()->json(['status'=>'error','msg'=>$msg,'payment_url'=>'']); 
                                        }
                                        
                                }
                              



                                DB::table('cart')->where(['user_id'=>$uid,'user_type'=>'Reg'])->delete();
                                $request->session()->put('ORDER_ID',$order_id);

                                $status = "success";
                                $msg="Order Placed";
                        }else{
                                $status = "error";
                                $msg="Please try after sometime";
                        }            
                        

                }else{
                        $status = "error";
                        $msg="Please Login to place order";
                }
                return response()->json(['status'=>$status,'msg'=>$msg,'payment_url'=>$payment_url]);
        }
    

        public function order_placed(Request $request){

                if($request->session()->has('ORDER_ID')){
                        return view('frontend.order_placed');
                }else{
                       
                        return redirect('/');
                }
        }
        public function instamojo_payment_redirect(Request $request){

                if($request->get('payment_id')!==null && $request->get('payment_status')!==null && $request->get('payment_request_id')!==null){
                        if($request->get('payment_status')=='Credit'){
                            $status='Success';
                            $redirect_url='/order_placed';
                        }else{
                            $status='Fail';
                            $redirect_url='/order_fail';
                        }
                        $request->session()->put('ORDER_STATUS',$status);
                        DB::table('orders')
                            ->where(['txn_id'=>$request->get('payment_request_id')])
                            ->update(['payment_status'=>$status,'payment_id'=>$request->get('payment_id')]);
                            return redirect($redirect_url);
                }else{
                die('Something went wrong');
                }
        }
        public function order_fail(Request $request){
                
                return view('frontend.order_fail');
        }

        public function review_submit(Request $request){
                
                if($request->session()->has('FORNT_USER_LOGIN')){
                        $uid=$request->session()->get('FORNT_USER_ID');
                        
                }else{
                        $uid=getUserTempId();
                        
                }
                $arr=[
                        "name"=>$request->name,
                        "p_id"=>$request->product_id,
                        "rating"=>$request->rating,
                        "review"=>$request->review,
                        "status"=>1,
                        'added_on'=>date('Y-m-d')
                        

                ];
                $order_id=DB::table('reviews')->insertGetId($arr); 
        }

        public function about(Request $request){
                
                $result['about']=DB::table('abouts')->first(); 
                // prx($result);
                return view('frontend.about',$result);
        }

        public function policy(Request $request){
                
                return view('frontend.copyrights-policy');
        }

        //for view wishlist items
        public function wishlist(request $request){
                if($request->session()->has('FORNT_USER_LOGIN')){
                        $uid=$request->session()->get('FORNT_USER_ID');
                        $user_type = "Reg";
                }else{
                        $uid=getUserTempId();
                        $user_type = "Not-reg";
                }

                $res['result'] = DB::table('wishlist')
                ->leftJoin('products','products.id','=','wishlist.product_id')
                ->where(['user_id'=>$uid])
                ->select('products.id','products.name','products.image','products.price','products.slug')
                ->get();

                // prx( $result);

                return view('frontend.wishlist',$res);
        } 

        public function add_to_wish(Request $request){
             
                if($request->session()->has('FORNT_USER_LOGIN')){
                        $uid=$request->session()->get('FORNT_USER_ID');
                        $user_type = "Reg";
                }else{
                        $uid=getUserTempId();
                        $user_type = "Not-reg";
                }
                $product_id =$request->POST('product_id');
                $product_price =$request->POST('product_price');
                $product_delete =$request->POST('w_delete');
                if($product_delete==1){
                        DB::table('wishlist')
                        ->where(['user_id'=>$uid])
                        ->where(['user_type'=>$user_type])
                        ->where(['product_id'=>$product_id])
                        ->delete();
                        $msg ="Removed"; 
                }else{
                        $check = DB::table('wishlist')
                                ->where(['user_id'=>$uid])
                                ->where(['user_type'=>$user_type])
                                ->where(['product_id'=>$product_id])
                                ->get();
                        if(isset($check[0])){
                                $update_id = $check[0]->id;
                                $msg ="Already Exists"; 
                        

                                        
                        }else{
                                $id = DB::table('wishlist')->insertGetId([
                                        'user_id'=>$uid,
                                        'user_type'=>$user_type,
                                        'product_id'=>$product_id,
                                        'price'=>$product_price,
                                        'added_on'=>date('Y-m-d h:i:s')
                                ]);
                                $msg = "Added in Wishlist";
                        }
                }

                
                return response()->json(['msg'=>$msg]);

                
        }

        
}
