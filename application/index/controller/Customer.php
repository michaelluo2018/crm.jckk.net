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




    public function customer_recycle(){


        $data = model("customer","logic")->get_customers_recycle();

        return  view("customer_recycle")->assign("data",$data);
    }



    //删除回收站

    public function customer_del_true($id){

        model("customer","logic")->delete_customer_true($id);

        $this->redirect("customer_recycle");
    }


    //还原客户
    public function customer_back($id){

        $result = model("customer","logic")->customer_back($id);

        if(!$result){
            $this->redirect("customer_recycle");
        }
        else{
            echo "<script>alert(\" " .$result." \"); history.back(-1);</script>";
        }

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


   //客户项目查看

    public function  customer_project($id){

        $projects = model("project","logic")->get_projects($id);
        $array = $projects->toArray();
        if(empty($array['data'])){
            $add_project_url = url("index/project/project_add");

            echo "<script>  if (confirm('该客户还没有项目，去添加项目？')==true){ window.location.href='".$add_project_url." ';}else{ history.back(-1); }</script>";

        }
        else{
            return  view("project/project_list")->assign("projects",$projects);
        }

    }






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