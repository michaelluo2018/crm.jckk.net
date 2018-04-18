<?php
namespace app\index\controller;

use think\Request;

class Menu extends Base{


    public function index($mid=null){

        if($mid){
            $this->menu_id = $mid;
            $this->assign("mid",$this->menu_id);
        }
        $index_menus= $this->all_menus;

        $this->assign("index_menus",$index_menus);

        $update_operate = $this->check_post_menu_permission("update_operate");

        $add_operate = $this->check_post_menu_permission("add_operate");

        $delete_operate = $this->check_post_menu_permission("delete_operate");

        $this->assign("update_operate",$update_operate);
        $this->assign("add_operate",$add_operate);
        $this->assign("delete_operate",$delete_operate);

        return view("index");
    }



    public function save_menu(){

        if(!$this->check_post_menu_permission("update_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            $data = Request::instance()->post();
            model("menu", "logic")->save_menu($data);
            $this->redirect("index", ["mid" => $this->menu_id]);
        }
    }



    public  function menu_del($id){

        if(!$this->check_post_menu_permission("delete_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            model('menu', 'logic')->delete_menu($id);
            $this->redirect("index", ["mid" => $this->menu_id]);
        }
    }

}