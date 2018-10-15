<?php
    Class Model{
        var $db;
        var $column;
        var $table;
        var $param;
        var $action;
        var $sql;

        function __construct($param)
        {
            $this->column = NULL;
            $this->param = $param;
            $this->db = new PDO("mysql:host=localhost:3306;dbname=jw;charset=utf-8","jw","jw");
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            if(isset($_POST['action'])){
                $this->action = $_POST['action'];
                $this->action();
            }
        }

        function query($sql = false){
            $sql && $this->sql = $sql;//무슨문법인고
            $res = $this->db->prepare($this->sql);
            if($res->execute($this->column)){
                return $res;
            } else {
                echo "<pre>";
                echo $this->sql;
                print_r($this->column);
                print_r($this->db->errorInfo());
                echo "</pre>";
            }
        }

        function fetch($sql = false){//arg의 표현식이 신기함. 찾아볼것
            $sql && $this->sql = $sql;
            return $this->query($this->sql)->fetch();
        }

        function fetchAll($sql = false){
            $sql && $this->sql = $sql;
            return $this->query($this->sql)->fetchAll();
        }

        function cnt($sql = false){
            $sql && $this->sql = $sql;
            return $this->query($this->sql)->rowCount();
        }

        function getColumn($arr, $cancel){
            $column = '';
            $cancel = explode("/", $cancel);
            foreach ($arr as $key => $value){
                if(!in_array($key, $cancel)){
                    $column .=", {$key} = :{key}\n";
                    $this->column[$key] = $value;
                }
            }
            return $column = substr($column,2);
        }

        function combine($column){
            switch ($this->action){
                case 'insert' : $sql = " INSERT INTO {$this->table} SET \n";break;
                case 'update' : $sql = " UPDATE {$this->table} SET \n";break;
                case 'delete' : $sql = " DELETE FROM {$this->table} \n";break;
            }
            return $sql.=$column;
        }
    }