<?php

class guestbookController extends Controller{

    function index(){
        $this->_opdata['add'] = url('add' , 'guestbook');
        $this->_opdata['records'] = $this->_model->getAllRecord();
    }

    function add(){
        if($this->_request->isPost()){
            $this->_model->addRecord($this->_request->getPost('name') , $this->_request->getPost('content'));
            redirect('index');
        }
    }


}