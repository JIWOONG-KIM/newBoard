<?php
    class Application{
        var $param;

        function __construct()
        {
            $this->getParam();
            new $this->param->page_type($this->param);
        }

        function getParam()
        {
            /*echo "<pre>";
            echo "aaa";
            echo print_r($_GET['param'],true);
            echo "</pre>";*/
            if (isset($_GET['param'])) {
                $get = explode("/", $_GET['param']);
            }
            /*if (is_array($this->param)) {*/
                $param = array();
                $param['page_type'] = isset($get[0]) && $get[0] != '' ? $get[0] : 'main';
                $param['action'] = isset($get[1]) && $get[1] != '' ? $get[1] : NULL;
                $param['idx'] = isset($get[2]) && $get[2] != '' ? $get[2] : NULL;
                $param['page_num'] = isset($get[2]) && $get[2] != '' ? $get[2] : 1;
                $param['include_file'] = isset($param['action']) ? $param['action'] : $param['page_type'];
                $param['get_page'] = _URL . "{$param['page_type']}";
                $this->param = (object)$param;
            /*}*/
        }
    }