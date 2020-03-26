<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>管理员列表</title>
	<link rel="stylesheet" href="{{asset('/static/admin/css/bootstrap.min.css')}}">  
	<script src="/static/admin/js/jquery.min.js"></script>
	<script src="/static/admin/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>新闻列表展示<a style="float: left;" href="{{url('/news/create')}}" class="btn btn-success">添加</a></h2></center><hr/>

<table class="table">
	<thead>
		<tr>
			<th>新闻id</th>
			<th>新闻标题</th>
			<th>新闻分类</th>
			<th>新闻作者</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($news as $v)
		<tr class="active">
			<td>{{$v->news_id}}</td>
			<td>{{$v->news_title}}</td>
			<td>{{$v->cate_name}}</td>
			<td>{{$v->news_man}}</td>
			
			<td>
				<a href="{{url('/news/edit/'.$v->user_id)}}" type="button" class="btn btn-primary">编辑</a>
				<a href="{{url('/news/destroy/'.$v->user_id)}}" type="button" class="btn btn-warning">删除</a>
			</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="6">
				{{$news->links()}}
			</td>
		</tr>
	</tbody>
</table>

</body>
</html>
<script type="text/javascript">
	//无刷新分页
	$(document).on('click','.pagination a',function(){
		var url = $(this).attr('href');
		$.get(url,function(result){
			$('tbody').html(result);
		});
		return false;
	});
</script>
