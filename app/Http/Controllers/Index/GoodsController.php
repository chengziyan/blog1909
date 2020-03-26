<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Cart;
use App\User;
use Illuminate\Support\Facades\Cache;

class GoodsController extends Controller
{
    public function index($id){
      //统计访问量
      // if(Cache::add('count_'.$id,1)){
      //   $count = Cache::get('count_'.$id);
      // }else{
      //   $count = Cache::increment('count_'.$id);
      // }
      $count = Cache::add('count_'.$id,1) ? Cache::get('count_'.$id,1):Cache::increment('count_'.$id);
      
    	$goods = Goods::find($id);
    	// dd($goods);

    	return view('index.goods',['goods'=>$goods,'count'=>$count]);
    }

    //购物车
    public function addcart(Request $request)
    {
         // $user = session('user')->user_id;
         // // dd($user);
         // if(!$user){
         //  return json_encode(['code'=>'00003','msg'=>'用户未登录']);
         // }

      	$goods_id = $request->goods_id;
      	$buy_num = $request->buy_num;
          // dd($buy_num);

          // 根据商品id查询商品信息
          $goods = Goods::find($goods_id);

          // 判断库存
          if($goods->goods_num<$buy_num){
             return json_encode(['code'=>'00004','msg'=>'库存不足']);
          }

          $user = User::first('user_id');


          // 判断用户之前是否添加过此商品，如果添加过更改购买数量即可
          $cart = Cart::where(['user_id'=>$user->user_id,'goods_id'=>$goods_id])->first();
          // dd($cart);

          if($cart){
              // 库存判断
              $buy_num = $cart->buy_num+$buy_num;
              if($goods->goods_num<$buy_num){
                  $buy_num=$goods->goods_num;
              } 
          // 更新购买数量
          $res = Cart::where('cart_id',$cart->cart_id)->update(['buy_num'=>$buy_num]);
        }else{
          // 添加进购物车
             $data = [
                  'user_id'=>$user->user_id,
                  'goods_id'=>$goods_id,
                  'buy_num'=>$buy_num,
                  'goods_name'=>$goods->goods_name,
                  'goods_price'=>$goods->goods_price,
                  'goods_img'=>$goods->goods_img,
                  'addtime'=>time(),
             ];
             // dd($data);
             $res = Cart::create($data);
             }
             if($res){
              return json_encode(['code'=>'00000','msg'=>'添加成功']);
             }
    }   

}
