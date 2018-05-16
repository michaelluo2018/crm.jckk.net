<?php
namespace  app\index\logic;
use think\Model;
use think\Db;
use app\index\model\Log;
use think\Session;

class Message extends Model{

    protected $table="jckk_message";


    //保存
    public  function  save_message($data){

        $message = model("message",'model');
        $message->create_time = time();
        $message->create_uid = Session::get("uid");
        $message_log["type"] = Log::ADD_TYPE;
        $message_log["before_value"] = "";
        $message_log["title"] = "创建系统消息";
        $message->from_uid = $data['from_uid'];
        $message->to_uid = $data['to_uid'];
        $message->title = $data['title'];
        $message->content = $data['content'];
        $message->status = 0;
        if(isset($data['type'])){
            $message->type = $data['type'];
        }
        $message->is_delete = 0;

        if($message->save()){
            $message_log["after_value"] = json_encode($message);
            model("log","logic")->write_log( $message_log);
        }

        return $message->id;



    }


    public function get_message_by_to_uid($to_uid){


    }

    public function get_message_by_from_uid($from_uid){


    }




    public function get_message_by_status($status,$uid){


    }


    public function get_message_count($to_uid,$status){


    }


    //获取一条
    public function get_message($id){

        return  $this->where("id",$id)->find();

    }



    //删除
    public function  delete_message($id){

        $message = $this->where("id",$id)->find();

        //添加日志
        $message_log["type"] = Log::DELETE_TYPE;

        $message_log["before_value"] = json_encode($message);
        $message_log["after_value"] = "";
        $message_log["title"] = "删除".$message->title."(产品)，ID是".$message->id;
        $message->is_delete = 1;
        if($message->save()){
            model("log","logic")->write_log( $message_log);
        }



    }




    



}