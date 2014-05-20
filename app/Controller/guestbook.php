<?php

class guestbookController extends Controller{
    

    function index(){
        $this->_opdata['add'] = conver_url('./index.php?controller=guestbook&action=add');
        $this->_opdata['records'] = $this->_model->getAllRecord();
        $this->showTemplate();
    }

    function add(){
        if($this->_request->isPost()){
            $this->_model->addRecord($this->_request->getPost('name') , $this->_request->getPost('content'));
            header('Location:'.conver_url('./index.php?controller=guestbook'));
        }
    }


}