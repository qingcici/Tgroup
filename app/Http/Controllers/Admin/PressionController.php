<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PressionController extends Controller
{
    //展示数据
    public function pression_List(){

        return view('admin.pression-list');
    }

    //添加
    public function pression_add(){}

    //删除
    public function pression_del(){}

    //编辑
    public function pression_set(){}

}
