<?php
namespace  app\index\controller;
use app\index\controller\Base;
use think\Request;


class Customer extends Base{
    //客户列表
    public function customer_list($where = null){

        if(!$where){
            $data = model("customer","logic")->get_customers();
        }
        else{

            $data = model("customer","logic")->find_by_name($where);
        }

        return  view("customer_list")->assign(["data"=>$data,"where"=>$where]);
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
                $add_url = url("customer_add");
                $list_url = url("customer_list");
                $msg = "<div style='margin-bottom: 50px;'> <a href='".$add_url."' style='margin-right: 80px;'><button style='padding: 5px;background-color:green'>继续添加</button></a><a href='".$list_url."'><button style='padding: 5px;background-color: orange '>返回列表</button></a></div>";
                $this->success($msg,"customer_list","","30");
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

    public  function  customer_search(){
        $name = Request::instance()->post("customer_name");

        $this->redirect("customer_list",["where"=>$name]);

    }



    public function check_customer_name(){

        $name = Request::instance()->get("name");

        if(model("customer","logic")->is_exist_customer_by_name($name)){
            return 1;
        }
    }






}