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
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/Public/lib/Hui-iconfont/1.0.7/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/Public/lib/icheck/icheck.css" />
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/swiper.min.css" />
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/certify.css?2" />
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
    <div id="certify">
        <div style="width: 216px; margin:20px;">
               <button class="layui-btn layui-btn-fluid add" data-id="0">新增</button>
        </div>
        <?php if(!empty($carousel)): ?><div class="swiper-container swiper-container-horizontal">
            <div class="swiper-wrapper">
            	<?php if(is_array($carousel)): $i = 0; $__LIST__ = $carousel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
	                    <img src="<?php echo ($vo["img"]); ?>">
	                    <p>
	                        <?php echo ($vo["title"]); ?>
	                    </p>
	                    <div class="swiper-operation">
	                        <button class="layui-btn layui-btn-sm layui-btn-danger swiper-edit" data-id="<?php echo ($vo["id"]); ?>">
	                            <i class="layui-icon">&#xe642;</i>
	                        </button>
	                        <button class="layui-btn layui-btn-sm layui-btn-danger swiper-del" data-id="<?php echo ($vo["id"]); ?>">
	                            <i class="layui-icon">&#xe640;</i>
	                        </button>
	                    </div>
	                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="swiper-pagination swiper-pagination-bullets"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <?php else: ?>
        	暂无数据，请添加轮播<?php endif; ?>
    </div>
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
    <script type="text/javascript" src="/Public/lib/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="/Public/lib/ueditor/1.4.3/ueditor.config.js"></script>
    <script type="text/javascript" src="/Public/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript" src="/Public/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript" src="/Public/static/h-ui.admin/js/swiper.min.js"></script>
    <script type="text/javascript" src="/Public/static/h-ui.admin/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/Public/static/h-ui.admin/layui-v2.2.5/layui/layui.js"></script>

    <script type="text/javascript">
        certifySwiper = new Swiper('#certify .swiper-container', {
            watchSlidesProgress: true,
            slidesPerView: 'auto',
            centeredSlides: true,
            loop: true,
            loopedSlides: 5,
            autoplay: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                //clickable :true,
            },
            on: {
                progress: function (progress) {
                    for (i = 0; i < this.slides.length; i++) {
                        var slide = this.slides.eq(i);
                        var slideProgress = this.slides[i].progress;
                        modify = 1;
                        if (Math.abs(slideProgress) > 1) {
                            modify = (Math.abs(slideProgress) - 1) * 0.3 + 1;
                        }
                        translate = slideProgress * modify * 260 + 'px';
                        scale = 1 - Math.abs(slideProgress) / 5;
                        zIndex = 999 - Math.abs(Math.round(10 * slideProgress));
                        slide.transform('translateX(' + translate + ') scale(' + scale + ')');
                        slide.css('zIndex', zIndex);
                        slide.css('opacity', 1);
                        if (Math.abs(slideProgress) > 3) {
                            slide.css('opacity', 0);
                        }
                    }
                },
                setTransition: function (transition) {
                    for (var i = 0; i < this.slides.length; i++) {
                        var slide = this.slides.eq(i)
                        slide.transition(transition);
                    }

                }
            }

        })

        $(".swiper-edit,.add").click(function () {
            openEdit($(this).data('id'))
        })

        $(".swiper-del").click(function () {
        	var t = $(this);
            layer.confirm('您确定要删除此图片？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                $.get("<?php echo U('Carousel/carousel_del');?>"+"&id="+t.data('id'),function(res){
                	layer.msg(res.info);
                	setTimeout(function(){
                		window.location.reload(true);
                	},1000);
                })
            }, function () {
                layer.msg('取消');
            });
        })


        function openEdit(id){
          	layer.open({
                type: 2,
                title: '轮播操作',
                area: ['600px', '400px'],
                content: "<?php echo U('Carousel/carouseltoggle');?>"+'&id='+id +"&c_id=<?php echo ($c_id); ?>"
            });
        }
    </script>
    <!--/请在上方写此页面业务相关的脚本-->
</body>

</html>