<?php
/**
 *
 * Class Log
 * to write Log to filesystem
 * edited on 2014-05-12 13:05:03
 */ 
final class Log{

    static private $_config;

    static public function setConfig($config){
	self::$_config = $config;
    }

    /**
     * function to write a log to file
     * filename pattern : $CONFIG['system']['log']['filepattern']
     * 
     * arguments:
     * $log : String , log meggage
     * $state : Integer , 1 is info , 2 is warning , 3 is error 
     *
     */
    static public function write($log , $state = 1){
	$finename = "log/" . date(self::$_config['filepattern']) . ".log";
	$fp = fopen($finename , "a");
	$message = "";
	switch($state){
	case 1:
	    $message = "[info]\t";
		break;
	case 2:
	    $message = "[warning]\t";
		break;
	case 3:
	    $message = "[error]\t";
		break;
	}
	$message = $message . " " . date("H:i:s") .' ' .  $log . PHP_EOL;
	fwrite($fp , $message);
	fclose($fp);	
    }
}
