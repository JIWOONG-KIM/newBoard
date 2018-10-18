<?php
    Class Model_board extends Model{
        function getList()
        {
            $this->sql = "SELECT * FROM board order by num DESC";
            return $this->fetchAll();
        }

        function getListNum(){
            return $this->cnt();
        }

        function getView(){
            $this->sql = "SELECT * FROM board where num = ?";
            $this->column =  array($this->param->num);
            return $this->fetch();
        }

       function insert(){
           header("Content-type:text/html;charset=utf8");
           $this->sql = "INSERT INTO board (title, writer, pwd, contents) values (?,?,?,?)";
           $this->column = array($_POST['title'], $_POST['writer'], $_POST['pwd'], $_POST['contents']);
           return $this->query();
       }

       function update(){
           header("Content-type:text/html;charset=utf8");
           $this->sql = "UPDATE board set title = ?, writer = ?, contents = ?, update_date = now()";
           $this->column = array($_POST['title'], $_POST['writer'], $_POST['pwd'], $_POST['contents']);
           return $this->query();
       }

       function delete(){
           access($this->cnt("SELECT * FROM board where pw='{$_POST['pw']}' and idx='{$this->param->num}'"),"비밀번호가 일치하지 않습니다.");
           $this->sql = "UPDATE board set title = ?, writer = ?, contents = ?, update_date = now()";
           $this->column=array($this->param->num);
           unset($_POST['pw']);
       }
    }
