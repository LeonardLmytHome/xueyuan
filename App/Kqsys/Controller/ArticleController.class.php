<?php
namespace Kqsys\Controller;
use Think\Page;
class ArticleController extends CommonController{
	
	public function classify(){
		$p_id =I('get.p_id');
		if(!empty($p_id)){
			$this->assign('p_id',$p_id);			
		}
		
		$type =I('get.type');
		if(!empty($type)){
			$this->assign('type',$type);			
		}
		
		$this->display();
	}

    /**
     * 获取主分类列表
     */
	public function classify_list()
    {
        $Model = M();
        $p_id=I('get.p_id');
        $page=I('get.page',1);
        $limit=I('get.limit',10);
        $page = ($page - 1) * $limit;
        $where = "";

        if(!empty($p_id)){
            $where .= " where a.p_id = {$p_id}";
        }else{
        	$where .= " where a.p_id = 0";
        }

        $list=$Model->query("select a.id,a.p_id,FROM_UNIXTIME(a.addtime,'%Y-%m-%d %H:%i:%s') as addtime,a.title,a.img,case a.disable when '0' then '否' else '是' end as disable from kq_article_classify as a ". $where ." order by id desc");
        
        $this->ajaxReturn(array(
            "code"=> 0,
            "msg" => "",
            "count"=> count($list),
            "data"=>array_slice($list,$page,$limit)
            ),0);
    }


	/**
	 * 分类数据
	 */
    public function classifyltoggle(){
        $id = I('get.id');
        $p_id = I('get.p_id');
        $type=I('get.type');
        if(!empty($type)){
			$this->assign('type',$type);			
		}

        $where = array();
        $where['disable'] = 0;
        if(!empty($id)){
            $obj=M('article_classify');
            $list=$obj->where(array('id'=>$id))->find();
            
            $this->assign('classify',$list);
        }
        
        if(!empty($p_id)){
        	if(!empty($id)){
        	    $where['id'] = $p_id;	
        	}
        	else{
        		$where['p_id'] = 0;	
        	}
        }
        
        //主分类列表
        $article_classify=M('article_classify');
        $article_classify=$article_classify->where($where)->select();
        $this->assign('article_classify',$article_classify);
        $this->assign('p_id',$p_id);
        $this->display();
   }


/**
 * 添加分类
 */
   public function classify_add()
   {
        if(IS_POST){
	        $obj=M('article_classify');
	        if(empty($_POST['id'])){
	            $image = $_POST['img'];
	            $upImg = $this->addImg($image);
	            $_POST['img'] = $upImg;
	
	            $_POST['addtime']=time();
	            if($obj->add($_POST)){
	                $this->success('添加成功');
	            }else{
	                $this->error("添加失败");
	            }
	        }else{
	            $article_classify=M('article_classify');
	            $article_classify=$article_classify->where(array('id'=>$_POST['id']))->find();
	            if($_POST['img'] == 'old'){
	                $_POST['img'] = $article_classify['img'];
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
	    }else{
	        $this->error("失败");
	    }
   }

 /**
  * 添加图片
  */
   public function addImg($image,$path = "Public/uploads/images/articleclassify"){
        $imageName = "25220_".date("His",time())."_".rand(1111,9999).'.png';
        if (strstr($image,",")){
            $image = explode(',',$image);
            $image = $image[1];
        }
        
        $dir = iconv("UTF-8", "GBK", $path);
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
    
    /**
     * 删除分类
     */
    public function classify_del(){
    	$obj=M('article_classify');
    	$id=I('get.id');
    	$p_id=I('get.p_id');
    	if(!empty($p_id)){
    		if($obj->where(array('id'=>$id))->delete()){
	            $this->success('删除成功');
	        }else{
	            $this->error("删除失败");
	        }
    	}else{
    		$classify=M('article_classify');
    		$classify = $classify->where(array('p_id'=>$id))->find();
    		if(empty($classify)){
	    		if($obj->where(array('id'=>$id))->delete()){
		            $this->success('删除成功');
		        }else{
		            $this->error("删除失败");
		        }
	    	}else{
	    		$this->error("删除失败，该分类子分类");
	    	}
    	}
    }
    
    
    /**
     * 文章数据
     */
    public function article(){   	
    	$id=I('get.id');
    	//主分类
    	$main_where = array();
    	$main_where['p_id'] = 0;
    	$main_where['disable'] = 0;
    	
    	//教学点
    	$site_where = array();
    	
    	if(!empty($id)){ //文章数据
    		$obj=M('article');
            $list=$obj->where(array('id'=>$id))->find();
            $this->assign('article',$list);
            
//          $main_where['id'] = $list['p_id'];
//          $site_where['id'] = $list['s_id'];
            
            if((int)$list['p_id'] > 0){
            	$sub_classify=M('article_classify');
		    	$sub_classify=$sub_classify->where("id = {$list['c_id']}")->select();
		        $this->assign('sub_classify',$sub_classify);
            }
    	}
    	
    	$main_classify=M('article_classify');
    	$main_classify=$main_classify->where($main_where)->select();
        $this->assign('main_classify',$main_classify);
    	
    	
    	$site=M('site');
    	$site=$site->where($site_where)->select();
        $this->assign('site',$site);
    	
    	$this->display();
    }
    
    /**
     * 根据主分类获取子分类
     */
    public function getSubClassify()
    {
    	$id=I('post.id');
    	
    	$sub_where = array();
    	$sub_where['disable'] = 0;
    	if(!empty($id)){
    		$sub_where['p_id'] = $id;
    		$sub_classify=M('article_classify');
	    	$sub_classify=$sub_classify->where($sub_where)->select();
	        $this->success($sub_classify);
    	}else{
    		$this->error('获取失败');
    	}
    }
    
    /**
     * 添加文章
     */
    public function addArticle()
    {
    	if(IS_POST){
	        $obj=M('article');
	        if(empty($_POST['id'])){
	            $image = $_POST['img'];
	            $upImg = $this->addImg($image,"Public/uploads/images/article");
	            $_POST['img'] = $upImg;
	            
	            $_POST['addtime']=time();
	            if($obj->add($_POST)){
	                $this->success('添加成功');
	            }else{
	                $this->error("添加失败");
	            }
	        }else{
	            $article=M('article');
	            $article=$article->where(array('id'=>$_POST['id']))->find();
	            if($_POST['img'] == 'old'){
	                $_POST['img'] = $article['img'];
	            }else{
	                $image = $_POST['img'];
	                $upImg = $this->addImg($image,"Public/uploads/images/article");
	                $_POST['img'] = $upImg;
	            }
	
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
    
    /**
     * 文章列表
     */
    public function article_list()
    {
        $Model = M();
        $page=I('get.page',1);
        $limit=I('get.limit',10);
        $page = ($page - 1) * $limit;
        $title=I('get.title');
        $p_id=I('get.p_id');
        $c_id=I('get.c_id');
        $s_id=I('get.s_id');
        
        $whe = " where 1 = 1 ";
        if(!empty($title)){
           $whe .= " and a.title like '%".$title."%' ";
        }
        if(!empty($p_id)){
           $whe .= " and a.p_id = ".$p_id." ";	
        }
        if(!empty($c_id)){
           $whe .= " and a.c_id = ".$c_id." ";	
        }
        if(!empty($s_id)){
           $whe .= " and a.s_id = ".$s_id." ";	
        }

        $list=$Model->query("select a.id,a.title,a.img,FROM_UNIXTIME(a.addtime,'%Y-%m-%d %H:%i:%s') as addtime,
a.p_id,a.c_id,a.s_id,a.phone,case a.disable when '0' then '否' else '是' end as disable,
case a.p_id when '0' then '无' else b.title end as maintitle,
case a.c_id when '0' then '无' else c.title end as subtitle,
case a.s_id when '0' then '无' else d.name end as sitename
from kq_article as a LEFT JOIN kq_article_classify as b on a.p_id = b.id LEFT JOIN 
kq_article_classify as c on a.c_id = c.id LEFT JOIN kq_site as d on a.s_id = d.id ". $whe ." order by id desc");
        
        $this->ajaxReturn(array(
            "code"=> 0,
            "msg" => "",
            "count"=> count($list),
            "data"=>array_slice($list,$page,$limit)
            ),0);
    }
    
    
    /**
     * 删除文章
     */
    public function article_del(){
    	$obj=M('article');
    	$id=I('get.id');
    	if(!empty($id)){
    		if($obj->where(array('id'=>$id))->delete()){
	            $this->success('删除成功');
	        }else{
	            $this->error("删除失败");
	        }
    	}
    }
    
    /**
     * 文章列表数据
     */
    public function articlelist(){
    	//主分类
    	$main_where = array();
    	$main_where['p_id'] = 0;
    	$main_where['disable'] = 0;
    	
    	$main_classify=M('article_classify');
    	$main_classify=$main_classify->where($main_where)->select();
        $this->assign('main_classify',$main_classify);
    	
    	//教学点
    	$site=M('site');
    	$site=$site->where()->select();
        $this->assign('site',$site);
    	
    	$this->display();
    }
}