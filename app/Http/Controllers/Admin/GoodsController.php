<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    //展示数据
    public function goods_List(){

        return view('admin.goods-list');
        $users = DB::table('goods_master')->get();
        $a =  json_encode([
                'code'=> 0,
                'msg'=>"",
                'count'=>1,
                'data'=> [
                    $users
                ]]

        );
        return $a;


    }

    //数据
    public function goods_data(){
        $users = DB::table('goods_master')->get();
        $a =  json_encode([
                'code'=> 0,
                'msg'=>"",
                'data'=>
                    $users

                ]
        );
        return $a;

    }

    //添加
    public function goods_add(){}

    //删除
    public function goods_del(){}

    //编辑
    public function goods_set(){}

}
