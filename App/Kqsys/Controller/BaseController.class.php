<?php
// 本类由系统自动生成，仅供测试用途
namespace Kqsys\Controller;
use Think\Controller;
class BaseController extends Controller {

    public function __construct(){
        parent::__construct();  //调用父构造函数避免冲突
        header("Content-Type: text/html; charset=UTF-8");
        // 获取请求密钥
        $key = I('post.key');
        if(empty($key)){
            //$return['stu'] = '0';
            $return['code'] = '108';
            $return['msg'] = '参数错误';
            // $return['msg'] = $key;
            $this->ajaxReturn($return);
        }
        //加密方法
        $ckey =C('KEY');
        $ckey=md5(md5($ckey));//29067275e60e29544639d4551d953666
        if($key!==$ckey){
            //$return['stu'] = '0';
            $return['code'] = '108';
            $return['msg'] = '参数错误';
            $this->ajaxReturn($return);
        }
        $a=strtolower(CONTROLLER_NAME);
        $b=strtolower(ACTION_NAME);
        $this->assign('kongzhi',array('c'=>$a,'a'=>$b));
    }
}