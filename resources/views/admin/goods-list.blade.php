@extends('app')

@section('') @show
@section('button1')
    @parent
 {{--   <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">开关-默认关</label>
            <div class="layui-input-block">
                <input type="checkbox" name="close" lay-skin="switch" lay-text="上架|下架">
            </div>
        </div>
    </form>--}}
    <div class="layui-tab layui-tab-card" lay-filter="goods-tab">
        <div class="layui-tab-content" >
    <form class="layui-form seller-form"  action="" >
        <div class="layui-form-item">

            <div class="layui-inline">
                <label class="layui-form-label">商品名称：</label>
                <div class="layui-input-inline seller-inline-4">
                    <input type="text" name="goods_name" lay-verify="title" placeholder="请输入商品名称" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-inline">
                <button class="layui-btn layui-btn-sm" lay-submit lay-filter="goods-search"><i class="iconfont icon-chaxun"></i>筛选</button>
            </div>
        </div>

    </form>
        </div>
    </div>
    <div class="layui-tab layui-tab-card" lay-filter="goods-tab">
        <div class="layui-tab-content" >
    <table class="layui-hide" id="test" lay-filter="test"></table>
            <script type="text/html" id="switchTpl">
                <!-- 这里的 checked 的状态只是演示 -->
                <input type="checkbox" name="sex"  lay-skin="switch" lay-text="女|男" lay-filter="sexDemo" >
            </script>
        </div>
    </div>

                         <script type="text/html" id="toolbarDemo">
                             <div class="layui-btn-container">
                                 <button class="layui-btn layui-btn-sm" lay-event="getCheckData">获取选中行数据</button>
                                 <button class="layui-btn layui-btn-sm" lay-event="getCheckLength">获取选中数目</button>
                                 <button class="layui-btn layui-btn-sm" lay-event="isAll">验证是否全选</button>
                             </div>
                         </script>

                         <script type="text/html" id="barDemo">
                             <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
                             <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                         </script>


                         <script src="{{URL::asset('layui/layui.js')}}" charset="utf-8"></script>

                         <script src="{{URL::asset('/admin/js/jquery-3.3.1.min.js')}}" charset="utf-8"></script>
                         <script>
                             layui.use(['table','form'], function(){
                                 var table = layui.table;
                                 var form = layui.form;
                                 var filter = {};
                                 table.render({
                                     elem: '#test'
                                     ,id:'test'
                                     ,url:'goods-data'
                                     ,toolbar: '#toolbarDemo'
                                     ,title: '用户数据表'
                                     ,page: true
                                     ,width: 1120
                                     ,limit:10
                                     ,cols: [[
                                         {type: 'checkbox', fixed: 'left'}
                                         ,{field:'goods_id', title:'ID', width:80,  align: 'center',fixed: 'left', sort: true}
                                         ,{field:'brand_id', title:'品牌', width:120, align: 'center',
                                             templet: '#switchTpl', unresize: true
                                         }
                                         ,{field:'cate_id', title:'分类', align: 'center',width:100
                                         }
                                         ,{field:'goods_code', title:'商品编码',align: 'center', width:120, edit: 'text', sort: true}
                                         ,{field:'goods_name', title:'商品名称',align: 'center', width:120}
                                         ,{field:'info_desc', title:'商品详情',align: 'center', edit: 'text',width:120}
                                         ,{field:'coment_count', title:'评论总次数',align: 'center', width:120}
                                         ,{field:'info_date', title:'商品生产日期',align: 'center', width:120}
                                         ,{field:'supplier_id', title:'商品供应商',align: 'center', width:120}
                                         ,{field:'price', title:'商销售价格',align: 'center',width:120}
                                         ,{field:'market_price', title:'商品价格',align: 'center', width:120}
                                         ,{field:'stock', title:'商品库存',align: 'center', width:120}
                                         ,{field:'goods_status', title:'状态', align: 'center',width:120}
                                         ,{field:'audit_status', title:'审核',align: 'center',width:120}
                                         ,{field:'create_time', title:'创建时间',align: 'center', width:120}
                                         ,{field:'update_time', title:'修改时间',align: 'center',width:120}
                                         ,{fixed: 'right', title:'操作',align: 'center', toolbar: '#barDemo', width:150}
                                     ]]

                                 });

                                 table.on('edit(test)', function(obj){ //注：edit是固定事件名，test是table原始容器的属性 lay-filter="对应的值"
                                     console.log(obj.value); //得到修改后的值
                                     console.log(obj.field); //当前编辑的字段名
                                    // console.log(obj.data); //所在行的所有相关数据
                                 });

                                 layui.form.on('submit(goods-search)', function(data){
                                     var tempfilter=$.extend({},filter,data.field);//合并tab筛选和普通搜索
                                     console.log( tempfilter )
                                     table.reload('test',{
                                         where:tempfilter
                                         ,page: {
                                             curr: 1 //重新从第 1 页开始
                                         }


                                     });
                                     return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
                                 });

                                table.form.on('switch(brand_idDemo)', function(obj){
                                     layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
                                 });

                                 //头工具栏事件
                                 table.on('toolbar(test)', function(obj){
                                     var checkStatus = table.checkStatus(obj.config.id);
                                     switch(obj.event){
                                         case 'getCheckData':
                                             var data = checkStatus.data;
                                             layer.alert(JSON.stringify(data));
                                             break;
                                         case 'getCheckLength':
                                             var data = checkStatus.data;
                                             layer.msg('选中了：'+ data.length + ' 个');
                                             break;
                                         case 'isAll':
                                             layer.msg(checkStatus.isAll ? '全选': '未全选');
                                             break;
                                     };
                                 });

                                 //监听行工具事件
                                 table.on('tool(test)', function(obj){
                                     var data = obj.data;
                                     //console.log(obj)
                                     if(obj.event === 'del'){
                                         layer.confirm('真的删除行么', function(index){
                                             obj.del();
                                             layer.close(index);

                                             console.log(index)
                                         });
                                     } else if(obj.event === 'edit'){
                                         layer.prompt({
                                             formType: 2
                                             ,value: data.username
                                         }, function(value, index){
                                             obj.update({
                                                 username:value
                                             });
                                             layer.close(index);
                                             console.log(index+'***'+value)
                                         });
                                     }
                                 });
                             });
                         </script>

@endsection


