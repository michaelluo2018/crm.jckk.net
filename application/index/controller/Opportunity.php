<?php
namespace  app\index\controller;

use think\Config;

use think\Request;

class Opportunity extends Base {

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $mid = $this->get_mid_by_url("index/opportunity/opportunity");
        $this->menu_id = $mid;
        $this->assign("mid",$this->menu_id);

    }

    //项目列表
    public function opportunity(){

        $opportunities = model("opportunity", "logic")->get_opportunities();

        return  view("opportunity")->assign("opportunities",$opportunities);

    }



    //添加
    public function opportunity_add(){


        if(!$this->check_post_menu_permission("add_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            $opportunity_entity = model("opportunity","logic")->get_opportunity_entity();
            $this->assign("opportunity_entity",$opportunity_entity);
            return view("opportunity_add");
        }
    }



    //保存
    public function save_opportunity(){
        $data = Request::instance()->post();
//        dump($data);die;
        $res = model("opportunity","logic")->save_opportunity($data);
        if($res){
            $this->redirect("opportunity");
        }
    }


    //修改

    public function  opportunity_edit($id){

        if(!$this->check_post_menu_permission("update_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {

            $opportunity = model("opportunity", "logic")->get_opportunity($id);
            $this->assign("opportunity",$opportunity);
            $opportunity_entity = model("opportunity","logic")->get_opportunity_entity();
            $this->assign("opportunity_entity",$opportunity_entity);
            return view("opportunity_edit");
        }
    }


    //删除

    public function  opportunity_del($id){
        if(!$this->check_post_menu_permission("delete_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            model("opportunity", "logic")->delete_opportunity($id);

            $this->redirect("opportunity");
        }

    }


    //信息查看

    public function  opportunity_des($id){


        //获得一条信息
        $opportunity = model("opportunity", "logic")->get_opportunity($id);
        $this->assign("opportunity",$opportunity);
        return view("opportunity_des");

    }




}