<?php
namespace  app\index\controller;

use think\Config;
use think\Request;

class Task extends Base {

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $mid = $this->get_mid_by_url("index/task/task");
        $this->menu_id = $mid;
        $this->assign("mid",$this->menu_id);

    }

    //列表
    public function task(){

        $tasks =  model('task','logic')->get_tasks();

        $this->assign("tasks",$tasks);
        return view("task");
    }



    //添加
    public function task_add(){


        if(!$this->check_post_menu_permission("add_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            $task_type = Config::get("task_type");
            $this->assign("task_type",$task_type);
            return view("task_add");
        }
    }



    //保存
    public function save_task(){
        $data = Request::instance()->post();
        $file = Request::instance()->file("file");
        $user_info = $this->user_info;
        $res = model("task","logic")->save_task($data,$file,$user_info['chinese_name']);
        if($res){
            $this->redirect("task");
        }
    }


    //修改

    public function  task_edit($id,$cd){

        if($this->uid != $cd){
            echo "<script> alert('你不是任务添加者，没有权限修改！');history.back(-1);</script>";
        }
        else {

            $task = model("task", "logic")->get_task($id);
            $task_type = Config::get("task_type");
            $this->assign("task_type",$task_type);
            $this->assign('task',$task);
            return view("task_edit");
        }
    }


    //删除

    public function  task_del($id){
        if(!$this->check_post_menu_permission("delete_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            model("task", "logic")->delete_task($id);

            $this->redirect("task");
        }

    }


    //信息查看

    public function  task_des($id){

        //获得一条项目信息
        $task = model("task", "logic")->get_task($id);
        $task_history = model("task_history", "logic")->get_task_history_by_task($id);
        $task_time = model("task_time", "logic")->get_task_time_by_task($id);
        $this->assign('task',$task);
        $this->assign('task_history',$task_history);
        $this->assign('task_time',$task_time);
        return view("task_des");

    }




    public function save_task_begin(){
        $data = Request::instance()->post();
        $user_info = $this->user_info;
        model("task","logic")->save_task_begin($data,$user_info['chinese_name']);

        $this->redirect("task_des",["id"=>$data['id']]);

    }


    public function save_task_time(){
        $data = Request::instance()->post();
        $file = Request::instance()->file("file");
        $user_info = $this->user_info;
        model("task_time","logic")->save_task_time($data,$file,$user_info['chinese_name']);

        $this->redirect("task_des",["id"=>$data['task_id']]);

    }












}