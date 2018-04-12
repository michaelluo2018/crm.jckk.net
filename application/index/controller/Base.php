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
        //系统设置
        $setting = model("setting","logic")->get_setting();
        $key = ($this->uid).'system_theme';
        if(isset($setting[$key])){
            $setting['system_theme'] = $setting[$key];
        }

        $this->assign("setting",$setting);
        //总客户，总项目
        $total_customer = model("customer","logic")->total_customer();
        $total_project = model("project","logic")->total_project();
        $this->assign("total_customer",$total_customer);
        $this->assign("total_project",$total_project);


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