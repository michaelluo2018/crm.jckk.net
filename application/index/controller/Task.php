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
        $uids = $this->check_post_menu_range_permission();
        if($uids == "all") {
            $tasks =  model('task','logic')->get_tasks();
        }else{
            $tasks =  model('task','logic')->get_tasks($uids);
        }

        $this->assign("title","所有任务");
        $this->assign("tasks",$tasks);
        return view("task");
    }

  //列表
    public function task_to(){

        $tasks =  model('task','logic')->get_tasks_by_to_uid($this->uid);
        $this->assign("title","待办任务");
        $this->assign("tasks",$tasks);
        return view("task");
    }

  //列表
    public function task_from(){

        $tasks =  model('task','logic')->get_tasks_by_create_uid($this->uid);
        $this->assign("title","我创建任务");
        $this->assign("tasks",$tasks);
        return view("task");
    }

//列表
    public function project_task($id,$n){

        $tasks =  model('task','logic')->get_tasks_by_project($id);
        $this->assign("title",$n."的任务");
        $this->assign("tasks",$tasks);
        return view("task");
    }





    //添加
    public function task_add($id=null){


        if(!$this->check_post_menu_permission("add_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            if($id){
                $project = model("project")->where("id",$id)->find();
                $this->assign("project",$project);
            }
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

    public function  task_del($id,$cd){
        if($this->uid != $cd){
            echo "<script> alert('你不是任务创建者，没有权限！');history.back(-1);</script>";
        }
        else {
            $user_info = $this->user_info;
            model("task", "logic")->delete_task($id,$user_info['chinese_name']);

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


    public function save_task_end(){
        $data = Request::instance()->post();
        $file = Request::instance()->file("complete_file");
        $user_info = $this->user_info;
        model("task","logic")->save_task_end($data,$file,$user_info['chinese_name']);

        $this->redirect("task_des",["id"=>$data['task_id']]);
    }



    public function download_file($p){
        $file = $p;
        $array = explode(".",$file);
        $ext = $array[1];
        $filename = ROOT_PATH.'public'.$file;

        if(in_array($ext,['jpg','png','gif'])){
            if($ext=='jpg'){
                header('Content-Type: image/jpeg');
            }
           else{
               header('Content-Type: image/'.$ext);
           }

        }

       elseif(in_array($ext,['xlsx','xls'])){
           header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
           header('Content-Transfer-Encoding: binary');
           header('Content-Length: '.filesize($filename));
           header('Cache-Control: must-revalidate');
           header('Pragma: public');

        }
         else{
             header('Content-type: application/'.$ext);
         }
        header('Content-Disposition: attachment; filename='.basename($filename));
        readfile($filename);
        exit;
    }





}