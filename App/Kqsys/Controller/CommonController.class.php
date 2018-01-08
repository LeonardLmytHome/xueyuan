<?php
namespace Kqsys\Controller;
use Think\Controller;
class CommonController extends Controller {

	public function __construct(){
        parent::__construct();
        $a=strtolower(CONTROLLER_NAME);
        $b=strtolower(ACTION_NAME);
        $this->assign('kongzhi',array('c'=>$a,'a'=>$b));
        //查询公司logo
        $this->assign('config_pic',M('config')->getFieldById(1,'config_pic'));
        //优化信息
        $this->assign('title',M('config')->getFieldById(1,'web_name'));
        $this->assign('keywords',M('config')->getFieldById(1,'keywords'));
        $this->assign('description',M('config')->getFieldById(1,'description'));
        //判断是否登录

        if(!session('?admin.admin_name'))
        {
            $this->redirect('Login/index');
        }
        else
        {
           //查询用户信息
            $character = M('character')->getFieldById($arr['character_id'],'character');
            $this->assign('character',$character);

        }

        //判断权限
        //判断是否超级管理员

        if(session('admin.root'))
        {
            //获取控制器方法字段
            $controller = CONTROLLER_NAME;
            $action = ACTION_NAME;
            $rights_str = $controller.'-'.$action;
            //获取当前用户权限字段
            $rights = M('character')->getFieldById(session('admin.character_id'),'rights');
            //转换成数组
            $arr = explode(',',strtolower($rights));
//            dump($rights_str);
            // 判断是否有该权限
            if(!in_array(strtolower($rights_str),$arr))
            {
                if(IS_AJAX){
                    $data['flag'] = 0;
                    $data['msg'] = '没有操作该功能权限!';
                    $this->ajaxReturn($data);
                }else{
                    $this->error('没有操作该功能权限!',U('Index/welcome1'));
                }
            }
        }
		
    }
}
