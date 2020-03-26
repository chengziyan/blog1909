@extends('layouts.shop')
@section('title','登录页面')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员登录</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     
     @if(session('msg'))
      <div class="alert alert-danger">
        {{session('msg')}}
      </div>
      @endif

     <form action="{{url('/doLog')}}" method="get" class="reg-login">
      @csrf
      <h3>还没有三级分销账号？点此<a class="orange" href="{{url('/reg')}}">登录</a></h3>
      <input type="hidden" name="refer" value="{{request()->refer}}">
      <div class="lrBox">
       <div class="lrList"><input type="text" name="user_tel" placeholder="输入手机号码或者邮箱号" /></div>
       <b style="color:red">{{$errors->first('user_tel')}}</b>
       <div class="lrList"><input type="password" name="user_pwd" placeholder="输入证码" /></div>
       <b style="color:red">{{$errors->first('user_pwd')}}</b>
      </div><!--lrBox/-->
      <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input name="rember" type="checkbox">七天免登陆
        </label>
      </div>
    </div>
  </div>
      <div class="lrSub">
     
      

       <input type="submit" value="立即登录" />
      </div>
     </form><!--reg-login/-->
     
     @include('index.public.footer');

     @endsection