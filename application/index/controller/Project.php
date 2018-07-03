<?php
namespace  app\index\controller;

use think\Config;

use think\Request;

class Project extends Base {

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $mid = $this->get_mid_by_url("index/project/project_list");
        $this->menu_id = $mid;
        $this->assign("mid",$this->menu_id);

    }

    //项目列表
    public function project_list(){

        $create_uids = $this->check_post_menu_range_permission();

        if($create_uids == "all") {

            $projects = model("project", "logic")->get_projects();
        }else{
            $projects = model("project", "logic")->get_projects("",$create_uids);
        }

        return  view("project_list")->assign("projects",$projects);

    }



    public  function  contract_status($name){
        $create_uids = $this->check_post_menu_range_permission();

        if($create_uids == "all") {

            $projects = model("project", "logic")->get_projects_by_status("contract_status",$name);
        }else{
            $projects = model("project", "logic")->get_projects_by_status("contract_status",$name,$create_uids);
        }


        return  view("project_status_list")->assign(["projects"=>$projects,"name"=>$name]);

    }


    public  function  product_demand($name){
        $create_uids = $this->check_post_menu_range_permission();

        if($create_uids == "all") {

            $projects = model("project", "logic")->get_projects_by_status("product_demand_1",$name);
        }else{
            $projects = model("project", "logic")->get_projects_by_status("product_demand_1",$name,$create_uids);
        }

        return  view("project_status_list")->assign(["projects"=>$projects,"name"=>$name]);

    }

















    //项目回收站
    public function project_recycle(){

        $create_uids = $this->check_post_menu_range_permission();

        if($create_uids == "all") {

            $projects = model("project", "logic")->project_recycle();

        }else{
            $projects = model("project", "logic")->project_recycle("",$create_uids);
        }

        return  view("project_recycle")->assign("projects",$projects);

    }





    //项目添加
    public function project_add(){


        if(!$this->check_post_menu_permission("add_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {

            $data = model("project", "logic")->get_project_total_entity();
            //所有部门
            $departments = model("department", "logic")->get_departments();
            //获取第一个部门下面所有user
            $users = model("user", "logic")->get_department_users($departments[0]->id);

            return view("project_add")->assign("data", $data)->assign("departments", $departments)->assign("users", $users);
        }
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

        if(!$this->check_post_menu_permission("update_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            //获得一条项目信息
            $project = model("project", "logic")->get_project($id);

            $data = model("project", "logic")->get_project_total_entity();
            //所有部门
            $departments = model("department", "logic")->get_departments();
            //获取第一个部门下面所有user
            $users = model("user", "logic")->get_department_users($departments[0]->id);
            return view("project_edit")->assign(["data" => $data, "project" => $project, "departments" => $departments, "users" => $users]);
        }
    }


    //项目删除

    public function  project_del($id){
        if(!$this->check_post_menu_permission("delete_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            model("project", "logic")->delete_project($id);

            $this->redirect("project_list");
        }

    }


    //项目彻底删除

    public function  project_del_true($id)
    {
        if (!$this->check_post_menu_permission("delete_operate")) {
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else{
            model("project", "logic")->project_del_true($id);

            $this->redirect("project_recycle");
         }

    }

    //项目还原

    public function  project_back($id){
        if (!$this->check_post_menu_permission("update_operate")) {
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {

            $result = model("project", "logic")->project_back($id);

            if ($result) {

                echo "<script> alert(\" " . $result . " \"); history.back(-1);</script>";
            } else {
                $this->redirect("project_recycle",["mid"=>$this->menu_id]);
            }
        }

    }





    //项目信息查看

    public function  project_des($id){


            //获得一条项目信息
            $project = model("project", "logic")->get_project($id);
            $customer = model("customer", "logic")->get_customer_by_id($project['customer_id']);
            $data = model("project", "logic")->get_project_total_entity();
            //所有部门
            $departments = model("department", "logic")->get_departments();
            //获取第一个部门下面所有user
            $users = model("user", "logic")->get_department_users($departments[0]->id);
            return view("project_des")->assign(["data" => $data, "project" => $project, "customer" => $customer, "departments" => $departments, "users" => $users]);

    }




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


    public function ajax_get_customer_project_name(){

        $customer_id =Request::instance()->post("customer_id");

        $data = model("project","logic")->get_projects_name($customer_id);

        return $data;

    }

    public  function ajax_check_project_name(){

        $customer_id = Request::instance()->post("customer_id");

        $project_name = Request::instance()->post("project_name");

        $project_id = Request::instance()->post("project_id");

       if(model("project","logic")->check_exist_project_name($project_name,$customer_id,$project_id)){
           return 1;
       }
       else{
           return 0;
       }
    }

    public function ajax_get_project_by_name(){
        $project_name = Request::instance()->get("project_name");
        $projects = model("project","logic")->get_project_by_name($project_name);
        if($projects){
            return $projects;
        }
        else{
            return 0;
        }
    }


}