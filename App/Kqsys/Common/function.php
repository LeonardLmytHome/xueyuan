<?php
/**
 * 发送友盟推送消息
 * @param  integer  $uid   用户id
 * @param  string  $title  推送的标题
 * @param  integer $type   1：官方小秘书   2：我的评论
 * @return boolear       是否成功
 */
function umeng_push($uid,$title){
    // 获取token
//    $device_tokens=D('OauthUser')->getToken($uid,2);
    // 如果没有token说明移动端没有登录；则不发送通知
//    if (empty($device_tokens)) {
//        return false;
//    }
    // 导入友盟
    Vendor('Umeng.Umeng');
    // 自定义字段   根据实际环境分配；如果不用可以忽略
    $status=1;
    // 消息未读总数统计  根据实际环境获取未读的消息总数 此数量会显示在app图标右上角
    $count_number=1;
    $data=array(
        'key'=>'status',
        'value'=>"$status",
        'count_number'=>$count_number
    );
    // 判断device_token  64位表示为苹果 否则为安卓
//    if(strlen($device_tokens)==64){
        $key=C('UMENG_IOS_APP_KEY');
        $timestamp=C('UMENG_IOS_SECRET');
        $umeng=new \Umeng($key, $timestamp);
//        $u['ios']=$umeng->sendIOSUnicast($data,$title,$device_tokens);
        $u['ios']=$umeng->sendIOSUnicast($data,$title);
//    }else{
        $key=C('UMENG_ANDROID_APP_KEY');
        $timestamp=C('UMENG_ANDROID_SECRET');
        $umeng=new \Umeng($key, $timestamp);
//        $u['anzhuo']= $umeng->sendAndroidUnicast($data,$title,$device_tokens);
        $u['anzhuo']= $umeng->sendAndroidUnicast($data,$title);
//    }
    return $u;
}