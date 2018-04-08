<?php
namespace  app\index\controller;

use think\Config;

use think\Request;

class Project extends Base {
    //项目列表
    public function project_list(){


        $projects = model("project","logic")->get_projects();

        return  view("project_list")->assign("projects",$projects);

    }

    //项目添加
    public function project_add(){

        $data = model("project","logic")->get_project_total_entity();
        //所有部门
        $departments = model("department","logic")->get_departments();
        //获取第一个部门下面所有user
        $users = model("user","logic")->get_department_users($departments[0]->id);

        return view("project_add")->assign("data",$data)->assign("departments",$departments)->assign("users",$users);
    }


    public  function  ajax_get_user(){
        $department_id = Request::instance()->get('department_id');
        $users = model("user","logic")->get_department_users($department_id);
        return $users;
    }

    public  function  ajax_get_demand2(){
        $demand_value = Request::instance()->get('demand_value');
        $demands = Config::get($demand_value);
        return $demands;
    }


    //项目保存
    public function save_project(){
        $data = Request::instance()->post();

        $res = model("project","logic")->save_project($data);
        if($res){
            $this->redirect("project_list");
        }
    }





    //项目修改

    public function  project_edit($id){
        //获得一条项目信息
        $project = model("project","logic")->get_project($id);
        $customer = model("customer","logic")->get_customer_by_id($project['customer_id']);
        $data = model("project","logic")->get_project_total_entity();
        //所有部门
        $departments = model("department","logic")->get_departments();
        //获取第一个部门下面所有user
        $users = model("user","logic")->get_department_users($departments[0]->id);
        return view("project_edit")->assign(["data"=>$data,"project"=>$project,"customer"=>$customer,"departments"=>$departments,"users"=>$users]);
    }
    //项目删除

    public function  project_del($id){
         model("project","logic")->delete_project($id);

         $this->redirect("project_list");

    }



    //项目信息查看

    public function  project_des($id){
        //获得一条项目信息
        $project = model("project","logic")->get_project($id);
        $customer = model("customer","logic")->get_customer_by_id($project['customer_id']);
        $data = model("project","logic")->get_project_total_entity();
        //所有部门
        $departments = model("department","logic")->get_departments();
        //获取第一个部门下面所有user
        $users = model("user","logic")->get_department_users($departments[0]->id);
        return view("project_des")->assign(["data"=>$data,"project"=>$project,"customer"=>$customer,"departments"=>$departments,"users"=>$users]);
    }

    //项目搜索
//
//    public  function  project_search(){
//
//        $name = Request::instance()->post("customer_name");
//
//        $this->redirect("project_list",["where"=>$name]);
//
//    }


    public function ajax_get_customer(){
        $customer_name = Request::instance()->get('customer_name');
        $data = model("customer","logic")->get_customer_like_name($customer_name);
        if($data){
            return $data;
        }
        else{
            return 0;
        }

    }







}