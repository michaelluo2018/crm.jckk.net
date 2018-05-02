<?php
namespace  app\index\logic;
use think\Model;
use app\index\model\Log;

class Feedback extends  Model{

    protected $table="jckk_feedback";

    public  function  save_feedback($data){

        $data['create_time'] = time();
        $feedback = model("feedback","model");
         if($feedback->save($data)){
             $log["type"] = Log::ADD_TYPE;
             $log["before_value"] = "";
             $log["after_value"] = json_encode($feedback);
             $log["title"] = "添加反馈意见";
             model("log","logic")->write_log( $log);

         }


    }







}