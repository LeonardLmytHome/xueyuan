<?php
// 本类由系统自动生成，仅供测试用途
namespace Kqsys\Controller;
//use Think\Controller;
class IndexapiController extends BaseController {
	
	/**
	 * 小程序首页默认轮播
	 */
	public function xcx_index(){
		$Model = M();
		$carousel=$Model->query("select b.title,b.img,b.a_id from kq_carousel_classify as a inner join kq_carousel as b on a.id = b.c_id where a.`disable` = 0 and b.`disable` = 0 and a.type = 1 ORDER BY b.id desc");
		$data['code']="1";
		$data['msg']="返回数据成功";
        $data['res']['carousel']=$carousel;
		
		$this->ajaxReturn($data);
	}
}	