<?php
namespace  app\common\logic;
use think\Model;
use think\Session;

class TaskHistory extends Model{

    protected $table="jckk_task_history";


    //保存
    public  function  save_task_history($data){

        $task_history = model("task_history",'model');
        $data['create_time'] = time();
        $data['create_uid'] = Session::get("uid");
        $task_history->insert($data);

    }

    //获取列表
    public function get_task_history_by_task($task_id){

        return  $this->where("task_id",$task_id)->order("create_time","asc")->select();

    }










}