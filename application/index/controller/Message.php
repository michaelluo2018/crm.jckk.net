<?php
namespace  app\index\controller;

use think\Config;
use think\Request;

class Message extends Base {

    //列表
    public function message_nav(){

        $messages =  model('message','logic')->get_message_by_status(0,$this->uid);

        $this->assign("messages",$messages);
        return view("message_nav");
    }
    //列表
    public function read_message(){

        $messages =  model('message','logic')->get_message_by_status(0,$this->uid);

        $this->assign("messages",$messages);
        return view("message_read");
    }
    //列表
    public function create_message(){

        $messages =  model('message','logic')->get_message_by_status(0,$this->uid);

        $this->assign("messages",$messages);
        return view("message_create");
    }

    //添加
    public function message_add(){



            $message_type = Config::get("message_type");
            $this->assign("message_type",$message_type);
            return view("message_add");

    }



    //保存
    public function save_message(){
        $data = Request::instance()->post();
        $file = Request::instance()->file("img");
        $res = model("message","logic")->save_message($data,$file);
        if($res){
            $this->redirect("message");
        }
    }


    //修改

    public function  message_edit($id){



            $message = model("message", "logic")->get_message($id);
            $message_type = Config::get("message_type");
            $this->assign("message_type",$message_type);
            $this->assign('message',$message);
            return view("message_edit");

    }


    //删除

    public function  message_del($id){

            model("message", "logic")->delete_message($id);

            $this->redirect("message");

    }


    //信息查看

    public function  message_des($id){

        //获得一条项目信息
        $message = model("message", "logic")->get_message($id);
        $this->assign('message',$message);
        return view("message_des");

    }



















}