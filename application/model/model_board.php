<?php

Class Model_board extends Model
{
    function getList()
    {
        $this->sql = "SELECT * FROM board WHERE use_yn = 'Y' order by num DESC";
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
        $this->sql = "INSERT INTO board (title, writer, pwd, contents) values (?,?,?,?)";
        $this->column = $arr;
        $this->query();
    }

    function updateRow($arr)
    {
        if (empty($arr) === true) {
            throw new Exception("data is empty");
        }
//        $arr['pwd'];
//        $this->column = array($_POST['pwd'], $this->param->num);
//        access($this->cnt("SELECT * FROM board where pw=? and num=?"), "비밀번호가 일치하지 않습니다.");

//        if ($this->checkPW($_POST['pwd'], $this->param->num) > 0) {
            $this->sql = "UPDATE board set title = ?, writer = ?, contents = ?, update_date = now() where num = ?";
            $this->column = $arr;
            $this->query();
//        } else {
//            throw new Exception("비밀번호가 일치하지 않습니다");
//        }
    }
    function deleteRow()
    {
        $this->column = array($_POST['pwd'], $this->param->num);
        access($this->cnt("SELECT * FROM board where pw=? and num=?"), "비밀번호가 일치하지 않습니다.");
        $this->sql = "UPDATE board set use_yn = 'N' WHERE num = ?)";
        $this->column = array($this->param->num);
        unset($_POST['pw']);
//           access(!$this->query(),"삭제완료","/");
        $this->query();
    }
    function checkPW($pwd, $num)
    {
        $this->column = array($pwd, $num);
        return $this->cnt("SELECT * FROM board where pw=? and num=?");
    }
}
