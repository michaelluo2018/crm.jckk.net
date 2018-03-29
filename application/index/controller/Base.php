<?php

namespace  app\index\controller;
use think\Controller;
use think\Cookie;
use think\Request;
use think\Session;

class Base extends Controller{
    protected $uid;
    function __construct(Request $request = null)
    {
        parent::__construct($request);

        if(!$this->is_login()){
            if(!$this->is_remember_me()){
                $this->redirect("login/login");
            }
        }
        $this->uid = Session::get("uid");
        $user_info = model("user","logic")->get_user($this->uid);
        $this->assign("user_info",$user_info);
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

    protected function is_remember_me(){
        $account = Cookie::get("account");
        $pwd = Cookie::get("pwd");
        if($account && $pwd){
            if( $uid = model("user","logic")->check_user($account,$pwd)){
                 $this->login($uid);
                 return true;
            }
        }

    }


}