<?php


namespace app\controllers;


use core\Base;
use function MongoDB\BSON\toJSON;

class BaseController extends Base
{
    public function success($data=[], $code=0, $msg="success") {
        header('Content-Type:application/json; charset=utf-8');
        $res = [
            "code" => $code,
            "msg" => $msg,
            "data" => $data
        ];
        exit(json_encode($res));
    }

    public function fail($code=999, $msg="fail") {
        header('Content-Type:application/json; charset=utf-8');
        $res = [
            "code" => $code,
            "msg" => $msg,
            "data" => []
        ];
        return exit(json_encode($res));
    }
}