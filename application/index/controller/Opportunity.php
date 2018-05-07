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



    //项目添加
    public function opportunity_add(){


        if(!$this->check_post_menu_permission("add_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {

            return view("opportunity_add");
        }
    }



    //项目保存
    public function save_project(){
        $data = Request::instance()->post();

        $res = model("opportunity","logic")->save_opportunity($data);
        if($res){
            $this->redirect("opportunity");
        }
    }


    //项目修改

    public function  opportunity_edit($id){

        if(!$this->check_post_menu_permission("update_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {

            $project = model("opportunity", "logic")->get_project($id);
            return view("opportunity_edit");
        }
    }


    //项目删除

    public function  project_del($id){
        if(!$this->check_post_menu_permission("delete_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            model("opportunity", "logic")->delete_opportunity($id);

            $this->redirect("opportunity");
        }

    }


    //项目信息查看

    public function  opportunity_des($id){


        //获得一条项目信息
        $project = model("opportunity", "logic")->get_opportunity($id);

        return view("opportunity_des");

    }




}