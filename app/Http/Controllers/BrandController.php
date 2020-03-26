<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
// use App\Http\Requests\StoreBrandPost;
use Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //存储session
         // session(['name'=>'zhangsan']);
         // request()->session()->put('number',100);
         // request()->session()->save();

        //删除
         // session(['name'=>null]);
         // request()->session()->forget('number');
        //删除所有
         // request()->session()->flush();

        //获取session
         // echo session('name');
         // echo request()->session()->get('number');
        //获取所有
        // dump(request()->session()->all());

        //搜索
        $name = request()->name;
        $where = [];
        if($name){
            $where[] = ['brand_name','like',"%$name%"];
        }
        $url = request()->url;
        if($url){
            $where[] = ['brand_url','like',"%$url%"];
        }

        $pageSize = config('app.pageSize');
        // $brand = DB::table('brand')->get();
        //ORM
        // $brand = Brand::all();
        $brand = Brand::where($where)->orderby('brand_id','desc')->paginate($pageSize);
        $query = request()->all();
        // dd($query);
        //ajax分页
        if(request()->ajax()){
            return view('brand.ajaxpage',['brand'=>$brand,'query'=>$query]);
        }
        return view('brand.index',['brand'=>$brand,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    //第二种验证
    // public function store(StoreBrandPost $request)
    {
        // 第一种验证
        // $validatedData = $request->validate([
        //      'brand_name' => 'required|unique:brand|max:20', 
        //      'brand_url' =>  'required',
        // ],[
        //     'brand_name.required'=>'品牌名称必填!',
        //     'brand_name.unique'=>'品牌名称已存在!',
        //     'brand_name.max'=>'品牌名称最大长度不超过20位!',
        //     'brand_url.required'=>'品牌网址必填!',
        // ]);

        $post = $request->except('_token');
        // //第三种验证
        // $validator = Validator::make($post, [
        //     'brand_name' => 'required|unique:brand|max:20', 
        //     'brand_url' => 'required',
        // ],[
        //         'brand_name.required'=>'品牌名称必填!',
        //         'brand_name.unique'=>'品牌名称已存在!',
        //         'brand_name.max'=>'品牌名称最大长度不超过20位!',
        //         'brand_url.required'=>'品牌网址必填!',
        //     ]);
        // if($validator->fails()){
        //     return redirect('brand/create')
        //     ->withErrors($validator)
        //     ->withInput();
        // }
        
        //文件上传
        if($request->hasFile('brand_logo')){
            $post['brand_logo'] = upload('brand_logo');
            // dd($img);
        }
        //多文件上传
        if($request->hasFile('brand_imgs')){
		    $brand_imgs = Moreupload('brand_imgs');
			$post['brand_imgs'] = implode('|',$brand_imgs);
		}
        // dd($post);

        //DB方式
        // $res = DB::table('brand')->insert($post);
        //ORM添加第一种
        // $brand = new Brand;
        // $brand->brand_name = $request->brand_name;
        // $brand->brand_url = $request->brand_url;
        // $brand->brand_logo = $request->brand_logo;
        // $brand->brand_desc = $request->brand_desc;
        // $res = $brand->save();
        
        //ORM添加第二种
        // $res = Brand::create($post);

        //ORM添加第三种
        $res = Brand::insert($post);

        // dd($res);
        if($res){
            return redirect('/brand/index');
        }
    }
    

    /**
     * Display the specified resource.
     *
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
        //DB方式
        // $brand = DB::table('brand')->where('brand_id',$id)->first();

        //ORM方式
        // $brand = Brand::find($id);
        $brand = Brand::where('brand_id',$id)->first();

        return view('brand.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //DB方式
        $post = request()->except(['_token']);
        //文件上传
        if($request->hasFile('brand_logo')){
            $post['brand_logo'] = $this->upload('brand_logo');
            // dd($img);
        }
        // $res = DB::table('brand')->where('brand_id',$id)->update($post);

        //ORM第一种save
        // $brand = Brand::find($id);
        // $brand->brand_name = $request->brand_name;
        // $brand->brand_url = $request->brand_url;
        // $brand->brand_logo = $request->brand_logo;
        // $brand->brand_desc = $request->brand_desc;
        // $res = $brand->save();
        
        //ORM第二种
        $res = Brand::where('brand_id',$id)->update($post);

        // dd($res);
        if($res !== false){
            return redirect('/brand/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DB方式
        // $res = DB::table('brand')->where('brand_id',$id)->delete();
        
        //ORM方式
        $res = Brand::destroy($id);

        if($res){
            return redirect('/brand/index');
        }
    }
}
