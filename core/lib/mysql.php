<?php

namespace core\lib;

class mysql {
    public static function mysql() {
        $dbms='mysql';     //数据库类型
        $host='localhost'; //数据库主机名
        $dbName='test';    //使用的数据库
        $user='root';      //数据库连接用户名
        $pass='Itzler.666';          //对应的密码
        $dsn="$dbms:host=$host;dbname=$dbName";
        try {
            return new \PDO($dsn, $user, $pass, array(\PDO::ATTR_PERSISTENT => true));
        } catch (\PDOException $e) {
            log::log("Error!: " . $e->getMessage() . "<br/>");die;
        }
    }
}
