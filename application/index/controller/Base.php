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
        $value = $uid."^".request()->ip()."^".time();
        Cookie::set("user",base64_encode($value),3600*24*7);
    }

    protected  function  login_out(){
        Session::delete("uid");
        Cookie::delete("user");
    }

    protected  function is_login(){
        if(Session::has("uid")){
            return true;
        }else{
           if($value = Cookie::get("user")){
               $arr = explode("^",base64_decode($value));
               $ip = request()->ip();

               if($arr[1] == $ip){
                   Session::set("uid",$arr[0]);
                   return true;
               }

           }
        }

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