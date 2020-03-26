<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Goods;
use App\Brand;
use App\Category;
use Validator;
use App\Http\Requests\StoreGoodsPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();
        // $userid = Auth::id();
        // $user = request()->user();
        // dd($user);
        // Auth::logout();
        // dd(Auth::check());
        


        $name = request()->name;
        $where = [];
        if($name){
            $where[] = ['goods_name','like',"%$name%"];
        }

        $pageSize = config('app.pageSize');
        //三表联查
        $goods = Goods::select('goods.*','brand.brand_id','category.cate_name')
        ->leftjoin('category','goods.cate_id','=','category.cate_name')
        ->leftjoin('brand','goods.brand_id','=','brand.brand_id')
        ->where($where)
        ->paginate($pageSize);
        $query = request()->all();

        return view('goods.index',['goods'=>$goods,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加界面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::all();
        $cate = Category::all();
        $cate = CreateTree($cate);
        // dd($cate);
        return view('goods.create',['brand'=>$brand,'cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(StoreGoodsPost $request)
    {

        // $validateData = Request()->validate([
        //     'goods_name' => 'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u|unique:goods',
        //     'goods_huo' => 'required',
        //     'cate_id'=>'required',
        //     'brand_id'=> 'required',
        //     'goods_price'=> 'required',
        //     'goods_num'=> 'required|digits_between:1,8',
        // ],[
        //     'goods_name.regex'=>'商品名称可以包括中文，数字，字母，下划线，长度2~50位',
        //     'goods_name.unique'=>'商品名称已经存在！',
        //     'goods_name.max'=>'商品名称最多不能大于10位！',
        //     'goods_huo.required'=>'商品货号不能为空！',
        //     'goods_huo.unique'=>'定单号不能重复！',
        //     'cate_id.required'=>'商品分类必选！',
        //     'brand_id.required'=>'商品品牌必选！',
        //     'goods_price.required'=>'价格不能为空！',
        //     'goods_num.required'=>'库存不能为空！',
        //     'goods_num.digits_between'=>'库存输入必须1~8位！',
        // ]);

        $post = $request->except('_token');
        // dd($post);

        if($request->hasFile('goods_img')){
            $post['goods_img']  = upload('goods_img');
            // dd($img);
        }
         //多文件上传
        if($request->hasFile('goods_imgs')){
            $goods_imgs = Moreupload('goods_imgs');
            $post['goods_imgs'] = implode('|',$goods_imgs);
        }
        $res = Goods::insert($post);
        if($res){
            return redirect('/goods/index',);
        }

    }
    /**
     * Display the specified resource.
     *详情页展示
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goods = Goods::where('goods_id',$id)->first();
        return view('goods.edit',['goods'=>$goods]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGoodsPost $request, $id)
    {
        //验证
        // $request->validate([
        //     'goods_name' => [
        //         'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u',
        //         Rule::unique('goods')->ignore($id,'goods_id'),
        //     ],
        //     'goods_huo' => 'required',
        //     'cate_id'=>'required',
        //     'brand_id'=> 'required',
        //     'goods_price'=> 'required',
        //     'goods_num'=> 'required|digits_between:1,8',
        // ],[
        //     'goods_name.regex'=>'商品名称可以包括中文，数字，字母，下划线，长度2~50位',
        //     'goods_name.unique'=>'商品名称已经存在！',
        //     'goods_name.max'=>'商品名称最多不能大于10位！',
        //     'goods_huo.required'=>'商品货号不能为空！',
        //     'goods_huo.unique'=>'定单号不能重复！',
        //     'cate_id.required'=>'商品分类必选！',
        //     'brand_id.required'=>'商品品牌必选！',
        //     'goods_price.required'=>'价格不能为空！',
        //     'goods_num.required'=>'库存不能为空！',
        //     'goods_num.digits_between'=>'库存输入必须1~8位！',
        // ]);

        //接受所有值
        $post = $request->except(['_token']);
        // dd($post);
         if($request->hasFile('goods_img')){
            $post['goods_img']  = $this->upload('goods_img');
            // dd($img);
        }

        $res = Goods::where('goods_id',$id)->update($post);
        // dd($res);
        if($res!==false){
            return redirect('/goods/index');
        }
        // dd($res);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Goods::destroy($id);
        if($res){
            return redirect('/goods/index');
        }
    }
}