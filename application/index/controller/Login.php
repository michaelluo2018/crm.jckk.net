<?php
namespace  app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Cookie;



class Login extends Controller {

    public  function  login(){
        if(Session::has("uid")){
            return $this->redirect("index/index/index");
        }
        $data = Cookie::get("login_data");
        $setting = model("setting","logic")->get_setting();
        $this->assign("setting",$setting);
        return view("login")->assign("data",$data);
    }

    public  function login_in(){
        $data = Request::instance()->post();

        if($uid = model("user","logic")->check_user($data["account"],$data["pwd"],true)){
            Session::set("uid",$uid);
            $value = $uid."^".request()->ip();
            Cookie::set("user",base64_encode($value),3600*24*7);
            if(isset($data["remember_me"])){
                //把账户和密码写入cookie
                 Cookie::set("account",$data['account'],3600*24*365);
                 Cookie::set("pwd",model("user","logic")->password($data['account']),3600*24*365);
            }
            Cookie::delete("login_data");
            $this->redirect("index/index");
        }
        else{
            $data['msg'] = "账号或密码错误,或者用户不存在，请重试！";
            Cookie::set("login_data",$data,10);
            return $this->redirect("login/login");

        }

    }


    public  function  find_pwd(){
        $email = Request::instance()->post("email");
        $title = "密码重置";
        $str = base64_encode($email."^jckk0322^".time());
        $url = "http://localhost/index.php/index/login/reset_pwd?email=".$str;
        $cont = "请点击此链接，按流程进行密码重设，如果点击无效，请将地址手工粘贴到浏览器地址栏访问：";
        $content = "<a href='".$url."'>".$cont."</a>".$url;
        dump($email);die;
        $res = Common::send_mail($email,$title,$content);

        if(!$res){
            //ok
            $this->success("系统已将重置密码的链接安全的发到了您的邮箱，30分钟内有效，请及时查收");
        }
        else{
            $this->error("邮件发送失败");
        }

    }


    public function  reset_pwd(){
        $str = Request::instance()->get("email");
        $arr = explode('^',base64_decode($str));
        $email = $arr[0];
        $time = $arr[2];
        if(($time+30*60)-time()<0){
            //邮件已经过期
            $this->error("邮件已经过期,请重试",url('index/login/login'));
        }
        else{
            return view("reset")->assign("email",$email);
        }
    }


    public  function  change_pwd(){
        $data = Request::instance()->post();
        //更改pwd
       $uid =  model("user","logic")->chang_pwd_by_email($data['email'],$data['pwd1']);
        Session::set("uid",$uid);
        $this->redirect("index/index");
    }

    public  function  check_email(){
        $email = Request::instance()->get("email");
        if(model("user","logic")->is_exist_email($email)){
            return 1;
        }
        else{
            return 2;
        }

    }




}