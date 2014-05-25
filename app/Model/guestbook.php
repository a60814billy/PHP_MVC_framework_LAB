<?php
    
class guestbookModel extends Model{

    public function __construct($config){
        parent::__construct($config);
        /*$this->_db->exec('CREATE DATABASE IF NOT EXISTS `guestbook` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `guestbook`;');
        $this->_db->exec('CREATE TABLE IF NOT EXISTS `record` (' +
  '`id` int(11) DEFAULT NULL,' +
  '`name` text NOT NULL,' +
  '`content` longtext NOT NULL,' +
  '`datetime` datetime NOT NULL' +
  ') ENGINE=MyISAM DEFAULT CHARSET=latin1;');*/
        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `record` (
  id int primary key DEFAULT NULL,
  name text NOT NULL,
  content text NOT NULL,
  datetime datetime NOT NULL
);
SQL;
        $this->_db->exec($sql);
    }

    function addRecord($name , $content){
        //$this->init();
        $data = array(
            'name'      =>  $name,
            'content'   =>  $content,
            'datetime'  =>  date('Y-m-d h:m:s')
        );
        $id = $this->_db->insert('record' ,$data);
        return $id;
    }

    function getAllRecord(){
        //$this->init();
        return $this->_db->getAllData('record');
    }

}
