<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //展示数据
    public function order_List(){

        return view('admin.order-list');
    }

    //添加
    public function order_add(){}

    //删除
    public function order_del(){}

    //编辑
    public function order_set(){}

}
