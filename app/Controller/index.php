<?php

    class indexController extends Controller{
        
        public function __construct(){
            parent::__construct();
            $this->_opdata['title'] = "MVC Test";
            $this->_opdata['h1'] = "Hello!!";
        }

        public function index(){
            header("Location:".conver_url("index.php?controller=demo"));
        }

    }

?>