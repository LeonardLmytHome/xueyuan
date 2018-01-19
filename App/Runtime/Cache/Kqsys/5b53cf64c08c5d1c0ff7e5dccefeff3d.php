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
    <form class="layui-form layui-form-pane">
    	<div class="layui-form-item" style="padding: 20px;margin-bottom: 0;">
	    	<div class="layui-inline">
		      <label class="layui-form-label">文章名称</label>
		      <div class="layui-input-inline">
		        <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input" value="<?php echo ($article["title"]); ?>">
		      </div>
		    </div>
	    	<div class="layui-inline">
		      <label class="layui-form-label">主分类</label>
		      <div class="layui-input-inline">
		        <select name="p_id" lay-search="" lay-filter="p_id">
		          <option value="0">直接选择或搜索选择</option>
		          <?php if(is_array($main_classify)): $i = 0; $__LIST__ = $main_classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		        </select>
		      </div>
		       <div class="layui-input-inline">
		        <select name="c_id" lay-search="" lay-filter="c_id">
		          <option value="0">直接选择或搜索选择</option>
		        </select>
		      </div>
		    </div>
		    <div class="layui-inline">
		      <label class="layui-form-label">教学点</label>
		      <div class="layui-input-inline">
		        <select name="s_id" lay-search="">
		          <option value="0">直接选择或搜索选择</option>
		          <?php if(is_array($site)): $i = 0; $__LIST__ = $site;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		        </select>
		      </div>
		    </div>
		    <button class="layui-btn layui-btn-fluid search" type="button" style="width: 200px;">查询</button>
		    <a href="<?php echo U('Article/article');?>">
		        <button class="layui-btn layui-btn-fluid  layui-btn-normal" type="button" style="width: 200px;"><i class="layui-icon">&#xe654;</i>新增文章</button>
		    </a>
	    </div>
    </form>
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
        layui.use(['layer', 'table', 'form'], function () {
            var layer = layui.layer, //弹层
                table = layui.table, //表格
            form = layui.form 
            //执行一个 table 实例
            var tableIns = table.render({
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
            
            //搜索
            $(".search").click(function(){
            	var index=layer.load(1, {shade: [0.1,'#fff'] });
				tableIns.reload({
				  where: { 
				    title: $("input[name='title']").val(),
				    p_id: $("select[name='p_id'] option:checked").val(),
				    c_id: $("select[name='c_id'] option:checked").val(),
				    s_id: $("select[name='s_id'] option:checked").val()
				  }
				  ,page: {
				    curr: 1 
				  },done:function(){
				  	layer.close(index);
				  }
				});
            })
            
            form.on('select(p_id)', function(data){        	
	        	getSubc(data.value)
			});      
            
	        function getSubc(data)
		    {
		    	var index=null;
		    	$.ajax({
	             type: "POST",
	             url: "<?php echo U('Article/getSubClassify');?>",
	             data: {id:data},
	             dataType: "json",
	             beforeSend:function(){
	             	index = layer.load(1, {shade: [0.1,'#fff'] });
	             },
	             success: function(res){
	                if(!!res.status){
				  		var html = '';
					  	for(var i = 0;i < res.info.length;i++){
					  		html += '<option value="' + res.info[i].id + '">' + res.info[i].title + '</option>';
					  	}
					  	$("select[name='c_id']").html(html);
					  	form.render('select'); //刷新select选择框渲染
				  	}else{
				  		layer.msg(res.info)
				  	}      
	             },
	             complete:function(){
	             	layer.close(index);
	             }
	        });
		    }

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