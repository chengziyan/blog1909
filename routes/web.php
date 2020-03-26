<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/goods','IndexController@goods');

// Route::get('/add',function(){
// 	echo '<form action="/adddo" method="post">'.csrf_field().' <input type="text" name="name"><button>提交</button></input></form>';
// });
// Route::post('/adddo', function () {
//     echo request()->name;
// });

// Route::get('/add','IndexController@add');
// Route::post('/adddo','IndexController@adddo');

// 一个路由支持多种请求方式
// Route::match(['get','post'],'/add','IndexController@add');
// Route::any('/add','IndexController@add');

// 路由视图
// Route::view('/add','add');
// Route::get('/add','IndexController@add');

// 必填路由参数
// Route::get('/show/{id}/{name}',function($id,$goods_name){
// 	echo $id."==".$goods_name;
// });
// Route::get('/show/{id}/{name}','IndexController@show');

// 可选路由参数
// Route::get('/news/{id}/{name?}',function($id,$goods_name=null){
// 	echo $id."==".$goods_name;
// });
// Route::get('/news/{id?}','IndexController@news');

// 正则约束
// Route::get('/news/{id?}','IndexController@news')->where('id','[0-9]+');
// Route::get('/news/{id?}','IndexController@news')->where('id','\d+');
// Route::get('cate/{id}/{name?}','IndexController@cate')->where(['id'=>'\d+','name'=>'[a-zA-Z]+']);

//品牌模块增删改查 CURD
//路由分组
Route::prefix('brand')->middleware('islogin')->group(function(){
    Route::get('create','BrandController@create');
    Route::post('store','BrandController@store');
    Route::get('index','BrandController@index');
    Route::get('edit/{id}','BrandController@edit');
    Route::post('update/{id}','BrandController@update');
    Route::get('destroy/{id}','BrandController@destroy');
});
// Route::get('/brand/create','BrandController@create');
// Route::post('/brand/store','BrandController@store');
// Route::get('/brand/index','BrandController@index');
// Route::get('/brand/edit/{id}','BrandController@edit');
// Route::post('/brand/update/{id}','BrandController@update');
// Route::get('/brand/destroy/{id}','BrandController@destroy');


//学生添加
Route::get('/student/create','StudentController@create');
Route::post('/student/store','StudentController@store');

//分类添加
Route::get('/category/create','CategoryController@create');
Route::post('/category/store','CategoryController@store');
Route::get('/category/index','CategoryController@index');
Route::get('/category/edit/{id}','CategoryController@edit');
Route::post('/category/update/{id}','CategoryController@update');
Route::get('/category/destroy/{id}','CategoryController@destroy');

//售楼添加展示ORM
Route::get('/house/create','HouseController@create');
Route::post('/house/store','HouseController@store');
Route::get('/house/index','HouseController@index');

//商品
Route::prefix('goods')->group(function(){
    Route::get('create','GoodsController@create');
    Route::post('store','GoodsController@store')->name('goodsstore');
    Route::get('index','GoodsController@index');
    Route::get('edit/{id}','GoodsController@edit');
    Route::post('update/{id}','GoodsController@update')->name('goodsupdate');
    Route::get('destroy/{id}','GoodsController@destroy');
});

//图书添加，展示
Route::prefix('book')->group(function(){
    Route::get('create','BookController@create');
    Route::post('store','BookController@store');
    Route::get('index','BookController@index');
});

//用户管理员CURD
Route::prefix('user')->group(function(){
    Route::get('create','UserController@create');
    Route::post('store','UserController@store');
    Route::get('index','UserController@index');
    Route::get('edit/{id}','UserController@edit');
    Route::post('update/{id}','UserController@update');
    Route::get('destroy/{id}','UserController@destroy');
});

// Route::prefix('user')->group(function(){
//     Route::get('create','UserController@create');
//     Route::post('store','UserController@store');
//     Route::get('index','UserController@index');
//     Route::get('edit/{id}','UserController@edit');
//     Route::post('update/{id}','UserController@update');
//     Route::get('destroy/{id}','UserController@destroy');
// });

//新闻模块
Route::prefix('news')->group(function(){
    Route::get('create','NewsController@create');
    Route::post('store','NewsController@store');
    Route::get('index','NewsController@index');
});

//后台登录
Route::get('login','LoginController@login');
Route::post('logindo','LoginController@logindo');

//文章管理
Route::prefix('books')->group(function(){
    Route::get('create','BooksController@create');
    Route::post('store','BooksController@store');
    Route::get('index','BooksController@index')->middleware('islogin');
    Route::get('edit/{id}','BooksController@edit');
    Route::post('update/{id}','BooksController@update');
    // Route::get('destroy/{id}','BooksController@destroy');
    Route::post('destroy/{id}','BooksController@destroy');
    Route::get('checkOnly','BooksController@checkOnly');
});

//项目前台
Route::get('/','Index\IndexController@index')->name('index')->middleware('islogin');;
Route::get('/log','Index\LoginController@log');
Route::any('/doLog','Index\LoginController@doLog');
Route::get('/reg','Index\LoginController@reg');
Route::any('/doRegister','Index\LoginController@doRegister');
Route::get('/reg/sendSMS','Index\LoginController@sendSMS');
Route::get('/reg/sendEmail','Index\LoginController@sendEmail');



Route::get('/cookie/add','Index\LoginController@addcookie');
Route::get('/cookie/get','Index\LoginController@getcookie');

//商品详情
Route::get('/goods/{id}','Index\GoodsController@index')->name('goods');
Route::post('/addcart','Index\GoodsController@addcart');
// 购物车
Route::get('/cartlist','Index\CartController@cartlist')->name('cart');
// 确认订单
Route::get('/confirm','Index\CartController@confirm');
//新增收货地址
Route::get('/address','Index\CartController@confirm');
//提交订单
Route::get('/success/{id}','Index\CartController@success');
//支付
Route::get('/pay/{orderid}','Index\PayController@pay');


//登录认证
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
