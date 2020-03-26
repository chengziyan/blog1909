<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>后台登录</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body> 
<center><h1>后台登录</h1></center><hr/>

@if(session('msg'))
<div class="alert alert-danger">
	{{session('msg')}}
</div>
@endif


<form action="{{url('/logindo')}}" method="POST" class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">用户名</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="user_name">
				    <b style="color:red">{{$errors->first('user_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-8">
			<input type="password" class="form-control" id="firstname" name="user_pwd">
				   <b style="color:red">{{$errors->first('user_pwd')}}</b>
		</div>
    </div>

     <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input name="rember" type="checkbox">七天免登陆
        </label>
      </div>
    </div>
  </div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">登录</button>
		</div>
	</div>
</form>

</body>
</html>
