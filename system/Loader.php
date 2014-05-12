<?php

    define('SYS_ROOT' , dirname(__FILE__) );
    define('ROOT' , substr(SYS_ROOT , 0 , -7));

    if(dirname($_SERVER['PHP_SELF'])=='\\'){
        define('WEB_ROOT' , '.');
    }else{
        define('WEB_ROOT' , dirname($_SERVER['PHP_SELF']));
    }

    define('REWRITE' , $CONFIG['system']['route']['rewrite']);

    Log::write("WEB_ROOT: " . WEB_ROOT);
    Log::write("REWRITE : " . REWRITE);

    function debug_show($object){
        echo '<pre>';
        print_r($object);
        echo '</pre>';
    }

    function conver_url($url){
        if(!REWRITE){
            return $url;
        }
        // ./index.php?controller=xxx&action=OOO
        $tmp = mb_split("\?" , $url);
        $tmp2 = mb_split("&" , $tmp[1]);
        $url = WEB_ROOT."/";
        if(count($tmp2)>=2){
            for($i=0;$i<2;$i++){
                $tmp3 = mb_split("=" , $tmp2[$i]);
                $url .= $tmp3[1].'/';
            }
            if($tmp2[2]!=""){
                $url .= '?';
                for($i=2;$i<count($tmp2);$i++){
                    $url .= '&'.$tmp2[$i];
                }                
            }
        }else{
            foreach($tmp2 as $key => $value){   
                $tmp3 = mb_split("=" , $value);
                $url .= $tmp3[1].'/';
            }    
        }        
        return $url;
    }


    final class Loader{
        
        public static $_config;
        public static $_route;
        public static $_request;
        public static $_controller;
        public function __construct(){
                       
        }

        public static function run($config){
            self::$_config = $config;
            spl_autoload_register( array('Loader' , 'autoload') );
            Log::write("Load OS");
            self::loadOS();
            Log::write("Load Route");
            self::route();
            Log::write("Load Request");
            self::request();
            Log::write("Attach to Controller");
            self::attach_Controller();
        }

        public static function attach_Controller(){

            $controller = self::$_route->controller . "Controller";
            $model = self::$_route->controller . 'Model';
            $action = self::$_route->action;

            Log::write("Dispatch to " . $controller . "/" . $action);
            if( file_exists( ROOT.'/app/Controller/' .self::$_route->controller . '.php') ){
                require ROOT.'/app/Controller/' . self::$_route->controller . '.php';
                self::$_controller = new $controller();
                self::$_controller->setConfig(self::$_config);
                self::$_controller->setRequest(self::$_request);
                self::$_controller->setView(self::$_route->controller , self::$_route->action);                
                if( file_exists( ROOT . '/app/Model/' . self::$_route->controller . '.php')){
                    require ROOT . '/app/Model/' . self::$_route->controller . '.php';
                    
                    self::$_controller->setModel($model);
                }
                self::$_controller->$action();
            }else{
                Log::write("Controller " . $controller . " not exist" , 3);
                throw new Exception("Controller " . $controller . " not exist");
            }
        }

        public static function request(){
            Log::write("-Load lib_request");
            self::$_request = new lib_request();
        }

        public static function route(){
            if(self::$_config['route']['rewrite']){
                Log::write("-Load lib_routere");
                self::$_route = new lib_routere(self::$_config['route']);
            }else{
                Log::write("-Load lib_route");
                self::$_route = new lib_route(self::$_config['route']);
            }
        }

        public static function loadOS(){
            Log::write("-Load OS Controller");
            require SYS_ROOT.'/OS/Controller.php';
            Log::write("-Load OS Model");
            require SYS_ROOT.'/OS/Model.php';
        }

        public static function autoload($classnane){
            $file = SYS_ROOT.'/'.str_replace("_" , "/" , $classnane ) . '.php';
            if(file_exists($file)){
                Log::write("AutoLoad: " . $classnane);
                require_once $file;
            }else{
                die('error on file : ' . $file);
            }
        }

    }
    
?>