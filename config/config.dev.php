<?php
    //路由設定
    $CONFIG['system']['route'] = array(
        'dufault_controller'    => 'demo',
        'default_action'        => 'index',
        'post_str'              => '.php',
        'rewrite'               => FALSE
    );
    //需載入之函式庫
    $CONFIG['system']['lib'] = array(
        'mysql'     =>  'lib_mysql',
        'mysqli'    =>  'lib_mysqli',
        'request'   =>  'lib_requests',
        'debug'     =>  'debug',
        'message'   =>  'debug'
    );

    //資料庫設定
    $CONFIG['system']['database'] = array(
        'sql_engine'=>  'sqlite', //T: Thu, 22 Aug 2013 22:53:14 
        'hostname'  =>  '',
        'username'  =>  '',
        'password'  =>  '',
        'database'  =>  '.ht.guestbook.db'
    );
    //其他設定
    $CONFIG['system']['other'] = array(
        'debug_mode'=>  TRUE,
    );

    $CONFIG['system']['log'] = array(
        'filepattern'   =>  'Ymd'
    );


    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT ^ E_NOTICE);
    ini_set("display_errors" , "On");
?>
