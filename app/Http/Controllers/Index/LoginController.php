<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//短信验证码
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

//邮箱验证码
use App\Mail\SendCode;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Cookie;

use App\User;

class LoginController extends Controller
{
    public function log()
    {
    	return view('index.login');
    }

    public function reg()
    {
    	return view('index.reg');
    }


    public function sendSMS()
    {
    	$name = request()->name;
    	//验证手机号
    	$reg = '/^1[3|5|6|7|8]\d{9}$/';
    	if(!preg_match($reg, $name)){
    		return json_encode(['code'=>'00001','msg'=>'请输入正确的手机号或邮箱']);
    	}
    	$code = rand(100000,999999);

    	$result = $this->send($name,$code);
    	//发送成功
    	if($result['Message']=='OK'){
    		session(['code'=>$code]);
    		return json_encode(['code'=>'00000','msg'=>'发送成功!']);
    	}
    	//发送失败
    	return json_encode(['code'=>'00000','msg'=>$result['Message']]);

    }

    //发送短信验证码
    public function send($name,$code){

		// Download：https://github.com/aliyun/openapi-sdk-php
		// Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md

		AlibabaCloud::accessKeyClient('LTAI4FnpSM32cyFJAJL86qDG', 'BrKoafYmrPoWG7nG2ohNtD9Dg3uVvb')
		                    ->regionId('cn-hangzhou')
		                    ->asDefaultClient();

		try {
		$result = AlibabaCloud::rpc()
		                      ->product('Dysmsapi')
		                      // ->scheme('https') // https | http
		                      ->version('2017-05-25')
		                      ->action('SendSms')
		                      ->method('POST')
		                      ->host('dysmsapi.aliyuncs.com')
		                      ->options([
		                                    'query' => [
		                                      'RegionId' => "cn-hangzhou",
		                                      'PhoneNumbers' => $name,
		                                      'SignName' => "亦久亦旧",
		                                      'TemplateCode' => "SMS_182670131",
		                                      'TemplateParam' => "{code:$code}",
		                                    ],
		                                ])
		                      ->request();
			return $result->toArray();
		} catch (ClientException $e) {
			return $e->getErrorMessage() . PHP_EOL;
		} catch (ServerException $e) {
			return $e->getErrorMessage() . PHP_EOL;
		}

    }


    public function sendEmail()
    {
        $emailname = request()->name;
        $emailreg = '/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/';
        // dd(preg_match($reg, $name));
        if(!preg_match($emailreg, $emailname)){
            return json_encode(['code'=>'00001','msg'=>'请输入正确的手机号或邮箱']);
        }
        //生成随机验证码
        $code = rand(100000,999999);
        //发送邮件
        Mail::to($emailname)->send(new SendCode($code));
        //发送成功存入session
        session(['code'=>$code]);
        return json_encode(['code'=>'00000','msg'=>'发送成功']);
        
    }

   //注册
    public function doRegister()
    {
    	$post = request()->except(['_token','user_qpwd']);

        $codes =  session('code');
        if(!($post['code']==$codes)){
            return redirect('/reg')->with('msg','验证码错误');
        }
        $posts = request()->except(['_token','user_qpwd','code']);
        $posts['user_pwd'] = encrypt($posts['user_pwd']);

        $user = new User();
        $ret = $user::insert($posts);
        session('code',null);
        if($ret){
            return redirect('/log');
        }
        return redirect('/reg')->with('msg','注册失败');

    }


    //登录
    public function doLog()
    {
        $post = request()->except('_token');
        // dd($post);

        $user = User::where('user_tel',$post['user_tel'])->first();
        
        if(decrypt($user->user_pwd) != $post['user_pwd']){
            return redirect('/login')->with('msg','用户名或密码错误!');
        }

        if(isset($post['rember'])){
            Cookie::queue('adminuser',$user,7*24*60);
        }
        
        session(['adminuser'=>$user]);

        
        if($post['refer']){
            return redirect($post['refer']);
        }

        return redirect('/');
    }

    


    public function addcookie()
    {
        // return response('hellow 1909!')->cookie('name','zhangsan',1);
        // Cookie::queue(Cookie::make('num','lisi',1));
        // Cookie::queue('age','10',1);
    }

    public function getcookie()
    {
        echo request()->cookie('age');
    }

}
