<?php

function resource($resourcename){

    if($resourcename[0] == '/'){
        $resourcename = substr($resourcename , 1);
    }
    echo WEB_ROOT . '/' . $resourcename;
}