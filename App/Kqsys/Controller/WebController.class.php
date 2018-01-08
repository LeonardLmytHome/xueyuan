<?php
namespace Kqsys\Controller;

//use Think\Controller;

class WebController extends CommonController
{

    //加载编辑表单
    public function edit()
    {
        //获取要编辑的信息
        $mod = M('config');
        $ob = $mod->find();
        //放置模板中

        $this->assign("v", $ob);
        //加载编辑模板
        $this->display("edit");
    }

    //执行信息修改
    public function update()
    {

        //实例化
        $mod = M('config');
        if ($mod->getById(1) == null){
            //自动验证
            $rules = array(//  array('email', 'email', 'Email格式错误！', 1),// 网站配置内容必须
            );
            if (!$mod->validate($rules)->create()) {
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($mod->getError());
            }

            //执行添加
            $m = $mod->add();

            //判断并输出对应的提示信息
            if ($m !== false) {
                $this->success("添加成功！", U("Web/edit"));
            } else {
                $this->error("添加失败！");
            }
        }else{
            $app_code_day = trim(I('post.app_code_day/d'));
            if($app_code_day<1||$app_code_day>500){
				 $this->error("验证码使用期限在1-500之间");
			}
            if (!$mod->validate($rules)->create()) {
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                 $this->error($mod->getError());
             }
            $mod->create();
            //执行修改
            $m = $mod->save();

            //判断并输出对应的提示信息
            if ($m !== false) {
                if ($config_pic) {
                    //删除原来图片
                    if (file_exists("." . $config_pic)) {
                        //不删除的LOGO
                        if ($config_pic != 'Public/uploads/images/logo.png') {
                            //删除图片
                            unlink("." . $config_pic);
                        }
                    }
                }
              
            //$data['status'] = 1;
            //$data['msg'] = "修改成功！";
            //$this->ajaxReturn($data);
                $this->success("设置时限参数成功！", U("Web/edit"));
            } else {
                //$data['status'] = 0;
               //$data['msg'] = "网络异常";
               //$this->ajaxReturn($data);
                $this->error("设置时限参数失败,请您稍后再试！");
                //$this->error("设置时限参数失败,请您稍后再试！");
            }
        }
    }
}