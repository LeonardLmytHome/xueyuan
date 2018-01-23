<?php
namespace Kqsys\Controller;
use Think\Page;
class ContactController extends CommonController{
	public function index(){
		$obj=M('contact');
        $list=$obj->find();
		if(!empty($list)){
            $this->assign('contact',$list);
		}
		
		$this->display();
	}	
	
	public function add(){
		if(IS_POST){
	        $obj=M('contact');
	        if(empty($_POST['id'])){
	        	$image = $_POST['img'];
	            $upImg = $this->addImg($image,"Public/uploads/images/contactqrcode");
	            $_POST['img'] = $upImg;
	            
	            if($obj->add($_POST)){
	                $this->success('添加成功');
	            }else{
	                $this->error("添加失败");
	            }
	        }else{
	        	$contact=M('contact');
	            $contact=$contact->where(array('id'=>$_POST['id']))->find();
	            if($_POST['img'] == 'old'){
	                $_POST['img'] = $contact['img'];
	            }else{
	                $image = $_POST['img'];
	                $upImg = $this->addImg($image,"Public/uploads/images/contactqrcode");
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
}