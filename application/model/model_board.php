<?php
    Class Model_board extends Model{
        function getList(){
            $this->sql = "SELECT * FROM board order by 'reg_date' DESC";
            return $this->fetchAll();
        }

        function getListNum(){
            return $this->cnt();
        }

        function getView(){
            $this->sql = "SELECT * FROM board where num = '{$this->param->num}'";
            return $this->fetch();
        }

        /*function create(){}*/

        /*function action(){
            header("Content-type:text/html;charset=utf8");
            $this->table = 'board';
            $cancel = $add_sql = "";
            $msg = "완료";
            $url = $this->param->get_page;
            isset($_POST['pw']) && md5($_POST['pw']);

        }*/


    }