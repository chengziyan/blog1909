<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品修改</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body> 
<center><h1>商品修改</h1></center><hr/>
<form action="{{url('/goods/update/'.$goods->goods_id)}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
{{csrf_field()}}
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" value="{{$goods->goods_name}}" id="firstname" name="goods_name"
				   placeholder="请输入商品名称">
				    <b style="color:red">{{$errors->first('goods_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品货号</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" value="{{$goods->goods_huo}}" id="firstname" name="goods_huo"
				   placeholder="请输入商品货号">
				   <b style="color:red">{{$errors->first('goods_huo')}}</b>
		</div>
    </div>
    
     <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品价格</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" value="{{$goods->goods_price}}" id="firstname" name="goods_price"
				   placeholder="请输入商品价格">
				   <b style="color:red">{{$errors->first('goods_price')}}</b>
		</div>
    </div>
     <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品库存</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" value="{{$goods->goods_num}}" id="firstname" name="goods_num"
				   placeholder="请输入商品库存">
				   <b style="color:red">{{$errors->first('goods_num')}}</b>
		</div>
    </div>
     <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-8">
            <input type="radio"   name="is_show" value="是" checked>是
            <input type="radio"   name="is_show" value="否">否
		</div>
    </div>
     <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否新品</label>
		<div class="col-sm-8">
            <input type="radio"   name="is_new" value="是" checked>是
            <input type="radio"   name="is_new" value="否">否
		</div>
    </div>
     <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否精品</label>
		<div class="col-sm-8">
            <input type="radio"   name="is_best" value="是" checked>是
            <input type="radio"   name="is_best" value="否">否
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品图片</label>
        @if($goods->goods_img)
        <img width="45" height="45" src="{{env('UPLOADS_URL')}}{{$goods->goods_img}}">
        @endif
		<div class="col-sm-4">
			<input type="file" class="form-control" id="firstname" name="goods_img">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品详情</label>
		<div class="col-sm-8">
			<textarea type="text" class="form-control" id="firstname" name="goods_desc"
				   placeholder="商品详情">{{$goods->goods_desc}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>
