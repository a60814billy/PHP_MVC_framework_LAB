<?php
    //路由設定
    $CONFIG['system']['route'] = array(
        'dufault_controller'    => 'index',
        'default_action'        => 'index',
        'post_str'              => '.php'
    );
    //需載入之函式庫
    $CONFIG['system']['lib'] = array(
        'mysql'     =>  'lib_mysql',
        'request'   =>  'lib_requests'
    );
	//資料庫設定
    $CONFIG['system']['database'] = array(
        'hostname'  =>  'localhost',
        'username'  =>  'bookorder',
        'password'  =>  '2F9DAmE9HVZ4N6EH',
        'database'  =>  'bookorder'
    );
	//其他設定
    $CONFIG['system']['other'] = array(
        //'debug_mode'=>  TRUE
    );
    
?>