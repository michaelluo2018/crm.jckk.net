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
            if(isset($data["customer_id"]) && !empty($data['customer_id'])){
                //跳转到customer_list
                $this->redirect("customer_list");
            }
            else{
                $data = model("customer","logic")->get_customer_entity();
                return view("customer_success_choose")->assign("data",$data);

            }

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
//
//    public  function  customer_search(){
//        $name = Request::instance()->post("customer_name");
//
//        $this->redirect("customer_list",["where"=>$name]);
//
//    }



    public function check_customer_name(){

        $name = Request::instance()->get("name");

        if(model("customer","logic")->is_exist_customer_by_name($name)){
            return 1;
        }
        else{
            return 0;
        }
    }






}