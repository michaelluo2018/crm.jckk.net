<?php
namespace  app\index\controller;

use think\Request;

class User extends Base{

    public  function  profile(){

        return view("profile");
    }



    public  function  save_user(){
        $data = Request::instance()->post();
        $file = Request::instance()->file("heard_img");
        $uid = model('user','logic')->save_user($data,$file);
        $this->redirect("system/user_des",["id"=>$uid]);
    }


    public  function user_del($id){

        model("user","logic")->delete_user($id);
        $this->redirect("system/member");
    }


}