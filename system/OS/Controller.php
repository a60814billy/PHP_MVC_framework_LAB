<?php

abstract class OS_Controller{
        
    public  $_config;
    public  $_request;
    public  $_model;
    public  $_view;
    public  $_defaultViewName;

    public  $_opdata = array();

    public function __construct(){}

    public function index(){}

    public final function setConfig($config){
        $this->_config = $config;
    }
    public final function setRequest($request){
        $this->_request = $request;
    }
    public final function setModel($modelname){
        $this->_model = new $modelname($this->_config);
    }
    public final function setView($controller , $action){
        $this->_view = new lib_view($this->_config);
        $this->_defaultViewName = $controller . $action;
    }

    public final function showTemplate($viewname = NULL){
        if(empty($viewname)){
            $viewname = $this->_defaultViewName;
        }
        $this->_view->init( ROOT. '/app/View/'. $viewname .'.php' , $this->_opdata);
        $this->_view->rander();
    }
}    

?>