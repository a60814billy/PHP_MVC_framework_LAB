<?php
    
class guestbookModel extends OS_Model{

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
