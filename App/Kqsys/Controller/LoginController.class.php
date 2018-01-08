<?php
namespace Kqsys\Controller;
use Think\Controller;
class LoginController extends Controller 
{ 
    //验证码
    public function verify()
    {
       
      $Verify = new \Think\Verify();
      $Verify->fontSize = 25;
      $Verify->length   = 4;
      $Verify->entry();
    }
    
    public function index()
    {
      $mod=M('config');
      $data=$mod->field("copyright,config_pic")->find();
      $this->assign("data",$data);
      $this->display('login');
    }

       //登录验证
    public function doLogin(){
        //接收数据验证码检测
        $code = trim(I('post.verify'));
        $Verify = new \Think\Verify();
        
        //实例化
        $mod = M("admin");
        //自动验证
        // $rules = array(
        //   array('admin_name','/\S+/','用户名必须填写！',1,'regex'),// // 验证是否为空或者空格回车
        //   array('password','/\S+/','密码必须填写！',1,'regex'),// // 验证是否为空或者空格回车

        // );  
        // if(!$mod->validate($rules)->create()){
        //    // 如果创建失败 表示验证没有通过 输出错误提示信息
        //    $this->error($mod->getError());
        // }
         if(!$Verify->check($code)){
          $data['status'] = 0;
          $data['msg'] = "验证码不正确！";
          $this->ajaxReturn($data);
        }
        //用户名检测
        $arr['admin_name'] = trim(I('post.admin_name'));
		$pass=trim(I('post.password'));
		if(empty($arr['admin_name'])){
			$data['status'] = 0;
            $data['msg'] = "管理员不能为空！";
            $this->ajaxReturn($data);
		}
        if(!$password = $mod->getFieldByAdmin_name($arr['admin_name'],'password')){
          $data['status'] = 0;
          $data['msg'] = "管理员或密码不正确！";
          $this->ajaxReturn($data);
        }
        
        //密码检测
		if(empty($pass)){
          $data['status'] = 0;
          $data['msg'] = "密码不能为空！";
          $this->ajaxReturn($data);
        }
        if($password !== md5(trim(I('post.password')))){
          $data['status'] = 0;
          $data['msg'] = "管理员或密码不正确！";
          $this->ajaxReturn($data);
        }
        
        //判断是否禁用用户
        // dump(I('session.admin.status'));die;
        if($mod->getFieldByAdmin_name($arr['admin_name'],'status') == 0){
          $data['status'] = 0;
          $data['msg'] = "用户被禁用,请更换用户登录！";
          $this->ajaxReturn($data);
        }


        // dump($admin_name);die;
        //获取ID
        $arr['id'] = $mod->getFieldByAdmin_name($arr['admin_name'],'id');
        //获取角色ID
        $arr['character_id'] = $mod->getFieldByAdmin_name($arr['admin_name'],'character_id');
        $arr['root'] = M('character')->getFieldById($arr['character_id'],'is_root');
        //dump($arr['root']);die;
        //存入session
        session('admin',$arr);
        //查询用户信息
        $character = M('character')->getFieldById($arr['character_id'],'character');
        // dump($character);die;
        $this->assign('character',$character);
        // dump(session('admin'));die;
        $data['status'] = 1;
        $data['msg'] = "登录成功！";
        $this->ajaxReturn($data);
    }

    //退出当前用户
    public function logout()
    {
      session('admin',null);
      $this->redirect('Login/index');
    }
	//找回密码
    public function back(){
        $this->assign('title','忘记密码|');
        $this->assign('top','忘记密码');
        $this->display();
    }
    
    public function password(){
        $tel = trim(I("post.tel"));
        $phone_code = trim(I("post.phone_code"));
        $password = trim(I("post.password"));
        $cfmpwd = trim(I("post.cfmpwd"));
        $code = trim(I('post.verify'));
        $Verify = new \Think\Verify();
        if(!$Verify->check($code))
        {  
            $data['stu'] = 0;
           $data['msg'] = "图片验证码错误！";
           $this->ajaxReturn($data);
        }
        if(empty($tel)){
            $data['stu'] = 0;
            $data['msg'] = "手机号码不能为空！";
            $this->ajaxReturn($data);
        }
        if(!preg_match("/^1[3|4|5|7|8][0-9]\d{7,}$/",$tel)){
            $data['stu'] = 0;
            $data['msg'] = "请输入正确的手机号码！";
            $this->ajaxReturn($data);
        }
        //查询条件
        $whe= '';
        $whe['phone']=$tel;
        $whe['status']=1;
        $u = M('admin')->where($whe)->find();
        //echo M('fen_admin')->getlastsql();
        if(empty($u)){
            $data['stu'] = 0;
            $data['msg'] = "手机号码与绑定手机号不符";
            $this->ajaxReturn($data);
        }
        if(empty($phone_code)){
            $data['stu'] = 0;
            $data['msg'] = "请输入短信验证码";
            $this->ajaxReturn($data);
        }
        $whe['type']=2;
        $whe['is_sx']=1;
        $code2 = M('code')->where($whe)->order('add_time desc')->find();
        if($code2){
            $s = $code2['add_time']+600;
            if(time() > $s){
                //设为失效
                M('code')->where($whe)->setField('is_sx',-1);
                $data['stu'] = 0;
                $data['msg'] = "短信验证码已失效";
                $this->ajaxReturn($data);
            }else{
                if($phone_code != $code2['code']){
                    $data['stu'] = 0;
                    $data['msg'] = "短信验证码输入有误";
                    $this->ajaxReturn($data);
                }
            }
        }else{
            $data['stu'] = 0;
            $data['msg'] = "该手机号与验证手机号不匹配";
            $this->ajaxReturn($data);
        }
        if(strlen($password) < 6 || strlen($password) > 20){
            $data['stu'] = 0;
            $data['msg'] = "密码长度在6-20个字符之间";
            $this->ajaxReturn($data);
        }
        if($password != $cfmpwd){
            $data['stu'] = 0;
            $data['msg'] = "两次输入密码不一致";
            $this->ajaxReturn($data);
        }
        //$user['rand'] = rand(10000,99999);
        //$pwd = md5($password).$user['rand'];
        $user['password'] = md5($password);
        $result = M('admin')->where("id = ".$u['id'])->save($user);
        if($result !== false){
            //设为失效
            M('code')->where($whe)->setField('is_sx',-1);
            $data['stu'] = 1;
            $data['msg'] = "恭喜你，密码找回成功！";
            $this->ajaxReturn($data);
        }else{
            $data['stu'] = 0;
            $data['msg'] = "对不起，找回失败，请稍候操作";
            $this->ajaxReturn($data);
        }
        
    }
    
  
    public function cmfsend(){
        // $code = trim(I('post.verify'));
        // if(empty($code)){
        //     $data['stu'] = 0;
        //     $data['msg'] = "请输入图片验证码！";
        //     $this->ajaxReturn($data);
        // }

        // $Verify = new \Think\Verify();
        // if(!$Verify->check($code)) {
        //     $data['stu'] = 0;
        //     $data['msg'] = "图片验证码错误！";
        //     $this->ajaxReturn($data);
        // }
        $config=M("config")->where('id=1')->find();
        if($config['is_open_sms']==-1){
            $data['stu'] = 0;
            $data['msg'] = "短信功能未开启！";
            $this->ajaxReturn($data);
        }
        $tel = trim(I("post.tel"));
        if(!preg_match("/^1[3|4|5|7|8][0-9]\d{7,11}$/",$tel)){
            $data['stu'] = 0;
            $data['msg'] = "请输入正确的手机号码！";
            $this->ajaxReturn($data);
        }
        //查询条件
        $whe= '';
        //$whe['is_show']=$this->whe['is_show'];
        $whe['phone']=$tel;
        $whe['status']=1;
        $user =M('admin')->where($whe)->find();
        if(!$user){
            $data['stu'] = 0;
            $data['msg'] = "该手机号与验证手机号不匹配";
            $this->ajaxReturn($data);
        }
        if($user['status']==-1){
            $data['stu'] = 0;
            $data['msg'] = "该手机号被封号，请联系管理员解除封号";
            $this->ajaxReturn($data);
        }
        // if($user['status']==2){
        //     $data['stu'] = 0;
        //     $data['msg'] = "账号正在审核中";
        //     $this->ajaxReturn($data);
        // }
        //2找回用短信验证码
        $whe['type']=2;
        $code2 = M('code')->where($whe)->order('add_time desc')->find();
        if($code2){
            $s = $code2['add_time']+60;
            if(time() < $s){
                $data['stu'] = 0;
                $data['msg'] = "60秒内只能发送一次";
                $this->ajaxReturn($data);
            }
        }
        $code = rand(100000,999999);
        $c['tel'] = $tel;
        $c['code'] = $code;
        $c['add_time'] = time();
        $c['type'] = 2;
        $result =M('code')->add($c);
        if($result){
            $send = new \Think\SendSms();  //实例化短信接口
            $content = '尊敬的用户，你好！你的找回密码验证码为'.$code.'，十分钟有效时间，请尽快完找回！';
            $result2  = $send->send($tel,$content);
            if($result2['status'] == 1){
                $data['stu'] = 1;+
                $data['msg'] = "发送成功！";
                $this->ajaxReturn($data);
            }else{
                M('code')->where['id = '.$result]->delete();
                $data['stu'] = 0;
                $data['msg'] = "发送失败！";
                $this->ajaxReturn($data);
            }
        }else{
            $data['stu'] = 0;
            $data['msg'] = "发送失败，请稍候操作";
            $this->ajaxReturn($data);
        }
    }
}