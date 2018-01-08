<?php
namespace Kqsys\Controller;
//use Think\Controller;
class CharacterController extends CommonController {
   
    //浏览角色信息
    public function index(){
       //实例化角色信息操作对象
       $mod = M("character");
        $whe='';
        // $whe['id'] = array('not between','2,8');
       $list = $mod->where($whe)->select();
       //放置模板中
       $this->assign("list",$list);
       $this->display("index");
    }

    //加载添加表单
    public function add(){
       $this->display("add"); 
    }

    //执行信息添加
    public function insert(){
        //实例化
        $mod = M("character");
        //自动验证
        $rules = array(
          array('character','','角色名称已经存在！',1,'unique'),
          array('character','require','角色名称必须填写！',1),
        );  

        if (!$mod->validate($rules)->create()){
             // 如果创建失败 表示验证没有通过 输出错误提示信息
             $this->error($mod->getError());
        }

        $mod->rights = implode(',',$mod->rights);
        $mod->rights .= ',Index-index,Index-welcome1';
        //执行添加
        $m = $mod->add();
        //判断并输出对应的提示信息
        if($m>0){
           $this->success("添加成功！",U("Character/index"));
        }else{
           $this->error("添加失败！");
        }
    }

    //加载编辑表单
    public function edit(){
        //获取要编辑的信息
        $mod =M("character"); 
        $ob = $mod->field('id,character,description,rights')->find(I('get.id/d'));

            //转换成数组
        $arr = explode(',',$ob['rights']);
        // dump($arr);
        // dump(in_array('News-index',$arr));die;
        $this->assign('arr',$arr);
        //放置模板中
        $this->assign("v",$ob);
        //加载编辑模板
        $this->display("edit");
    }

    //执行信息修改
    public function update(){
        //实例化
        $mod =M("character");
        //自动验证
        $rules = array(
          array('character','','角色名称已经存在！',1,'unique'),
          array('character','require','角色名称必须填写！',1),
        );  
        
        // 如果创建失败 表示验证没有通过 输出错误提示信息
        if (!$mod->validate($rules)->create()){
            $this->error($mod->getError());
        }
         
         $mod->rights = implode(',',$mod->rights);

        $mod->rights .= ',Index-index,Index-welcome1';
        //执行修改
        $m = $mod->save();
        //判断并输出对应的提示信息
        if($m!==false){
           $this->success("修改成功！",U("Character/index"));
        }else{
           $this->error("修改失败！");
        }
    }

    //执行信息删除
    public function del(){
       //实例化
       $mod = M('admin');
       //查询角色下是否有用户

           if($num = $mod->where('character_id='.I('get.id/'))->count())
           {
              $this->error("角色下有用户，请先删除该角色下的用户！");
           }
           else
           {
              $map['id'] = array('EQ',I('get.id/d'));
           }
      
       //实例化
       $mod = M("character");
       // echo (int)I('get.id');die;
       //执行删除
       $m = $mod->where($map)->delete();
       //判断并输出对应的提示信息
       if($m>0){
           $this->success("删除成功！",U("Character/index"));
       }else{
           $this->error("删除失败！");
       }
    }
}