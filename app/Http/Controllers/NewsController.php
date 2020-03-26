<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize = config('app.pageSize');
        $news = News::select('news.*','category.cate_id')
        ->leftjoin('category','news.cate_id','=','category.cate_name')
        ->paginate($pageSize);
        //ajax分页
        if(request()->ajax()){
            return view('news.ajaxpage',['news'=>$news]);
        }
        return view('news.index',['news'=>$news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Category::all();
        $cate = CreateTree($cate);
        return view('news.create',['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = request()->validate([
            'news_title' => 'required|regex:/^[\x{4e00}-\x{9fa5}\w]{2,30}$/u',
            'news_man' => 'required',
        ],[
            'news_title.required'=>'新闻标题不能为空！',
            'news_title.regex'=>'新闻名称可以包括中文，数字，字母，下划线，长度2~30位',
            'news_man.required'=>'新闻作者不能为空！',
        ]);
        $post = $request->except('_token');
        $post['create_time']=time();
        $res = News::insert($post);
        if($res){
            return redirect('/news/index',);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
