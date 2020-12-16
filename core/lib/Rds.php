<?php
namespace core\lib;

class Rds extends \Redis {
    public static function redis() {
        $redis = new \Redis();
        $redis->connect("127.0.0.1", 6379);
        $redis->auth("Itzler.666");
        return $redis;
    }
}
