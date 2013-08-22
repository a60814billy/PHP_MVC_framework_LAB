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
            $sql_engine = "lib_".$this->_config['other']['sql_engine'];
            $this->_mysql = new $sql_engine($this->_config['database']);
            $this->_initflag = TRUE;
        }
    }

}    

?>