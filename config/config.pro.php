<?php
    
    $CONFIG['system']['route'] = array(
        'dufault_controller'    => 'index',
        'default_action'        => 'index',
        'post_str'              => '.php'
    );
    
    $CONFIG['system']['lib'] = array(
        'mysql'     =>  'lib_mysql',
        'request'   =>  'lib_requests'
    );

    $CONFIG['system']['database'] = array(
        'hostname'  =>  'localhost',
        'username'  =>  'ntutcsie',
        'password'  =>  'ntut',
        'database'  =>  'ntutcsie'
    );
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
    ini_set("display_errors" , "Off");
?>