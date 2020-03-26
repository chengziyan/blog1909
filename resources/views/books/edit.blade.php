<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>文章编辑</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>文章编辑<a style="float: left;" href="{{url('/books/index')}}" class="btn btn-success">文章列表</a></h2></center><hr/>

<form action="{{url('/books/update/'.$books->books_id)}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-8">
			<input type="text" name="books_title" value="{{$books->books_title}}" class="form-control" id="firstname" >
			<b style="color:red">{{$errors->first('books_title')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章分类</label>
		<div class="col-sm-8">
			<select name="cate_id">
				<option value="">--请选择--</option>
				@foreach($cate as $vv)
				<option value="{{$vv->cate_id}}">{{str_repeat('|--',$vv->level)}}{{$vv->cate_name}}</option>
				@endforeach
			</select>
			<b style="color:red">{{$errors->first('cate_id')}}</b>
		</div>
	</div>
	
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章作者</label>
		<div class="col-sm-8">
			<input type="text" name="books_man" value="{{$books->books_man}}" class="form-control" id="firstname" >
			<b style="color:red">{{$errors->first('books_man')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者email</label>
		<div class="col-sm-8">
			<input type="text" name="books_email" value="{{$books->books_email}}" class="form-control" id="firstname" >
			<b style="color:red">{{$errors->first('books_email')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">关键字</label>
		<div class="col-sm-8">
			<input type="text" name="books_keyword" value="{{$books->books_keyword}}"  class="form-control" id="firstname" >
			<b style="color:red">{{$errors->first('books_keyword')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">网页描述</label>
		<div class="col-sm-8">
			<textarea type="text" name="books_intro" class="form-control" id="firstname" >{{$books->books_intro}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">上传文件</label>
		@if($books->books_img)
		<img width="45" height="45" src="{{env('UPLOADS_URL')}}{{$books->books_img}}">
		@endif
		<div class="col-sm-8">
			<input type="file" name="books_img" class="form-control" id="firstname" >
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