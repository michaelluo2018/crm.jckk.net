<?php
namespace  app\index\logic;
use think\Model;
use think\Db;
use app\index\model\Log;
use think\Session;

class Task extends Model{

    protected $table="jckk_task";


    //保存
    public  function  save_task($data,$file){
        
        
        if(isset($file)){
            $info = $file->validate(['ext'=>'jpg,png,gif,docx,xlsx,xls,pdf'])->move(ROOT_PATH . 'public' . DS . 'uploads');
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
            $file_url = "/uploads/".$url;
            $task->file = $file_url;
        }

        $task->project_id = trim($data['project_id']);
        $task->to_uid = trim($data['to_uid']);
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

        if($task->save()){
            $task_log["after_value"] = json_encode($task);
            model("log","logic")->write_log( $task_log);
        }

        return $task->id;


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


   }




    public function get_tasks_by_to_uid($to_uid){


    }





    //获取一条
    public function get_task($id){

        return  $this->where("id",$id)->find();

    }



    //删除
    public function  delete_task($id){

        $task= $this->where("id",$id)->find();

        //添加日志
        $task_log["type"] = Log::DELETE_TYPE;

        $task_log["before_value"] = json_encode($task);
        $task_log["after_value"] = "";
        $task_log["title"] = "删除".$task->task_name."(产品)，ID是".$task->id;
        $task->is_delete = 1;
        if($task->save()){
            model("log","logic")->write_log( $task_log);
        }



    }







}