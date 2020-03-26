@extends('layouts.shop') 
@section('title','购物车列表')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><span class="hui">购物车共有：<strong class="orange">{{$count}}</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(/static/index/images/xian.jpg) left center no-repeat;">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
       </td>
      </tr>
     </table>

     @foreach($cartInfo as $v)
     <div class="dingdanlist">
      <table>
       <tr goods_id="{{$v->goods_id}}" id="cart_tr">
        <td width="4%"><input type="checkbox" class="box" id="cart_tr" goods_id="{{$v->goods_id}}" id="cart_tr" name="1" /></td>
        <td class="dingimg" width="15%"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" /></td>
        <td width="50%">
         <h3>{{$v->goods_name}}</h3>
         <time>下单时间：{{date("Y-m-d H:i:s",$v->addtime)}}</time>
        <th colspan="4"><strong class="orange">单价:¥{{$v->goods_price}}</strong></th>

        </td>
        <td align="right"><input type="text" value="{{$v->buy_num}}" class="c_num" /></td>
       </tr>
       <tr>
        <th colspan="4"><strong class="orange">小计:¥{{$v->goods_price*$v->buy_num}}</strong></th>
       </tr>
       @endforeach

      </table>
     </div><!--dingdanlist/-->
     <div class="height1"></div>
     <div class="gwcpiao">

     <table>
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange" >¥69.88</strong></td>
       <td width="40%"><a href="{{url('/confirm')}}" class="jiesuan">去结算</a></td>
      </tr>
     </table>
  <script>
    $(function(){
      $(".jiesuan").click(function(){
        var _this = $(this);
        var box = $(".box:checked");
        if(box.length == 0){
        alert('请选择要结算的商品');
        return false;
        }
         
            var str = '';
             box.each(function(){
                str += $(this).parents("tr#cart_tr").attr('goods_id')+','; 
             });
             str = str.trim();
             str = str.substr(0,str.length-1);
             location.href="/pay/?ids="+str;
   
      //  location.href="/pay";
    });
  });
</script>

    </div><!--gwcpiao/-->
<!-- @include('index.public.footer'); -->
@endsection