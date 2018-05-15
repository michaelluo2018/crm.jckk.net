<?php
namespace  app\index\controller;

use think\Config;
use think\Request;

class Message extends Base {

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $mid = $this->get_mid_by_url("index/message/message");
        $this->menu_id = $mid;
        $this->assign("mid",$this->menu_id);

    }

    //列表
    public function message(){

        $messages =  model('message','logic')->get_messages();

        $this->assign("messages",$messages);
        return view("message");
    }

    //添加
    public function message_add(){


        if(!$this->check_post_menu_permission("add_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            $message_type = Config::get("message_type");
            $this->assign("message_type",$message_type);
            return view("message_add");
        }
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

        if(!$this->check_post_menu_permission("update_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {

            $message = model("message", "logic")->get_message($id);
            $message_type = Config::get("message_type");
            $this->assign("message_type",$message_type);
            $this->assign('message',$message);
            return view("message_edit");
        }
    }


    //删除

    public function  message_del($id){
        if(!$this->check_post_menu_permission("delete_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            model("message", "logic")->delete_message($id);

            $this->redirect("message");
        }

    }


    //信息查看

    public function  message_des($id){

        //获得一条项目信息
        $message = model("message", "logic")->get_message($id);
        $this->assign('message',$message);
        return view("message_des");

    }



















}