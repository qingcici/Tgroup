<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //展示数据
    public function user_List(){

        return view('admin.user-list');
    }

    //添加
    public function user_add(){}

    //删除
    public function user_del(){}

    //编辑
    public function user_set(){}

}
