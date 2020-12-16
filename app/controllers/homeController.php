<?php
namespace app\controllers;
use core\lib\mysql;
use core\lib\Rds;

class homeController extends BaseController {
    public function index(){
        $res = mysql::mysql()->prepare("select * from Employee");
        $res->execute();
        $res = $res->fetchAll();
        $this->success($res);

        // 操作redis的demo
//        $frame_name = Rds::redis()->get("framework");
//        $result = $frame_name ? $frame_name : "iszeng";
//        $this->success($result);
    }
}