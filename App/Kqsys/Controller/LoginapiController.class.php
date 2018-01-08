<?php
namespace Kqsys\Controller;
use Think\Controller;
class LoginapiController extends BaseController{

    public function login(){
        $account=I('post.account','');
        $password=I('post.password','');
        if($account&&$password){
            $password=md5(md5($password));
            $obj=M('site');
                if($data=$obj->where(array('account'=>array('eq',$account),'password'=>array('eq',$password),'status'=>array('eq',1)))->find()){
                    $response['code']=1;
                    $response['msg']='操作成功';
                    $response['res']=array('id'=>$data['id']);
                }else{
                    $response['code']=101;
                    $response['msg']='密码错误或被禁用';//密码错误
                }
        }else{
            $response['code']=100;
            $response['msg']='缺少参数';//缺少参数
        }
        $this->ajaxReturn($response);
    }

}