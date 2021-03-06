<?php
    //alert
    function alert($str){
        echo "<script>alert('${str}');</script>";
    }

    //move
    function move($str = false){
        echo "<script>";
        echo $str ? "document.location.replace('{$str}');" : "history.back()";
        echo "</script>";
        exit;
    }

    //access
    function access($bool, $msg, $url = false){
        if(!$bool){
            alert($msg);
            move($url);
        }
    }

    //autoload
    function __autoload($className){
        $className = strtolower($className);
        $className2 = preg_replace('/(model|application)(.*)/',"$1",$className);

        switch($className2){
            case 'application' :
                $dir = _APP;
                break;
            case 'model' :
                $dir = _MODEL;
                break;
            default :
                $dir = _CONTROLLER;
                break;
        }
//        echo ">>>".$dir."<br>";
//        echo ">>".$className."<br>";
//        echo ">".$className2."<br>";
//        alert($className);
        require_once ("{$dir}{$className}.php");
        /*$_GET['param'] =  array('page_type' => 'test', 'action'=> 'list');*/
        //throw new Exception("Unabla to load ".$className);
    }

