<?php
$mod=M('user');
$mod->where("id=10000")->setInc('money',1);
      

 		// $mod=M('user');
   //      $balance=M('config')->getFieldById(1,'balance');
   //      $whe='';
   //      $whe['money'] =array('gt',0);
   //      $list=$mod->where($whe)->select();
   //      foreach($list as $k=>$v){
   //          $data['id']=$v['id'];
   //          $data['money']=$v['money']*((100+$balance)/100);
   //          $res1=$mod->save($data);
   //          if($res1==false){
   //              $mod->rollback();
   //          }
   //          $u_m[] = array('uid'=>$v['id'],'type'=>9,'num'=>($v['money']*((100+$balance)/100))-$v['money'],'money'=>$v['money'],'after_money'=>$v['money']*((100+$balance)/100),'cause'=>'余额未提现分红','add_time'=>time());
   //      }
   //      $res1=M('user_money_log')->addAll($u_m);
   //      if($res1){
   //          $mod->commit();
   //          // dump('1');
   //      }else{
   //          $mod->rollback();
   //          // dump('0');
   //      }
        
   //      $start = mktime(0,0,0,date("m",$t),date("d",$t),date("Y",$t));
   //      $end = mktime(23,59,59,date("m",$t),date("d",$t),date("Y",$t));
   //      $web=M('config')->field('pull1,pull2,pull3,pull4,pull5')->find(1);
   //      $whe = '';
   //      $whe['add_time'] = array('lt', $end);
   //      $whe['add_time'] = array('gt', $start);
   //      $whe['is_show'] = 1;
   //      $whe['status'] = array('gt', 1);
   //      $total=M('order')->where($whe)->sum('total_price');
   //      //分红总金额 购买金额的80%为分红金额
   //      $total_price=$total*0.8;
   //      $whe = '';
   //      $whe['status'] = array('gt', 1);
   //      $whe['is_fen'] = -1;
   //      $whe['add_time'] = array('lt', time()-32400);
   //      $whe['is_show'] = 1;
   //      $fen=M('order')->where($whe)->field('total_price,id')->select();
   //      $fen_total=0;

   //      $mod= M('order');
   //      $mod->startTrans();
   //      //分红总数累加
   //      foreach($fen as$k=>$v){
   //          if($v['fen']<($v['total_price']*2)){
   //              $fen_total=$fen_total+($v['total_price']*0.9);
   //          }else{
   //              $mod->rollback();
   //          }
   //      }
   //      //每一元分红$rate元
   //      $rate=$total_price/$fen_total;
   //      $whe=''; $whe['status']=array('gt',1); $whe['is_fen']=-1; $whe['is_show']=1; $whe['add_time'] = array('lt', time()-32400);
   //      $fen_list=$mod->where($whe)->select();
   //      foreach($fen_list as $k=>$v){
   //          $u=M('user')->find($v['uid']);
   //          if(($v['fen']+($v['total_price']*0.9*$rate))<($v['total_price']*2)){
   //              $data['id']=$v['id'];
   //              $data['fen']=$v['fen']+($v['total_price']*0.9*$rate);
   //              $res2=$mod->save($data);
   //              if($res2==false){
   //                  $mod->rollback();
   //              }
   //          }else{
   //              $data['id']=$v['id'];
   //              $data['is_fen']=1;
   //              $data['fen']=$v['fen']+($v['total_price']*0.9*$rate);
   //              $res2=$mod->save($data);
   //              if($res2==false){
   //                  $mod->rollback();
   //              }
   //          }
   //          $count=M('user')->where('pid1='.$u['pid1'])->count();

   //          $p=M('user')->find($v['pid']);
   //          if($count>1&&$count<3){
   //              $u_m[] = array('uid'=>$v['uid'],'type'=>6,'num'=>($v['total_price']*0.9*$rate)*(1-($web['pull1']/100)),'money'=>$u['money'],'after_money'=>$u['money']+($v['total_price']*0.9*$rate)*(1-($web['pull1']/100)),'cause'=>'每日分红金额','add_time'=>time());
   //              $p_m[] = array('uid'=>$p['id'],'type'=>8,'num'=>($v['total_price']*0.9*$rate)*($web['pull1']/100),'money'=>$p['money'],'after_money'=>$p['money']+($v['total_price']*0.9*$rate)*($web['pull1']/100),'cause'=>'团队收益','add_time'=>time());
   //          }else if($count>2&&$count<5){
   //              $u_m[] = array('uid'=>$v['uid'],'type'=>6,'num'=>($v['total_price']*0.9*$rate)*(1-($web['pull2']/100)),'money'=>$u['money'],'after_money'=>$u['money']+($v['total_price']*0.9*$rate)*(1-($web['pull2']/100)),'cause'=>'每日分红金额','add_time'=>time());
   //              $p_m[] = array('uid'=>$p['id'],'type'=>8,'num'=>($v['total_price']*0.9*$rate)*($web['pull2']/100),'money'=>$p['money'],'after_money'=>$p['money']+($v['total_price']*0.9*$rate)*($web['pull2']/100),'cause'=>'团队收益','add_time'=>time());
   //          }else if($count>4&&$count<10){
   //              $u_m[] = array('uid'=>$v['uid'],'type'=>6,'num'=>($v['total_price']*0.9*$rate)*(1-($web['pull3']/100)),'money'=>$u['money'],'after_money'=>$u['money']+($v['total_price']*0.9*$rate)*(1-($web['pull3']/100)),'cause'=>'每日分红金额','add_time'=>time());
   //              $p_m[] = array('uid'=>$p['id'],'type'=>8,'num'=>($v['total_price']*0.9*$rate)*($web['pull3']/100),'money'=>$p['money'],'after_money'=>$p['money']+($v['total_price']*0.9*$rate)*($web['pull3']/100),'cause'=>'团队收益','add_time'=>time());
   //          }else if($count>9&&$count<20){
   //              $u_m[] = array('uid'=>$v['uid'],'type'=>6,'num'=>($v['total_price']*0.9*$rate)*(1-($web['pull4']/100)),'money'=>$u['money'],'after_money'=>$u['money']+($v['total_price']*0.9*$rate)*(1-($web['pull4']/100)),'cause'=>'每日分红金额','add_time'=>time());
   //              $p_m[] = array('uid'=>$p['id'],'type'=>8,'num'=>($v['total_price']*0.9*$rate)*($web['pull4']/100),'money'=>$p['money'],'after_money'=>$p['money']+($v['total_price']*0.9*$rate)*($web['pull4']/100),'cause'=>'团队收益','add_time'=>time());
   //          }else{
   //              $u_m[] = array('uid'=>$v['uid'],'type'=>6,'num'=>($v['total_price']*0.9*$rate)*(1-($web['pull5']/100)),'money'=>$u['money'],'after_money'=>$u['money']+($v['total_price']*0.9*$rate)*(1-($web['pull5']/100)),'cause'=>'每日分红金额','add_time'=>time());
   //              $p_m[] = array('uid'=>$p['id'],'type'=>8,'num'=>($v['total_price']*0.9*$rate)*($web['pull5']/100),'money'=>$p['money'],'after_money'=>$p['money']+($v['total_price']*0.9*$rate)*($web['pull5']/100),'cause'=>'团队收益','add_time'=>time());
   //          }
   //      }
   //      $res1=M('user_money_log')->addAll($u_m);
   //      $res2=M('user_money_log')->addAll($p_m);
   //      if($res1&&$res2){
   //          $mod->commit();
   //          // dump('1');
   //      }else{
   //          $mod->rollback();
   //          // dump('0');
   //      }
   //  }