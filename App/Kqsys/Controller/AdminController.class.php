<?php
namespace Kqsys\Controller;
//use Think\Controller;
class AdminController extends CommonController {
     
     //浏览管理员信息
    public function index(){
       
       //实例化管理员信息操作对象
       $mod = M('admin a');
       //判断是否有关键字传值
       if($key = I('get.key'))
       {
          $map['a.admin_name|a.name|a.phone|a.email'] = array('like','%'.$key.'%');
       }
       //判断是否有时间值传递 && 
       if(I('get.start'))
       {
          $start = strtotime(I('get.start')." 00:00:00");
          if(I('get.end')){
            $end = strtotime(I('get.end')." 23:59:59");
            $map['a.addtime'] = array(array('EGT',$start),array('ELT',$end),'AND');
          }else{
            $map['a.addtime'] = array("egt",$start);
          }
       }elseif(I('get.end')){
          $end = strtotime(I('get.end')." 23:59:59");
          $map['a.addtime'] = array("elt",$end);
       }
       //判断是否有分类值传递
       if($character_id = (int)I('get.character_id'))
       {
          $map['a.character_id'] = array('EQ',$character_id);
       }
        
        $map['is_cn77'] = array('EQ',0);
       $count = $mod->where($map)->count();// 查询满足要求的总记录数
       
       $Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
       $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('first','首页');
        $Page->setConfig('last','末页');
       
       $show = $Page->show();// 分页显示输出
       // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
       $list=$mod->join('`'.C('DB_PREFIX').'character` c ON a.character_id=c.id','LEFT')->field("a.*,c.character")->order('a.addtime desc')->limit($Page->firstRow.','.$Page->listRows)->where($map)->select();

       //放置模板中
       
       $this->assign("list",$list);
       $this->assign('page',$show);// 赋值分页输出
       //查询分类
        $mod = M('character');
        $character = $mod -> select();
        $this -> assign('character',$character);
       //加载模板输出
       $this->display("index");
    }

    //加载添加表单
    public function add(){
        $mod = M('character');
        $character = $mod -> select();
        $this -> assign('character',$character);
       $this->display("add"); 
    }

    //执行信息添加
    public function insert(){
        //实例化
        $mod = M("admin");
        //自动验证
        $rules = array(
         array('admin_name','require','管理员内容必须填写！',1),// // 验证是否为空或者空格回车
         array('phone','require','管理员名称必须填写！',1),
         array('admin_name','','管理员名称已经存在！',1,'unique'), // 验证管理员名称是否已经存在
         array('email','require','管理员关键字必须填写！',1),
         array('abs','require','备注必须填写！',1),
         array('password','6,18','请输入6-18位密码',1,'length'),
         array('password2','password','确认密码和密码不一致',0,'confirm'), // 验证确认密码是否和密码一致
         array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式 
        );
        // var_dump(!$mod->validate($rules)->create());die;
        if (!$mod->validate($rules)->create()){
             // 如果创建失败 表示验证没有通过 输出错误提示信息
             $this->error($mod->getError());
        }

        $mod->password = md5(I('post.password'));

        //获取添加时间
        $mod->addtime = time();
        //执行添加
        $m = $mod->add();
        //判断并输出对应的提示信息
        if($m>0){
           $this->success("添加成功！",U("Admin/index"));
        }else{
           $this->error("添加失败！");
        }
    }

    //加载编辑表单
    public function edit(){

        //获取要编辑的信息
        $mod = M('character');
        $character = $mod -> select();
        $this -> assign('character',$character);

        $mod =M("admin"); 
        $ob = $mod->find((int)I('get.id'));

        //放置模板中
        $this->assign("v",$ob);
        //加载编辑模板
        $this->display("edit");
    }

        //加载密码编辑表单
    public function pass(){
		if(!IS_POST){
			$this->display();
		}else{
			$password = trim($_POST['password']);
			$newpwd = trim($_POST['newpwd']);
			$cfmpwd = trim($_POST['cfmpwd']);
			if(empty($password)){
				$data['status'] = 0;
				$data['msg'] = "旧密码不能为空";
				$this->ajaxReturn($data);
			}
			if(empty($newpwd)){
				$data['status'] = 0;
				$data['msg'] = "新密码不能为空";
				$this->ajaxReturn($data);
			}
              if($password==$newpwd){
                $data['status'] = 0;
                $data['msg'] = "旧密码与新密码一样或含有特殊字符";
                $this->ajaxReturn($data);
              }
      
			if($newpwd != $cfmpwd){
				$data['status'] = 0;
				$data['msg'] = "两次输入密码不一致";
				$this->ajaxReturn($data);
			}
			$password = md5(I('post.password'));
			$newpwd = md5(I('post.newpwd'));
			
			$user = M("Admin")->where("id = '".$_SESSION['admin']['id']."' and password = '".$password."'")->find();
			if($user){
				$result = M("Admin")->where("id = ".$_SESSION['admin']['id'])->setField('password',$newpwd);
				if($result !== false){
                    session('admin',null);
					$data['status'] = 1;
					$data['msg'] = "密码修改成功！";
					$this->ajaxReturn($data);
				}else{
					$data['status'] = 0;
					$data['msg'] = "密码修改失败！";
					$this->ajaxReturn($data);
				}
			}else{
				$data['status'] = 0;
				$data['msg'] = "旧密码输入错误！";
				$this->ajaxReturn($data);
			}
		}
    }

    //执行信息修改
    public function update(){
        //实例化
        $mod =M("admin");
        //自动验证
        $rules = array(
          array('phone','require','管理员电话必须填写！',1),
          array('abs','require','备注必须填写！',1),
          array('email','require','管理员关键字必须填写！',1),
          array('password2','password','确认密码和密码不一致',0,'confirm'), // 验证确认密码是否和密码一致
          array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式      
        );  
       

        // var_dump(!$mod->validate($rules)->create());die;
        if (!$mod->validate($rules)->create()){
             // 如果创建失败 表示验证没有通过 输出错误提示信息
             $this->error($mod->getError());
        }
        $data=I("post.");
        //判断是否输入了密码修改
        if(I('post.password') && I('post.password2'))
        {
          $data['password'] = md5(I('post.password'));
        }else{
          unset($data['password']);
        }
        
        //执行修改
        $m = $mod->save($data);
        // 判断并输出对应的提示信息
        if($m!==false){
            $this->success("修改成功！",U("Admin/index"));
        }else{
           $this->error("修改失败！");
        }
    }

      //执行密码修改
    public function passupdate(){
		dump($_POST);exit;
        //实例化
        $mod =M("admin");
        //自动验证
        $rules = array(
          array('oldpassword','require','旧密码必须填写！',1),
          array('password','require','密码必须填写！',1),
          array('password2','require','确认密码必须填写！',1),
          array('password2','password','确认密码和密码不一致',0,'confirm'), // 验证确认密码是否和密码一致
          array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式      
        );  
       
        //验证密码
        if(md5(I('post.oldpassword')) !== $mod->getFieldById($_SESSION['admin']['id'],'password'))
        {
          $this->error('原始密码不正确!');
        }
        // var_dump(!$mod->validate($rules)->create());die;
        if (!$mod->validate($rules)->create()){
             // 如果创建失败 表示验证没有通过 输出错误提示信息
             $this->error($mod->getError());
        }
        //判断是否输入了密码修改
        if(I('post.password') && I('post.password2'))
        {
          $mod->password = md5(I('post.password'));
        }
        //执行修改
        $m = $mod->save();
        //判断并输出对应的提示信息
        if($m!==false){
            echo json_encode(true);
        }else{
           echo json_encode(false);
        }
    }
    

    //执行信息删除
    public function del(){
        //实例化
        $mod =M("admin");
        //把传过来的字符串整理成搜索条件

        if(I('post.id'))
        {

            if(I('post.id')==$_SESSION['admin']['id']){
                $data['stu'] = 0;
                $data['msg'] = "不能删除当前账户";
                $this->ajaxReturn($data);
            }
            $map['id'] = I('post.id');
            //执行删除
            $m = $mod->where($map)->delete();

            //判断并输出对应的提示信息
            if($m){
                $data['stu'] = 1;
                $data['msg'] = "删除成功";
                $this->ajaxReturn($data);
            }else{
                $data['stu'] = 0;
                $data['msg'] = "删除失败";
                $this->ajaxReturn($data);
            }
        }
       
    }

    //启用禁用
    public function toggle()
    {
        $mod = M('admin');
        //判断禁用还是启用
        switch (I('post.type')) {
            case -1:
                $m = $mod->where('id='.(int)I('post.id'))->setField('status',0);
                if($m)
                {
                    $data['stu'] = 1;
                    $data['msg'] = "禁用成功";
                    $this->ajaxReturn($data);
                }else{
                    $data['stu'] = 0;
                    $data['msg'] = "禁用失败";
                    $this->ajaxReturn($data);
                }

            case 1:
                $m = $mod->where('id='.(int)I('post.id'))->setField('status',1);
                if($m)
                {
                    $data['stu'] = 1;
                    $data['msg'] = "启用成功";
                    $this->ajaxReturn($data);
                }else{
                    $data['stu'] = 1;
                    $data['msg'] = "启用失败";
                    $this->ajaxReturn($data);
                }

        }
    }
}