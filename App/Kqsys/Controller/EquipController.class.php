<?php
// 本类由系统自动生成，仅供测试用途
namespace Kqsys\Controller;
//use Think\Controller;
class EquipController extends CommonController {
	public $whe;
	public function __construct(){
		parent::__construct();  //调用父构造函数避免冲突
		//指针引入
		$this->tab1=M("equip");//验证码
		$this->whe=$whe;
		$this->url1="equip";
		$this->cons2="设备";//跳转提示文字
		$this->cons3="Equip";//便于linux服务器
		$this->assign('cons2',$this->cons2);
	}
    public function index(){
    	//$stu = I('get.stu');
		$start = I('get.start');
		$end = I('get.end');
		$keyword = I('get.keyword');
		$cate = I('get.cate');
		$whe='';
		//$whe['is_del']=1;
		//$whe['status']=array('in','-1,1');
		$whe['stu']=array('in','2,1');
		// if(!empty($stu)){
		// 	$whe['stu'] = $stu;
		// }
		if(!empty($cate)){
			if($cate=='2'){
                 $whe['stu'] =2;
                 $whe['over_time'] =array('egt',time());
			}else{
				$whe['stu'] =2;
				$whe['over_time'] =array('lt',time());
			}
		}
		if(!empty($keyword)){
			$whe['user_name|tel|name'] = array('like','%'.$keyword.'%');
		}
		// 查询条件（结束时间）设置
		if (!empty($end)) {
			$end = strtotime($end) + 86399;
		} else {
			$end = time();
		}
		// 查询条件（开始时间）设置
		if (!empty($start)) {
			$start = strtotime($start);
			if($start > $end){
				$this->error('开始时间不能大于结束时间');
			}
			$whe['add_time'] = array('BETWEEN', array($start, $end));
		} 
		$count = $this->tab1->where($whe)->count();// 查询满足要求的总记录数
		$Page  = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show  = $Page->show();// 分页显示输出
		$user = $this->tab1->where($whe)->order("add_time desc")->limit($Page->firstRow.','.$Page->listRows)->select();
	
		$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		session($this->url1.'_url',$url);
		$this->assign('user',$user);
		$this->assign('count',$count);
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
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
	
	
	//修改设备信息
	public function user_change(){
		$id=trim(I('post.id/d'));
		$user_name=trim(I('post.user_name'));
		$tel=trim(I('post.tel'));
		$res=M('equip')->find($id);
		if(!$res){
			$data['status'] = 0;
			$data['msg'] = "设备信息不存在！";
			$this->ajaxReturn($data);
		}
		if(empty($user_name)){
			$data['status'] = 0;
			$data['msg'] = "教学点名称不能为空";
			$this->ajaxReturn($data);
		}
		if(empty($tel)){
            $data['status'] = 0;
            $data['msg'] = "请输入手机号码";
            $this->ajaxReturn($data);
        }
		if(!preg_match("/^1[3|4|5|7|8][0-9]\d{8}$/",$tel)){
            $data['status'] = 0;
            $data['msg'] = "请输入正确的手机号码！";
            $this->ajaxReturn($data);
        }
		
		$data_user['id']=$id;
		$data_user['user_name']=$user_name;
		$data_user['tel']=$tel;
		$res_user = M('equip')->save($data_user);
		if($res_user!==false){
			$data['status'] = 1;
			$data['msg'] = "设备信息成功！";
			$this->ajaxReturn($data);
		}else{
			$data['status'] = 0;
			$data['msg'] = "设备信息失败,请稍候再试！";
			$this->ajaxReturn($data);
		}
	}		
	
	
	//修改过期时间
	public function user_change_time(){
		$id=trim(I('post.id/d'));
		$user_name=trim(I('post.user_name'));
		$over_time=trim(I('post.over_time'));
		$tel=trim(I('post.tel'));
		$res=M('equip')->find($id);
		if(!$res){
			$data['status'] = 0;
			$data['msg'] = "设备信息不存在！";
			$this->ajaxReturn($data);
		}
		if(empty($user_name)){
			$data['status'] = 0;
			$data['msg'] = "教学点名称不能为空";
			$this->ajaxReturn($data);
		}
		if(empty($tel)){
            $data['status'] = 0;
            $data['msg'] = "请输入手机号码";
            $this->ajaxReturn($data);
        }
		if(!preg_match("/^1[3|4|5|7|8][0-9]\d{8}$/",$tel)){
            $data['status'] = 0;
            $data['msg'] = "请输入正确的手机号码！";
            $this->ajaxReturn($data);
        }
		if(empty($over_time)){
            $data['status'] = 0;
            $data['msg'] = "到期时间不能为空";
            $this->ajaxReturn($data);
        }
		$data_user['id']=$id;
		$data_user['user_name']=$user_name;
		$data_user['tel']=$tel;
		$data_user['over_time']=strtotime($over_time);
		$res_user = M('equip')->save($data_user);
		if($res_user!==false){
			$data['status'] = 1;
			$data['msg'] = "设备信息成功！";
			$this->ajaxReturn($data);
		}else{
			$data['status'] = 0;
			$data['msg'] = "设备信息失败,请稍候再试！";
			$this->ajaxReturn($data);
		}
	}		
	
	/**
     *	删除
     **/
    public function del(){
        $id = I('post.id');
        $result = M('equip')->where("id = ".$id)->find();
        if($result){
            $res =  M('equip')->where("id = ".$id)->delete();
            if($res){
//                unlink('.'.$result['imgurl']);
                $data['status'] = 1;
                $data['msg'] = "删除成功！";
                $this->ajaxReturn($data);
            }else{
                $data['status'] = 0;
                $data['msg'] = "删除失败！";
                $this->ajaxReturn($data);
            }
        }else{
            $data['status'] = 0;
            $data['msg'] = "数据不存在！";
            $this->ajaxReturn($data);
        }


    }


    //批量删除
    public function delmuti(){
        $ids = I('post.ids');
        $where['id']=array('in',$ids);
        $advert =  M('equip')->where($where)->select();
        if($advert){
            $result =  M('equip')->where($where)->delete();
            if($result){
                foreach($advert as $k => $v){
                    unlink('.'.$v['imgurl']);
                }
                $data['status'] = 1;
                $data['msg'] = "删除成功！";
                $this->ajaxReturn($data);
            }else{
                $data['status'] = 0;
                $data['msg'] = "删除失败！";
                $this->ajaxReturn($data);
            }
        }else{
            $data['status'] = 0;
            $data['msg'] = "数据不存在！";
            $this->ajaxReturn($data);
        }
    }
	
}