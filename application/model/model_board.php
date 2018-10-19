<?php

Class Model_board extends Model
{
    function getList()
    {
        $this->sql = "SELECT num, title, writer, reg_date 
        FROM board WHERE use_yn = 'Y' order by num DESC";
        return $this->fetchAll();
    }

    function getListNum()
    {
        return $this->cnt();
    }

    function getView()
    {
        $this->sql = "SELECT * FROM board where num = ?";
        $this->column = array($this->param->num);
        return $this->fetch();
    }

    function insert($arr)
    {
        if (empty($arr) === true) {
            throw new Exception("data is empty");
        }
        $this->sql = "INSERT INTO board (title, writer, pwd, contents) values (:title,:writer,:pwd,:content)";
        $this->column = $arr;
        $this->query();
    }

    function updateRow($arr)
    {
        header("Content-type:text/html;charset=utf=8");
        if (empty($arr) === true) {
            throw new Exception("data is empty");
        }
//        if ($this->checkPW($_POST['pwd'], $this->param->num) > 0) {

//        alert($this->check_pw($_POST['pwd'], $this->param->num));

        $this->sql = "UPDATE board set title = :title, writer = :writer, contents = :content, update_date = now() where num = :num";
        $this->column = $arr;
        $this->query();
//        } else {
//            throw new Exception("비밀번호가 일치하지 않습니다");
//        }
    }

    function deleteRow()
    {
        $this->sql = "UPDATE board set use_yn = 'N' WHERE num = ?";
        $this->column = array($this->param->num);
        access(!$this->query(), "삭제되었습니다", "{$this->param->get_page}");
    }

    function check_pw($arr)
    {
        $this->column = $arr;
        return $this->cnt("SELECT num FROM board where pwd =:pwd and num=:num");
    }
}
