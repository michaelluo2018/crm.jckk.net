<?php
namespace  app\index\logic;
use app\index\controller\Common;
use think\Model;
use think\Db;
use app\index\model\Log;
use think\Session;

class Task extends Model{

    protected $table="jckk_task";


    //保存
    public  function  save_task($data,$file,$create_name){

        if(isset($file)){
            $info = $file->validate(['ext'=>'jpg,png,gif,docx,xlsx,xls,pdf,doc,zip,rar,ppt,pptx'])->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                $url = $info->getSaveName();
            }
        }

        if(isset($data['task_id'])){
            //修改
            $task = model("task","model")->where("id",$data['task_id'])->find();
            $task_log["type"] = Log::UPDATE_TYPE;
            $task_log["before_value"] = json_encode($task);
            $task_log["title"] = "更改任务信息";
            //发送系统消息或邮件
            $message_id = $task->message_id;
            $is_send_mail = $task->is_send_mail;
        }
        else{
            //添加
            $task = model("task",'model');
            $task->create_time = time();
            $task->create_uid = Session::get("uid");
            $task_log["type"] = Log::ADD_TYPE;
            $task_log["before_value"] = "";
            $task_log["title"] = "添加新任务";

        }
        if(isset($url)){
            $file_url = DS ."uploads". DS .$url;
            $task->file = $file_url;
        }

        $task->project_id = trim($data['project_id']);
        $task->to_uid = trim($data['uid']);
        $task->task_name = trim($data['task_name']);
        $task->task_describe = trim($data['task_describe']);
        $task->audit_standard = trim($data['audit_standard']);
        $task->task_start = trim($data['task_start']);
        $task->task_end = trim($data['task_end']);
        $task->task_order = trim($data['task_order']);
        $task->is_delete = 0;

        if(isset($data['task_type'])){
            $task->task_type = $data['task_type'];
        }
        else{
            $task->task_type = null;
        }
        if( $task->save()){
            //发送系统消息或邮件
            $url = "/index/task/task_des?id=".$task->id;
            $message = [
                "from_uid"=>Session::get("uid"),
                "to_uid"=>$data['uid'],
                "title"=>"你有新的任务指派待完成",
                "content"=>"<a href='".$url."'>你的同事".$create_name."给你指派了新任务，点击查看</a>"
            ];
            if(isset($data['message']) && $data['message']==1){

                if(isset($message_id)){
                    if(!$message_id){
                        $mess_id = model("message","logic")->save_message($message);
                        $task->message_id = $mess_id;
                    }
                }
                else{
                    $mess_id = model("message","logic")->save_message($message);
                    $task->message_id = $mess_id;
                }

            }

            if(isset($data['is_send_mail']) && $data['is_send_mail']==1){
                $user = model("user")->where("uid",$data['uid'])->find();
                if(isset($is_send_mail)){
                    if(!$is_send_mail){
                        Common::send_mail($user->email,$message['title'],$message['content'],$type = "HTML");
                        $task->is_send_mail = 1;
                    }
                }
                else{
                    Common::send_mail($user->email,$message['title'],$message['content'],$type = "HTML");
                    $task->is_send_mail = 1;
                }
            }
            //历史记录
            $history_data=[
                "task_id" => $task->id,
                "title" => "",
                "before_value" => "",
                "after_value" => "",
            ];
            if(isset($data['task_id'])){
                $history_data['title']=date("Y-m-d H:i:s")."由".$create_name."修改";
            }
            else{
                //添加
                $history_data['title']=date("Y-m-d H:i:s")."由".$create_name."创建";
            }
            model("task_history",'logic')->save_task_history($history_data);
        }




        if($task->save()){
            $task_log["after_value"] = json_encode($task);
            model("log","logic")->write_log( $task_log);
        }


        return $task->id;


    }


    public function save_task_begin($data,$create_name){

        $task = model("task","model")->where("id",$data['id'])->find();
        $task->task_status = 1;
        $task->actual_start = trim($data['actual_start']);

        //发送系统消息或邮件
        $url = "/index/task/task_des?id=".$task->id;
        $message = [
            "from_uid"=>Session::get("uid"),
            "to_uid"=>$task->create_uid,
            "title"=>"你指派的".$task->task_name."已开始",
            "content"=>"<a href='".$url."'>你的同事".$create_name."已经开始了你指派的任务，点击查看</a>"
        ];

        model("message","logic")->save_message($message);
        $task->save();

        //历史记录
        $history_data=[
            "task_id" => $task->id,
            "title" => "",
            "before_value" => "",
            "after_value" => "",
        ];

        $history_data['title']=date("Y-m-d H:i:s")."由".$create_name."开始";
        model("task_history",'logic')->save_task_history($history_data);

    }

    public function save_task_end($data,$file,$create_name){
            $task = model("task","model")->where("id",$data['task_id'])->find();
            if(isset($file)){
                $info = $file->validate(['ext'=>'jpg,png,gif,docx,xlsx,xls,pdf,doc,zip,rar,ppt,pptx'])->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    $url = $info->getSaveName();
                    $file_url =  DS ."uploads". DS .$url;
                    $task->complete_file = $file_url;
                }
            }
            $task->task_status = 2;
            $task->actual_end = trim($data['actual_end']);


            //发送系统消息或邮件
            $url = "/index/task/task_des?id=".$task->id;
            $message = [
                "from_uid"=>Session::get("uid"),
                "to_uid"=>$task->create_uid,
                "title"=>"你指派的".$task->task_name."已完成",
                "content"=>"<a href='".$url."'>你的同事".$create_name."已经完成你指派的任务，点击查看</a>"
            ];

            model("message","logic")->save_message($message);
            $task->save();

            //历史记录
            $history_data=[
                "task_id" => $task->id,
                "title" => "",
                "before_value" => "",
                "after_value" => "",
            ];

            $history_data['title']=date("Y-m-d H:i:s")."由".$create_name."结束";
            model("task_history",'logic')->save_task_history($history_data);
    }



    //获取列表
    public function get_tasks(){
        return Db::table("jckk_task")
            ->alias("t")
            ->field(["t.*","p.project_name","tu.chinese_name as to_name","cu.chinese_name as create_name"])
            ->where("t.is_delete","<>",1)
            ->join("jckk_project p","p.id = t.project_id","LEFT")
            ->join("jckk_user tu","tu.uid = t.to_uid","LEFT")
            ->join("jckk_user cu","cu.uid = t.create_uid","LEFT")
            ->select();

    }



    public function get_tasks_by_project($project_id){


    }


   public function get_tasks_by_create_uid($create_uid){
       return Db::table("jckk_task")
           ->alias("t")
           ->field(["t.*","p.project_name","tu.chinese_name as to_name","cu.chinese_name as create_name"])
           ->where("t.is_delete","<>",1)
           ->where("t.create_uid",$create_uid)
           ->join("jckk_project p","p.id = t.project_id","LEFT")
           ->join("jckk_user tu","tu.uid = t.to_uid","LEFT")
           ->join("jckk_user cu","cu.uid = t.create_uid","LEFT")
           ->select();

   }




    public function get_tasks_by_to_uid($to_uid){
        return Db::table("jckk_task")
            ->alias("t")
            ->field(["t.*","p.project_name","tu.chinese_name as to_name","cu.chinese_name as create_name"])
            ->where("t.is_delete","<>",1)
            ->where("t.to_uid",$to_uid)
            ->join("jckk_project p","p.id = t.project_id","LEFT")
            ->join("jckk_user tu","tu.uid = t.to_uid","LEFT")
            ->join("jckk_user cu","cu.uid = t.create_uid","LEFT")
            ->select();

    }





    //获取一条
    public function get_task($id){

        return   Db::table("jckk_task")
            ->alias("t")
            ->field(["t.*","p.project_name","tu.chinese_name as to_name","cu.chinese_name as create_name"])
            ->where("t.is_delete","<>",1)
            ->where("t.id",$id)
            ->join("jckk_project p","p.id = t.project_id","LEFT")
            ->join("jckk_user tu","tu.uid = t.to_uid","LEFT")
            ->join("jckk_user cu","cu.uid = t.create_uid","LEFT")
            ->find();

    }



    //删除
    public function  delete_task($id,$create_name){

        $task= $this->where("id",$id)->find();

        //添加日志
        $task_log["type"] = Log::DELETE_TYPE;

        $task_log["before_value"] = json_encode($task);
        $task_log["after_value"] = "";
        $task_log["title"] = "删除".$task->task_name;
        $task->is_delete = 1;
        if($task->save()){
            model("log","logic")->write_log( $task_log);
        }
        //发消息给指派者
        $message = [
            "from_uid"=>Session::get("uid"),
            "to_uid"=>$task->to_uid,
            "title"=>"任务被删除",
            "content"=>"你的同事".$create_name."删除了指派给你的任务：".$task->task_name
        ];
       model("message","logic")->save_message($message);



    }







}