<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>文章添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>文章添加<a style="float: left;" href="{{url('/books/index')}}" class="btn btn-success">文章列表</a></h2></center><hr/>

<form action="{{url('/books/store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-8">
			<input type="text" name="books_title" class="form-control">
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
		<label for="firstname" class="col-sm-2 control-label">文章重要性</label>
		<div class="col-sm-8">
			<input type="radio" name="is_zhong"  value="1" checked >普通
			<input type="radio" name="is_zhong"  value="2" >置顶
			<b style="color:red">{{$errors->first('is_zhong')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-8">
			<input type="radio" name="is_show"  value="1" checked >显示
			<input type="radio" name="is_show"  value="2" >不显示
			<b style="color:red">{{$errors->first('is_show')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章作者</label>
		<div class="col-sm-8">
			<input type="text" name="books_man" class="form-control" >
			<b style="color:red">{{$errors->first('books_man')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者email</label>
		<div class="col-sm-8">
			<input type="text" name="books_email" class="form-control">
			<b style="color:red">{{$errors->first('books_email')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">关键字</label>
		<div class="col-sm-8">
			<input type="text" name="books_keyword" class="form-control" >
			<b style="color:red">{{$errors->first('books_keyword')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">网页描述</label>
		<div class="col-sm-8">
			<textarea type="text" name="books_intro" class="form-control"  ></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">上传文件</label>
		<div class="col-sm-8">
			<input type="file" name="books_img" class="form-control"  >
		</div>
	</div>
	
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8">
			<button type="button" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

<script>
$('input[name="books_title"]').blur(function(){
	$(this).next().empty();
	var books_title = $(this).val();
	var reg = /^[\u4e00-\u9fa5\w-.]{2,50}$/;
	if(!reg.test(books_title)){
		$(this).next().text('品牌名称需由中文，字母，数字，下划线，-或者.组成长度为2-50位！');
		return;
	}
	var obj = $(this);
	//唯一性验证
	$.ajax({
		url:"/books/checkOnly",
		data:{'books_title':books_title},
		dataType:'json',
		// async:false,
		success:function(result){
			if(result.count>0){
				// alert(123);
				obj.next().text('品牌名称已存在');
			}
		}
	});

});


$('button').click(function(){
	var titleflag = true;
	var books_title = $('input[name="books_title"]').val();
	var reg = /^[\u4e00-\u9fa5\w-.]{2,50}$/;
	if(!reg.test(books_title)){
		$('input[name="books_title"]').next().text('品牌名称需由中文，字母，数字，下划线，-或者.组成长度为2-50位！');
	}


	$.ajax({
		url:"/books/checkOnly",
		data:{'books_title':books_title},
		dataType:'json',
		async:false,
		success:function(result){
			if(result.count>0){
				// alert(123);
				$('input[name="books_title"]').next().text('品牌名称已存在');
				titleflag = false;
				
			}
		}
	});
	// alert(titleflag);
	if(!titleflag){
		return;
	}
	// alert(123);
});


</script>


</body>
</html>