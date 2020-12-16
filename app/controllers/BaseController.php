<?php

namespace app\controllers;

use core\Base;

class BaseController extends Base
{
    public function success($data=[], $code=0, $msg="success") {
        header('Content-Type:application/json; charset=utf-8');
        $res = [
            "code" => $code,
            "msg" => $msg,
            "data" => $data
        ];
        echo json_encode($res);exit;
    }

    public function fail($code=999, $msg="fail") {
        header('Content-Type:application/json; charset=utf-8');
        $res = [
            "code" => $code,
            "msg" => $msg,
            "data" => []
        ];
        echo json_encode($res);exit;
    }
}