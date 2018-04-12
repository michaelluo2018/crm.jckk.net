<?php

namespace  app\index\controller;

use think\Config;
use think\Cookie;
use think\Request;

class System extends Base{

    public function organization($id = null){

        $data= model("department","logic")->get_organization($id);

        return view("organization")->assign("data",$data);
    }





    public function save_department(){
       $data = Request::instance()->post();

       model("department","logic")->save_department($data);
       $this->redirect("organization");

    }


     public function save_post(){
           $data = Request::instance()->post();
           model("post","logic")->save_post($data);
           $this->redirect("organization",["id"=>$data['post_department_id']]);

        }


    //部门删除
    public function department_del($id){

        model('department','logic')->delete_department($id);
        $this->redirect("organization");
    }


    //岗位删除
    public function post_del($id,$depart_id){

        model('post','logic')->delete_post($id);
        $this->redirect("organization",["id"=>$depart_id]);
    }



    public function member(){
        $users = model("user","logic")->get_users();

        return view("member")->assign("users",$users);
    }


    public function member_add(){
        //部门
        $departments = model('department','logic')->get_departments();

        return view("member_add")->assign("departments",$departments);
    }

    public function ajax_get_post(){
        $department_id = Request::instance()->get("department_id");
        $data= model("department","logic")->get_organization($department_id);

        foreach ( $data["posts"] as $k=>$post){
            if($count = $post->count){
                $count = ($count/15)*5;
                $post->post_name = ($this->write_space($count)).$post->post_name;
            }
        }

       return  $data["posts"];
    }

    public function write_space($num){
        $str = "";
        for($i=0;$i<$num;$i++){
            $str .= "&nbsp";
        }
        return $str;
    }

    public function user_edit($id){
        $user = model("user","logic")->get_user($id);
        $departments = model('department','logic')->get_departments();
        return view("member_edit")->assign("departments",$departments)->assign("user",$user);
    }


    public function user_des($id){
            $user = model("user","logic")->get_user($id);

            return view("member_des")->assign("user",$user);
        }




    public function system_settings(){
        $settings = model("setting","logic")->get_setting();

        return view("system_settings")->assign("settings",$settings);
    }

    public function setting_save(){

        $datas = Request::instance()->post();
        $files = Request::instance()->file();
        if(isset($datas["system_email_pwd"])){
            $datas["system_email_pwd"] = base64_encode($datas["system_email_pwd"]);
        }
       if($datas && !empty($datas)){
           model("setting","logic")->save_settings($datas);
       }
       if($files && !empty($files)){
           model("setting","logic")->save_settings($files,true);
       }

        return $this->redirect("system_settings");
    }


    public function system_fields(){

        return view("system_fields");
    }



    public function check_user_mobile(){

        $mobile = Request::instance()->get("mobile");
        $uid = Request::instance()->get("uid");

        if($mobile){
            if(model("user","logic")->check_mobile($mobile,$uid)){
                return 1;
            }
        }

        return 0;

    }


    public function check_user_email(){

        $email = Request::instance()->get("email");
        $uid = Request::instance()->get("uid");
        if($email){
            if(model("user","logic")->check_email($email,$uid)){
               return 1;
            }
        }

        return 0;
    }


    public  function  feedback(){

        if(Cookie::has("feedback".$this->uid)){
            $msg = "您10分钟内已经添加过意见反馈";
        }
        else{
            $data = Request::instance()->post();
            Cookie::set("feedback".$this->uid,$data,600);
            model("feedback","logic")->save_feedback($data);
            $msg = "我们已经收到您的反馈，谢谢！";
        }


        echo "<script>alert(\" ".$msg."\"); history.back(-1);</script>";
    }





}