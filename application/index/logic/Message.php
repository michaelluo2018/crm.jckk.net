<?php
namespace  app\index\logic;
use think\Model;
use think\Db;
use app\index\model\Log as MessageLog;
use think\Session;

class Message extends Model{

    protected $table="jckk_message";


    //保存
    public  function  save_message($data){

        $message = model("message",'model');
        $message->create_time = time();
        $message->create_uid = Session::get("uid");
        $message_log["type"] = MessageLog::ADD_TYPE;
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

        return Db::table("jckk_message")
            ->alias("m")
            ->field(["m.*","tu.chinese_name as to_name","cu.chinese_name as create_name","fu.chinese_name as from_name"])
            ->where("m.is_delete","<>",1)
            ->where("m.to_uid",$to_uid)
            ->join("jckk_user tu","tu.uid = m.to_uid","LEFT")
            ->join("jckk_user fu","fu.uid = m.from_uid","LEFT")
            ->join("jckk_user cu","cu.uid = m.create_uid","LEFT")
            ->paginate();
    }

    public function get_message_by_from_uid($from_uid){
        return Db::table("jckk_message")
            ->alias("m")
            ->field(["m.*","tu.chinese_name as to_name","cu.chinese_name as create_name","fu.chinese_name as from_name"])
            ->where("m.is_delete","<>",1)
            ->where("m.from_uid",$from_uid)
            ->join("jckk_user tu","tu.uid = m.to_uid","LEFT")
            ->join("jckk_user fu","fu.uid = m.from_uid","LEFT")
            ->join("jckk_user cu","cu.uid = m.create_uid","LEFT")
            ->paginate();

    }



    public function get_message_by_status($status,$uid){
        return Db::table("jckk_message")
            ->alias("m")
            ->field(["m.*","tu.chinese_name as to_name","cu.chinese_name as create_name","fu.chinese_name as from_name"])
            ->where("m.is_delete","<>",1)
            ->where("m.status",$status)
            ->where("m.to_uid",$uid)
            ->join("jckk_user tu","tu.uid = m.to_uid","LEFT")
            ->join("jckk_user fu","fu.uid = m.from_uid","LEFT")
            ->join("jckk_user cu","cu.uid = m.create_uid","LEFT")
            ->paginate();
    }


    public function get_message_count($to_uid,$status){

        return $this->where(["to_uid"=>$to_uid,"status"=>$status,"is_delete"=>0])->count();
    }


    //获取一条
    public function get_message($id){

        return Db::table("jckk_message")
            ->alias("m")
            ->field(["m.*","tu.chinese_name as to_name","fu.chinese_name as from_name"])
            ->where("m.id",$id)
            ->join("jckk_user tu","tu.uid = m.to_uid","LEFT")
            ->join("jckk_user fu","fu.uid = m.from_uid","LEFT")
            ->find();

    }


    public function read_message($id,$uid){
        $message = $this->where("id",$id)->find();
       if($message->to_uid == $uid){
           $message->status = 1;
           $message->save();
       }

    }


    public function check_permission_to_read($id,$uid){
       $res1 =  $this->where("id",$id)->where("to_uid",$uid)->count();
       $res2 =  $this->where("id",$id)->where("from_uid",$uid)->count();

       if($res1 || $res2){
           return true;
       }
       else{
           return false;
       }
    }



    //删除
    public function  delete_message($id){

        $message = $this->where("id",$id)->find();

        //添加日志
        $message_log["type"] = MessageLog::DELETE_TYPE;

        $message_log["before_value"] = json_encode($message);
        $message_log["after_value"] = "";
        $message_log["title"] = "删除".$message->title."(产品)，ID是".$message->id;
        $message->is_delete = 1;
        if($message->save()){
            model("log","logic")->write_log( $message_log);
        }

    }




    



}