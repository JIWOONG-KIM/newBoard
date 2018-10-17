<?php
    Class Model_board extends Model{
        function getList(){
            $this->sql = "SELECT * FROM board order by ? DESC";
            try{
                $stmt = $this->db->prepare($this->sql);
//                $stmt->bindColumn(1, $_POST['reg_date']);
                $stmt->execute(array($_POST['reg_date']));
                return $stmt->fetchAll();
            }catch(PDOException $e){
                print $e->getMessage();
            }
        }

//        function getList()
//        {
//            $this->sql = "SELECT * FROM board order by 'reg_date' DESC";
//            return $this->fetchAll();
//        }

        function getListNum(){
            return $this->cnt();
        }

        function getView(){
            $this->sql = "SELECT * FROM board where num = '{$this->param->num}'";
            return $this->fetch();
        }

//        function insert


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
