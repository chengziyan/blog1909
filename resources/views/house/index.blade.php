<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>小区列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>小区列表展示<a style="float: left;" href="{{url('/house/create')}}" class="btn btn-success">添加</a></h2></center><hr/>
<table class="table">
	<thead>
		<tr>
			<th>小区ID</th>
			<th>小区名称</th>
			<th>导购人</th>
			<th>导购联系方式</th>
			<th>房屋面积</th>
			<th>房屋图片</th>
			<th>房屋相册</th>
			<th>售价</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($house as $v)
		<tr class="active">
			<td>{{$v->b_id}}</td>
			<td>{{$v->b_name}}</td>
			<td>{{$v->b_man}}</td>
			<td>{{$v->b_tel}}</td>
			<td>{{$v->b_big}}</td>
			<td>
				@if($v->b_img)
				<img width="45" height="45" src="{{env('UPLOADS_URL')}}{{$v->b_img}}">
				@endif
			</td>
			
			<td>
				@if($v->b_imgs)
				<img width="45" height="45" src="{{env('UPLOADS_URL')}}{{$v->b_imgs}}">
				@endif
			</td>
			<td>{{$v->b_price}}</td>
			<td>
				<a href="{{url('/house/edit/'.$v->house_id)}}" type="button" class="btn btn-primary">编辑</a>
				<a href="{{url('/house/destroy/'.$v->house_id)}}" type="button" class="btn btn-warning">删除</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

</body>
</html>