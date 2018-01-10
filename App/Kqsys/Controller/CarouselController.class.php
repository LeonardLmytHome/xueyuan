<?php
namespace Kqsys\Controller;
use Think\Page;
class CarouselController extends CommonController{
    public function classify_add(){
        if(IS_POST){
            $val=array(
                array('name','require','分类标题不能为空',1)
            );
            $obj=M('carousel_classify');
            if($data=$obj->validate($val)->create()){
                if(empty($data['id'])){
                    $data['addtime']=date("Y-m-d H:i:s");
                    if($obj->add($data)){
                        $this->ajaxReturn("添加成功",1);
                    }else{
                        $this->ajaxReturn("添加失败",0);
                    }
                }else{
                    $data['addtime']=date("Y-m-d H:i:s");
                    if($obj->save($data)){
                        $this->ajaxReturn("更新成功",1);
                    }else{
                        $this->ajaxReturn("添加失败",0);
                    }
                }
            }else{
                $res=$obj->getError();
                $this->ajaxReturn($res,0);
            }
        }else{
            $this->display();
        }
    }


    public function classify_list(){
        $obj=M('carousel_classify');
        $page=I('get.page',1);
        $limit=I('get.limit',10);
        $page = ($page - 1) * $limit;
        $list=$obj->where($where)->order('id desc')->select();
        
        $this->ajaxReturn(array(
            "code"=> 0,
            "msg" => "",
            "count"=> count($list),
            "data"=>array_slice($list,$page,$limit)
            ),0);
    }
}