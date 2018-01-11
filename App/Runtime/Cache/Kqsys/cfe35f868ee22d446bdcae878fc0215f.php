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
      padding: 44px 70px;
    }
  </style>
</head>

<body>
  <form class="layui-form layui-form-pane" action="">
    <div class="layui-form-item">
      <label class="layui-form-label">轮播内容</label>
      <div class="layui-input-inline">
        <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">分类</label>
      <div class="layui-input-inline">
        <select name="modules" lay-verify="required" lay-search="">
          <option value="">直接选择或搜索选择</option>
          <option value="1">layer</option>
          <option value="2">form</option>
          <option value="3">layim</option>
        </select>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">链接文章</label>
      <div class="layui-input-inline">
        <select name="modules" lay-verify="required" lay-search="">
          <option value="">直接选择或搜索选择</option>
          <option value="1">layer</option>
          <option value="2">form</option>
          <option value="3">layim</option>
          <option value="4">element</option>
          <option value="5">laytpl</option>
        </select>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">教学点</label>
      <div class="layui-input-inline">
        <select name="modules" lay-verify="required" lay-search="">
          <option value="">直接选择或搜索选择</option>
          <option value="1">layer</option>
          <option value="2">form</option>
          <option value="3">layim</option>
          <option value="4">element</option>
          <option value="5">laytpl</option>
        </select>
      </div>
    </div>

    <div class="layui-form-item">
      <label class="layui-form-label">图片</label>
      <button type="button" class="layui-btn" id="image" style="position: relative;">
        <i class="layui-icon">&#xe67c;</i>上传图片
        <input type="file" class="upload-pic" value="上传图片" style="position: absolute;font-size: 0;width: 100%;height: 100%;outline: 0;opacity: 0;filter: alpha(opacity=0);top:0;left:0;z-index: 1;cursor: pointer;">
      </button>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">禁用</label>
      <div class="layui-input-block">
        <input type="radio" name="disable" value="1" title="是" checked="">
        <input type="radio" name="disable" value="0" title="否">
      </div>
    </div>

    <div class="layui-form-item">
      <div class="layui-input-block">
        <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
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
    layui.use(['form', 'upload'], function () {
      //执行实例
      // var uploadInst = upload.render({
      //   elem: '#image' //绑定元素
      //   , url: "<?php echo U('Carousel/carouselt_add');?>" //上传接口
      //   , done: function (res) {
      //     //上传完毕回调
      //   }
      //   , error: function () {
      //     //请求异常回调
      //   }
      // });

    });

    $(".upload-pic").change(function () {
      var reader = new FileReader();
      reader.onload = function (oFREvent) {
        console.log(oFREvent)
      }
      reader.readAsDataURL($(this).prop('files')[0]);
    })
  </script>
  <!--/请在上方写此页面业务相关的脚本-->
</body>

</html>