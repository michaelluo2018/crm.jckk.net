<?php
namespace app\index\controller;

use think\Request;

class Menu extends Base{


    public function index(){

        $index_menus= $this->all_menus;

        $this->assign("index_menus",$index_menus);

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