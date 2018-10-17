<?php
Class Board extends Controller{
//    private  $list = array();

    function init(){
        $this->list = $this->db->getList();
        $this->listNum  = $this->db->getListNum();
    }

    function view(){
        $this->data = $this->db->getView();
    }

    function write(){
        if(isset($this->param->num)){
            $this->data = $this->db->getView();
        }
        $this->action = isset($this->param->num) ? 'update' : 'insert';

//        if( $action == insert )
           //model 호출  insert 함수명 호출

        $this->subject = isset($this->data->title) ? $this->data->title : NULL;
        $this->writer = isset($this->data->writer) ? $this->data->writer : NULL;
        $this->contents = isset($this->data->contents) ? $this->data->contents : NULL;
    }

    function delete(){

    }

}