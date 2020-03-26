<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Books;
use Validator;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books_title = request()->books_title;
        $where = [];
        if($books_title){
            $where[]=['books_title','like',"%$books_title%"];
        }

        $pageSize = config('app.pageSize');
        $books = Books::select('books.*','category.cate_id')
        ->leftjoin('category','books.cate_id','=','category.cate_name')
        ->where($where)
        ->paginate($pageSize);
        $query = request()->all();
         if(request()->ajax()){
            return view('books.ajaxpage',['books'=>$books,'query'=>$query]);
        }
        return view('books.index',['books'=>$books,'query'=>$query]);
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
        return view('books.create',['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 第一种验证
        $validatedData = $request->validate([
             'books_title' => 'required|unique:books|regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u', 
             'cate_id' =>  'required',
             'is_zhong' => 'required',
             'is_show' => 'required',
        ],[
            'books_title.required'=>'文章标题必填!',
            'books_title.unique'=>'文章标题已存在!',
            'books_title.regex'=>'文章标题由中文字母下划线组成!',
            'cate_id.required'=>'文章分类不能为空!',
            'is_zhong.required'=>'文章重要性不能为空!',
            'is_show.required'=>'是否展示不能为空!',
        ]);
        $post = $request->except('_token');
        if($request->hasFile('books_img')){
            $post['books_img'] = upload('books_img');
        }
        // dd($post);
        $res = Books::create($post);
        if($res){
            return redirect('/books/index');
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
        $books = Books::where('books_id',$id)->first();
        $cate = Category::all();
        $cate = CreateTree($cate);
        return view('books.edit',['books'=>$books,'cate'=>$cate]);
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
        $post = $request->except(['_token']);
        if($request->hasFile('books_img')){
            $post['books_img']  = $this->upload('books_img');
            // dd($img);
        }
         $res = Books::where('books_id',$id)->update($post);
         if($res!==false){
            return redirect('/books/index');
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
        $res = Books::destroy($id);

        if($res){
            if(request()->ajax()){
                echo json_encode(['code'=>'00000','msg'=>'删除成功！']);die;
            }
            return redirect('/books/index');
        }
    }

    public function checkOnly()
    {
        $books_title = request()->books_title;
        $count = Books::where('books_title',$books_title)->count();
        return json_encode(['code'=>'00000','count'=>$count]);
    }
}
