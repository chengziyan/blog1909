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