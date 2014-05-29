<?php

class TestCLI extends CLIHandler{

    public function main(){
        echo "Hello, World!!";
    }

    public function test(){
        print_r($this->_argv);
    }

}