<?php
namespace  app\index\controller;


use think\Request;

class Logs extends Base
{

    public function index(){
       $logs = model("log","logic")->get_logs();

       return view("index")->assign("logs",$logs);
    }


    public function log_des(){
        $id = Request::instance()->get('id');
        $log = model("log","logic")->get_log($id);

        return view("log_des")->assign("log",$log);

    }

    public function ajax_delete_logs(){
        $day = Request::instance()->get("day");
        $time = date("Y-m-d H:i:s",time() - $day*3600*24);

       return model("log","logic")->delete_logs_by_time($time);
    }


}