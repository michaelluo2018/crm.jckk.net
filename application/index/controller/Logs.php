<?php
namespace  app\index\controller;

use think\Controller;

use app\index\model\Log;

class Logs extends Controller
{

    public function index(){
        $data['type'] = Log::ADD_TYPE;
        $data['before_value'] = "before";
        $data['after_value'] = "after";
        model("log","logic")->write_log( $data);
    }






}