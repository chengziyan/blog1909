<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Cookie;
// use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login()
    {
    	return view('login');
    }

    public function logindo()
    {
    	$post = request()->except('_token');
    	// dd($post);

    	$user = User::where('user_name',$post['user_name'])->first();
    	
    	if(decrypt($user->user_pwd) != $post['user_pwd']){
    		return redirect('/login')->with('msg','用户名或密码错误!');
    	}

        if(isset($post['rember'])){
            Cookie::queue('adminuser',$user,7*24*60);
        }
    	
    		session(['adminuser'=>$user]);
    		return redirect('/books/index');
    	
    }


    // public function logindo()
    // {
    //     $post = request()->except('_token');
    //     // dd($post); 
    //     if (Auth::attempt(['email' => $post['user_name'], 'password' => $post['user_pwd']]))
    //      { 
    //         // 认证通过... 
    //         return redirect('/books/index');
    //         // return redirect()->intended('dashboard'); 
    //      }

        
    // }
}
