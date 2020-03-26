<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>图书添加<a style="float: left;" href="{{url('/book/index')}}" class="btn btn-success">列表</a></h2></center><hr/>

<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>@endforeach
</ul>
</div>
@endif -->


<form action="{{url('/book/store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书名称</label>
		<div class="col-sm-8">
			<input type="text" name="book_name" class="form-control" id="firstname" >
			<b style="color:red">{{$errors->first('book_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者</label>
		<div class="col-sm-8">
			<input type="text" name="book_man" class="form-control" id="firstname" >
			<b style="color:red">{{$errors->first('book_man')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">售价</label>
		<div class="col-sm-8">
			<input type="text" name="book_price" class="form-control" id="firstname" >
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书封面</label>
		<div class="col-sm-8">
			<input type="file" name="book_img" class="form-control" id="firstname" >
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