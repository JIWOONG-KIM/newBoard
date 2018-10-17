<?php
    Class Controller{

        function __construct($param)
        {
            header("Content-type:text/html;charset=utf=8");
            $this->param = $param;
            $modelName = "Model_{$this->param->page_type}";
            $this->db = new $modelName($this->param);
            $this->setAjax = false;
            $this->index();
        }

        function index(){
            $method = isset($this->param->action) ? $this->param->action : 'basic';
            if(method_exists($this, $method)) $this->$method();
            $this->getTitle();
            $this->header();
            $this->content();
            $this->footer();
        }

        function header(){
            $this->setAjax || require_once(_VIEW . "header.php");
        }

        function  footer(){
            $this->setAjax || require_once(_VIEW . "footer.php");
        }

        function content(){
            $this_arr = (array)$this;
            extract($this_arr);
            $dir = _VIEW."{$this->param->page_type}/{$this->param->include_file}.php";
            if(file_exists($dir)) require_once ($dir);
        }

        function  getTitle(){
            $this->title = 'JW BOARD';
        }


    }