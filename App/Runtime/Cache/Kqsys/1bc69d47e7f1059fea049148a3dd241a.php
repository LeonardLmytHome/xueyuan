<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />
	<title>后台管理</title>

	<style>
	/*全局开始*/
*{
	margin:0 auto; 
	padding:0;
}

body{
	background: #f4f4f4;
	height:500px;
}

a, a:hover{
	text-decoration:none;
}

/*全局结束*/

.paster{
	background: #fff;
	width: 520px;
	height: 200px;
	font-size: 22px;
	margin: 100px auto;
	border: 1px solid #ccc;
	box-shadow: 2px 2px 5px #ccc;
	border-radius: 6px;
	text-align:center;
	overflow: hidden;
}

.paster img{
	background: rgb(68,153,255);
	width: 100px;
	height: 100px;
	padding: 50px 20px;
	float: left;
	border-right: 1px dashed #ccc;
}

.paster>div{
	float: left;
}

.paster>div span{
	padding: 20px;
	display: block;
	font-size: 14px;
}

.paster>div p{
	padding: 20px;
	display: block;
}
	</style>
</head>

<body>
	<div class="paster">
	
			<?php if(isset($message)): ?><img src="/Public/admin/images/success.png"/>
				<div>
					<span><?php echo ($msgTitle); ?></span>
					<span><?php echo($message); ?></span>
					<p>页面自动 <a id="href" target="_top" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b></p>
				</div>
			<?php else: ?>
				<img src="/Public/admin/images/error.png"/>
				<div>
					<span><?php echo ($msgTitle); ?></span>
					<span><?php echo($error); ?></span>
					<p>页面自动 <a id="href" target="_top" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait">1</b></p>
				</div><?php endif; ?>
	</div>
	<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		if(href.indexOf("login") >= 0 || href.indexOf("main") >=0 ) {  
			top.location.href = href;
		}else{
			location.href = href;
		}
		clearInterval(interval);
	};
}, 1500);
})();
</script>
	

</body>
</html>