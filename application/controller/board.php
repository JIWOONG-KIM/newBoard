<?php
Class Board extends Controller{
    function basic(){
        $this->list = $this->db->getList();
        $this->listNum  = $this->db->getListNum();
    }

    function view(){
        $this->data = $this->db->getView();
    }

    function write(){
        if(isset($this->param->idx)){
            $this->data = $this->db->getView();
        }
        $this->action = isset($this->param->num) ? 'update' : 'insert';
        $this->subject = isset($this->data->title) ? $this->data->title : NULL;
        $this->writer = isset($this->data->writer) ? $this->data->writer : NULL;
        $this->contents = isset($this->data->contents) ? $this->data->contents : NULL;
    }

    function delete(){

    }

}