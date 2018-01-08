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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 学员管理 <span class="c-gray en">&gt;</span> 学员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form method="get" action="<?php echo U('User/index');?>">
	<div class="text-c" style="margin-top: 30px;">
		 <!-- <span class="select-box inline">
			<select class="select" name="status">
				<option value="0">全部状态</option>
				<option <?php if($_GET['status'] == 1): ?>selected<?php endif; ?> value="1">正常</option>
				<option <?php if($_GET['status'] == 2): ?>selected<?php endif; ?> value="2">已删除</option>
			</select>
		</span> -->
		<span class="select-box inline">
			<select class="select" name="is_guo">
				<option value="0">全部状态</option>
				<option <?php if($_GET['is_guo'] == 2): ?>selected<?php endif; ?> value="2">正常</option>
				<option <?php if($_GET['is_guo'] == 1): ?>selected<?php endif; ?> value="1">已过期</option>
			</select>
		</span>
		<input name="c" type="hidden" value="<?php echo ($kongzhi["c"]); ?>">
        <input name="a" type="hidden" value="<?php echo ($kongzhi["a"]); ?>">
		<span class="select-box inline">
			<select class="select" name="sid">
				<option value="">--请选择教学点--</option>
				<?php if(is_array($site)): foreach($site as $key=>$vo): ?><option value="<?php echo ($vo['id']); ?>" <?php if($_GET['sid'] == $vo['id']): ?>selected<?php endif; ?>><?php echo ($vo['name']); ?></option><?php endforeach; endif; ?>
			</select>
		</span>
	添加日期：
		<input type="text" onfocus="WdatePicker()" name="start" value="<?php echo ($_GET['start']); ?>" id="txtBeginDate" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker()" name="end" value="<?php echo ($_GET['end']); ?>" id="txtEndDate" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="请输入编号/姓名" name="keyword" value="<?php echo ($_GET['keyword']); ?>">
		<button type="submit" class="btn btn-success radius"><i class="Hui-iconfont">&#xe665;</i> 搜学员</button>
	</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span>
	</div>
	<div class="mt-20">
	<form name="delmuti2">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="10%">编号</th>
				<th width="10%">姓名</th>
				<th width="10%">所属教学点</th>
				<th width="10%">上课次数</th>
				<th width="10%">添加日期</th>
				<th width="10%">状态</th>
				<!-- <th width="10%">修改日期</th> -->
				<!-- <th width="10%">状态</th> -->
				<!-- <th width="10%">操作</th> -->
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
						<td class="ser_gao"><?php echo ($vo["number"]); ?></td>
						<td class="ser_gao" style="cursor:pointer" onclick="return getdetail(<?php echo ($vo['id']); ?>)"><?php echo ($vo["name"]); ?></td>
						<td><?php echo ($vo["sid"]); ?></td>
						<td><?php echo ($vo["shang_hours"]); ?></td>
						<td><?php echo (date('Y-m-d H:i',$vo["addtime"])); ?></td>
						<td><?php if($vo['is_guo'] == 1): ?><span class="label label-danger radius">已过期</span><?php else: ?><span class="label label-success radius">正常</span><?php endif; ?></td>
						<!-- <td><?php echo (date('Y-m-d H:i:s',$vo["savetime"])); ?></td> -->
						<!-- <td><?php if($vo['status'] == 1): ?><span style="color:green">正常</span><?php else: ?><span style="color:#aaa">已删除</span><?php endif; ?></td> -->
						<!-- <td>
							<a style="text-decoration:none" class="ml-5"  href="javascript:;" onclick="return getdetail(<?php echo ($vo['id']); ?>)" title="详情"><i class="Hui-iconfont">学员详情</i></a>
						</td> -->
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

function getdetail(id){
	var index = layer.load(2);
	$.post("<?php echo U('user/getdetail');?>",{"id":id},function(data){
		if(data.status==1){
			layer.open({
			  type: 1,
			  title: '学员详情',
			  area: ['50%', '280px'], //宽高
			  content: data.msg
			});
		}else{
			layer.msg(data.msg,{icon:2,time:1000});
		}
		layer.close(index);
	})	
}
</script>
</body>
</html>