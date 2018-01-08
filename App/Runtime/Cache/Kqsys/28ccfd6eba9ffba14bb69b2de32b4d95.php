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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 验证码管理<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form class="form form-horizontal" action="<?php echo U('web/update');?>" name="form1" id="form_user1" enctype="multipart/form-data"  method="post">
<div id="tab-system" class="HuiTab" >
	<div id="bar1" class="tabBar cl" onclick="tab(1);"><span>验证码管理</span></div>
	<div class="tabCon">
		
	<!-- 	<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>APP使用期限：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  name="app_use_day" style="width:200px;" type="number" min="1" max="500" id="website-title" placeholder="输入APP使用期限（天）" value="<?php echo ($v["app_use_day"]); ?>" class="input-text"  >&nbsp;天
			</div>
		</div> -->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>验证码增加时限：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  name="app_code_day" style="width:200px;" type="number" min="1" max="500" id="website-title" placeholder="输入验证码增加时限（天）" value="<?php echo ($v["app_code_day"]); ?>" class="input-text"  >&nbsp;天
			</div>
		</div>
		
	</div>
</div>
		
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
			<input type="hidden" name="id" value="1">
				<button   class="btn btn-primary radius" type="submit">
				<i class="Hui-iconfont">&#xe632;</i> 确定</button>
				<!-- <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button> -->
			</div>
		</div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/lib/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/messages_zh.min.js"></script> 
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
       /* function baocun(){
            if($('#tijiao').attr('data-id')!=1){
                return false;
            }
            $('#tijiao').attr('data-id',0);
            var url = "<?php echo U('Web/update');?>";
            $.post(url,$('#form_user1').serialize(),function(data){
                $('#tijiao').attr('data-id',1);
                if(data.status == 1){
                    alert(data.msg);
                    window.location="<?php echo U('web/edit');?>";
                }else{
                    alert(data.msg);
                }
            })
        }*/
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","0");
});
// function en(){
// 	i = $("textarea[name='description']");
//     var v = i.validity;
//     ss=i.val();
//     if(ss.match(/^\s+$/)){
//         alert("描述不能为空");
//         return false;
//     }else{
//         return true;
//     }
// }
// function keywords(i){
//     var v = i.validity;
//     if(true === v.valueMessing){
//         i.setCustomValidity("请填写这个字段");
//     }else{
//         ss=$("input[name='keywords']").val();
//         if(ss.match(/^\s+$/)){
//             i.setCustomValidity("网站名称不能为空");
//         }else{
//             i.setCustomValidity("");
//         }
//     }
// }
// function description(i){
//     var v = i.validity;
//     if(true === v.valueMessing){
//         i.setCustomValidity("请填写这个字段");
//     }else{
//         ss=$("input[name='description']").val();
//         if(ss.match(/^\s+$/)){
//             i.setCustomValidity("网站描述不能为空");
//         }else{
//             i.setCustomValidity("");
//         }
//     }
// }
// function copyright(i){
//     var v = i.validity;
//     if(true === v.valueMessing){
//         i.setCustomValidity("请填写这个字段");
//     }else{
//         ss=$("input[name='copyright']").val();
//         if(ss.match(/^\s+$/)){
//             i.setCustomValidity("网站版权期限不能为空");
//         }else{
//             i.setCustomValidity("");
//         }
//     }
// }
// function icp(i){
//     var v = i.validity;
//     if(true === v.valueMessing){
//         i.setCustomValidity("请填写这个字段");
//     }else{
//         ss=$("input[name='icp']").val();
//         if(ss.match(/^\s+$/)){
//             i.setCustomValidity("网站版权期限不能为空");
//         }else{
//             i.setCustomValidity("");
//         }
//     }
// }
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>