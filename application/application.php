<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
class Application
{
    var $param;

    function __construct()
    {
        $this->getParam();
        new $this->param->page_type($this->param);
    }

    function getParam()
    {
        if (isset($_GET['param'])) {
            $get = explode("/", $_GET['param']);
        }
        if (!is_array($this->param)) {
            $param = array();
        }
        $param['page_type'] = isset($get[0]) && $get[0] != '' ? $get[0] : 'main';
        $param['action'] = isset($get[1]) && $get[1] != '' ? $get[1] : NULL;
        $param['num'] = isset($get[2]) && $get[2] != '' ? $get[2] : NULL;
        $param['page_num'] = isset($get[2]) && $get[2] != '' ? $get[2] : 1;
        $param['include_file'] = isset($param['action']) ? $param['action'] : $param['page_type'];
        $param['get_page'] = _URL . "{$param['page_type']}";
        $this->param = (object)$param;
    }
}