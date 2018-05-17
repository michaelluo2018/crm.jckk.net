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

        $messages =  model('message','logic')->get_message_by_status(1,$this->uid);

        $this->assign("messages",$messages);
        return view("message_read");
    }
    //列表
    public function create_message(){

        $messages =  model('message','logic')->get_message_by_from_uid($this->uid);

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
        //检测是不是我发的，或者是不是发给我的
        $premission = model("message","logic")->check_permission_to_read($id,$this->uid);
        if($premission){
            //获得一条项目信息
            $message = model("message", "logic")->get_message($id);
            //信息标为已读
            model("message", "logic")->read_message($id,$this->uid);
            $this->assign('message',$message);
            return view("message_des");
        }
        else{
            echo "<script>alert('你没有权限查看!');history.back(-1);</script>";
        }


    }



















}