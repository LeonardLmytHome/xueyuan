<?php
// 本类由系统自动生成，仅供测试用途
namespace Kqsys\Controller;
//use Think\Controller;
class UserController extends CommonController {
	// 学员列表
    public function index(){
    	$status=I("get.status");
    	$keyword=I("get.keyword");
        $start=I("get.start");
    	$is_guo=I("get.is_guo");
    	$end=I("get.end");
    	$sid=I("get.sid");
    	if(!empty($status)){
    		$whe['status']=$status;
    	}
        if(!empty($is_guo)){
            if($is_guo==1){
                $whe['end_time']=array("LT",time());
            }else{
                $whe['end_time']=array("GT",time());
            }
        }
    	if(!empty($keyword)){
    		$whe['number|name']=array("like","%".$keyword."%");
    	}
    	if(!empty($sid)){
    		$whe['sid']=$sid;
    	}
    	// 查询条件（结束时间）设置
        if(!empty($end)){
            $end = strtotime($end) + 86399;
        }else{
            $end = time();
        }
        // 查询条件（开始时间）设置
        if(!empty($start)){
            $start = strtotime($start);
            if($start > $end){
                $this->error('开始时间不能大于结束时间');
            }
            $whe['addtime'] = array('BETWEEN', array($start, $end));
        }else{
            $whe['addtime'] = array('LT', $end );
        }
    	$mod=M("user");
        $whe['status']=1;
    	$count=$mod->where($whe)->count();
    	$Page = new \Think\Page($count,20);
    	$show = $Page->show();
    	$list=$mod->where($whe)->order("status asc,addtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
    	$time=time();
        foreach($list as $k=>$v){
    		$list[$k]['sid']=M("site")->where("id='".$v['sid']."'")->getField("name");
            if($v['end_time']<$time){
                $list[$k]['is_guo']=1;
            }else{
                $list[$k]['is_guo']=2;
            }
    	}
    	// 教学点
    	$site=M("site")->field("id,name")->select();
    	$this->assign("list",$list);
    	$this->assign("count",$count);
    	$this->assign("page",$show);
    	$this->assign("site",$site);
		$this->display();
    }

    //学员详情
    public function detail(){
    	$id=I("get.id");
    	$mod=M("user");
    	$info=$mod->where("id='".$id."'")->find();
    	if(!$info){
    		$this->error("参数错误");
    	}
    	$info['sid']=M("site")->where("id='".$info['sid']."'")->getField("name");
    	$this->assign("info",$info);
    	$this->display();
    }

    //获取学员详情信息
    public function getdetail(){
        $id=trim(I("post.id"));
        $mod=M("user");
        $info=$mod->where("id='".$id."'")->find();
        if(!$info){
            $data['status']=0;
            $data['msg']="参数错误";
            $this->ajaxReturn($data);
        }else{
            $info['sid']=M("site")->where("id='".$info['sid']."'")->getField("name");
            if($info['sex']==1){
                $info['sex']="男";
            }else{
                 $info['sex']="女";
            }
            if($info['status']==1){
                $info['status']="正常";
            }else{
                 $info['status']="已删除";
            }
            $shengyu=$info['total_hours']-$info['shang_hours'];
            $data['status']=1;
            $data['msg']="
                <div style='padding:10px;float:left;width:40%'>姓名：".$info['name']."</div>
                <div style='padding:10px;float:left;width:40%'>性别：".$info['sex']."</div>
                <div style='padding:10px;float:left;width:40%'>年龄：".$info['age']."</div>
                <div style='padding:10px;float:left;width:40%'>编号：".$info['number']."</div>
                <div style='padding:10px;float:left;width:40%'>联系电话：".$info['tel']."</div>
                <div style='padding:10px;float:left;width:40%'>教学点：".$info['sid']."</div>
                <div style='padding:10px;float:left;width:40%'>总课时：".$info['total_hours']."</div>
                <div style='padding:10px;float:left;width:40%'>上课次数：".$info['shang_hours']."</div>
                <div style='padding:10px;float:left;width:40%'>剩余课时：".$shengyu."</div>
                ";
            $this->ajaxReturn($data);
        }
    }

}