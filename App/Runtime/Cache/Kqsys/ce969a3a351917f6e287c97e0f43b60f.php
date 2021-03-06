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
	      <label class="layui-form-label">关键字</label>
	      <div class="layui-input-inline">
	        <input type="text" value="<?php echo ($keyword["keyword"]); ?>" name="keyword" lay-verify="keyword" autocomplete="off" placeholder="请输入关键字" class="layui-input">
	        <input type="text" value="<?php echo ($keyword["id"]); ?>" hidden="hidden" name="id">
	      </div>
	    </div>
	    <button type="button" class="layui-btn" id="test1">
  <i class="layui-icon">&#xe67c;</i>上传图片
</button>
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
    	   
    	
        layui.use(['layer', 'form','upload'], function () {
            var layer = layui.layer, //弹层
                form = layui.form,//表格
                upload = layui.upload;
   
			  upload.render({
			    elem: '#test1' //绑定元素
			    ,url: "<?php echo U('Keyword/upl');?>" //上传接口
			    ,done: function(res){
			      console.log(res)
			    }
			    ,error: function(){
			      //请求异常回调
			    }
			  });
        })
        
        
        $(".upload-pic").change(function(){
		    var files = $('input[type="file"]').prop('files')[0];
			if(!!files){
				var reader = new FileReader();
		        reader.onload = function (oFREvent) {
		            $("#show").html("<img src='"+ oFREvent.currentTarget.result +"' height='38' >");
		        }
		        reader.readAsDataURL(files);
			}
		})
        
        $(".submit").click(function(){
        	addAr()
        })

        function addAr(img){
			$.post("<?php echo U('Keyword/add');?>",
	        {
	          id: $("input[name='id']").val(),
	          keyword: $("input[name='keyword']").val()
	        }, function (res) {
	          layer.msg(res.info);
	          if(!!res.status){
	          	setTimeout(function(){
	          		window.location.reload()
	          	},2000)
	          }
	        })
		}
    </script>
    <!--/请在上方写此页面业务相关的脚本-->
</body>

</html>