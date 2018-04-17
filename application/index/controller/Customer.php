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

        if(!$this->check_post_menu_permission("add_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
         }
         else{
             $data = model("customer","logic")->get_customer_entity();
             return view("customer_add")->assign("data",$data);
         }

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
        if(!$this->check_post_menu_permission("update_operate")){

            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else{
            $data = model("customer","logic")->get_customer_entity();
            $customer = model("customer","logic")->get_customer_by_id($id);
            return view("customer_edit")->assign("data",$data)->assign("customer",$customer);
        }


    }
    //客户删除

    public function  customer_del($id){
        if(!$this->check_post_menu_permission("delete_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else{
            $result = model("customer","logic")->delete_customer($id);
            if($result){
                echo "<script> alert(\" ".$result."\"); history.back(-1);</script>";
            }
            else{

                $this->redirect("customer_list");
            }
        }


    }


    //删除回收站

    public function customer_del_true($id){

        $result =  model("customer","logic")->delete_customer_true($id);

        if($result){
            echo "<script> alert(\" ".$result."\"); history.back(-1);</script>";
        }
        else{
            $this->redirect("customer_recycle");
        }
    }






    //客户信息查看

    public function  customer_des($id){

        if(!$this->check_post_menu_permission("desc_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            $data = model("customer", "logic")->get_customer_entity();
            $customer = model("customer", "logic")->get_customer_by_id($id);
            return view("customer_des")->assign("data", $data)->assign("customer", $customer);
        }

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


   //客户项目查看

    public function  customer_project_recycle($id){

        $projects = model("project","logic")->project_recycle($id);
        $array = $projects->toArray();
        if(empty($array['data'])){

            echo "<script> alert(\"该客户没有删除的项目\"); history.back(-1);</script>";

        }
        else{
            return  view("project/project_recycle")->assign("projects",$projects);
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