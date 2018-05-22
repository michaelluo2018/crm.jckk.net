<?php
namespace  app\index\controller;

use think\Config;
use think\Request;

class Leave extends Base {

    //列表
    public function leave(){

        $leaves =  model('leave','logic')->get_leaves();

        $this->assign("leaves",$leaves);
        return view("leave");
    }

    //添加
    public function leave_add(){

        $leave_type = Config::get("leave_type");
        //获取我的部门领导
        $leader_users = model("user","logic")->get_my_leaders();
        $this->assign("leader_users",$leader_users);
        $this->assign("leave_type",$leave_type);
        return view("leave_add");

    }



    //保存
    public function save_leave(){
        $data = Request::instance()->post();
        $user_info = $this->user_info;
        $res = model("leave","logic")->save_leave($data,$user_info['chinese_name']);
        if($res){
            $this->redirect("leave");
        }
    }


    //修改

    public function  leave_edit($id){

        if(!$this->check_post_menu_permission("update_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {

            $leave = model("leave", "logic")->get_leave($id);
            $leave_type = Config::get("leave_type");
            $this->assign("leave_type",$leave_type);
            $this->assign('leave',$leave);
            return view("leave_edit");
        }
    }


    //删除

    public function  leave_del($id){
        if(!$this->check_post_menu_permission("delete_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            model("leave", "logic")->delete_leave($id);

            $this->redirect("leave");
        }

    }


    //信息查看

    public function  leave_des($id){

        //获得一条项目信息
        $leave = model("leave", "logic")->get_leave($id);
        $this->assign('leave',$leave);
        return view("leave_des");

    }


    public  function  ajax_get_leave(){
        $leave_name = Request::instance()->get("leave_name");
        $leaves = model("leave","logic")->get_leave_by_name($leave_name);
        if($leaves){
            return $leaves;
        }
        else{
            return 0;
        }
    }

















}