<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>小区添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>售楼添加<a style="float: left;" href="{{url('/house/index')}}" class="btn btn-success">列表</a></h2></center><hr/>
<form action="{{url('/house/store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">小区名称</label>
		<div class="col-sm-8">
			<input type="text" name="b_name" class="form-control" id="firstname" >
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">导购人</label>
		<div class="col-sm-8">
			<input type="text" name="b_man" class="form-control" id="firstname" >
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">导购联系方式</label>
		<div class="col-sm-8">
			<input type="text" name="b_tel" class="form-control" id="firstname" >
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">房屋面积</label>
		<div class="col-sm-8">
			<input type="text" name="b_big" class="form-control" id="firstname" >
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">房屋图片</label>
		<div class="col-sm-8">
			<input type="file" name="b_img" class="form-control" id="firstname" >
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">房屋相册</label>
		<div class="col-sm-8">
			<input type="file" name="b_imgs" class="form-control" id="firstname" >
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">售价</label>
		<div class="col-sm-8">
			<input type="text" name="b_price" class="form-control" id="firstname" >
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