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


    function carouselt_add()
    {  
        $base64_image_content = $_POST['img'];
        //匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
            $type = $result[2];
            $new_file = "/Public/uploads/images/carousel/".date('Ymd',time())."/";
            if(!file_exists($new_file)){
                //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($new_file, 0700);
            }
            $new_file = $new_file.time().".{$type}";
            $this->ajaxReturn($new_file,0);
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
                return '/'.$new_file;
            }else{
                $this->ajaxReturn('csa',0);
            }
        }else{
            $this->ajaxReturn('csaa',0);
        }
    } 
}