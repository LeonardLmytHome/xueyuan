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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 设备管理 <span class="c-gray en">&gt;</span> 设备列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form method="get" action="<?php echo U('Equip/index');?>">
	<div class="text-c" style="margin-top: 30px;">
		
		 <span class="select-box inline">
			<select class="select" name="cate">
				<option value="0">全部状态</option>
				<!-- <option <?php if($_GET['cate'] == 1): ?>selected<?php endif; ?> value="1">未激活</option> -->
				<option <?php if($_GET['cate'] == 2): ?>selected<?php endif; ?> value="2">已激活</option>
				<option <?php if($_GET['cate'] == 3): ?>selected<?php endif; ?> value="3">已过期</option>
			</select>
		</span>
		<input name="c" type="hidden" value="<?php echo ($kongzhi["c"]); ?>">
        <input name="a" type="hidden" value="<?php echo ($kongzhi["a"]); ?>">
	安装日期：
		<input type="text" onfocus="WdatePicker()" name="start" value="<?php echo ($_GET['start']); ?>" id="txtBeginDate" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker()" name="end" value="<?php echo ($_GET['end']); ?>" id="txtEndDate" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="教学点名/手机号/验证码" name="keyword" value="<?php echo ($_GET['keyword']); ?>">
		<button type="submit" class="btn btn-success radius"><i class="Hui-iconfont">&#xe665;</i> 搜设备</button>
	</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
	 <span class="l">
		<a href="javascript:;" onclick="return delmuti3();" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		 <!--<a class="btn btn-primary radius" data-title="添加<?php echo ($cons2); ?>"  href="<?php echo U('equip/add');?>"><i class="Hui-iconfont">&#xe600;</i> 添加<?php echo ($cons2); ?></a>-->
	 </span>
	<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<div class="mt-20">
	<form name="delmuti2">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="1%"><input type="checkbox" name="" value=""></th>
				<th width="12%">教学点名称</th>
				<th width="6%">手机号</th>
				<th width="5%">验证码</th>
				<th width="6%">状态</th>
				<th width="6%">安装日期</th>
				<th width="6%">到期日期</th>
				<th width="6%">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($user)): if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
				<td>
				<?php if($vo['over_time'] > time()): if($vo['stu'] == 1): ?><input class="duoxuan" type="checkbox" name="ids[]" value="<?php echo ($vo["id"]); ?>"><?php endif; ?>
				<?php else: ?>
				<input class="duoxuan" type="checkbox" name="ids[]" value="<?php echo ($vo["id"]); ?>"><?php endif; ?>	
				</td>
				<td class="ser_gao"><?php if(!empty($vo['user_name'])): if($vo['stu'] == 2): ?><input name="user_name" type="text" class="input-text" style="width:190px;font-size:8px;text-align:center;" value="<?php echo ($vo["user_name"]); ?>"><?php else: echo ($vo["user_name"]); endif; else: ?>-----<?php endif; ?></td>
				<td class="ser_gao">
				<?php if($vo['stu'] == 2): ?><input name="tel" type="text" class="input-text" style="width:100px;font-size:8px;text-align:center;" value="<?php echo ($vo["tel"]); ?>">
				<?php else: ?>
				<?php echo ($vo["tel"]); endif; ?>
				</td>
				<td  class="ser_gao"><?php echo ($vo["name"]); ?></td>
				<td>
				<?php if($vo['stu'] == 1): ?><span class="label label-success radius">未激活</span>
					<?php else: ?>
					<?php if($vo['over_time'] > time()): ?><span class="label label-danger radius" >已激活</span>
						<?php else: ?>
						<span class="label label-warning radius" >已过期</span><?php endif; endif; ?>
				</td>
				<td><?php if($vo['stu'] == 2): echo (date('Y-m-d H:i',$vo["add_time"])); else: ?>-----<?php endif; ?></td>
				<td>
				<?php if($vo['stu'] == 1): ?>-------
					<?php else: ?>
					<?php if($vo['over_time'] > time()): echo (date('Y-m-d H:i:s',$vo["over_time"])); ?>
					<?php else: ?>
						<input type="text" onfocus="WdatePicker({ dateFmt: 'yyyy-MM-dd HH:mm:ss' })"  name="over_time" value="<?php echo (date('Y-m-d H:i:s',$vo["over_time"])); ?>" id="txtEndDate" class="input-text Wdate" style="width:150px;font-size:8px;"><?php endif; endif; ?>
				</td>
				<td>
					<?php if($vo['stu'] == 2): if($vo['over_time'] > time()): ?><a style="text-decoration:none" class="ml-5" onclick="return dian(this,<?php echo ($vo["id"]); ?>)" href="javascript:;" title="调整设备信息"><i class="Hui-iconfont">&#xe6df;</i></a>
						<?php else: ?>
							<a style="text-decoration:none" class="ml-5" onclick="return dian_time(this,<?php echo ($vo["id"]); ?>)" href="javascript:;" title="调整设备信息"><i class="Hui-iconfont">&#xe6df;</i></a>
							<!-- <a style="text-decoration:none" class="ml-5"  onClick="del(<?php echo ($vo["id"]); ?>)" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a> --><?php endif; ?>
					<?php else: ?>
					<!-- <a style="text-decoration:none" class="ml-5"  onClick="del(<?php echo ($vo["id"]); ?>)" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a> --><?php endif; ?>
					
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php else: ?>
			<tr><td colspan='11' style="text-align:center;">暂时没有数据！</td></tr><?php endif; ?>
		</tbody>
	</table>
	</form>
	<?php echo ($page); ?>
	</div>
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
    var v = $("input[name='keyword']").val();
    $(".ser_gao").textSearch(v);
}
window.onload=init;
/*删除*/
function del(id){
	layer.confirm('确认要删除吗？',function(index){
		var index2 = layer.load(2);
		var url = "<?php echo U('equip/del');?>";
		$.post(url,{"id":id},function(data){
			layer.close(index2);
			if(data.status == 1){	
				location.replace(location.href);
				layer.msg(data.msg,{icon:1,time:1000});
			}else{
				layer.msg(data.msg,{icon:1,time:1000});
			}
		})
	});
}
function delmuti3(){
	var chks=$('.duoxuan');
	var bl=true;
	var str = "";
	$('.duoxuan').each(function(){
		if($(this).is(':checked'))
		{
			bl=false;
			if(str == ""){
				str = $(this).val();
			}else{
				str += ","+$(this).val();
			}
			//break;
		}
	})
	if(bl){
		layer.alert('请选择要删除的数据');
		return ;
	}
	var url = "<?php echo U('equip/delmuti');?>";

	layer.confirm('确认要批量删除吗？',function(index){
		var index2 = layer.load(2);
		$.post(url,{"ids":str},function(data){
			layer.close(index2);
			if(data.status == 1){
				location.replace(location.href);
				layer.msg(data.msg,{icon:1,time:1000});
			}else{
				layer.msg(data.msg,{icon:1,time:1000});
			}
		})
	});
}
//调整
 function dian(o,id){
		layer.confirm('确认调整设备信息吗？',function(index){
			var index2 = layer.load(2);
			var over_time = $(o).parent('td').prev().find("input[name='over_time']").val();
			var user_name = $(o).parent('td').prev().prev().prev().prev().prev().prev().find("input[name='user_name']").val();
			var tel = $(o).parent('td').prev().prev().prev().prev().prev().find("input[name='tel']").val();
			var url = "<?php echo U('equip/user_change');?>";
			$.post(url,{"id":id,"user_name":user_name,"tel":tel,"over_time":over_time},function(data){
				layer.close(index2);		
				if(data.status == 1){
					location.replace(location.href);
					layer.msg(data.msg,{icon:6,time:1000});
				}else{
					layer.msg(data.msg,{icon:5,time:1000});
				}
			})
		});
            
};
//调整
 function dian_time(o,id){
		layer.confirm('确认调整设备信息吗？',function(index){
			var index2 = layer.load(2);
			var over_time = $(o).parent('td').prev().find("input[name='over_time']").val();
			var user_name = $(o).parent('td').prev().prev().prev().prev().prev().prev().find("input[name='user_name']").val();
			var tel = $(o).parent('td').prev().prev().prev().prev().prev().find("input[name='tel']").val();
			var url = "<?php echo U('equip/user_change_time');?>";
			$.post(url,{"id":id,"user_name":user_name,"tel":tel,"over_time":over_time},function(data){
				layer.close(index2);		
				if(data.status == 1){
					location.replace(location.href);
					layer.msg(data.msg,{icon:6,time:1000});
				}else{
					layer.msg(data.msg,{icon:5,time:1000});
				}
			})
		});
            
};

</script>
</body>
</html>