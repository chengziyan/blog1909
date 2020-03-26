<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>品牌添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>品牌添加<a style="float: left;" href="{{url('/brand/index')}}" class="btn btn-success">列表</a></h2></center><hr/>

<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>@endforeach
</ul>
</div>
@endif -->


<form action="{{url('/brand/store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-8">
			<input type="text" name="brand_name" class="form-control" >
			<b style="color:red">{{$errors->first('brand_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-8">
			<input type="text" name="brand_url" class="form-control" >
			<b style="color:red">{{$errors->first('brand_url')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌LOGO</label>
		<div class="col-sm-8">
			<input type="file" name="brand_logo" class="form-control" >
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌相册</label>
		<div class="col-sm-8">
			<input type="file" name="brand_imgs[]" multiple class="form-control" >
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌描述</label>
		<div class="col-sm-8">
			<textarea type="text" name="brand_desc" class="form-control"  ></textarea>
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