<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>后台登录</title>
<link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="login_box">
  <div class="login_boxT"><!--头部开始-->
  </div><!--头部结束-->
  <form name="form" method="post" onsubmit="return false;">
  <div class="login_boxM"><!--中间开始-->
    <div class="erweima floatl"></div>
    <div class="login_right floatl" style="margin: 0 auto">
      <div class="loginright_txt">管理员：</div>
      <div class="loginright_input"><input name="admin_name" type="text"></div>
      <div class="loginright_txt">密码：</div>
      <div class="loginright_input"><input name="password" type="password"></div>
      <div class="loginright_txt">验证码：</div>
      <div class="yanzheng_input">
        <div class="yanzheng_shuru floatl" style="width:80px;" ><input style="width:80px;" name="verify" type="text"></div>
        <div class="yanzheng_yz floatl"><img id="code" src="<?php echo U('Login/verify');?>" style="width:110px;height:36px;" onclick="this.src='<?php echo U('Login/verify','','');?>/'+Math.random();" >
        </div>
        <a  onclick="var code = getElementById('code'); code.src='<?php echo U('Login/verify','','');?>/'+Math.random();return false;" href="" style="float: right;">换一张</a>
        <div class="clear">
        </div>
      </div>
      <div class="denglu_btntxt">
        <div class="denglu_btn floatl"><input name="submit" id="sub" type="submit" value=""></div>
        <!-- <div class="denglu_txt"><a href="<?php echo U('Login/back');?>">忘记密码</a></div> -->
      <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
  </div><!--中间结束-->
  </form>
  <div class="login_boxB"><!--底部开始-->
    <!--<div class="loginB_txt floatl">设计单位：郑州七七网络科技 服务热线：(+86)0371-56677007</div>-->
    <!--<div class="liantian floatl"><img src="/Public/admin/images/liaotian.jpg" width="81" height="23"></div>-->
  </div><!--底部结束-->
</div>
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/lib/layer/2.1/layer.js"></script>
<script>
$("#sub").click(function(){
    var url = "<?php echo U('login/dologin');?>";
    var index = layer.load(2);
    $.post(url,$("form").serialize(),function(data){
        layer.close(index);
        if(data.status==1){
            layer.msg(data.msg,{icon:1,time:1000},function(){ window.location="<?php echo U('Index/index');?>"});

        }else{
            layer.msg(data.msg,{icon:2,time:1000},function(){layer.close(index)});
			$('#code').click();
            //layer.close(index);
            return false;
        }
    })
})
</script>
</body>
</html>