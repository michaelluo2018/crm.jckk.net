<?php
namespace  app\index\controller;

use think\Config;
use think\Request;

class Theme extends Base {

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $mid = $this->get_mid_by_url("index/theme/theme");
        $this->menu_id = $mid;
        $this->assign("mid",$this->menu_id);

    }

    //列表
    public function theme(){

        $themes =  model('theme','logic')->get_themes();
        $this->assign("themes",$themes);
        $theme_type = Config::get("theme_type");
        $this->assign("theme_type",$theme_type);
        return view("theme");
    }




    //保存
    public function save_theme(){
        $data = Request::instance()->post();
        $res = model("theme","logic")->save_theme($data);
        if($res){
            $this->redirect("theme");
        }
    }


    //修改

    public function  theme_edit($id){

//        if(!$this->check_post_menu_permission("update_operate")){
//            echo "<script> alert('没有权限！');history.back(-1);</script>";
//        }
//        else {

        $theme = model("theme", "logic")->get_theme($id);
        $theme_type = Config::get("theme_type");
        $this->assign("theme_type",$theme_type);
        $this->assign('theme',$theme);

        return view("theme_edit");
//        }
    }


    //删除

    public function  theme_del($id){
//        if(!$this->check_post_menu_permission("delete_operate")){
//            echo "<script> alert('没有权限！');history.back(-1);</script>";
//        }
//        else {
            model("theme", "logic")->delete_theme($id);

            $this->redirect("theme");
//        }

    }

    public function  theme_describe_del($id){
//        if(!$this->check_post_menu_permission("delete_operate")){
//            echo "<script> alert('没有权限！');history.back(-1);</script>";
//        }
//        else {
            model("theme_describe", "logic")->delete_theme_describe($id);

            $this->redirect("theme");
//        }

    }


    public function save_theme_describe(){
        $data = Request::instance()->post();
        $res = model("theme_describe","logic")->save_theme_describe($data);
        if($res){
            $this->redirect("theme");
        }
    }













}