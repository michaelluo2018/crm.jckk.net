<?php
namespace  app\index\controller;
use app\index\controller\Base;
use think\Request;


class Customer extends Base{
    //客户列表
    public function customer_list(){
        $data = model("customer","logic")->get_customers();
        return  view("customer_list")->assign("data",$data);
    }

    //客户添加
    public function customer_add(){

       $data = model("customer","logic")->get_customer_entity();
        return view("customer_add")->assign("data",$data);
    }

    //保存客户
    public  function  save_customer(){
        $data = Request::instance()->post();
        $customer_logic =   model("customer",'logic');
        $res = $customer_logic->save_customer($data);
        if($res){
            //跳转到customer_list
            $this->redirect("customer_list");
        }

    }



    //客户修改

    public function  customer_edit($id){
        $data = model("customer","logic")->get_customer_entity();
        $customer = model("customer","logic")->get_customer_by_id($id);
        return view("customer_edit")->assign("data",$data)->assign("customer",$customer);
    }
    //客户删除

    public function  customer_del($id){
      model("customer","logic")->delete_customer($id);

       $this->redirect("customer_list");

    }
    //客户信息查看

    public function  customer_des($id){
        $data = model("customer","logic")->get_customer_entity();
        $customer = model("customer","logic")->get_customer_by_id($id);
        return view("customer_des")->assign("data",$data)->assign("customer",$customer);
    }

    //客户搜索

    public  function  customer_search(){

    }










}