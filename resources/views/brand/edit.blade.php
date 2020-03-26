<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>品牌修改</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>品牌编辑<a style="float: left;" href="{{url('/brand/index')}}"  class="btn btn-success">列表</a></h2></center><hr/>
<form action="{{url('/brand/update/'.$brand->brand_id)}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-8">
			<input type="text" name="brand_name" class="form-control" value="{{$brand->brand_name}}" id="firstname" >
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-8">
			<input type="text" name="brand_url" class="form-control" value="{{$brand->brand_url}}" id="firstname" >
		</div>
	</div>
	
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌LOGO</label>
		@if($brand->brand_logo)
		<img width="45" height="45" src="{{env('UPLOADS_URL')}}{{$brand->brand_logo}}">
		@endif
		<div class="col-sm-3">
			<input type="file" name="brand_logo" class="form-control"  id="firstname" >
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌描述</label>
		<div class="col-sm-8">
			<textarea type="text" name="brand_desc" class="form-control" id="firstname" >{{$brand->brand_desc}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>