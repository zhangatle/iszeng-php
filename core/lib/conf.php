<?php
namespace core\lib;

class conf{
    static public $conf = array();
    //引入单个配置
    static public function get($name,$file){
        /**
         * 1判断配置文件是否存在
         * 2判断配置是否存在
         * 3缓存配置
         */
        if(isset(self::$conf[$file])){
            return self:: $conf[$file][$name];
        }else{
            $path = KEEN.'/core/config/'.$file.'.php';
            if(is_file($path)){
                $conf = include $path;
                if(isset($conf[$name])){
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                }else{
                    throw new \Exception('没有这个配置项',$name);
                }
            }else{
                log::log('找不到配置文件',$file);
                throw new \Exception('找不到配置文件',$file);
            }
        }

    }
    //引入整个配置文件
    static public function all($file){
        /**
         * 1判断配置文件是否存在
         * 2判断配置是否存在
         * 3缓存配置
         */
        if(isset(self::$conf[$file])){
            return self:: $conf[$file];
        }else{
            $path = KEEN.'/core/config/'.$file.'.php';
            if(is_file($path)){
                $conf = include $path;
                self::$conf[$file] = $conf;
                return $conf;

            }else{
                log::log('找不到配置文件',$file);
                throw new \Exception('找不到配置文件',$file);
            }
        }
    }
}