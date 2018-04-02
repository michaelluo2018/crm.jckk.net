<?php
namespace  app\index\controller;


class Logs extends Base
{

    public function index(){
       $logs = model("log","logic")->get_logs();

       return view("index")->assign("logs",$logs);
    }



    public function log_des($id){

        $log = model("log","logic")->get_log($id);

        return view("log_des")->assign("log",$log);

    }



}