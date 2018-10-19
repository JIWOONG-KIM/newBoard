<?php

Class Board extends Controller
{
    function init()
    {
        $this->list = $this->db->getList();
        $this->listNum = $this->db->getListNum();
    }

    function view()
    {
        $this->data = $this->db->getView();
    }

    function write()
    {
        if (isset($this->param->num)) {
            $this->view();
        }
    }

    function insert()
    {
        try {
            $title = $_POST['title'];
            $writer = $_POST['writer'];
            $pwd = $_POST['pwd'];
            $content = $_POST['contents'];

            $arr = array(':title' => $title, ':writer' => $writer, ':pwd' => $pwd, ':content' => $content);

            $this->successrow = $this->db->insert($arr);
            //json 형태 return
            return json_encode(array('result' => true, 'msg' => '정상적으로 게시글이 등록되었습니다.'));
            exit;
        } catch (Exception $e) {
//            return json_encode(array('result' => false, 'msg' => '등록 실패하였습니다.'));
        }
    }

    function updateRow()
    {
        try {
            $title = $_POST['title'];
            $writer = $_POST['writer'];
            $content = $_POST['contents'];
            $num = $_POST['num'];
            $cnt = $this->check_pw($num,$_POST['pwd']);
            if($cnt>0) {
                alert("정상적으로 수정 되었습니다");
                $arr = array(':title' => $title, ':writer' => $writer, ':content' => $content, ':num' => $num);
                $this->successrow = $this->db->updateRow($arr);
                return json_encode(array('result' => true, 'msg' => '정상적으로 게시글이 수정되었습니다.'));
            }
            else{
                return json_encode(array('result' => true, 'msg' => '비밀번호가 틀렸습니다'));
            }
            exit;
        } catch (Exception $e) {
            return json_encode(array('result' => true, 'msg' => '수정 실패하였습니다'));
        }
    }

    function deleteRow()
    {
        try{
            $cnt = $this->check_pw($this->param->num,$_POST['pwd']);
            if($cnt>0) {
                $arr = array($this->param->num);
                $this->successrow = $this->db->deleteRow($arr);
            }else{
                alert("비밀번호가 틀립니다");
                echo "<script>history.back();</script>";
            }
        }catch(Exception $e){
            alert("삭제실패");
            echo "<script>history.back();</script>";
        }
    }
    function check_pw($num,$pwd){
        try{
            $arr = array(':num' => $num, ':pwd' => "{$pwd}");
            return $this->db->check_pw($arr);
        }catch(Exception $e){
            throw new Exception();
        }
    }
}