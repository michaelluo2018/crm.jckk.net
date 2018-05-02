<?php

namespace  app\index\controller;

use think\Request;

class Announcement extends  Base{

    public function __construct(Request $request = null)
    {
        parent::__construct($request);

        $mid = $this->get_mid_by_url("index/announcement/announcement_list");
        $this->menu_id = $mid;
        $this->assign("mid",$this->menu_id);

    }

    public function announcement_add(){

        if(!$this->check_post_menu_permission("add_operate")){

            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            return view("announcement_add");
        }

    }



    public function  announcement_edit($id){
        if(!$this->check_post_menu_permission("update_operate")){

            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            $announcement = model("announcement","logic")->get_announcement_by_id($id);

            $this->assign("edit_announcement",$announcement);

            return view("announcement_edit");
        }
    }


    public  function  announcement_list(){

        return view("announcement_list");

    }

    public function save_announcement(){

        $data = Request::instance()->post();
        model("announcement","logic")->save_announcement($data);
        return $this->redirect("announcement_list");
    }


    public function announcement_del($id){
        if(!$this->check_post_menu_permission("delete_operate")){

            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            model("announcement","logic")->delete_announcement($id);

            return $this->redirect("announcement_list");
        }

    }


    public  function  announcement_des($id){

        $announcement = model("announcement","logic")->get_announcement_by_id($id);

        $this->assign("des_announcement",$announcement);

        return view("announcement_des");
    }






























}
