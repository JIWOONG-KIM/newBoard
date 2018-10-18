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

            $arr = array($title, $writer, $pwd, $content);

            $this->successrow = $this->db->insert($arr);
            //json 형태 return
//            echo json_encode(array('result' => true, 'msg' => '정상적으로 게시글이 등록되었습니다.'));
        } catch (Exception $e) {
//            return json_encode(array('result' => false, 'msg' => '등록 실패하였습니다.'));
        }
    }

    function check_pw()
    {
    }

    function updateRow()
    {
        try {
            $title = $_POST['title'];
            $writer = $_POST['writer'];
            $content = $_POST['contents'];
            $num = $_POST['num'];

            $arr = array($title, $writer, $content, $num);

//            $this->successrow = $this->db->updateRow(array(
//                'title' => $title,
//                'writer' => $writer,
//                'content' => $content,
//                'num' => $num
//            ));

            $this->successrow = $this->db->updateRow($arr);


            echo (json_encode(array('result' => true, 'msg' => '정상적으로 게시글이 수정되었습니다.')));
        } catch (Exception $e) {
            return json_encode(array('result' => true, 'msg' => '수정 실패하였습니다'));
        }
    }

    function deleteRow()
    {
        $this->successrow = $this->db->deleteRow();
    }
}