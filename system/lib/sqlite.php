<?php

	class lib_sqlite{

		private $_host;
		private $_user;
		private $_pass;
		private $_dbna;
		private $_conn;

		private $num;
		private $data;

		public $sql;
		public $query;

		public function __construct($config){
			$this->_dbna = $config["database"];
			$this->_conn = new SQLite3($config["database"]);
			if($this->_conn->connect_error){
				die("Error to connect to sql server.");
			}
			//$this->_conn->query("SET NAMES utf8");
		}

		public function query($sql){
			$this->sql = $sql;
			$this->query = $this->_conn->query($this->sql);
            $this->num = 0;
            while($rs = $this->query->fetchArray()) $this->num++;
            $this->query = $this->_conn->query($this->sql);
			return $this->query;
		}

		public function getNum(){
			return $this->num;
		}

		public function getData(){
			return $this->query->fetch_array();
		}


		public function insert($table, $data){
			$sql = "insert into `$table`(";
            $sql2 = "";
            foreach($data as $key => $value){
                $sql .= "`$key`,";
                $sql2 .= "'$value',";
            }
            $sql = substr($sql , 0 , -1);
            $sql .= ") VALUES(";
            $sql .= $sql2;
            $sql = substr($sql , 0 , -1);
            $sql .=');';
            // var_dump($sql);
            // exit;
            $this->_conn->query($sql);
            return $this->_conn->insert_id;
		}

		public function delete($table , $id){
			$sql = "delete from `$table` WHERE `id`=$id;";
			$this->_conn->query($sql);
		}

		public function update($table , $data){
            $sql = "UPDATE `$table` SET ";
            foreach($data as $key => $value){
                if($key!='id'){
                    $sql .= " `$key`='$value' ,";
                }
            }
            $sql = substr($sql , 0 , -1);
            $sql .= " WHERE `id` = ".$data['id'];
            $this->_conn->query($sql);
        }

        public function getAllData($table){
            $this->sql = "SELECT * from `" . $table . "`";
            $this->query($this->sql);
            $result = array();
            if($this->getNum()>0){
                while($rs = $this->query->fetchArray()){
                    $result[] = $rs;
                }    
            }
            return $result;
        }

        /**
         * 取得查詢結果
         * @return Array 查詢結果
         */
        public function getDatas(){
        	$result = array();
        	if($this->getNum()>0){
        		while($rs = $this->query->fetchArray()){
        			$result[] = $rs;
        		}
        	}
        	return $result;
        }

	}
