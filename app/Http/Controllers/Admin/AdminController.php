<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //展示数据
    public function admin_list(){

        return view('admin.admin-list');
    }

    //添加
    public function admin_add(){}

    //删除
    public function admin_del(){}

    //编辑
    public function admin_set(){}


}
