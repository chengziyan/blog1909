<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>管理员列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>管理员列表展示<a style="float: left;" href="{{url('/user/create')}}" class="btn btn-success">添加</a></h2></center><hr/>

<table class="table">
	<thead>
		<tr>
			<th>管理员ID</th>
			<th>管理员名称</th>
			<th>邮箱</th>
			<th>手机号</th>
			<th>头像</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($user as $v)
		<tr class="active">
			<td>{{$v->user_id}}</td>
			<td>{{$v->user_name}}</td>
			<td>{{$v->user_email}}</td>
			<td>{{$v->user_tel}}</td>
			<td>
				@if($v->user_img)
				<img width="45" height="45" src="{{env('UPLOADS_URL')}}{{$v->user_img}}">
				@endif
			</td>
			
			<td>
				<a href="{{url('/user/edit/'.$v->user_id)}}" type="button" class="btn btn-primary">编辑</a>
				<a href="{{url('/user/destroy/'.$v->user_id)}}" type="button" class="btn btn-warning">删除</a>
			</td>
		</tr>
		@endforeach
		
	</tbody>
</table>

</body>
</html>