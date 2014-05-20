<?php
    // class 名稱為 檔名+Model ，需繼承OS_Model類別
    // Model 需有對應 Controller  
    class demoModel extends Model{
        // 模組內不能有 public function init()方法，因為init方法為初始化mysql連線用

        public function test(){
            echo "Model TEST";
            //如需存取資料庫須使用init對mysql 物件初始化
            //$this->init();
            //使用 query 執行mysql指令
            //$query = $this->_mysql->query("show tables");
            //可使用 mysql_fetch_array 之類的函式對 $query處理

            //mysql 類別有許多寫好的函式可以使用

            //使用 getNum 取得總比數
            //$num = $this->_mysql->getNum();

            //取得一筆查詢資料
            //$data = $this->_mysql->getData();
            

            //取得資料表中所有資料
            //$data = $this->_mysql->getAllData('users');

            //新增範例
            //使用 insert 方法將資料新增至資料表，並返回最新一筆id值
            $data = array(
                'account' => 'test',
                'password' => 'test'
            );
            //$id = $this->_mysql->insert('users' , $data);

            //修改範例
            //資料內一定要有 id ，其餘的放置欲修改之資料
            $data = array(
                'id'       => '1',
                'password' => 'test2'
            );
            //$this->_mysql->update('users' , $data);

            //刪除範例
            //刪除指定資料表指定id
            //$this->_mysql->delete('users' , $id);



        }

    }