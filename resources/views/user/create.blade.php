<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>用户添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>管理员添加<a style="float: left;" href="{{url('/user/index')}}" class="btn btn-success">管理员列表</a></h2></center><hr/>

<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>@endforeach
</ul>
</div>
@endif -->


<form action="{{url('/user/store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员名称</label>
		<div class="col-sm-8">
			<input type="text" name="user_name" class="form-control" id="firstname" >
			<b style="color:red">{{$errors->first('user_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-8">
			<input type="password" name="user_pwd" class="form-control" id="firstname" >
			<b style="color:red">{{$errors->first('user_pwd')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">确认密码</label>
		<div class="col-sm-8">
			<input type="password" name="user_qpwd" class="form-control" id="firstname" >
			<b style="color:red">{{$errors->first('user_qpwd')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">邮箱</label>
		<div class="col-sm-8">
			<input type="text" name="user_email" class="form-control" id="firstname" >
			<b style="color:red">{{$errors->first('user_email')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">手机号</label>
		<div class="col-sm-8">
			<input type="text" name="user_tel" class="form-control" id="firstname" >
			<b style="color:red">{{$errors->first('user_tel')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">头像</label>
		<div class="col-sm-8">
			<input type="file" name="user_img" multiple class="form-control" id="firstname" >
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>