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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ceshi', function () {
    return view('index');
});

Route::get('/user','User1Controller@abc');
//后台管理
Route::group(['namespace' => 'Admin'], function(){
     //首页
    Route::any('admin/index','IndexController@index_List');
    Route::any('admin/index-add','IndexController@index_add');
    // 控制器在 "App\Http\Controllers\Admin" 命名空间下
    //管理员
    Route::get('admin/admin-list','AdminController@admin_list');
    Route::get('admin/add','AdminController@admin_add');
    Route::get('admin/set','AdminController@admin_set');
    Route::get('admin/del','AdminController@admin_del');

    //商品
    Route::get('admin/goods-list','GoodsController@goods_list');
    Route::get('admin/goods-data','GoodsController@goods_data');
    Route::get('admin/add','GoodsController@goods_add');
    Route::get('admin/set','GoodsController@goods_set');
    Route::get('admin/del','GoodsController@goods_del');

    //品牌
    Route::get('admin/brand-list','BrandController@brand_List');
    Route::get('admin/add','BrandController@brand_add');
    Route::get('admin/set','BrandController@brand_set');
    Route::get('admin/del','BrandController@brand_del');

    //订单
    Route::get('admin/order-list','OrderController@order_list');
    Route::get('admin/add','OrderController@order_add');
    Route::get('admin/set','OrderController@order_set');
    Route::get('admin/del','OrderController@order_del');

    //权限
    Route::get('admin/pression-list','PressionController@pression_list');
    Route::get('admin/add','PressionController@pression_add');
    Route::get('admin/set','PressionController@pression_set');
    Route::get('admin/del','PressionController@pression_del');

    //用户
    Route::get('admin/user-list','UserController@user_list');
    Route::get('admin/add','UserController@user_add');
    Route::get('admin/set','UserController@user_set');
    Route::get('admin/del','UserController@user_del');

    //分类
    Route::get('admin/list','CategoryController@category_list');
    Route::get('admin/add','CategoryController@category_add');
    Route::get('admin/set','CategoryController@category_set');
    Route::get('admin/del','CategoryController@category_del');


});


Route::group(['namespace' => 'Home'], function(){
    // 控制器在 "App\Http\Controllers\Home" 命名空间下
});





Route::get('blade', function () {
    return view('child');
});
Route::get('abc', function () {
    return view('abc');
});

//明天把框架搭好并且下午继续做  --1月5号  **任务