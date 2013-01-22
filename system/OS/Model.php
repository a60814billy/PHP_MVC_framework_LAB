<?php

abstract class OS_Model{
        
    public $_mysql;
    public $_config;
    private $_initflag;
        
    public function __construct($config){
        $this->_config = $config;
        $this->_initflag = FALSE;
    }
    public final function init(){
        if(!$this->_initflag){
            $this->_mysql = new lib_mysql($this->_config['database']);
            $this->_initflag = TRUE;
        }
    }

}    

?>