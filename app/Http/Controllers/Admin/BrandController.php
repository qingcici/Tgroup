<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    //展示数据
    public function brand_List(){

        return view('admin.brand-list');
    }

    //添加
    public function brand_add(){}

    //删除
    public function brand_del(){}

    //编辑
    public function brand_set(){}

}
