<?php
namespace app\controllers;
use app\model\articlesModel;
use core\lib\Rds;

class homeController extends BaseController {
    public function index(){
        // 操作mysql的demo
        $ar = new articlesModel();
        $res = $ar->getAll();
        $this->fail();

        // 操作redis的demo
        $frame_name = Rds::redis()->get("framework");
        $result = $frame_name ? $frame_name : "iszeng";
        $this->assign('data',$result);
        $this->display('welcome.html');
    }
}