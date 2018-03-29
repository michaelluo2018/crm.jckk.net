<?php

namespace  app\index\controller;
use think\Controller;
use think\Request;
use think\Session;

class Base extends Controller{
    protected $uid;
    function __construct(Request $request = null)
    {
        parent::__construct($request);
       // $this->login(11);
        if($this->is_login()){
            $this->uid = Session::get("uid");
            $user_info = model("user","logic")->get_user($this->uid);
            $this->assign("user_info",$user_info);
        }
        else{
            $this->redirect("login/login");
        }

    }

    protected function login($uid){

        Session::set("uid",$uid);
    }

    protected  function  login_out(){
        Session::delete("uid");
    }

    protected  function is_login(){
        return Session::has("uid");
    }




}