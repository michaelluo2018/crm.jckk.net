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








    public function member(){


    }


    public function member_add(){


    }




















}