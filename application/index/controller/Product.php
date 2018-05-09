<?php
namespace  app\index\controller;

use think\Config;
use think\Request;

class Product extends Base {

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $mid = $this->get_mid_by_url("index/product/product");
        $this->menu_id = $mid;
        $this->assign("mid",$this->menu_id);

    }

    //列表
    public function product(){

        $products =  model('product','logic')->get_products();

        $this->assign("products",$products);
        return view("product");
    }

    //添加
    public function product_add(){


        if(!$this->check_post_menu_permission("add_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            $product_type = Config::get("product_type");
            $this->assign("product_type",$product_type);
            return view("product_add");
        }
    }



    //保存
    public function save_product(){
        $data = Request::instance()->post();
        $file = Request::instance()->file("img");
        $res = model("product","logic")->save_product($data,$file);
        if($res){
            $this->redirect("product");
        }
    }


    //修改

    public function  product_edit($id){

        if(!$this->check_post_menu_permission("update_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {

            $product = model("product", "logic")->get_product($id);
            $product_type = Config::get("product_type");
            $this->assign("product_type",$product_type);
            $this->assign('product',$product);
            return view("product_edit");
        }
    }


    //删除

    public function  product_del($id){
        if(!$this->check_post_menu_permission("delete_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            model("product", "logic")->delete_product($id);

            $this->redirect("product");
        }

    }


    //信息查看

    public function  product_des($id){

        //获得一条项目信息
        $product = model("product", "logic")->get_product($id);
        $this->assign('product',$product);
        return view("product_des");

    }


















}