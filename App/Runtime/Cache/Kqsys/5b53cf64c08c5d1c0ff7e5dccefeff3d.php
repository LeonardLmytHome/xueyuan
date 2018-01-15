<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <LINK rel="Bookmark" href="/favicon.ico">
    <LINK rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/layui-v2.2.5/layui/css/layui.css" />
    <!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
    <!--/meta 作为公共模版分离出去-->

    <title></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
</head>

<body>
    <style>
    .layui-table-cell{overflow:inherit;}
    .main_oImg{position: relative;width: 20px;height: 20px;}
    .main_oImg img:first-child{cursor: pointer;}
    .lImg{position: absolute;top: 100%;left: 100%;z-index: 1;display: none;}
    </style>
    <div style="width: 216px; margin: 20px;">
    	<a href="<?php echo U('Article/article');?>">
    <button class="layui-btn layui-btn-fluid add">新增</button>
    </a>
    </div>
    <table class="layui-hide" id="test" lay-filter="demo"></table>

    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>
    <script type="text/html" id="imgTpl">
        <div class="main_oImg">
            <img src="{{d.img}}" width="20" class="oImg" />
            <img src="{{d.img}}" class="lImg" width="500" />
        </div>
    </script>
    <!--_footer 作为公共模版分离出去-->
    <script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/lib/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/messages_zh.min.js"></script> 
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
<script language="javascript" type="text/javascript" src="/Public/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/lib/jquery.textSearch-1.0.js"></script> 
<!--分页样式-->
<script type="text/javascript">
    $("#page a").hover(function(){
        $(this).addClass('current');
    },function(){
        $(this).removeClass('current');
    })
</script>
<style>
    #page a{
        background: #EEE none repeat scroll 0% 0%;
        margin: 0px 3px;
        border-radius: 3px;
        padding: 2px 5px;
        color: rgb(102, 102, 102);
        text-decoration:none;
    }
    #page .current{
        background: #ff8a00 none repeat scroll 0% 0%;
        font-size: 12px;
        color: #FFF;
        margin: 0px 3px;
        border-radius: 3px;
        padding: 2px 5px;
    }
</style>
    <!--/_footer /作为公共模版分离出去-->

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="/Public/static/h-ui.admin/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/Public/static/h-ui.admin/layui-v2.2.5/layui/layui.js"></script>
    <script type="text/javascript">
        layui.use(['layer', 'table'], function () {
            var layer = layui.layer, //弹层
                table = layui.table //表格
            //执行一个 table 实例
            table.render({
                elem: '#test'
                , height: 500
                , url: "<?php echo U('Article/article_list');?>" //数据接口
                , page: true //开启分页
                , cols: [[ //表头
                    { field: 'id', title: 'ID', width: 60, sort: true, fixed: 'left' }
                    , { field: 'title', title: '文章名称', width: 180 }
                    , { field: 'img', title: '图标', width: 80 ,templet:"#imgTpl" }
                    , { field: 'maintitle', title: '主分类', width: 180  }
                    , { field: 'subtitle', title: '子分类', width: 180  }
                    , { field: 'sitename', title: '教学点', width: 180 }
                    , { field: 'phone', title: '联系号码', width: 100  }
//                  , { field: 'addtime', title: '添加时间', width: 200, sort: true }
                    , { field: 'disable', title: '禁用', width: 80, sort: true }
                    ,{fixed: 'right', width: 100, align:'center', toolbar: '#barDemo'}
                ]]
            });

            //监听工具条
            table.on('tool(demo)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
                var data = obj.data //获得当前行数据
                    , layEvent = obj.event; //获得 lay-event 对应的值
                if (layEvent === 'del') {
                    layer.confirm('真的删除行么', function (index) {
                        $.get("<?php echo U('Article/article_del');?>"+"&id="+data.id,function(res){
                            if(!!res.status){
                                obj.del(); //删除对应行（tr）的DOM结构
                                layer.close(index);
                            }
                            layer.msg(res.info);
                        })
                    });
                } else if (layEvent === 'edit') {
                	window.location.href = "<?php echo U('Article/article');?>"+"&id="+data.id+"&p_id="+data.p_id+"&c_id="+data.c_id+"&s_id="+data.s_id;
                }
            });
        })

        
        $(".oImg").live('mouseenter',function(){
            $(this).parent().find(".lImg").show()
        })
        
        $(".oImg").live('mouseleave',function(){
            $(this).parent().find(".lImg").hide()
        })
    </script>
    <!--/请在上方写此页面业务相关的脚本-->
</body>

</html>