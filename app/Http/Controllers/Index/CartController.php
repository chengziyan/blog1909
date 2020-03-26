<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\Goods;
use App\Order;

class CartController extends Controller
{
    //购物车列表
    public function cartlist(){
    	$cartInfo = Cart::all();
    	$count = Cart::count();
    	return view('index.cartlist',['cartInfo'=>$cartInfo,'count'=>$count]);
    }

    public function confirm(){
        $goods_ids = request()->ids;
        $goods_id = explode(',',$goods_ids);
        $goods = Goods::whereIn('goods_id',$goods_id)->get();
    	return view('index.confirm',['goods'=>$goods,'goods_id'=>$goods_id]);
    }

    public function success($id){
        $goods_id = $id;
        // $user_id = cookie('user_id');
       
        $user_id = 18;
        $order_no = rand(1000,9999).time();
          $order_id = $id;

        $data = [
            'user_id'=>$user_id,
            'create_time'=>time(),
            'order_no'=>$order_no
        ];
        $ret = Order::create($data);
        if($ret){
            return view('index.success',['order_no'=>$order_id]);
        }
    }
}
