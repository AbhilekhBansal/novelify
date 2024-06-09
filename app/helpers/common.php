<?php
use Illuminate\Support\Facades\DB;

function prx($arr){
    echo "<pre>";
    print_r($arr);
    die();
}

function getTopNavCat(){
    $cat_data=DB::table('category')->where(['status' => 1])->get();

    $arr=[];
    foreach($cat_data as $row){
	$arr[$row->id]['city']=$row->category_name;
	$arr[$row->id]['parent_id']=$row->parent_category_id;
	$arr[$row->id]['slug']=$row->category_slug;
	$arr[$row->id]['tag']=$row->tag;
    }
    // prx($arr);
    $str = buildTreeView($arr,0);
    return $str;

}
$html='';
function buildTreeView($arr,$parent,$level=0,$prelevel= -1){
	global $html;
	foreach($arr as $id=>$data){
		if($parent==$data['parent_id']){
			if($level>$prelevel){
				if($html==''){
					$html.='<ul id="navigation">';
				}else{
                    if($level<2){
                        $html.='<ul class="submenu">';
                    }else{
                        $html.='<ul class="submenu sub-2">';
                    }	
				}
			}
			if($level==$prelevel){
				$html.='</li>';
			}
			$html.='<li class="'; 
				if($data['tag'] == 1){ 
					$html.='new';}
			$html.='"><a href="'.url('/'.$data['slug']).'">'.$data['city'].'</a>';
			if($level>$prelevel){
				$prelevel=$level;
			}
			$level++;
			buildTreeView($arr,$id,$level,$prelevel);
			$level--;
		}
	}
	if($level==$prelevel){
		$html.='</li></ul>';
	}
	return $html;
}

function getAddToCartTotalItem(){
	if(session()->has('FORNT_USER_LOGIN')){
		$uid=session()->get('FORNT_USER_ID');
		$user_type = "Reg";
	}else{
		$uid=getUserTempId();
		$user_type = "Not-reg";
	}
	$result = DB::table('cart')
		->where(['user_id'=>$uid])
		->where(['user_type'=>$user_type])
		->get();
	
	return count($result);

}

function footer_cat(){
	$fhome_cat = DB::table('category')
			->where(['status'=>1])
			->where(['parent_category_id'=>2])
			->get();
	// prx($home_cat);'.url('/'.$data['slug']).'
	global $fhtml;
	foreach($fhome_cat->take(5) as $flist){
		$fhtml .='<li><a href="'.url('/'.$flist->category_slug).'">'.$flist->category_name.'</a></li>';
	} 
	return $fhtml;
}

function social_link(){
	$result = DB::table('contacts')
			->first();
	
	$social_html='';
	$social_html .='<ul class="header-social"><li><a href="'.$result->fb_link.'" target="_blank"><i class="fab fa-facebook"></i></a></li>';
	$social_html .='<li><a href="'.$result->insta_link.'" target="_blank"><i class="fab fa-instagram"></i></a></li>';
	$social_html .='<li><a href="'.$result->x_link.'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
	$social_html .='<li><a href="'.$result->linked_link.'" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';
	$social_html .='<li><a href="'.$result->yt_link.'" target="_blank"><i class="fab fa-youtube"></i></a></li></ul>';
	return $social_html;
}

function footer_recommended_books(){
	$recommended = DB::table('products')
		->where(['status'=>1])
		->where(['is_promo'=>1])
		->get();
	// prx($home_cat);'.url('/'.$data['slug']).'
	global $rhtml;
	foreach($recommended->take(5) as $flist){
		$rhtml .='<li><a href="'.url('product-details/'.$flist->slug).'">'.$flist->name.'</a></li>';
	} 
	return $rhtml;
}

function getUserTempId(){
	if(session()->has('USER_TEMP_ID')==null){
		$rand = rand(11111111,99999999);
		session()->put('USER_TEMP_ID',$rand);
		return $rand;
	}else{
		return session()->get('USER_TEMP_ID');
	}
}

function apply_coupon_code($coupon_code){
	$totalPrice=0;
	$result = DB::table('coupons')
			->where(["code"=>$coupon_code])
			->get();
	
	if(isset($result[0])){
		if($result[0]->status == 1){
			$type = $result[0]->type;
			$value = $result[0]->value;
			if($result[0]->is_one_time==1){
					$status="Error";
					$msg="Coupon Code is already used";
			}else{
					$min_order_amt = $result[0]->min_order_amt;
					$uid=session()->get('FORNT_USER_ID');
					if($uid == ''){
							$uid=session()->get('USER_TEMP_ID');
					}
					$res['totalItem'] = DB::table('cart')
							->leftJoin('products','products.id','=','cart.product_id')
							->where(['user_id'=>$uid])
							->where(['cart.status'=>'Not_Paid'])
							->select('products.id','cart.quantity','products.name','products.image','products.price','products.slug')
							->get();
					
					
					foreach($res['totalItem'] as $list){
							$totalPrice += ($list->price*$list->quantity);
					}
					if($min_order_amt>0){
					
							if($min_order_amt<$totalPrice){
									$status="success";
									$msg="Your Coupon Code is applied";
							}else{
									$status="Error";
									$msg="Cart amount must be Greater than $min_order_amt";
							}
					}else{
							$status="success";
							$msg="Your Coupon Code is applied";
					}
					
					
					
			}
			
		}else{
			$status="Error";
			$msg="Your Coupon Code is Deactivated";
		}
			
	}else{
			$status="Error";
			$msg="Please enter valid coupon code";
	}
	$coupon_code_value = 0;
	if($status=="success"){
			if($type=="Value"){
					$coupon_code_value=$value;
					$totalPrice=$totalPrice-$value;
			}if($type=="Per"){
					$newPrice=($value*$totalPrice)/100;  
					$totalPrice=round($totalPrice-$newPrice); 
					$coupon_code_value=$newPrice;      
			}
	}


return json_encode(['status'=>$status,'msg'=>$msg,'TotalPrice'=>$totalPrice,'coupon_code_value'=>$coupon_code_value]);
}


?>