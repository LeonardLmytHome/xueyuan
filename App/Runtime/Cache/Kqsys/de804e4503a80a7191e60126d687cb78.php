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
    <script type="text/javascript" src="/Public/static/h-ui.admin/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/Public/static/h-ui.admin/ueditor-utf8-php/utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" src="/Public/static/h-ui.admin/ueditor-utf8-php/utf8-php/ueditor.all.min.js"></script>
    <script type="text/javascript" src="/Public/static/h-ui.admin/ueditor-utf8-php/utf8-php/lang/zh-cn/zh-cn.js"></script>
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
	<form class="layui-form layui-form-pane" style="padding: 30px 40px;">
	    <div class="layui-form-item">
	      <label class="layui-form-label">标题</label>
	      <div class="layui-input-inline">
	      	<input type="text" name="id" lay-verify="id" hidden="hidden" value="<?php echo ($article["id"]); ?>">
	        <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input" value="<?php echo ($article["title"]); ?>">
	      </div>
	    </div>
	    <div class="layui-form-item">
	      <label class="layui-form-label">描述</label>
	      <div class="layui-input-block">
	        <input type="text" name="describe" lay-verify="describe" autocomplete="off" placeholder="请输入描述" class="layui-input" value="<?php echo ($article["describe"]); ?>">
	      </div>
	    </div>
	    <div class="layui-form-item">
	      <label class="layui-form-label">封面图</label>
	      <button type="button" class="layui-btn" id="image" style="position: relative;">
	        <i class="layui-icon">&#xe67c;</i>上传图片
	        <input type="file" class="upload-pic" value="上传图片" style="position: absolute;font-size: 0;width: 100%;height: 100%;outline: 0;opacity: 0;filter: alpha(opacity=0);top:0;left:0;z-index: 1;cursor: pointer;">
	      </button>
	      <div id="show" style="display: inline-block;"></div>
	      <?php if($article["img"] != ''): ?><div style="display: inline-block;">
		      	 <img src="<?php echo ($article["img"]); ?>" height="38" />
		      </div><?php endif; ?>
	    </div>
	    <div class="layui-form-item">
	      <label class="layui-form-label">主分类</label>
	      <div class="layui-input-inline">
	        <select name="p_id" lay-search="" lay-filter="p_id">
	          <option value="0">直接选择或搜索选择</option>
	          <?php if(is_array($main_classify)): $i = 0; $__LIST__ = $main_classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($article['p_id'] == $vo['id']): ?>selected<?php endif; ?> ><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	        </select>
	      </div>
	    </div>
	    <div class="layui-form-item">
	      <label class="layui-form-label">子分类</label>
	      <div class="layui-input-inline">
	        <select name="c_id" lay-search="">
	          <option value="0">直接选择或搜索选择</option>
	          <?php if(is_array($sub_classify)): $i = 0; $__LIST__ = $sub_classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($article['c_id'] == $vo['id']): ?>selected<?php endif; ?> ><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	        </select>
	      </div>
	    </div>
	    <div class="layui-form-item">
	      <label class="layui-form-label">教学点</label>
	      <div class="layui-input-inline">
	        <select name="s_id" lay-search="">
	          <option value="0">直接选择或搜索选择</option>
	          <?php if(is_array($site)): $i = 0; $__LIST__ = $site;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($article['s_id'] == $vo['id']): ?>selected<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	        </select>
	      </div>
	    </div>
	    <div class="layui-form-item">
	      <label class="layui-form-label">联系电话</label>
	      <div class="layui-input-inline">
	        <input type="number" name="phone" autocomplete="off" placeholder="请输入联系电话" class="layui-input" value="<?php echo ($article["phone"]); ?>">
	      </div>
	    </div>
	    <div class="layui-form-item">
	      <label class="layui-form-label">联系地址</label>
	      <div class="layui-input-inline">
	        <input type="text" name="address" autocomplete="off" placeholder="请输入联系地址" class="layui-input" value="<?php echo ($article["address"]); ?>">
	      </div>
	    </div>
	    <div class="layui-form-item">
	      <label class="layui-form-label">经纬度</label>
	      <div class="layui-input-inline">
	        <input type="text" name="gps" lay-verify="gps" autocomplete="off" placeholder="请输入经纬度" class="layui-input" value="<?php echo ($article["gps"]); ?>">
	      </div>
	      <a href="http://www.gpsspg.com/maps.htm" style="color:red;line-height: 40px;" title="点击跳转经纬度查询" target="_blank">经纬度查询，请使用腾讯api  例子：23.1485100000,113.2231400000</a>
	    </div>
	    <?php if($article["addtime"] != ''): ?><div class="layui-form-item">
	        <label class="layui-form-label">添加时间</label>
	        <div class="layui-input-inline">
	          <input type="text" name="addtime" lay-verify="addtime" value="<?php echo (date('Y-m-d H:i:s',$article["addtime"])); ?>" disabled="disabled"
	            autocomplete="off" class="layui-input">
	        </div>
	      </div><?php endif; ?>
	    <div class="layui-form-item">
	      <label class="layui-form-label">禁用</label>
	      <div class="layui-input-block">
	        <input type="radio" name="disable" value="1" title="是" <?php if($article["disable"] == 1): ?>checked<?php endif; ?> >
	        <input type="radio" name="disable" value="0" title="否" <?php if($article["disable"] == 0): ?>checked<?php endif; ?> >
	      </div>
	    </div>
	    <div class="layui-form-item">
	      <!-- 加载编辑器的容器 -->
	      <script id="editor" type="text/plain" style="width:100%;height:500px;"></script>
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
    <script type="text/javascript" src="/Public/static/h-ui.admin/layui-v2.2.5/layui/layui.js"></script>
    <script type="text/javascript">
	    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
	    var ue = UE.getEditor('editor');
	
	
	    function isFocus(e){
	        alert(UE.getEditor('editor').isFocus());
	        UE.dom.domUtils.preventDefault(e)
	    }
	    function setblur(e){
	        UE.getEditor('editor').blur();
	        UE.dom.domUtils.preventDefault(e)
	    }
	    function insertHtml() {
	        var value = prompt('插入html代码', '');
	        UE.getEditor('editor').execCommand('insertHtml', value)
	    }
	    function createEditor() {
	        enableBtn();
	        UE.getEditor('editor');
	    }
	    function getAllHtml() {
	        alert(UE.getEditor('editor').getAllHtml())
	    }
	    function getContent() {
	        var arr = [];
	        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
	        arr.push("内容为：");
	        arr.push(UE.getEditor('editor').getContent());
	        alert(arr.join("\n"));
	    }
	    function getPlainTxt() {
	        var arr = [];
	        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
	        arr.push("内容为：");
	        arr.push(UE.getEditor('editor').getPlainTxt());
	        alert(arr.join('\n'))
	    }
	    function setContent(isAppendTo) {
	        var arr = [];
	        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
	        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
	        alert(arr.join("\n"));
	    }
	    function setDisabled() {
	        UE.getEditor('editor').setDisabled('fullscreen');
	        disableBtn("enable");
	    }
	
	    function setEnabled() {
	        UE.getEditor('editor').setEnabled();
	        enableBtn();
	    }
	
	    function getText() {
	        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
	        var range = UE.getEditor('editor').selection.getRange();
	        range.select();
	        var txt = UE.getEditor('editor').selection.getText();
	        alert(txt)
	    }
	
	    function getContentTxt() {
	        var arr = [];
	        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
	        arr.push("编辑器的纯文本内容为：");
	        arr.push(UE.getEditor('editor').getContentTxt());
	        alert(arr.join("\n"));
	    }
	    function hasContent() {
	        var arr = [];
	        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
	        arr.push("判断结果为：");
	        arr.push(UE.getEditor('editor').hasContents());
	        alert(arr.join("\n"));
	    }
	    function setFocus() {
	        UE.getEditor('editor').focus();
	    }
	    function deleteEditor() {
	        disableBtn();
	        UE.getEditor('editor').destroy();
	    }
	    function disableBtn(str) {
	        var div = document.getElementById('btns');
	        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
	        for (var i = 0, btn; btn = btns[i++];) {
	            if (btn.id == str) {
	                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
	            } else {
	                btn.setAttribute("disabled", "true");
	            }
	        }
	    }
	    function enableBtn() {
	        var div = document.getElementById('btns');
	        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
	        for (var i = 0, btn; btn = btns[i++];) {
	            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
	        }
	    }
	
	    function getLocalData () {
	        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
	    }
	
	    function clearLocalData () {
	        UE.getEditor('editor').execCommand( "clearlocaldata" );
	        alert("已清空草稿箱")
	    }
	    
	    ue.ready(function() {
		    ue.setContent('<?php echo ($article["content"]); ?>');
		});
	    
	    layui.use(['layer', 'form'], function () {
            var layer = layui.layer,
            form = layui.form;
        
	        form.on('select(p_id)', function(data){
	        	var index=null;
	        	getSubc(form,data.value)
			});      
	    });
	    
	    
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
	    
	    function getSubc(form,data)
	    {
	    	$.ajax({
             type: "POST",
             url: "<?php echo U('Article/getSubClassify');?>",
             data: {id:data},
             dataType: "json",
             beforeSend:function(){
             	index = layer.load(1, {shade: [0.1,'#fff'] });
             },
             success: function(res){
                if(!!res.status){
			  		var html = '';
				  	for(var i = 0;i < res.info.length;i++){
				  		html += '<option value="' + res.info[i].id + '">' + res.info[i].title + '</option>';
				  	}
				  	$("select[name='c_id']").html(html);
				  	form.render('select'); //刷新select选择框渲染
			  	}else{
			  		layer.msg(res.info)
			  	}      
             },
             complete:function(){
             	layer.close(index);
             }
        });
	    }
		
		function upload() {
			var html = "";
			if(!$("input[name='title']").val()){
				layer.msg('标题不能为空');
				return false;
			}
			if(!$("input[name='describe']").val()){
				layer.msg('描述不能为空');
				return false;
			}
			if(!$("input[name='phone']").val()){
				layer.msg('联系号码不能为空');
				return false;
			}
			if(!$("input[name='gps']").val()){
				layer.msg('经纬度不能为空');
				return false;
			}
			if(!!($("select[name='p_id'] option:checked").val())){
				if(!$("select[name='c_id'] option:checked").val()){
					layer.msg('子分类不能为空不能为空');
				    return false;
				}
			}
			ue.ready(function() {
			    html = ue.getContent();
			   
			});
			if(!html){
				layer.msg('文章内容不能为空');
				return false;
			}
			
			var files = $('input[type="file"]').prop('files')[0];
		      if (!!files) {
		        var reader = new FileReader();
		        reader.onload = function (oFREvent) {
		          addAr(oFREvent.currentTarget.result,html)
		        }
		        reader.readAsDataURL(files);
		      } else {
		        if (!'<?php echo ($article["id"]); ?>') {
		          layer.msg('封面图不能为空');
		          return false;
		        }
		        addAr('old',html)
		      }
	    }
		
		
		function addAr(img,html){
			$.post("<?php echo U('Article/addArticle');?>",
	        {
	          id: $("input[name='id']").val(),
	          img: img,
	          p_id:$("select[name='p_id'] option:checked").val(),
	          c_id:$("select[name='c_id'] option:checked").val(),
	          s_id:$("select[name='s_id'] option:checked").val(),
	          address:$("input[name='address']").val(),
	          title: $("input[name='title']").val(),
	          describe: $("input[name='describe']").val(),
	          phone: $("input[name='phone']").val(),
	          gps: $("input[name='gps']").val(),
	          content: html,
	          disable: $("input[name='disable']:checked").val()
	        }, function (res) {
	          layer.msg(res.info);
	          if(!!res.status){
	          	setTimeout(function(){
	          		window.location.href = "<?php echo U('Article/articlelist');?>";
	          	},1500)
	          }
	        })
		}
		
		$(".submit").click(function(){
			upload();
		})
    </script>
    <!--/请在上方写此页面业务相关的脚本-->
</body>

</html>