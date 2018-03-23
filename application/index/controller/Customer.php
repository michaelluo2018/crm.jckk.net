<?php
namespace  app\index\controller;

class Customer{
    //客户列表
    public function customer_list(){

        return  view("customer_list");
    }

    //客户添加
    public function customer_add(){
        return view("customer_add");
    }
    //客户修改

    public function  customer_edit(){
        return view("customer_edit");
    }
    //客户删除

    public function  customer_del($id){

    }
    //客户信息查看

    public function  customer_des($id=null){
        return view("customer_des");
    }

    //客户搜索

    public  function  customer_search(){

    }










}