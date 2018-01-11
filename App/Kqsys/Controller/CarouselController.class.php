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
	
	
	public function index(){
		 $id=I('get.id');
		 if(!empty($id)){
			 $obj=M('carousel');
			 $list=$obj->where(array('c_id'=>$id))->select();
			 $this->assign('carousel',$list);
		 }
		 $this->assign('c_id',$id);
		 $this->display();
	}
	
	public function carouseltoggle(){
		 $id=I('get.id');
		 $c_id=I('get.c_id');
		 
		 if(!empty($id)){
			 $obj=M('carousel');
			 $list=$obj->where(array('id'=>$id))->find();
			 
			 $this->assign('carousel',$list);
		 }
		 
		 //分类
		 $carousel_classify=M('carousel_classify');
		 $list_carousel_classify=$carousel_classify->where(array('id'=>(int)$c_id))->select();
	     $this->assign('carousel_classify',$list_carousel_classify);
		 
		 //教学点
		 $site=M('site');
		 $list_site=$site->select();
	     $this->assign('site',$list_site);
	     
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
    	$carousel=M('carousel');
    	$carousel = $carousel->where(array('c_id'=>$id))->find();
    	if(empty($carousel)){
    		if(!empty($id)){
	    		if($obj->where(array('id'=>$id))->delete()){
		            $this->success('删除成功');
		        }else{
		            $this->error("删除失败");
		        }
	    	}
    	}else{
    		$this->error("删除失败，该分类有轮播");
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


    public function carouselt_add()
    {  
    	$obj=M('carousel');
        if(empty($_POST['id'])){
        	$image = $_POST['img'];
	        $upImg = $this->addImg($image);
            $_POST['addtime']=time();
            $_POST['img'] = $upImg;
            if($obj->add($_POST)){
                $this->success('添加成功');
            }else{
                $this->error("添加失败");
            }
        }else{
        	$carousel=M('carousel');
        	$carousel=$carousel->where(array('id'=>$_POST['id']))->find();
        	if($_POST['img'] == 'old'){
        		$_POST['img'] = $carousel['img'];
        	}else{
        		$image = $_POST['img'];
	            $upImg = $this->addImg($image);
        		$_POST['img'] = $upImg;
        	}
        	 
            if($obj->save($_POST)){
                $this->success('更新成功');
            }else{
                $this->error("更新失败");
            }
        }
    } 
    
    
    public function addImg($image){
    	$imageName = "25220_".date("His",time())."_".rand(1111,9999).'.png';
    	if (strstr($image,",")){
            $image = explode(',',$image);
            $image = $image[1];
        }
        
    	$dir = iconv("UTF-8", "GBK", "Public/uploads/images/carouselt");
        if (!file_exists($dir)){
            mkdir ($dir,0777,true);
        } 
    	$imageSrc=  $dir."/". $imageName;  //图片名字
        $r = file_put_contents($imageSrc, base64_decode($image));//返回的是字节数
        if (!$r) {
            return 0;
        }else{
            return '/'.$imageSrc;
        }
    }
    
    public function carousel_del(){
    	$obj=M('carousel');
    	$id=I('get.id');
		if(!empty($id)){
    		if($obj->where(array('id'=>$id))->delete()){
	            $this->success('删除成功');
	        }else{
	            $this->error("删除失败");
	        }
    	}
    }
}