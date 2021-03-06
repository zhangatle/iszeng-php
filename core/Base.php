<?php
namespace core;

use core\lib\log;
use core\lib\route;

class Base{
    public static  $classMap = array();
    public $assign;

    /**
     * 运行框架
     */
    static public function run(){
        log::init();
        $route = new route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP.'/controllers/'.$ctrlClass.'Controller.php';
        $ctrlClass = '\\'.MODULE.'\controllers\\'.$ctrlClass.'Controller';

        if(is_file($ctrlFile)){
            include $ctrlFile;
            $ctrl = new $ctrlClass();
            $ctrl->$action();
            log::log('controllers:'.$ctrlClass.'     '.'action:'.$action);
        }else{
            throw new \Exception('找不到控制器'.$ctrlClass);
        }
    }

    /**
     * @param $class
     * @return bool
     * 自动引入类
     */
    static public function load($class){
        if(isset($classMap[$class])){
            return true;
        }else{
            $class = str_replace('\\','/',$class);
            $file = KEEN .'/'.$class.'.php';
            if(is_file($file)){
                include $file;
                self::$classMap[$class] = $class;
                return true;
            }else{
                return false;
            }
        }
    }

    /**
     * 数据分配
     * @param $name
     * @param $value
     */
    public function assign($name,$value){
        $this->assign[$name] = $value;
    }
}