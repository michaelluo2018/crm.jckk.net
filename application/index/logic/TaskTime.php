<?php
namespace  app\index\logic;
use think\Model;
use think\Db;
use app\index\model\Log;
use think\Session;

class TaskTime extends Model{

    protected $table="jckk_task_time";


    //保存
    public  function  save_task_time($data,$file){




    }

    //获取列表
    public function get_task_time_by_task($task_id){


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