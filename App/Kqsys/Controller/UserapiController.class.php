<?php
// 本类由系统自动生成，仅供测试用途
namespace Kqsys\Controller;
//use Think\Controller;
class UserapiController extends BaseController {
	/**
	 * 新增学员页面
	 * @access public
	 */
	public function add(){
		$id=trim(I("post.id"));
		$whe['status']=1;
		$whe['id']=$id;
		$site=M("site")->where($whe)->field("id,name")->select();
		if(!$site){
			$data['code']="1";
			$data['msg']="查询成功,返回数据";
			$data['res']="";	
			$this->ajaxReturn($data);
		}else{
			$data['code']="1";
			$data['msg']="查询成功,返回数据";
			$data['res']=$site[0];
			$this->ajaxReturn($data);
		}
	}
	
	/**
	 * 生成数字字母随机数
	 */
	function randomkeys($length)   
	{   
	   $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';  
	    for($i=0;$i<$length;$i++)   
	    {   
	        $key .= $pattern{mt_rand(0,35)};    //生成php随机数   
	    }   
	    return $key;   
	}   

	/**
	 * 学员新增
	 * @access public
	 */
	public function do_add(){
		$user['number']= $this->randomkeys(10);
		$user['name']=trim(I("post.name"));
		$user['sex']=trim(I("post.sex"));
		$user['age']=trim(I("post.age"));
		$user['tel']=trim(I("post.tel"));
		$user['sid']=trim(I("post.sid"));
		$user['total_hours']=trim(I("post.total_hours"));
		$user['sheng_hours']=trim(I("post.total_hours"));
		$user['addtime']=time();
		$user['savetime']=time();
		$user['start_time']=trim(I("post.start_time"))/1000;
		$user['end_time']=trim(I("post.end_time"))/1000;
		foreach($user as $k=>$v){
			if(empty($v)){
				$data['code']='108';
				$data['msg']="缺少必要参数";
				$this->ajaxReturn($data);
			}
		}
		$mod=M("user");
		$be=$mod->where("number='".$user['number']."'")->field("id")->find();
		if($be){
			$data['code']='112';
			$data['msg']="编号已存在";
			$this->ajaxReturn($data);
		}
		$res=$mod->add($user);
		if(!$res){
			$data['code']='120';
			$data['msg']="新增失败";
			$this->ajaxReturn($data);
		}else{
			$data['code']='1';
			$data['msg']="新增成功";
			$data['number']=$user['number'];
			$this->ajaxReturn($data);
		}
	}

	/**
	 * 学员列表
	 * @access public
	 */
	public function lists(){
		$id=trim(I("post.id"));
		$keyword=trim(I("post.keyword"));
		if(!empty($keyword)){
			$whe["number|name"]=array("like","%".$keyword."%");
		}
		$mod=M('user');
		$mod_site=M('site');
		$whe['status']=1;
		$whe['sid']=$id;
		$whe_site['id']=$id;
		$p = I('post.p');//页数
		if(empty($p)) $p = 1;
		$num=10;//每页数量
		$firstRow = ($p - 1) * $num;
		$list=$mod->where($whe)->field("id,number,name,shang_hours,total_hours,end_time")->limit($firstRow, $num)->select();
		$list_site=$mod_site->where($whe_site)->field("id,name")->limit($firstRow, $num)->find();
		$data["id"]=$list_site['id'];
		$data["name"]=$list_site['name'];
		if(!$list){
			$data['code']='111';
			$data['msg']="没有要查询的数据";
			$data['res']="";
			$this->ajaxReturn($data);
		}else{
			$time=time();
			foreach($list as $k=>$v){
				if($v['end_time']<$time){
					$daoqi[]=$v;
				}else{
					$weidao[]=$v;
				}
			}
			if(empty($daoqi)){
				$daoqi=array();
			}
			if(empty($weidao)){
				$weidao=array();
			}
			$list = array_merge($daoqi, $weidao); 
			$data['code']="1";
			$data['msg']="查询成功,返回数据";
			$data["res"]=$list;
			$this->ajaxReturn($data);
		}
	}

	/**
	 * 学员修改页面
	 * @access public
	 */
	public function edit(){
		$id=trim(I("post.id"));
		$mod=M("user");
		$user=$mod->where("id='".$id."'")->field("id,number,name,sex,age,tel,sid,total_hours,start_time,end_time")->find();
		if(!$user){
			$data['code']='113';
			$data['msg']="学员信息不存在";
			$this->ajaxReturn($data);
		}else{
			$site=M("site")->where("status=1")->field("id,name")->select();
			$data['code']="1";
			$data["res"]["user"]=$user;
			$data["res"]["site"]=$site;
			$this->ajaxReturn($data);
		}
	}

	/**
	 * 执行学员信息修改
	 * @access public
	 */
	public function do_edit(){
		$id=trim(I("post.id"));
		$user['number']=trim(I("post.number"));
		$user['name']=trim(I("post.name"));
		$user['sex']=trim(I("post.sex"));
		$user['age']=trim(I("post.age"));
		$user['tel']=trim(I("post.tel"));
		$user['sid']=trim(I("post.sid"));
		$user['total_hours']=trim(I("post.total_hours"));
		$user['sheng_hours']=trim(I("post.total_hours"));
		$user['savetime']=time();
		$user['start_time']=trim(I("post.start_time"))/1000;
		$user['end_time']=trim(I("post.end_time"))/1000;
		foreach($user as $k=>$v){
			if(empty($v)){
				$data['code']='108';
				$data['msg']="缺少必要参数";
				$this->ajaxReturn($data);
			}
		}
		$mod=M("user");
		$be=$mod->where("number='".$user['number']."' and id != '".$id."'")->field("id")->find();
		if($be){
			$data['code']='112';
			$data['msg']="编号已存在";
			$this->ajaxReturn($data);
		}
		$res=$mod->where("id='".$id."'")->save($user);
		if(!$res){
			$data['code']='120';
			$data['msg']="修改失败";
			$this->ajaxReturn($data);
		}else{
			$data['code']='1';
			$data['msg']="修改成功";
			$this->ajaxReturn($data);
		}
	}

	/**
	 * 删除学员信息
	 * @access public
	 */
	public function del(){
		$id=trim(I("post.id"));
		$mod=M("user");
		$be=$mod->where("id='".$id."'")->field("id")->find();
		if(!$be){
			$data['code']='113';
			$data['msg']="学员信息不存在";
			$this->ajaxReturn($data);
		}
		$res=$mod->where("id='".$id."'")->setField("status",2);
		if(!$res){
			$data['code']='120';
			$data['msg']="删除失败";
			$this->ajaxReturn($data);
		}else{
			$data['code']='1';
			$data['msg']="删除成功";
			$this->ajaxReturn($data);
		}
	}

	/**
	 * 学员详情
	 * @access public
	 */
	public function detail(){
		$id=trim(I("post.id"));
		$mod=M("user");
		$be=$mod->where("id='".$id."'")->field("name,sex,age,number,tel,sid,total_hours,shang_hours,start_time,end_time")->find();
		if(!$be){
			$data['code']='113';
			$data['msg']="学员信息不存在";
			$this->ajaxReturn($data);
		}else{
			$be['sname']=M("site")->where("id='".$be['sid']."'")->getField("name");
			unset($be['sid']);
			$data['code']='1';
			$data['msg']="查询成功,返回数据";
			$data["user"]=$be;
			$this->ajaxReturn($data);
		}
	}

	/**
	 * 学员签到
	 * @access public
	 */
	public function sign(){
		$id=trim(I("post.id"));
		$user=M("user")->where("id='".$id."'")->field("id")->find();
		if(!$user){
			$data['code']='113';
			$data['msg']="学员信息不存在";
			$this->ajaxReturn($data);
		}
		$mod=M("user_log");
		$list=$mod->where("uid='".$id."'")->field("addtime")->select();
		if(!$list){
			$data['code']='111';
			$data['msg']="没有要查询的数据";
			$this->ajaxReturn($data);
		}else{
			$data['code']="1";
			$data["res"]=$list;
			$this->ajaxReturn($data);
		}
	}
	
	/**
	 * 获取用户课时详情数据
	 */
	public function get_scan(){
		$number=trim(I("post.number"));
		$user=M("user")->where("number='".$number."'")->field("id,total_hours,shang_hours")->find();
		if(!$user){
			$data['code']='113';
			$data['msg']="学员信息不存在";
			$this->ajaxReturn($data);
		}else{
			$data['code']="1";
			$data['msg']="返回数据成功";
			$user1=M("user")->where("id='".$user['id']."'")->field("id,number,name,sex,age,tel,sid,total_hours,shang_hours,start_time,end_time")->find();
			$user1['sname']=M("site")->where("id='".$user1['sid']."'")->getField("name");
			unset($user1['sid']);
			$data['res']['user']=$user1;
			$this->ajaxReturn($data);
		}
	}

	/**
	 * 学员扫码签到
	 * @access public
	 */
	public function scan_code(){
		$number=trim(I("post.number"));
		$user=M("user")->where("number='".$number."'")->field("id,total_hours,shang_hours")->find();
		if(!$user){
			$data['code']='113';
			$data['msg']="学员信息不存在";
			$this->ajaxReturn($data);
		}else{
			if($user['total_hours'] > $user[shang_hours]){
				$mod=M("user_log");
				$mod->startTrans();
				$res1=M("user")->where("number='".$number."'")->setInc("shang_hours",1);
				$res2=M("user")->where("number='".$number."'")->setDec("sheng_hours",1);
				$l['uid']=$user['id'];
				$l['addtime']=time();
				$res3=$mod->add($l);
				if($res1 && $res2 && $res3){
					$mod->commit();
					$data['code']="1";
					$data['msg']="签到成功";
					$this->ajaxReturn($data);
				}else{
					$mod->rollback();
					$data['code']="120";
					$data['msg']="签到失败";
					$this->ajaxReturn($data);
				}
			}else{
				$data['code']='121';
				$data['msg']="会员课时不足，签到失败";
				$this->ajaxReturn($data);
			}
		}
	}
	
	
	
	/**
	 * 小程序获取用户课时详情数据
	 */
	public function xcx_get_scan(){
		$number=trim(I("post.number"));
		$user=M("user")->where("number='".$number."'")->field("id,total_hours,shang_hours")->find();
		if(!$user){
			$data['code']='113';
			$data['msg']="学员信息不存在";
			$this->ajaxReturn($data);
		}else{
			$data['code']="1";
			$data['msg']="返回数据成功";
			$user1=M("user")->where("id='".$user['id']."'")->field("id,number,name,sex,age,tel,sid,total_hours,shang_hours,FROM_UNIXTIME(start_time,'%Y-%m-%d %H:%i:%s') as start_time,FROM_UNIXTIME(end_time,'%Y-%m-%d %H:%i:%s') as end_time")->find();
			$user2=M("site")->where("id='".$user1['sid']."'")->field("name,principal")->find();
			$user1['sname'] = $user2['name'];
			$user1['principal'] = $user2['principal'];
			$data['res']['user']=$user1;
			
			$Model = M();
			$log=$Model->query("select FROM_UNIXTIME(a.addtime,'%Y-%m-%d %H:%i:%s') as addtime,b.name from kq_user_log as a inner join kq_user as b on a.uid = b.id where b.id = {$user1['sid']} order by addtime desc");
			$data['res']['user']['log']= $log[0];
			
			
			$carousel=$Model->query("select b.title,b.img,b.a_id from kq_carousel_classify as a inner join kq_carousel as b on a.id = b.c_id where a.`disable` = 0 and b.`disable` = 0 and a.type = 0 and a.s_id = ". $user1['sid'] ." ORDER BY b.id desc");
            $data['res']['carousel']=$carousel;
			
			$this->ajaxReturn($data);
		}
	}
	
	
	/**
	 * 学员签到
	 * @access public
	 */
	public function xcx_sign(){
		$id=trim(I("post.id"));
		$user=M("user")->where("id='".$id."'")->field("id")->find();
		if(!$user){
			$data['code']='113';
			$data['msg']="学员信息不存在";
			$this->ajaxReturn($data);
		}
		$Model = M();
		$list=$Model->query("select FROM_UNIXTIME(a.addtime,'%Y-%m-%d %H:%i:%s') as addtime,b.name from kq_user_log as a inner join kq_user as b on a.uid = b.id where b.id = {$id}");
		if(!$list){
			$data['code']='111';
			$data['msg']="没有要查询的数据";
			$this->ajaxReturn($data);
		}else{
			$data['code']="1";
			$data["res"]=$list;
			$this->ajaxReturn($data);
		}
	}
	
	/**
	 * 课程首页
	 */
	public function xcx_get_course(){
		$Model = M();
		$carousel=$Model->query("select b.title,b.img,b.a_id from kq_carousel_classify as a inner join kq_carousel as b on a.id = b.c_id where a.`disable` = 0 and b.`disable` = 0 and a.type = 2 ORDER BY b.id desc");
        $data['res']['carousel']=$carousel;
        
        $classify=$Model->query("select id,title,img from kq_article_classify as a where disable = 0 and p_id = 0");
        $data['res']['classify']=$classify;
        
        $article=$Model->query("select id,title,a.`describe`,img from kq_article as a where disable = 0 and s_id > 0");
        $data['res']['article']=$article;
        
        $data['code']="1";
		$data['msg']="返回数据成功";
		$this->ajaxReturn($data);
	}
	
	/**
	 * 查询子分类
	 */
	public function xcx_get_subclassify(){
		$id=trim(I("post.id"));
		if(!empty($id)){
			$Model = M();
	        $classify=$Model->query("select a_id,title,img from kq_article_classify as a where disable = 0 and p_id = {$id}");
	        if($classify){
	        	$data['res']['classify']=$classify;
		        $data['code']="1";
				$data['msg']="返回数据成功";
				$this->ajaxReturn($data);
	        }else{
	        	$data['code']="117";
				$data['msg']="查询为空";
				$this->ajaxReturn($data);
	        }
		}else{
			$data['code']="113";
			$data['msg']="返回数据失败";
			$this->ajaxReturn($data);
		}
	}
	
	/**
	 * 文章详情
	 */
	public function xcx_get_article(){
		$id=trim(I("post.id"));
		if(!empty($id)){
			$Model = M();
	        $article=$Model->query("select id,title,a.`describe`,img,phone,gps,content,FROM_UNIXTIME(a.addtime,'%Y-%m-%d %H:%i:%s') as addtime from kq_article as a where disable = 0 and id = {$id}");
	        if($article){
	        	$data['res']['article']=$article[0];
		        $data['code']="1";
				$data['msg']="返回数据成功";
				$this->ajaxReturn($data);
	        }else{
	        	$data['code']="117";
				$data['msg']="查询为空";
				$this->ajaxReturn($data);
	        }
		}else{
			$data['code']="113";
			$data['msg']="返回数据失败";
			$this->ajaxReturn($data);
		}
	}
	
	
	/**
	 * 子分类文章列表
	 */
	public function xcx_get_articlelist(){
		$p_id=trim(I("post.p_id"));
		$c_id=trim(I("post.c_id"));
		if(!empty($p_id) && !empty($c_id)){
			$Model = M();
	        $article=$Model->query("select id,title,`describe`,img,phone,gps,content,FROM_UNIXTIME(addtime,'%Y-%m-%d %H:%i:%s') as addtime from kq_article where `disable` = 0 and p_id = {$p_id} and c_id = {$c_id}");
	        if($article){
	        	$data['res']['article']=$article;
		        $data['code']="1";
				$data['msg']="返回数据成功";
				$this->ajaxReturn($data);
	        }else{
	        	$data['code']="117";
				$data['msg']="查询为空";
				$this->ajaxReturn($data);
	        }
		}else{
			$data['code']="113";
			$data['msg']="返回数据失败";
			$this->ajaxReturn($data);
		}
	}
	
	
	/**
	 * 搜索教学点文章 标题
	 */
	public function xcx_search_site(){
		$keyword=trim(I("post.keyword"));
		$Model = M();
        $article=$Model->query("select id,title,a.`describe`,img from kq_article as a where disable = 0 and s_id > 0 and title like '%{$keyword}%'");
        if($article){
        	$data['res']['article']=$article;
	        $data['code']="1";
			$data['msg']="返回数据成功";
			$this->ajaxReturn($data);
        }else{
        	$data['code']="117";
			$data['msg']="查询为空";
			$this->ajaxReturn($data);
        }
	}
}	