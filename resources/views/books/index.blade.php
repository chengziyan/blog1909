<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>文章列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
<center><h2>文章列表展示<a style="float: left;" href="{{url('/books/create')}}" class="btn btn-success">添加</a></h2></center><hr/>

<form>
<input type="text" name="books_title"  placeholder="请输入关键字" value="{{$query['books_title']??''}}">

<button>搜索</button>
</form>

<table class="table">
	<thead>
		<tr>
			<th>ID</th>
				<th>文章标题</th>
				<th>文章分类</th>
				<th>文章重要性</th>
                <th>是否显示</th>
                <th>文章作者</th>
                <th>作者email</th>
                <th>网页描述</th>
				<th>文件上传</th>
				<th>操作</th>
		</tr>
	</thead>
	@foreach($books as $v)
		<tr>
				<th>{{$v->books_id}}</th>
				<th>{{$v->books_title}}</th>
				<th>{{$v->cate_name}}</th>
				<th>{{$v->is_zhong == 1 ?'√':'×'}}</th>
                <th>{{$v->is_show == 1 ?'√':'×'}}</th>
                <th>{{$v->books_man}}</th>
                <th>{{$v->books_email}}</th>
                <th>{{$v->books_intro}}</th>
				<th><img src="{{env('UPLOADS_URL')}}{{$v->books_img}}" width="40" height="40"></th>
				<th>
					<a href="{{url('/books/edit/'.$v->books_id)}}" type="button" class="btn btn-primary">修改</a>
				   -<a href="javascript:void(0);" id="{{$v->books_id}}" type="button" class="btn btn-danger">删除</a></th>
			</tr>
			@endforeach
			<tr><td colspan="6">{{$books->appends($query)->links()}}</td></tr>
		</tbody>
</table>

<script>
//分页
$(document).on('click','.pagination a',function(){
    // alert(111);
    var url = $(this).attr('href');
    $.get(url,function(result){
        $('tbody').html(result);
    });
    return false;
});

//ajax删除
$('.btn-danger').click(function(){
	var id = $(this).attr('id');
	// alert(id);
	if(confirm('真的要删除当前记录吗？')){
		// $.get('/books/destroy/'+id,function(result){
		// 	if(result.code='00000'){
		// 		location.reload();
		// 	}
		// },'json');
		
		$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
		$.post('/books/destroy/'+id,function(result){
			if(result.code='00000'){
				location.reload();
			}
		},'json');
	}

});
</script>

</body>
</html>


