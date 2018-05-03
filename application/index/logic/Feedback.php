<?php
namespace  app\index\logic;
use think\Db;
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


    public  function  get_feedbacks(){

        return Db::table("jckk_feedback")
            ->field(["jckk_feedback.*","jckk_user.chinese_name"])
            ->join("jckk_user","jckk_user.uid=jckk_feedback.create_uid")
            ->paginate();
    }

    public  function  get_feedback($id){

        return $this->where("id",$id)->find();
    }






}