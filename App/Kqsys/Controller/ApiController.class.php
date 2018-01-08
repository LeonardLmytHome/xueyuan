<?php
// 本类由系统自动生成，仅供测试用途
namespace Kqsys\Controller;
//use Think\Controller;
class ApiController extends BaseController {

	//注册验证码，增加有效期
    public function regist(){
		//个人信息
		$user_name=I('post.uuid');
		$name=I('post.active_code');
		if(empty($user_name)||empty($name)){
			$return['stu'] = '0';
			$return['code'] = '108';
			$return['msg'] = '缺少重要参数';
			$this->ajaxReturn($return);
		}
		$whe='';
		$whe['name']=$name;
		$whe['uuid']=$user_name;
		$res_zai=M('user')->where($whe)->find();
		if(!$res_zai){
			$return['stu'] = '0';
			$return['code'] = '109';
			$return['msg'] = '该验证码不存在不匹配或已失效';
			$this->ajaxReturn($return);
		}
		$whe='';
		$whe['user_name']=$user_name;
		$whe['over_time']=array('gt',time());
		$res=M('user')->where($whe)->find();
		if($res){
			$return['stu'] = '0';
			$return['code'] = '112';
			$return['msg'] = '该用户名(设备号)未过期';
			$this->ajaxReturn($return);
		}
		$res_yzm=M('user')->getField("name",true);
		$res=M('config')->find(1);
		$res_user['name']=$this->rand_yzm();
		
		if(in_array($data_user['name'],$res_yzm)) {
			$return['stu'] = '0';
			$return['code'] = '115';
			$return['msg'] = '激活失败，请您稍后再试';
			$this->ajaxReturn($return);
		} 
		$res_user['over_time']=time()+(86400*$res['app_code_day']);
		//分类
		$whe='';
		$whe['id']=$res_zai['id'];
		$whe['name']=$name;
		$whe['uuid']=$user_name;
		$res_jihuo=M('user')->where($whe)->save($res_user);
		if($res_jihuo!==false){
			$return['stu'] = '1';
			$return['msg'] = '激活成功,延长使用期';
			$this->ajaxReturn($return);
		}else{
			$return['stu'] = '0';
			$return['code'] = '115';
			$return['msg'] = '激活失败，请您稍后再试';
			$this->ajaxReturn($return);
		}

    }

	
	
	function rand_yzm($length = 10)
	{
		$chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
		$str = '';
		for ( $i = 0; $i < $length; $i++ ) 
		{
			$str .= $chars[ mt_rand(0, strlen($chars) - 1) ];
		}
		return $str;
	}
	
	
	
	
	//录入设备号,判断是否过期
    public function login(){
		//个人信息
		$user_name=I('post.uuid');
		$add_time=I('post.install_time');
		if(empty($user_name)){
			$return['stu'] = '0';
			$return['code'] = '108';
			$return['msg'] = '缺少重要参数';
			$this->ajaxReturn($return);
		}
		$whe='';
		$whe['uuid']=$user_name;
		$res_zai=M('user')->where($whe)->find();
		if(!$res_zai){
			if(empty($add_time)){
				$return['stu'] = '0';
				$return['code'] = '108';
				$return['msg'] = '缺少重要参数';
				$this->ajaxReturn($return);
			}
		    $res_yzm=M('user')->getField("name",true);
			$res=M('config')->find(1);
			$data_user['user_name']=$user_name;
			$data_user['uuid']=$user_name;
			$data_user['stu']=2;
			$data_user['add_time']=$add_time/1000;
			$data_user['name']=$this->rand_yzm();
			if(in_array($data_user['name'],$res_yzm)) {
				$return['stu'] = '0';
				$return['code'] = '115';
				$return['msg'] = '录入失败，请您稍后再试';
				$this->ajaxReturn($return);
			} 
			$data_user['over_time']=$add_time/1000+(86400*$res['app_use_day']);
			$res_reg=M('user')->add($data_user);
			if($res_reg){
				$return['stu'] = '1';
				$return['msg'] = '未过期';
				$this->ajaxReturn($return);
			}
		}else{
			if($res_zai['over_time']<time()){
				$return['stu'] = '0';
				$return['code'] = '116';
				$return['msg'] = '该验证码已过期';
				$this->ajaxReturn($return);
			}else{
				$return['stu'] = '1';
				$return['msg'] = '未过期';
				$this->ajaxReturn($return);
			}
		}
    }
	
	
}