<h1>控制器</h1>
<hr>
<form action="{{url('/adddo')}}" method="post">
	{{csrf_field()}}
	<!-- @csrf -->
	<input type="text" name="name"></input>
	<button>提交</button>
</form>