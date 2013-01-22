<?php
    $EVN = 'develop';
    $EVN = 'test';
    $EVN = 'product';     
 
    switch($EVN){
        case 'develop':
            include_once "config.dev.php";
            break;
        case 'test':
            include_once "config.test.php";
            break;
        case 'product':
            include_once "config.pro.php";
            break;
    }
?>