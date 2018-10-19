<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
Class Model
{
    var $db;
    var $column;
    var $table;
    var $param;
    var $action;
    var $sql;

    function __construct($param)
    {
        header("Content-type:text/html;charset=utf=8");
        $this->column = NULL;
        $this->param = $param;
        $this->db = new PDO("mysql:host=localhost:3306;dbname=jw;charset=utf8", "jw", "jw");
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
//            if(isset($_POST['action'])){
//                $this->action = $_POST['action'];
//                $this->action();
//            }
    }

    function query($sql = false)
    {
        $sql && $this->sql = $sql;
        $res = $this->db->prepare($this->sql);
        try {
            $res->execute($this->column);
            return $res;
        } catch (PDOException $e) {
            echo "<pre>";
            echo $this->sql;
            print_r($this->column);
            print_r($this->db->errorInfo());
            echo "</pre>";
        }
    }

    function fetch($sql = false)
    {
        $sql && $this->sql = $sql;
        return $this->query($this->sql)->fetch();
    }

    function fetchAll($sql = false)
    {
        $sql && $this->sql = $sql;
        return $this->query($this->sql)->fetchAll();
    }

    function cnt($sql = false)
    {
        $sql && $this->sql = $sql;
        return $this->query($this->sql)->rowCount();
    }

    function getColumn($arr, $cancel)
    {
        $column = '';
        $cancel = explode("/", $cancel);
        foreach ($arr as $key => $value) {
            if (!in_array($key, $cancel)) {
                $column .= ", {$key} = :{$key}\n";
                $this->column[$key] = $value;
            }
            return $column = substr($column, 2);
        }
    }
}