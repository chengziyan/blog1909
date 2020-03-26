<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('user.index',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'regex:/^[\x{4e00}-\x{9fa5}\w]{2,16}$/u|unique:user|required',
            'user_pwd' => 'required|regex:/^\d{6,}$/u',
            // 'user_qpwd' => 'confirmed',
            'user_email' => 'required',
            'user_tel' => 'required',
        ],[
            'user_name.regex' => '管理员名称可以包括中文，数字，字母，下划线，长度2~16位',
            'user_name.unique' => '管理员已存在',
            'user_name.required' => '管理员不能为空',
            'user_pwd.required' => '密码不得为空',
            'user_pwd.regex' => '密码必须六位以上',
            
            'user_email.required' => '邮箱不能为空',
            'user_tel.required' => '手机号不能为空',

        ]);

        $post = $request->except('_token');

        if($request->hasFile('user_img')){
            $post['user_img'] = upload('user_img');
        }

        $post['user_pwd'] = encrypt($post['user_pwd']);

        $res = User::create($post);
        if($res){
            return redirect('/user/index');
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
        $user = User::where('user_id',$id)->first();

        return view('user.edit',['user'=>$user]);
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
        $validateData = Request()->validate([
            'user_name' => 'regex:/^[\x{4e00}-\x{9fa5}\w]{2,16}$/u|unique:user',
            'user_pwd' => 'regex:/^\d{6,}$/u',
            'user_email'=>'required',
            'user_tel'=> 'required',       
        ],[
            'user_name.regex'=>'管理员名字可以包括中文，数字，字母，下划线，长度2~16位',
            'user_name.unique'=>'管理员名字已经存在！',
            'user_pwd.regex'=>'密码必须6位以上！',
            'user_email.required'=>'邮箱必填',
            'user_tel.required'=>'手机号必填',
        ]);

         //接受所有值
        $post = $request->except('_token');
        // dd($post);
        
         if($request->hasFile('user_img')){
            $post['user_img']  = upload('user_img');
            // dd($img);
        }
        
        $res = User::where('user_id',$id)->update($post);
        if($res!==false){
            return redirect('/user/index');
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
        $res = User::destroy($id);

        if($res){
            return redirect('/user/index');
        }
    }
}
