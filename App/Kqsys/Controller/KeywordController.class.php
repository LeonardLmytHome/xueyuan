<?php
namespace Kqsys\Controller;
use Think\Page;
class KeywordController extends CommonController{
	public function index(){
		$obj=M('keyword');
        $list=$obj->find();
		if(!empty($list)){
            $this->assign('keyword',$list);
		}
		$this->display();
	}	
	
	public function add(){
		if(IS_POST){
	        $obj=M('keyword');
	        if(empty($_POST['id'])){
	            if($obj->add($_POST)){
	                $this->success('添加成功');
	            }else{
	                $this->error("添加失败");
	            }
	        }else{
	            if($obj->save($_POST)){
	                $this->success('更新成功');
	            }else{
	                $this->error("更新失败");
	            }
	        }
	    }else{
	        $this->error("添加失败");
	    }
	}
}