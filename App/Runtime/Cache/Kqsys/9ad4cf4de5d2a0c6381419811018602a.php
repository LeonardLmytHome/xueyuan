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
    <form class="layui-form layui-form-pane" style="padding:20px;">
	    <div class="layui-form-item">
	      <label class="layui-form-label">联系人</label>
	      <div class="layui-input-inline">
	        <input type="text" value="<?php echo ($contact["name"]); ?>" name="name" lay-verify="name" autocomplete="off" placeholder="请输入联系人" class="layui-input">
	        <input type="text" value="<?php echo ($contact["id"]); ?>" hidden="hidden" name="id">
	      </div>
	    </div>
	    <div class="layui-form-item">
	      <label class="layui-form-label">联系电话</label>
	      <div class="layui-input-inline">
	        <input type="text" value="<?php echo ($contact["phone"]); ?>" name="phone" autocomplete="off" placeholder="请输入联系电话" class="layui-input">
	      </div>
	    </div>
	    <div class="layui-form-item">
	      <label class="layui-form-label">邮箱</label>
	      <div class="layui-input-inline">
	        <input type="text" value="<?php echo ($contact["email"]); ?>" name="email" autocomplete="off" placeholder="请输入邮箱" class="layui-input">
	      </div>
	    </div>
	    <div class="layui-form-item">
	      <label class="layui-form-label">联系地址</label>
	      <div class="layui-input-block">
	        <input type="text" value="<?php echo ($contact["address"]); ?>" name="address" autocomplete="off" placeholder="请输入联系地址" class="layui-input">
	      </div>
	    </div>
	    <div class="layui-form-item">
	      <label class="layui-form-label">经纬度</label>
	      <div class="layui-input-inline">
	        <input type="text" value="<?php echo ($contact["gps"]); ?>" name="gps" autocomplete="off" placeholder="请输入经纬度" class="layui-input">
	      </div>
          <a href="http://www.gpsspg.com/maps.htm" style="color:red;line-height: 40px;" title="点击跳转经纬度查询" target="_blank">经纬度查询，请使用腾讯api  例子：23.1485100000,113.2231400000</a>	    </div>
        </div>
	    <div class="layui-form-item">
	      <label class="layui-form-label">说明</label>
	      <div class="layui-input-block">
	        <textarea placeholder="请输入说明" class="layui-textarea" name="content"><?php echo ($contact["content"]); ?></textarea>
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
            var layer = layui.layer, //弹层
                form = layui.form //表格
        })
        
        $(".submit").click(function(){
        	addAr();
        })

        function addAr(){
			$.post("<?php echo U('Contact/add');?>",
	        {
	          id: $("input[name='id']").val(),
	          name: $("input[name='name']").val(),
	          phone: $("input[name='phone']").val(),
	          email: $("input[name='email']").val(),
	          address: $("input[name='address']").val(),
	          gps: $("input[name='gps']").val(),
	          content: $("textarea[name='content']").val()
	        }, function (res) {
	          layer.msg(res.info);
	          if(!!res.status){
	          	
	          }
	        })
		}
    </script>
    <!--/请在上方写此页面业务相关的脚本-->
</body>

</html>