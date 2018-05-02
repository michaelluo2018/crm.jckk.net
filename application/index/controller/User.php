<?php
namespace  app\index\controller;

use think\Request;

class User extends Base{

    public  function  profile(){

        //本人操作日志
        $my_logs = model("log","logic")->get_logs($this->uid);
        return view("profile")->assign("my_logs",$my_logs);
    }



    public  function  save_user(){

        if(!$this->check_post_menu_permission("update_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
       else{
           $data = Request::instance()->post();
           $file = Request::instance()->file("heard_img");
           $uid = model('user','logic')->save_user($data,$file);
           $this->redirect("system/user_des",["id"=>$uid]);
       }

    }


    public  function user_del($id){


        if(!$this->check_post_menu_permission("delete_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            model("user", "logic")->delete_user($id);
            $this->redirect("system/member");
        }
    }


}