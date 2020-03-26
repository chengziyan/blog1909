@foreach($brand as $v)
		<tr class="active">
			<td>{{$v->brand_id}}</td>
			<td>{{$v->brand_name}}</td>
			<td>{{$v->brand_url}}</td>
			<td>
				@if($v->brand_logo)
				<img width="45" height="45" src="{{env('UPLOADS_URL')}}{{$v->brand_logo}}">
				@endif
			</td>
			<td>
				@if($v->brand_imgs)
				@php $brand_imgs = explode('|',$v->brand_imgs);@endphp
				@foreach($brand_imgs as $vv)
				<img width="45" height="45" src="{{env('UPLOADS_URL')}}{{$vv}}">
				@endforeach
				@endif
			</td>
			<td>{{$v->brand_desc}}</td>
			<td>
				<a href="{{url('/brand/edit/'.$v->brand_id)}}" type="button" class="btn btn-primary">编辑</a>
				<a href="{{url('/brand/destroy/'.$v->brand_id)}}" type="button" class="btn btn-warning">删除</a>
			</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="6">
				{{$brand->appends($query)->links()}}
			</td>
		</tr>