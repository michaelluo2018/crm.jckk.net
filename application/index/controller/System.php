<?php

namespace  app\index\controller;
use think\Controller;
use think\Request;

class System extends Controller{

    public function organization($id = null){

        $data= model("department","logic")->get_organization($id);
        return view("organization")->assign("data",$data);
    }


    public function save_department(){
       $data = Request::instance()->post();
         //dump($data);die;
       model("department","logic")->save_department($data);
       $this->redirect("organization");

    }

     public function save_post(){
           $data = Request::instance()->post();
          // dump($data);die;
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

       return model("post","logic")->get_posts_by_department($department_id);
    }


    public  function  save_user(){
        $data = Request::instance()->post();
        $file = Request::instance()->file("heard_img");
        model('user','logic')->save_user($data,$file);
        $this->redirect("member");
    }

    public  function user_del($id){

        model("user","logic")->delete_user($id);
        $this->redirect("member");
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














}