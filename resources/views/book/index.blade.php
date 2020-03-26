<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>图书列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>图书列表展示<a style="float: left;" href="{{url('/book/create')}}" class="btn btn-success">添加</a></h2></center><hr/>
<form>
<input type="text" name="name" placeholder="请输入图书关键字" value="{{$query['name']??''}}">

<button>搜索</button>
</form>
<table class="table">
	<thead>
		<tr>
			<th>图书ID</th>
			<th>图书名称</th>
			<th>作者</th>
			<th>售价</th>
			<th>图书封面</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($book as $v)
		<tr class="active">
			<td>{{$v->book_id}}</td>
			<td>{{$v->book_name}}</td>
			<td>{{$v->book_man}}</td>
			<td>{{$v->book_price}}</td>
			<td>
				@if($v->book_img)
				<img width="45" height="45" src="{{env('UPLOADS_URL')}}{{$v->book_img}}">
				@endif
			</td>
			
			<td>
				<a href="{{url('/brand/edit/'.$v->brand_id)}}" type="button" class="btn btn-primary">编辑</a>
				<a href="{{url('/brand/destroy/'.$v->brand_id)}}" type="button" class="btn btn-warning">删除</a>
			</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="6">
				{{$book->appends($query)->links()}}
			</td>
		</tr>
	</tbody>
</table>

</body>
</html>