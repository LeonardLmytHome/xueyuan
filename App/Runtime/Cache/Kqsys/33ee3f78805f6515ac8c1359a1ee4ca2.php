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
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title><?php echo ($title); ?></title>
<meta name="keywords" content="<?php echo ($keywords); ?>">
<meta name="description" content="<?php echo ($description); ?>">
</head>
<body>
<!-- 导入头部文件 -->
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href='<?php echo U("Index/index");?>' style="color:#fff"><?php echo ($title); ?></a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/"></a> <span class="logo navbar-slogan f-l mr-10 hidden-xs"></span> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
		<!-- <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href='<?php echo U("Index/index");?>'><img src="<?php echo ($config_pic); ?>" style="width: 273px;height: 36px;"></a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/"></a> <span class="logo navbar-slogan f-l mr-10 hidden-xs"></span> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a> -->
			<nav class="nav navbar-nav">
				<ul class="cl">
					<!--<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>-->
						<!--<ul class="dropDown-menu menu radius box-shadow">-->

							<!--<li><a href="javascript:;" onclick="member_add('添加商品','<?php echo U("Goods/add");?>')"><i class="Hui-iconfont">&#xe620;</i> 商品</a></li>-->
							<!--<li><a href="javascript:;" onclick="member_add('添加商品','<?php echo U("Goods/add");?>')"><i class="Hui-iconfont">&#xe616;</i> 商品</a></li>-->
							<!--&lt;!&ndash;<li><a href="javascript:;" onclick="member_add('添加帮助','<?php echo U("Help/add");?>')"><i class="Hui-iconfont">&#xe616;</i> 帮助</a></li>&ndash;&gt;-->

							<!--&lt;!&ndash;<li><a href="javascript:;" onclick="member_add('添加套餐','<?php echo U("Combo/add");?>')"><i class="Hui-iconfont">&#xe620;</i> 套餐</a></li>&ndash;&gt;-->
							<!--&lt;!&ndash;<li><a href="javascript:;" onclick="member_add('添加首页轮播图','<?php echo U("Advert/add");?>','','510')"><i class="Hui-iconfont">&#xe613;</i> 首页轮播图</a></li>&ndash;&gt;-->
							<!--&lt;!&ndash;<li><a href="javascript:;" onclick="member_add('添加管理员','<?php echo U("Admin/add");?>','','510')"><i class="Hui-iconfont">&#xe60d;</i> 管理员</a></li>&ndash;&gt;-->
						<!--</ul>-->
					<!--</li>-->
					<!--<li class="dropDown dropDown_hover">-->
						<!--<a href="/" class="dropDown_A"> 前台首页 </a>-->
					<!--</li>-->
				</ul>
			</nav>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<!--<?php if($_SESSION['admin']['character_id'] == 2): ?>-->
					<!--<li style="margin-right:20px;">您的邀请码：<?php echo ($_SESSION['admin']['id']); ?></li>-->
					<!--<?php endif; ?>-->
					<li class="dropDown dropDown_hover">
					<a href="javascript:;" class="dropDown_A"><?php echo ($character); ?><i class="Hui-iconfont">&#xe62d;</i><?php echo session('admin.admin_name');?><i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<!--<li><a href="javascript:;" onclick="member_add('修改密码','<?php echo U("Admin/pass?id=".session("admin.id"));?>','','510')"><i class="Hui-iconfont">&#xe705;</i> 修改密码</a></li>-->
							<li><a href="<?php echo U('Login/logout');?>"><i class="Hui-iconfont">&#xe644;</i> 退出</a></li>
						</ul>
					</li>
					
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（橙色）">默认（橙色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="黑色">黑色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<!-- 导入菜单文件 -->
<aside class="Hui-aside">
	<input runat="server" id="divScrollValue" type="hidden" value="" />
	<div class="menu_dropdown bk_2">


        <dl id="menu-admin">

            <dt>
                <i class="Hui-iconfont">&#xe643;</i>
                教学点管理
                <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
            </dt>

            <dd>
                <ul>
                    <!--                    <li>
                                            <a _href="<?php echo U('Teachingsite/site_add');?>" data-title="添加教学点" href="javascript:void(0)">添加教学点</a>
                                        </li>-->

                    <li>
                        <a _href="<?php echo U('Teachingsite/site_list');?>" data-title="教学点列表" href="javascript:void(0)">教学点列表</a>
                    </li>
                </ul>
            </dd>

        </dl>
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe6cc;</i> 学员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('User/index');?>" data-title="学员列表" href="javascript:void(0)"> 学员列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe6cc;</i> 设备管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<!-- <li><a _href="<?php echo U('User/add');?>" data-title="生成验证码" href="javascript:void(0)"> 生成验证码</a></li> -->
					<li><a _href="<?php echo U('Equip/index');?>" data-title="设备列表" href="javascript:void(0)"> 设备列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Admin/index');?>" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-admin">
			<a _href="<?php echo U('Web/edit');?>" data-title="验证码管理" href="javascript:void(0)"><dt><i class="Hui-iconfont">&#xe61d;</i> 验证码管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt></a>
		</dl>
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe60a;</i> 我的账号<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('admin/pass');?>" data-title="密码修改" href="javascript:void(0)">密码修改</a></li>
				</ul>
			</dd>
		</dl>
<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe6cc;</i> 轮播图管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Carousel/classify');?>" data-title="轮播分类" href="javascript:void(0)"> 轮播分类</a></li>
					<!--<li><a _href="<?php echo U('Carousel/demo');?>" data-title="demo" href="javascript:void(0)"> demo</a></li>-->
				</ul>
			</dd>
		</dl>
<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe6cc;</i> 文章管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Article/classify');?>" data-title="文章分类" href="javascript:void(0)"> 文章分类</a></li>
					<li><a _href="<?php echo U('Article/articlelist');?>" data-title="文章列表" href="javascript:void(0)"> 文章列表</a></li>
				</ul>
			</dd>
		</dl>




		
	</div>
</aside>
<!--监控-->
<?php if($monitoring['order']==1): ?><script type="text/javascript">
        setInterval(function () {
            var url = '<?php echo U("Order/check");?>';
            $.post(url,{url:url},function (data) {
//                console.dir(data);
                if(data.flag){
					layer.alert(data.msg);
				}
            });
        },60000);
	</script><?php endif; ?>
<?php if($monitoring['work']==1): ?><script type="text/javascript">
        setInterval(function () {
            var url = '<?php echo U("Work/check");?>';
            $.post(url,{url:url},function (data) {
                if(data.flag){
                    layer.alert(data.msg);
                }
            });
        },60000);
	</script><?php endif; ?>
<?php if($monitoring['icp']==1): ?><script type="text/javascript">
        setInterval(function () {
            var url = '<?php echo U("Icp/check");?>';
            $.post(url,{url:url},function (data) {
                if(data.flag){
                    layer.alert(data.msg);
                }
            });
        },60000);
	</script><?php endif; ?>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active"><span title="我的桌面" data-href="welcome.html">我的桌面</span><em></em></li>
			</ul>
		</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="<?php echo U('Index/welcome1');?>"></iframe>
		</div>
	</div>
</section>
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
</script>
</body>
</html>