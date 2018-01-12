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
    <style>
        .layui-form {
          padding: 44px 104px;
        }
      </style>
</head>

<body>
    <form class="layui-form layui-form-pane">
        <div class="layui-form-item">
          <label class="layui-form-label">轮播标题</label>
          <div class="layui-input-inline">
          	<input value="<?php echo ($classify["id"]); ?>" hidden="hidden" name="id" lay-verify="id"  />
            <input type="text" name="name" lay-verify="name" autocomplete="off" placeholder="请输入标题" class="layui-input" value="<?php echo ($classify["name"]); ?>">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">教学点</label>
          <div class="layui-input-inline">
            <select name="s_id" lay-search="">
              <option value="0">直接选择或搜索选择</option>
              <?php if(is_array($site)): $i = 0; $__LIST__ = $site;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($classify['s_id'] == $vo['id']): ?>selected<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
          </div>
        </div>
        <?php if($classify["addtime"] != ''): ?><div class="layui-form-item">
	          <label class="layui-form-label">添加时间</label>
	          <div class="layui-input-inline">
	            <input type="text" name="addtime" lay-verify="addtime" value="<?php echo (date('Y-m-d H:i:s',$classify["addtime"])); ?>" disabled="disabled" autocomplete="off" class="layui-input">
	          </div>
	        </div><?php endif; ?>
        <div class="layui-form-item">
          <label class="layui-form-label">类型</label>
          <div class="layui-input-block" style="width: 310px;">
            <input type="radio" name="type" value="0" title="教学点" <?php if($classify["type"] == 0): ?>checked<?php endif; ?> >
            <input type="radio" name="type" value="1" title="首页" <?php if($classify["type"] == 1): ?>checked<?php endif; ?> >
            <input type="radio" name="type" value="2" title="课程页" <?php if($classify["type"] == 2): ?>checked<?php endif; ?> >
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">禁用</label>
          <div class="layui-input-block">
            <input type="radio" name="disable" value="1" title="是" <?php if($classify["disable"] == 1): ?>checked<?php endif; ?> >
            <input type="radio" name="disable" value="0" title="否" <?php if($classify["disable"] == 0): ?>checked<?php endif; ?> >
          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <button class="layui-btn submit" type="button" lay-submit="" lay-filter="demo1">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
          </div>
        </div>
      </form>
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
       layui.use(['layer', 'form'], function () {
	      var layer = layui.layer
	        , form = layui.form;
	    });
	    
	    $(".submit").click(function(){
        if(!$("input[name='name']").val()){
          layer.msg('轮播分类名称不能为空');
					  return false;
        }
	    	$.post("<?php echo U('Carousel/classify_add');?>",
	    	{
	    		id:$("input[name='id']").val(),
          s_id:$("select[name='s_id'] option:checked").val(),
          name:$("input[name='name']").val(),
          type:$("input[name='type']:checked").val(),
	    		disable:$("input[name='disable']:checked").val()
	    	},function(res){
            	layer.msg(res.info);
            	setTimeout(function(){
            		window.parent.location.reload(); 
            	},1000)
            })
	    })
    </script>
    <!--/请在上方写此页面业务相关的脚本-->
</body>
</html>