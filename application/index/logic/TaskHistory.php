<?php
namespace  app\index\logic;
use think\Model;
use think\Session;

class TaskHistory extends Model{

    protected $table="jckk_task_history";


    //保存
    public  function  save_task_history($data){

        $task_history = model("task_history",'model');
        $task_history->task_id = $data['task_id'];
        $task_history->title = $data['title'];
        $task_history->before_value = $data['before_value'];
        $task_history->after_value = $data['after_value'];
        $task_history->create_time = time();
        $task_history->create_uid = Session::get("uid");
        $task_history->save();

    }

    //获取列表
    public function get_task_history_by_task($task_id){

        return  $this->where("task_id",$task_id)->order("create_time","asc")->select();

    }










}