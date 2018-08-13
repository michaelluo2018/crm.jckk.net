<?php
namespace  app\common\logic;
use think\Model;
use think\Db;
use app\common\model\Log;
use think\Session;

class TaskTime extends Model{

    protected $table="jckk_task_time";


    //保存
    public  function  save_task_time($data,$file,$create_name){

        if(isset($file)){
            $info = $file->validate(['ext'=>'jpg,png,gif,docx,xlsx,xls,pdf'])->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                $url = $info->getSaveName();
            }
        }
        if(isset($data['id'])){
            //修改
            $task_time = model("task_time","model")->where("id",$data['id'])->find();
            $task_log["type"] = Log::UPDATE_TYPE;
            $task_log["before_value"] = json_encode($task_time);
            $task_log["title"] = "更改工时信息";
        }
        else{
            //添加
            $task_time = model("task_time",'model');
            $task_time->create_time = time();
            $task_time->create_uid = Session::get("uid");
            $task_log["type"] = Log::ADD_TYPE;
            $task_log["before_value"] = "";
            $task_log["title"] = "添加新工时";

        }
        if(isset($url)){
            $file_url = "/uploads/".$url;
            $task_time->file = $file_url;
        }

        $task_time->task_id = trim($data['task_id']);
        $task_time->title = trim($data['title']);
        $task_time->note = trim($data['note']);
        $task_time->start_time = trim($data['start_time']);
        $task_time->end_time = trim($data['end_time']);
        $task_time->save();

        //发送系统消息或邮件
        $url = "/index/task/task_des?id=".$data['task_id'];
        $message = [
            "from_uid"=>Session::get("uid"),
            "to_uid"=>$data['create_uid'],
            "title"=>"你创建的任务有新的工时进展",
            "content"=>"<a href='".$url."'>你的同事".$create_name."给任务添加了新的工时进展，点击查看</a>"
        ];
        if(!isset($data['id'])){
            model("message","logic")->save_message($message);
        }

        if($task_time->save()){
            $task_log["after_value"] = json_encode($task_time);
            model("log","logic")->write_log( $task_log);
        }
        return $task_time->id;




    }


    //获取列表
    public function get_task_time_by_task($task_id){

        return   Db::table("jckk_task_time")
            ->alias("task_time")
            ->field(["task_time.*","user.chinese_name"])
            ->where("task_time.task_id",$task_id)
            ->join("jckk_user user","user.uid=task_time.create_uid","LEFT")
            ->select();
    }



    //获取一条
    public function get_task_time($id){

        return  $this->where("id",$id)->find();

    }



    //删除
    public function  delete_task_time($id){

        $task_time = $this->where("id",$id)->find();

        //添加日志
        $task_time_log["type"] = Log::DELETE_TYPE;

        $task_time_log["before_value"] = json_encode($task_time);
        $task_time_log["after_value"] = "";
        $task_time_log["title"] = "删除".$task_time->title."(产品)，ID是".$task_time->id;
        $task_time->is_delete = 1;
        if($task_time->save()){
            model("log","logic")->write_log( $task_time_log);
        }



    }







}