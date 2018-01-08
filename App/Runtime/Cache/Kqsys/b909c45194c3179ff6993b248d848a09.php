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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 教学点管理<span class="c-gray en">&gt;</span> 教学点列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form action="<?php echo U('Teachingsite/site_list');?>" method="get">
        <div class="text-c">
        <span class="select-box inline">
			<select class="select" name="status" id="status">
                <option  value="2" <?php echo $status==2?'selected':'';?>>全部</option>
                <option value="1" <?php echo $status==1?'selected':'';?>>启用</option>
                <option value="0" <?php echo $status==0?'selected':'';?>>禁用</option>
            </select>
		</span>
        <input name="c" type="hidden" value="<?php echo ($kongzhi["c"]); ?>">
        <input name="a" type="hidden" value="<?php echo ($kongzhi["a"]); ?>">
            添加时间：
            <input name="start" value="<?php echo ($_GET['start']); ?>" type="text"  onfocus="WdatePicker()"  id="txtBeginDate" class="input-text Wdate" style="width:120px;">
            -
            <input name="end" value="<?php echo ($_GET['end']); ?>" type="text" onfocus="WdatePicker()" id="txtEndDate" class="input-text Wdate" style="width:120px;">
            <input type="text" value="<?php echo ($_GET['keyword']); ?>" name="keyword" id="keyword" placeholder="教学点名称/负责人/联系方式/app账号" style="width:250px" class="input-text">
            <button name="" id="search" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜教学点</button>
        </div>
    </form>



    <!--s-->
    <form action="<?php echo U('Admin/del');?>" method="post">
        <input type="hidden" name="id" value="">
        <!--e-->

        <div class="cl pd-5 bg-1 bk-gray mt-20">


            <span class="l">

            <a href="<?php echo U('Teachingsite/site_add');?>" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加教学点</a>

        </span>



            <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span>
        </div>


    </form>
    <table class="table table-border table-bordered table-bg table-sort">
        <thead>

        <tr class="text-c">
            <!-- <th width="25"><input type="checkbox" name="" value=""></th> -->
            <!-- <th width="40">ID</th> -->
            <th width="8%">教学点名称</th>
            <th width="8%">负责人</th>
            <th width="8%">手机号</th>
            <th width="10%">app账号</th>
            <th width="15%">添加时间</th>
            <th width="10%">状态</th>
            <th width="8%">操作</th>
        </tr>
        </thead>
        <tbody>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr class="text-c">
                    <!-- <td><input type="checkbox" value="<?php echo ($v["id"]); ?>" name="spCodesid"></td> -->
                    <!-- <td><?php echo ($v["id"]); ?></td> -->
                    <td class="ser_gao"><?php echo ($val["name"]); ?></td>
                    <td class="ser_gao"><?php echo ($val["principal"]); ?></td>
                    <td class="ser_gao"><?php echo ($val["tel"]); ?></td>
                    <td class="ser_gao"><?php echo ($val["account"]); ?></td>
                    <td>
                        <?php echo date('Y-m-d H:i',$val['add_time']);?>
                    </td>



                    <td>
                        <?php if($val["status"] == 1): ?><span class="label label-success radius">启用</span><?php endif; ?>
                        <?php if($val["status"] == 0): ?><span class="label label-danger radius">禁用</span><?php endif; ?>
                    </td>



                    <td>




                        <?php if($val["status"] == 1): ?><a href="javascript:void(0)" onclick="save_status(<?php echo ($val["id"]); ?>,0)" title="禁用"><i class="Hui-iconfont">&#xe631;</i></a><?php endif; ?>



                        <?php if($val["status"] == 0): ?><a href="javascript:void(0)" onclick="save_status(<?php echo ($val["id"]); ?>,1)" title="启用"><i class="Hui-iconfont">&#xe615;</i></a><?php endif; ?>

                        <a title="编辑" href="<?php echo U('Teachingsite/save_msg',array('id'=>$val['id']));?>" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>





                            <a title="删除" href="javascript:;" onclick="del(<?php echo ($val["id"]); ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>




                    </td>



                </tr><?php endforeach; endif; else: echo "" ;endif; ?>




        <?php if(empty($list)): ?><tr><td colspan='8' style="text-align:center;">暂时没有数据！</td></tr><?php endif; ?>
        </tbody>
    </table>
    <div class="page"><?php echo ($show); ?></div>
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

    p="<?php echo ($_GET['p']); ?>";
    my_status="<?php echo ($status); ?>";


    /*管理员-启用*/
    function save_status(id,val){
        if(val==1){
            var prompt='确定要启用吗？';
        }else{
            var prompt='确实要禁用吗？';
        }
        layer.confirm(prompt,function(){
            $.post("<?php echo U('Teachingsite/save_status');?>",{id:id,status:val},function(data){
                if(data.status){
                    layer.msg('修改成功',{icon:1},function(){
                        var start=$('#txtBeginDate').val();
                        var end=$('#txtEndDate').val();
                        var keyword=$('#keyword').val();
                        //要测试直接将else提出来 ，if结构和内容去掉就可以看出效果
                        if(my_status!=2){
                        location.href="<?php echo U('Teachingsite/site_list');?>"+'?start='+start+'&end='+end+'&keyword='+keyword+'&status='+my_status;
                    }else{
                        location.href="<?php echo U('Teachingsite/site_list');?>"+"?p="+p+'&start='+start+'&end='+end+'&keyword='+keyword+'&status='+my_status;
                    }


                    })
                }else{
                    layer.msg('修改失败',{icon:2})
                }
            })
        });
    }


    function del(o){
        layer.confirm('确认要删除吗？',function(){
            $.post("<?php echo U('Teachingsite/del');?>",{id:o},function(data){
                if(data.status){
                    layer.msg('删除成功',{icon:1},function(){
                        location.href="<?php echo U('Teachingsite/site_list');?>";
                    })
                }else{
                    layer.msg(data.info)

                }
            })
        });
    }




</script>
</body>
</html>