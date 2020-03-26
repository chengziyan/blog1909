<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function goods(){
    	echo '我是goods';
    }

    public function add()
    {
    	if(request()->isMethod('get')){
    		return view('add');
    	}
    	if(request()->isMethod('post')){
    		echo request()->name;
    	}
    }

    public function adddo(){
    	echo request()->name;
    	return redirect('/goods');
    }

    public function show($id,$goods_name){
    	echo $id.'--'.$goods_name;
    }

    public function news($id=null){
    	echo '新闻页';
    	echo $id;
    }

    public function cate($id,$cate_name=null){
    	echo '分类页';
    	echo $id.'=='.$cate_name;
    }
}
