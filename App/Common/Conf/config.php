﻿<?php
return array(
    //'配置项'=>'配置值'
    //数据库配置信息
    'DB_TYPE'   => 'mysql', // 数据库类型


    'DB_HOST'   => '120.79.6.64', // 服务器地址
    'DB_NAME'   => 'xueyuan', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'root', // 密码

    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 'kq_', // 数据库表前缀
    /*------------------------------------跳转模板-----------------------------------------------*/
    'TMPL_ACTION_ERROR'     	=> 'Public:dispatch_jump', 								// 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   	=> 'Public:dispatch_jump', 								// 默认成功跳转对应的模板文件

    'DEFAULT_FILTER' => 'htmlspecialchars,trim', // 默认参数过滤方法 用于I函数...

    // 'URL_CASE_INSENSITIVE' =>true,      //URL访问不再区分大小写
    'URL_MODEL'   =>3,           //URL模式

    'KEY'   =>'zzcn77',           //接口健全key

);
