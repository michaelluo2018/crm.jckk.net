<?php
namespace  app\index\controller;

use think\Config;
use think\Request;

class Leads extends  Base{


    public function __construct(Request $request = null)
    {
        parent::__construct($request);

        $mid = $this->get_mid_by_url("index/leads/leads");
        $this->menu_id = $mid;
        $this->assign("mid",$this->menu_id);
    }



    public  function  leads(){

        $leads = model("leads","logic")->get_leads();
        $this->assign("leads",$leads);
        return view("leads");
    }


    public function leads_add(){
        if(!$this->check_post_menu_permission("add_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            $leads_from = Config::get("leads_from");
            $this->assign("leads_from", $leads_from);
            return view("leads_add");
        }
    }


    public function ajax_get_user(){
        $chinese_name = Request::instance()->get("user_name");
        $users = model("user","logic")->get_users_by_name($chinese_name);
        if($users){
            return $users;
        }
        else{
            return 0;
        }
    }


    public function save_leads(){
        $data = Request::instance()->post();
        model("leads","logic")->save_leads($data);
        return $this->redirect("leads");
    }


    public function leads_del($id){

        if(!$this->check_post_menu_permission("delete_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            model("leads", "logic")->delete_lead($id);

            $this->redirect("leads");
        }


    }


    public  function  leads_edit($id){
        if(!$this->check_post_menu_permission("update_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            $leads_from=Config::get("leads_from");
            $lead =   model("leads","logic")->get_lead($id);
            $this->assign("leads_from",$leads_from);
            $this->assign("lead",$lead);
            return view("leads_edit");
        }


    }

    public  function  leads_des($id){

            $lead =   model("leads","logic")->get_lead($id);
            $this->assign("lead",$lead);
            return view("leads_des");

    }

    public function  to_customer($id){

        $data = model("customer","logic")->get_customer_entity();
        $lead =   model("leads","logic")->get_lead($id);
        $this->assign("lead",$lead);
        $this->assign("data",$data);
        return view("to_customer");

    }


    //保存客户
    public  function  save_customer(){
        $data = Request::instance()->post();
        $customer_logic =   model("customer",'logic');
        $res = $customer_logic->save_customer($data);
        model("leads","logic")->to_customer($data['lead_id'],$res);
        return $this->redirect("leads");

    }






}