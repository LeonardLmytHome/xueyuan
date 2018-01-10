<?php
namespace Kqsys\Controller;
use Think\Page;
class CarouselController extends CommonController{
	public function classifyltoggle(){
		 $id=I('get.id');
		 if(!empty($id)){
			 $obj=M('carousel_classify');
			 $list=$obj->where(array('id'=>$id))->find();
			 
			 $this->assign('classify',$list);
		 }
		 $this->display();
	}
	
	
    public function classify_add(){
        if(IS_POST){
            $val=array(
                array('name','require','分类标题不能为空',1)
            );
            $obj=M('carousel_classify');
            if($data=$obj->validate($val)->create()){
                if(empty($data['id'])){
                    $data['addtime']=time();
                    if($obj->add($data)){
                        $this->success('添加成功');
                    }else{
                        $this->error("添加失败");
                    }
                }else{
                    if($obj->save($data)){
                        $this->success('更新成功');
                    }else{
                        $this->error("更新失败");
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

    public function classify_del(){
    	$obj=M('carousel_classify');
    	$id=I('get.id');
    	if(!empty($id)){
    		if($obj->where(array('id'=>$id))->delete()){
	            $this->success('删除成功');
	        }else{
	            $this->error("删除失败");
	        }
    	}
    }

    public function classify_list(){
    	$Model = M();
        $page=I('get.page',1);
        $limit=I('get.limit',10);
        $page = ($page - 1) * $limit;
        $list=$Model->query("select id,FROM_UNIXTIME(addtime,'%Y-%m-%d %H:%i:%s') as addtime,name,case disable when '0' then '否' else '是' end as disable from kq_carousel_classify order by id asc");
        
        $this->ajaxReturn(array(
            "code"=> 0,
            "msg" => "",
            "count"=> count($list),
            "data"=>array_slice($list,$page,$limit)
            ),0);
    }
}