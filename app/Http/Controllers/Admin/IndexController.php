<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //展示数据
    public function index_List(){

            return view('admin.abc');

    }

    //添加
    public function index_add(Request $request){

    }

    //删除
    public function index_del(){}

    //编辑
    public function index_set(){}

}
