<?php

function redirect($action , $controller = null){
    if(empty($controller)){
        $controller = Helper::$_controller;
    }
    if(REWRITE){
        $url = WEB_ROOT . "/" . $controller  . '/' . $action . '/';
    }else{
        $url = WEB_ROOT . "/index.php?&controller=" . $controller . "&action=" . $action . '/';
    }
    header("Location: " . $url);
}

function url($action , $controller , $parameter = null, $view = false){
    if(!empty($parameter)){
        $query = http_build_query($parameter);
    }
    if(REWRITE){
        $url = WEB_ROOT . "/" . $controller . "/" . $action .( (empty($query)) ? "/" :  "/?" . $query );
    }else{
        $url = WEB_ROOT . "/index.php?controller=" . $controller . "&action=" . $action . "&" . $query;
    }
    if(!$view){
        return $url;
    }
    echo $url;
}