<?php
    // class 名稱為 檔名+Controller ，並繼承OS_Controller Class
    // Controller 與 Model 檔名需一致
    // 當有需要使用到 mysql 時，須建立Model
    class demoController extends Controller{

        //action = index 進入點
        public function index(){

            //輸出資料方式，使用 $_opdata 變數
            $this->_opdata['test'] = "World";

            //取得資料方式1，使用PHP原生 $_POST
            $data = $_POST['test'];

            //取得資料方式2，使用 $_request 物件取得資料(經過 strip_tags 函式過濾)
            $data2 = $this->_request->getPost('test');
            //其他有關_request物件的操作
            //1.可以使用$this->_request->isPost() 判斷是否有POST資料
            //2.可以使用$this->_request->isAjax() 判斷是否是Ajax呼叫
            //3.使用 getPost 取得 $_POST
            //4.使用 getQuery取得 $_GET

            //如果取得的資料為陣列，或不想使用 strip_tags函式過濾 可以使用getXXX的第二個參數取得資料
            //$data2 = $this->_request->getQuery('test2' , FALSE);

            //範例：使用 isPost 判斷是否為Post請求
            if($this->_request->isPost()){
                //如果為post請求，輸出傳入之DATA值
                $this->_opdata['message'] = "The Input Data is ".$this->_request->getPost('test' , FALSE);    
            }

            // 使用url Helper會自動判斷有沒有啟用REWRITE，產生不同的網址
            // url(ActionName, ControllerName, Parameter);
            $this->_opdata['url'] = url('login' , 'demo');
            $this->_opdata['guestbook_url'] = url('index' , 'guestbook');


            // 使用showTemplate function 載入樣板，並將 $_opdata內容傳送至樣板；
            // 樣板內使用 $data 讀取資料 ($data = $_output)
        }

        public function login(){
            // 使用 $_model 存取 模組內容
            $this->_model->test();
            echo "login";
            $this->_opdata['message'] = "This page is login page";
            if($this->_request->isPost()){
                $this->index();
            }
            $this->setCustomView('index');
        }

    }