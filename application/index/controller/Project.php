<?php
namespace  app\index\controller;

class Project{
    //客户列表
    public function project_list(){

        return  view("project_list");
    }

    //客户添加
    public function project_add(){

        return view("project_add");
    }
    //客户修改

    public function  project_edit(){
        return view("project_edit");
    }
    //客户删除

    public function  project_del($id){

    }
    //客户信息查看

    public function  project_des($id=null){
        return view("project_des");
    }

    //客户搜索

    public  function  project_search(){

    }










}