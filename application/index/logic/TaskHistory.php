<?php
namespace  app\index\logic;
use think\Model;
use think\Db;
use app\index\model\Log;
use think\Session;

class TaskHistory extends Model{

    protected $table="jckk_task_history";


    //保存
    public  function  save_task_history($data,$file){




    }

    //获取列表
    public function get_task_history_by_task($task_id){

        return  $this->where("task_id",$task_id)->order("create_time","asc")->select();

    }



    //获取一条
    public function get_task_history($id){

        return  $this->where("id",$id)->find();

    }



    //删除
    public function  delete_task_history($id){

        $task_history = $this->where("id",$id)->find();

        //添加日志
        $task_history_log["type"] = Log::DELETE_TYPE;

        $task_history_log["before_value"] = json_encode($task_history);
        $task_history_log["after_value"] = "";
        $task_history_log["title"] = "删除".$task_history->title."(产品)，ID是".$task_history->id;
        $task_history->is_delete = 1;
        if($task_history->save()){
            model("log","logic")->write_log( $task_history_log);
        }



    }







}