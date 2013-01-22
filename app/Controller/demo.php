<?php
    // class 名稱為 檔名+Controller ，並繼承OS_Controller Class
    // Controller 與 Model 檔名需一致
    // 當有需要使用到 mysql 時，須建立模組
    class demoController extends OS_Controller{

        //action = index 進入點
        public function index(){
            echo "Hi";
            //輸出資料方式，使用 $_opdata 變數
            $this->_opdata['test'] = "World";

            //取得資料方式，使用PHP原生 $_POST
            $data = $_POST['test'];

            //取得資料方式2，使用 $_request 物件取得資料(經過 strip_tags 函式過濾)
            $data2 = $this->_request->getPost('test');

            //可以使用$this->_request->isPost() 判斷是否有POST資料
            //可以使用$this->_request->isAjax() 判斷是否是Ajax呼叫

            //使用 getPost 取得 $_POST
            //使用 getQuery取得 $_GET

            //如果取得的資料為陣列，或不想使用 strip_tags函式過濾 可以使用第二個參數
            //$data2 = $this->_request->getQuery('test2' , FALSE);

            if($this->_request->isPost()){
                $this->_opdata['message'] = "The Input Data is ".$this->_request->getPost('test' , FALSE);    
            }
            
            // conver_url 函式會將url轉成rewrite的樣式
            $this->_opdata['url'] = conver_url("./index.php?controller=demo&action=login");
            // 使用showTemplate function 載入樣板，並將 $_opdata內容傳送至樣板；
            // 樣板內使用 $data 讀取資料
            $this->showTemplate('test_index');
        }

        public function login(){
            // 使用 $_model 存取 模組內容
            $this->_model->test();
            echo "login";
            $this->_opdata['message'] = "This page is login page";
            $this->showTemplate('test_index');
        }


    }