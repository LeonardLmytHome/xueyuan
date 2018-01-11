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
        echo json_encode(array(
            "code"=> 0,
            "msg" => "",
            "data"=> array("src"=> $_FILES['img']['name'])
        ));
        //上传图片具体操作
        // $file_name = $_FILES['img']['name'];
        // $file_type = $_FILES["img"]["type"];
        // $file_tmp = $_FILES["img"]["tmp_name"];
        // $file_error = $_FILES["img"]["error"];
        // $file_size = $_FILES["img"]["size"];
        // if ($file_error > 0) { // 出错
        //     $return['status'] = 1;
        //     $return['message'] = $file_error;
        //     $return['time'] = 3000;
        //     exit(json_encode($return));
        // }
        // if ($file_size > 1048576) { // 文件太大了
        //     $return['status'] = 1;
        //     $return['message'] = "上传文件不能大于1MB";
        //     $return['time'] = 3000;
        //     exit(json_encode($return));
        // }
        // $file_name_arr = explode('.', $file_name);
        // $new_file_name = date('YmdHis') . '.' . $file_name_arr[1];
        // $file_path = "Public/uploads/images/" . $new_file_name;
        // if (file_exists($file_path)) {
        //     $return['status'] = 1;
        //     $return['message'] = "此文件已经存在啦";
        //     $return['time'] = 3000;
        //     exit(json_encode($return));
        // } else {
        //     $upload_result = move_uploaded_file($file_tmp, $file_path); // 此函数只支持 HTTP POST 上传的文件
        //     if ($upload_result) {
        //         $return['status'] = 0;
        //         $return['message'] = $file_path;
        //         $return['time'] = 1000;
        //         exit(json_encode($return));
        //     } else {
        //         $return['status'] = 1;
        //         $return['message'] = "文件上传失败，请稍后再尝试";
        //         $return['time'] = 3000;
        //         exit(json_encode($return));
        //     }
        // }
    } 
}