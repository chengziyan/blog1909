<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\User;
use App\Category;
use App\Goods;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {
        //先去缓存读取数据库
        // $goods = Cache::get('is_huan');
        $goods = cache('is_huan');
        // dump($goods);
        if(!$goods){
            // echo "DB";
            //如果缓存没有则读取数据库
            $ishuan = Goods::getSlideData();
            // dd($ishuan);
            //存入memcache
            // Cache::put('is_huan',$goods,60*60*24);
            cache(['is_huan'=>$goods],60*60*24);
        }

    	$goods = new Goods();
        $ishuan = $goods::select('goods_id','goods_img')->where('is_huan',1)->take(5)->get();
        $isshu = $goods::count();
        $cate = Category::where('pid',0)->get();
        $ishot = $goods::where('is_hot',1)->take(8)->get();
        $ishcuo = $goods::where('is_cu',1)->take(3)->get();

        return view('index.index',['ishuan'=>$ishuan,'isshu'=>$isshu,'cate'=>$cate,'ishot'=>$ishot,'ishcuo'=>$ishcuo]);

    }
}
