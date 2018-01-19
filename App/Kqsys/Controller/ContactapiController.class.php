<?php
// 本类由系统自动生成，仅供测试用途
namespace Kqsys\Controller;
//use Think\Controller;
class ContactapiController extends BaseController {
	
	/**
	 * 小程序首页默认轮播
	 */
	public function xcx_index(){
		$obj=M('contact');
		$contact=$obj->find();
			 
		$data['code']="1";
		$data['msg']="返回数据成功";
        $data['res']['contact']=$contact;
		
		$this->ajaxReturn($data);
	}
}	