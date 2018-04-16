<?php
namespace app\index\controller;

use think\Request;

class Menu extends Base{


    public function index(){
        $menus= model("menu","logic")->get_menus();
        $this->assign("menus",$menus);
        return view("index");
    }



    public function save_menu(){

        $data = Request::instance()->post();
        model("menu","logic")->save_menu($data);
        $this->redirect("index");
    }



    public  function menu_del($id){
        model('menu','logic')->delete_menu($id);
        $this->redirect("index");
    }

}