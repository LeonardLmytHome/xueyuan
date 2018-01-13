<?php
namespace Kqsys\Controller;
use Think\Page;
class ArticleController extends CommonController{

    /**
     * 获取主分类列表
     */
	public function article_list()
    {
        $Model = M();
        $id=I('get.id');
        $page=I('get.page',1);
        $limit=I('get.limit',10);
        $page = ($page - 1) * $limit;
        $where = "";

        if(!empty($id)){
            $where .= " where a.id = {$id} ";
        }

        $list=$Model->query("select a.id,FROM_UNIXTIME(a.addtime,'%Y-%m-%d %H:%i:%s') as addtime,a.title,a.img,case a.disable when '0' then '否' else '是' end as disable from kq_article_classify as a ". $where ." order by id asc");
        
        $this->ajaxReturn(array(
            "code"=> 0,
            "msg" => "",
            "count"=> count($list),
            "data"=>array_slice($list,$page,$limit)
            ),0);
    }


    public function classifyltoggle(){
        $id=I('get.id');
        $type=I('get.type'); //main->主分类 sub->子分类

        $where = array();
        if(!empty($id)){
            $obj=M('article_classify');
            $list=$obj->where(array('id'=>$id))->find();
            $where['id'] = $id;
            $this->assign('classify',$list);
        }

        if($type == "sub"){
            //主分类列表
            $article_classify=M('article_classify');
            $article_classify=$article_classify->where($where)->select();
            $this->assign('article_classify',$article_classify);
        }
        
        $this->display();
   }


   public function classify_add()
   {
        if(IS_POST){
            $val=array(
                array('title','require','分类标题不能为空',1)
            );
            $obj=M('article_classify');
            if($data=$obj->validate($val)->create()){
                if(empty($data['id'])){
                    $image = $_POST['img'];
                    $upImg = $this->addImg($image);
                    $data['img'] = $upImg;

                    $data['addtime']=time();
                    if($obj->add($data)){
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
                        $data['img'] = $upImg;
                    }

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