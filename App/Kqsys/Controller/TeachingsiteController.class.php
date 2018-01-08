<?php
namespace Kqsys\Controller;
use Think\Page;
class TeachingsiteController extends CommonController{

    public function site_add(){
        if(IS_POST){
            $val=array(
                array('name','require','教学点名称不能为空',1),
                array('name','','教学点名称已存在',1,'unique'),
                array('principal','require','负责人名称不能为空',1),
                array('tel','require','负责人联系方式不能为空',1),
                array('tel','/^1[34578]\d{9}$/','联系人手机格式不正确',1),
                array('account','require','账号不能为空',1),
                array('account','site_val_1','账户名必须是6-10个字符之间的数字或字母',1,'function'),
                array('account','','账号已存在',1,'unique'),
                array('password','require','密码不能为空',1),
                array('password','site_val_1','密码长度必须在6-10个字符之间',1,'function'),
                array('repwd','password','确认密码不正确',0,'confirm'),
            );
            $obj=M('site');
                if($data=$obj->validate($val)->create()){
                    $data['password']=md5(md5($data['password']));
                    $data['add_time']=time();
                    $data['save_time']=time();
                        if($obj->add($data)){

                            $this->success('添加成功',U('Teachingsite/site_list'));
                        }else{
                            $this->error('添加失败');
                        }
                }else{
                    $res=$obj->getError();
                    $this->error($res);
                }
        }else{
            $this->display();
        }
    }


    public function site_list(){
        $obj=M('site');
        $status=I('get.status',2);

        if($status!=2){
            $where['status']=array('eq',$status);
        }
        $this->assign('status',$status);
        $start=I('get.start','');
        $end=I('get.end','');
        if($start){
            $where['add_time']=array('gt',strtotime($start));
        }
        if($end){
            $where['add_time']=array('lt',strtotime($end));
        }
        if($start&&$end){
            if(strtotime($end)<=strtotime($start)){
                $this->error('开始时间不能小于等于结束时间');
            }else{
                $where['add_time']=array('between',array(strtotime($start),strtotime($end)));
            }
        }
        $keyword=I('get.keyword','');
        $where['name|principal|tel|account']=array('like',"%$keyword%");
        $count=$obj->where($where)->count();
        $this->assign('count',$count);
        $page=new Page($count,25);

        $show=$page->show();
        $list=$obj->where($where)->limit($page->firstRow,25)->order('add_time desc')->select();

        $url='HTTP://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];;
        session('url',$url);

    $this->assign('list',$list);
    $this->assign('show',$show);

    $this->display();
    }






    public function save_status(){
        $obj=M('site');
        $arr=I('post.');
        if($obj->save($arr)){
            $this->success();
        }else{
            $this->error();
        }
    }

    public function del(){
        $id=I('post.id');
        $obj=M('site');


        $user_obj=M('user');





            if($user_obj->where(array('sid'=>array('eq',$id)))->find()){
                $this->error('这个教学点正在被使用');
            }





        if($obj->where(array('id'=>array('eq',$id)))->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }



    public function save_msg(){

        $obj=M('site');
        if(IS_POST){
            $val=array(
                array('id','require','id不能为空',1),
                array('name','require','教学点名称不能为空',1),
                array('name','','教学点名称已存在',1,'unique',2),
                array('principal','require','负责人名称不能为空',1),
                array('tel','require','负责人联系方式不能为空',1),
                array('tel','/^1[34578]\d{9}$/','联系人手机格式不正确',1),
                array('account','require','账号不能为空',1),
                array('account','site_val_1','账户名必须是6-10个字符之间的数字或字母',1,'function'),
                array('account','','账号已存在',1,'unique',2),
                array('password','require','密码不能为空',0),
                array('password','site_val_1','密码长度必须在6-10个字符之间',0,'function'),
                array('repwd','password','确认密码不正确',0,'confirm'),
            );



            if($data=$obj->validate($val)->create()){
                $data['password']=md5(md5($data['password']));
                $data['save_time']=time();
                if($obj->save($data)){
                        $this->success('修改成功');
                }else{
                    $this->error('修改失败');
                }
            }else{
                $this->error($obj->getError());
            }
        }else{
            $id=I('get.id');
            $data=$obj->where(array('id'=>array('eq',$id)))->find();
            $this->assign('data',$data);
            $this->display();
        }
    }







}