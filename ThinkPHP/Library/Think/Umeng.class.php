<?php

namespace Think;
class Umeng {
    protected $appkey           = NULL;
    protected $appMasterSecret     = NULL;
    protected $timestamp        = NULL;
    protected $validation_token = NULL;

    function __construct($key, $secret) {
        //引入核心文件
        require_once('./APP/Umengpush/AndroidBroadcast.php');
        require_once('./APP/Umengpush/AndroidFilecast.php');
        require_once('./APP/Umengpush/AndroidGroupcast.php');
        require_once('./APP/Umengpush/AndroidUnicast.php');
        require_once('./APP/Umengpush/AndroidCustomizedcast.php');
        require_once('./APP/Umengpush/IOSBroadcast.php');
        require_once('./APP/Umengpush/IOSFilecast.php');
        require_once('./APP/Umengpush/IOSGroupcast.php');
        require_once('./APP/Umengpush/IOSUnicast.php');
        require_once('./APP/Umengpush/IOSCustomizedcast.php');
        $this->appkey = $key;
        $this->appMasterSecret = $secret;
        $this->timestamp = strval(time());
    }

    /**
     * Android推送—广播
     * @param $title string 推送消息标题
     * @param $content string 推送消息内容
     * @return mixed
     */
    function sendAndroidBroadcast($title,$content,$id,$activity) {
        try {
            $brocast = new AndroidBroadcast();
            $brocast->setAppMasterSecret($this->appMasterSecret);
            $brocast->setPredefinedKeyValue("appkey",           $this->appkey);
            $brocast->setPredefinedKeyValue("timestamp",        $this->timestamp);
            $brocast->setPredefinedKeyValue("ticker",           "Android broadcast ticker");
            $brocast->setPredefinedKeyValue("title",            $title);
            $brocast->setPredefinedKeyValue("text",             $content);
            $brocast->setPredefinedKeyValue("description",     $title);
            $brocast->setPredefinedKeyValue("after_open",       "go_activity");
            $brocast->setPredefinedKeyValue("activity",       'com.zzcn77.android_app_company'.$activity);
            $brocast->setPredefinedKeyValue("production_mode", "true");
//            $brocast->setExtraField("url", $url);
            $brocast->setExtraField("id", $id);
//            $brocast->setExtraField("type", $type);
//            $brocast->setExtraField("baoming",  'com.zzcn77.android_app_company');
//            print("Sending broadcast notification, please wait...\r\n");
            return $brocast->send();
            print("Sent SUCCESS\r\n");
        } catch (Exception $e) {
            print("Caught exception: " . $e->getMessage());
        }
    }

    /**
     * Android推送—单播
     * @param $title string 推送消息标题
     * @param $content string 推送消息内容
     * @param $tokens array 设备的token值
     * @return mixed
     */
    function sendAndroidUnicast($title,$content,$tokens) {
        try {
            $unicast = new AndroidUnicast();
            $unicast->setAppMasterSecret($this->appMasterSecret);
            $unicast->setPredefinedKeyValue("appkey",           $this->appkey);
            $unicast->setPredefinedKeyValue("timestamp",        $this->timestamp);
            $unicast->setPredefinedKeyValue("device_tokens",    $tokens);
            $unicast->setPredefinedKeyValue("ticker",           "Android unicast ticker");
            $unicast->setPredefinedKeyValue("title",            $title);
            $unicast->setPredefinedKeyValue("text",             $content);
            $unicast->setPredefinedKeyValue("after_open",       "go_app");
            $unicast->setPredefinedKeyValue("production_mode", "true");
            $unicast->setExtraField("test", "helloworld");
            print("Sending unicast notification, please wait...\r\n");
            return $unicast->send();
            print("Sent SUCCESS\r\n");
        } catch (Exception $e) {
            print("Caught exception: " . $e->getMessage());
        }
    }
//    <pre name="code" class="php">
//   <span style="white-space:pre">    </span>
    /**
 * IOS推送—广播
 * @param $title string 推送消息标题
 * @param $content string 推送消息内容
 * @return mixed
 */
    function sendIOSBroadcast($title,$content,$url,$id,$type) {
        try {
            $brocast = new IOSBroadcast();
            $brocast->setAppMasterSecret($this->appMasterSecret);
            $brocast->setPredefinedKeyValue("appkey",           $this->appkey);
            $brocast->setPredefinedKeyValue("timestamp",        $this->timestamp);
            $brocast->setPredefinedKeyValue("badge",0);
            $brocast->setPredefinedKeyValue("sound", "chime");
            $brocast->setPredefinedKeyValue("production_mode", "false");
            //富文本推送
            $brocast->setPredefinedKeyValue("description",    $title );
            $brocast->setAlert("body",       $content);
            $brocast->setAlert("title",       $title);
//            $brocast->setAlert("subtitle",       $title);
            $brocast->setCustomizedField("url", $url);
            $brocast->setCustomizedField("id", $id);
            $brocast->setCustomizedField("type", $type);
//            $brocast->setPredefinedKeyValue("url",     $url);
//            $brocast->setPredefinedKeyValue("id",     id);
//            print("Sending broadcast notification, please wait...\r\n");
            return $brocast->send();
            print("Sent SUCCESS\r\n");
        } catch (Exception $e) {
            print("Caught exception: " . $e->getMessage());
        }
    }

    /**
     * IOS推送—单播
     * @param $title string 推送消息标题
     * @param $content string 推送消息内容
     * @param $tokens array 设备的token值
     * @return mixed
     */
    function sendIOSUnicast($title,$content,$tokens) {
        try {
            $unicast = new IOSUnicast();
            $unicast->setAppMasterSecret($this->appMasterSecret);
            $unicast->setPredefinedKeyValue("appkey",           $this->appkey);
            $unicast->setPredefinedKeyValue("timestamp",        $this->timestamp);
            $unicast->setPredefinedKeyValue("device_tokens",    $tokens);
            $unicast->setPredefinedKeyValue("alert", $title);
            $unicast->setPredefinedKeyValue("badge", 0);
            $unicast->setPredefinedKeyValue("sound", "chime");
            $unicast->setPredefinedKeyValue("production_mode", "false");
            $unicast->setCustomizedField("test", $content);
            print("Sending unicast notification, please wait...\r\n");
            return $unicast->send();
            print("Sent SUCCESS\r\n");
        } catch (Exception $e) {
            print("Caught exception: " . $e->getMessage());
        }
    }
//        <pre name="code" class="php">
}