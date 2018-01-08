<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/lib/html5.js"></script>
<script type="text/javascript" src="/Public/lib/respond.min.js"></script>
<script type="text/javascript" src="/Public/lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/Public/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
    <!--去除浏览器自带的小箭头-->
    <style>
        input[type=number] {
            -moz-appearance:textfield;
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
		.ser_gao_bg{
			background: #FFF;
			color: red;
		}
    </style>
<title></title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form action="<?php echo U('Admin/index');?>" method="get">
	<div class="text-c"> 加入时间：	
		<input name="c" type="hidden" value="<?php echo ($kongzhi["c"]); ?>">
		<input name="a" type="hidden" value="<?php echo ($kongzhi["a"]); ?>">
		<input name="start" value="<?php echo ($_GET['start']); ?>" type="text"  onfocus="WdatePicker()"  id="txtBeginDate" class="input-text Wdate" style="width:120px;">
		-
		<input name="end" value="<?php echo ($_GET['end']); ?>" type="text" onfocus="WdatePicker()" id="txtEndDate" class="input-text Wdate" style="width:120px;">
		<input type="text" value="<?php echo ($_GET['key']); ?>" name="key" id="" placeholder=" 输入登录名/姓名/手机号/邮箱" style="width:250px" class="input-text">
		<button name="" id="search" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜管理员</button>
	</div>
	</form>
		<!--s-->
	<form action="<?php echo U('Admin/del');?>" method="post">
	<input type="hidden" name="id" value="">
	<!--e-->
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="<?php echo U("Admin/add");?>" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span></div>
	</form>
	<table class="table table-border table-bordered table-bg table-sort">
		<thead>

			<tr class="text-c">
				<!-- <th width="25"><input type="checkbox" name="" value=""></th> -->
				<!-- <th width="40">ID</th> -->
				<th width="8%">登录名</th>
				<th width="8%">姓名</th>
				<th width="8%">手机</th>
				<th width="10%">邮箱</th>
				<th width="10%">加入时间</th>
				<th width="8%">是否已启用</th>
				<th width="8%">操作</th>
			</tr>
		</thead>                           
		<tbody>
			<?php if(is_array($list)): foreach($list as $key=>$v): if($v["id"] != 0): ?><tr class="text-c">
				<!-- <td><input type="checkbox" value="<?php echo ($v["id"]); ?>" name="spCodesid"></td> -->
				<!-- <td><?php echo ($v["id"]); ?></td> -->
				<td class="ser_gao"><?php echo ($v["admin_name"]); ?></td>
				<td class="ser_gao"><?php echo ($v["name"]); ?></td>
				<td class="ser_gao"><?php echo ($v["phone"]); ?></td>
				<td class="ser_gao"><?php echo ($v["email"]); ?></td>
				<td><?php echo (date("Y-m-d H:i",$v["addtime"])); ?></td>
				<td>
					<?php if($v["status"] == 1): ?><span class="label label-success radius">启用</span><?php endif; ?>
					<?php if($v["status"] == 0): ?><span class="label label-danger radius">禁用</span><?php endif; ?>
				</td>
				<td>
					<?php if($v["id"] != $_SESSION['admin']['id']): if($v["status"] == 1): ?><a href="javascript:void(0)" onclick="stop(<?php echo ($v["id"]); ?>)" title="禁用"><i class="Hui-iconfont">&#xe631;</i></a><?php endif; ?>
						<?php if($v["status"] == 0): ?><a href="javascript:void(0)" onclick="start(<?php echo ($v["id"]); ?>)" title="启用"><i class="Hui-iconfont">&#xe615;</i></a><?php endif; endif; ?>
					<a title="编辑" href="<?php echo U("Admin/edit?id=".$v['id']);?>" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
					<!-- <a title="删除" href="javascript:;" onclick="admin_del(this,id)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td> -->
					<?php if($v["id"] != $_SESSION['admin']['id']): ?><a title="删除" href="javascript:;" onclick="del(<?php echo ($v["id"]); ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a><?php endif; ?>
				</td>
			</tr><?php endif; endforeach; endif; ?>
			<?php if(empty($list)): ?><tr><td colspan='8' style="text-align:center;">暂时没有数据！</td></tr><?php endif; ?>
		</tbody>
	</table>
	<div class="page"><?php echo ($page); ?></div>
</div>
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
<script type="text/javascript">
//搜索样式
function init(){
    var v = $("input[name='key']").val();
    $(".ser_gao").textSearch(v);
}
window.onload=init;

	/*管理员-增加*/
	function admin_add(title,url,w,h){
		var index = layer.open({
			type: 2,
			title: title,
			content: url
		});
		layer.full(index);
		// layer_show(title,url,w,h);
	}
	/*管理员-删除*/
	function del(o){
		layer.confirm('确认要删除吗？',function(){
			//此处请求后台程序

			$.ajax({
				type:'POST',
				url:'<?php echo U("Admin/del");?>',
				data:'id='+o,
				datatype:'json',
				success:function(data)
				{
					if(data.stu==1)
					{
						layer.msg(data.msg,{icon:1,time:2000});
						location.reload();
					}
					else
					{
						layer.msg(data.msg,{icon:2,time:2000});
					}
				}
			});
			
		});
	}
	/*管理员-编辑*/
	function admin_edit(title,url,id,w,h){
		var index = layer.open({
			type: 2,
			id:id,
			title: title,
			content: url
		});
		layer.full(index);
	}
	/*管理员-停用*/
	function stop(o){
		layer.confirm('确认要禁用吗？',function(index){
			//此处请求后台程序
			var index2 = layer.load(2);
			$.ajax({
				type:'POST',
				url:'<?php echo U("Admin/toggle");?>',
				data:'id='+o+'&type=-1',
				datatype:'json',
				success:function(data)
				{
				   layer.close(index2);
					if(data.stu==1)
					{
						layer.msg(data.msg,{icon:6,time:2000});
						location.reload();
					}
					else
					{
						layer.msg(data.msg,{icon:5,time:2000});
					}
				}
			});
		});
	}

	/*管理员-启用*/
	function start(o){
		layer.confirm('确认要启用吗？',function(){
			var index2 = layer.load(2);
			$.ajax({
				type:'POST',
				url:'<?php echo U("Admin/toggle");?>',
				data:'id='+o+'&type=1',
				datatype:'json',
				success:function(data)
				{
				 layer.close(index2);
					if(data.stu==1)
					{
						layer.msg(data.msg,{icon:6,time:2000});
						location.reload();
					}
					else
					{
						layer.msg(data.msg,{icon:5,time:2000});
					}
				}
			});
		});
	}

</script>
</body>
</html>