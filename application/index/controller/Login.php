<?php
namespace  app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Cookie;



class Login extends Controller {

    public  function  login(){

        $data = Session::get("login_data");

        return view("login")->assign("data",$data);
    }

    public  function login_in(){
        $data = Request::instance()->post();

        if($uid = model("user","logic")->check_user($data["account"],$data["pwd"],true)){
            Session::set("uid",$uid);
            if(isset($data["remember_me"])){
                //把账户和密码写入cookie
                 Cookie::set("account",$data['account'],3600*24*365);
                 Cookie::set("pwd",model("user","logic")->password($data['account']),3600*24*365);
            }
            Session::delete("login_data");
            $this->redirect("index/index");
        }
        else{
            $data['msg'] = "账号或密码错误，请重试！";
            Session::set("login_data",$data);
            return $this->redirect("login/login");

        }

    }
}