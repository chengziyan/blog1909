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
				<th><a href="{{url('/books/edit/'.$v->books_id)}}" type="button" class="btn btn-primary">修改</a>
				   -<a href="{{url('/books/destroy/'.$v->books_id)}}" type="button" class="btn btn-danger">删除</a></th>
			</tr>
			@endforeach
			<tr><td colspan="6">{{$books->appends($query)->links()}}</td></tr>