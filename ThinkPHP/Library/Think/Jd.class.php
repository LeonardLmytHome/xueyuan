<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2013 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
namespace Think;

class Jd{
//'jd_appKey'   =>'9E9A8E52FB25D7263BCE8CC33B97956F',           //京东appkey
//'jd_appSecret'   =>'14b998370a4c4b28985bfe904ffb1441',           //appSecret
//'jd_goodsList'   =>'jingdong.ware.product.detail.search.list.get',           //接口名称
//'jd_req_url'   =>'https://api.jd.com/routerjson',           //请求链接
//'jd_v'   =>"v=2.0",//版本
//'jd_method_info'   =>"jingdong.new.ware.baseproduct.get",//名称
//'jd_method_price'   =>"jingdong.ware.price.get",//名称



    //获取基本信息
    public function jd_info($skuId) {
        $basefields = "name,shopName,url,skuId,imagePath,color";
        $c['method'] = C('jd_method_info');
        $c['app_key'] = C('jd_appKey');
        //应用级参数
        $s['ids'] = $skuId;
        $s['basefields'] = $basefields;
        $req_s = json_encode($s);
        //拼接url
        $req_sign = "";
        $req_data = C('jd_v');//版本
        foreach ($c as $k => $v) {
            $req_sign = $req_sign . $k . $v;
            $req_data = $req_data . "&" . $k . "=" . $v;
        }
        $c['sign'] = strtoupper(md5("appSecret" . $req_sign . "appSecret"));
        $req_data = $req_data . '&';
        $requrl = C('jd_req_url') . '?' . $req_data . '360buy_param_json=' . $req_s . "&sign=" . $c['sign'];
        $contents = file_get_contents($requrl);
        $res=json_decode($contents,true);
        //dump($contents);die();
        if($res['jingdong_new_ware_baseproduct_get_responce']['code']==0){
            if(!empty($res['jingdong_new_ware_baseproduct_get_responce']['listproductbase_result'][0]['name'])){
                return $res['jingdong_new_ware_baseproduct_get_responce']['listproductbase_result'][0];
            }else{
                return -1;
            }
        }else{
            return -1;
        }
    }

    //获取价格
    public function jd_price($skuId) {
        $basefields = "name,shopName,url,skuId,imagePath,color";
        $c['method'] = C('jd_method_price');
        $c['app_key'] = C('jd_appKey');
        //应用级参数
        $s['sku_id'] = 'J_'.$skuId;
        $s['basefields'] = $basefields;
        $req_s = json_encode($s);
        //拼接url
        $req_sign = "";
        $req_data = C('jd_v');//版本
        foreach ($c as $k => $v) {
            $req_sign = $req_sign . $k . $v;
            $req_data = $req_data . "&" . $k . "=" . $v;
        }
        $c['sign'] = strtoupper(md5("appSecret" . $req_sign . "appSecret"));
        $req_data = $req_data . '&';
        $requrl = C('jd_req_url') . '?' . $req_data . '360buy_param_json=' . $req_s . "&sign=" . $c['sign'];
        $contents = file_get_contents($requrl);
        $res=json_decode($contents,true);
        if($res['jingdong_ware_price_get_responce']['code']==0){
            if($res['jingdong_ware_price_get_responce']['price_changes'][0]['price']!='-1.00'){
                return $res['jingdong_ware_price_get_responce']['price_changes'][0];
            }else{
                return -1;
            }
        }else{
            return -1;
        }
    }

}
