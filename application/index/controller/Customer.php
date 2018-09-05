<?php
namespace  app\index\controller;
use app\index\controller\Base;
use think\Cookie;
use think\Request;


class Customer extends Base{

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $mid = $this->get_mid_by_url("index/customer/customer_list");
        $this->menu_id = $mid;
        $this->assign("mid",$this->menu_id);
    }


    //客户列表
    public function customer_list(){
        $entity = model("customer","logic")->get_customer_entity();
        $this->assign("entity",$entity);

        if(isset($_GET['customer_status_1'])){
            Cookie::set('cl_status1',$_GET['customer_status_1'],30*24*3600);
        }

        if(isset($_GET['customer_status_2'])){
            Cookie::set('cl_status2',$_GET['customer_status_2'],30*24*3600);
        }

        if(isset($_GET['keyword'])){
            Cookie::set('cl_keyword',$_GET['keyword'],30*24*3600);
        }
        $status1 = Cookie::get('cl_status1');
        $status2 = Cookie::get('cl_status2');
        $keyword = Cookie::get('cl_keyword');

        $this->assign("status1",$status1);
        $this->assign("status2",$status2);
        $this->assign("keyword",$keyword);

        $where =[];
        if($status1){
            $where["jckk_customer.customer_status_1"]= $status1;
        }
        if($status2){
            $where["jckk_customer.customer_status_2"]= $status2;
        }

        $create_uids = $this->check_post_menu_range_permission();

        if($create_uids == "all"){
            $data = model("customer","logic")->get_customers("",$where,$keyword);
        }

        else{
            $data = model("customer","logic")->get_customers($create_uids,$where,$keyword);
        }


        return  view("customer_list")->assign("data",$data);
    }




    public function customer_recycle(){

        $create_uids = $this->check_post_menu_range_permission();

        if($create_uids == "all") {

            $data = model("customer", "logic")->get_customers_recycle();
        }
        else{
            $data = model("customer", "logic")->get_customers_recycle($create_uids);
        }

        return  view("customer_recycle")->assign("data",$data);
    }





    //还原客户
    public function customer_back($id){
        if (!$this->check_post_menu_permission("update_operate")) {
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {

            $result = model("customer", "logic")->customer_back($id);

            if (!$result) {
                $this->redirect("customer_recycle");
            } else {
                echo "<script>alert(\" " . $result . " \"); history.back(-1);</script>";
            }
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
                echo "<script> history.back(-1);</script>";
               // $this->redirect("customer_list");
            }
        }


    }


    //删除回收站

    public function customer_del_true($id){

        if (!$this->check_post_menu_permission("delete_operate")) {
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {

            $result = model("customer", "logic")->delete_customer_true($id);

            if ($result) {
                echo "<script> alert(\" " . $result . "\"); history.back(-1);</script>";
            } else {
                $this->redirect("customer_recycle");
            }
        }
    }






    //客户信息查看

    public function  customer_des($id){


            $data = model("customer", "logic")->get_customer_entity();
            $customer = model("customer", "logic")->get_customer_by_id($id);
            return view("customer_des")->assign("data", $data)->assign("customer", $customer);


    }


   //客户项目查看

    public function  customer_project($id){
        $data = model("project", "logic")->get_project_total_entity();
        $this->assign("data",$data);

        if(isset($_GET['contract_status'])){
            Cookie::set('cp_contract_status',$_GET['contract_status'],30*24*3600);
        }

        if(isset($_GET['payment_status'])){
            Cookie::set('cp_payment_status',$_GET['payment_status'],30*24*3600);
        }

        if(isset($_GET['product_demand'])){
            Cookie::set('cp_product_demand',$_GET['product_demand'],30*24*3600);
        }
        if(isset($_GET['keyword'])){
            Cookie::set('cp_keyword',$_GET['keyword'],30*24*3600);
        }
        $contract_status = Cookie::get('cp_contract_status');
        $payment_status = Cookie::get('cp_payment_status');
        $product_demand = Cookie::get('cp_product_demand');
        $keyword = Cookie::get('cp_keyword');

        $this->assign("contractStatus",$contract_status);
        $this->assign("paymentStatus",$payment_status);
        $this->assign("productDemand",$product_demand);
        $this->assign("keyword",$keyword);
        $this->assign("id",$id);
        $where =[];
        if($contract_status){
            $where["p.contract_status"]= $contract_status;
        }
        if($payment_status){
            $where["p.payment_status"]= $payment_status;
        }
        if($product_demand){
            $where["p.product_demand_1"]= $product_demand ;
        }
        $mid = $this->get_mid_by_url("index/project/project_list");
        $this->menu_id = $mid;
        $create_uids = $this->check_post_menu_range_permission();
        if($create_uids=='all'){
            $projects = model("project","logic")->get_projects($id,"",$where);
        }
        else{
            $projects = model("project","logic")->get_projects($id,$create_uids,$where);
        }
        $array =collection($projects)->toArray();

        if(empty($array)){
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
        $array =collection($projects)->toArray();
        if(empty($array)){

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



    public  function  customer_status_1($name){
        $entity = model("customer","logic")->get_customer_entity();
        $this->assign("entity",$entity);

        if(isset($_GET['customer_status_1'])){
            Cookie::set('cs1_status1',$_GET['customer_status_1'],30*24*3600);
        }

        if(isset($_GET['customer_status_2'])){
            Cookie::set('cs1_status2',$_GET['customer_status_2'],30*24*3600);
        }

        if(isset($_GET['keyword'])){
            Cookie::set('cs1_keyword',$_GET['keyword'],30*24*3600);
        }
        $status1 = Cookie::get('cs1_status1');
        $status2 = Cookie::get('cs1_status2');
        $keyword = Cookie::get('cs1_keyword');

        if(!$status1){
            $status1 =  $name;
        }
        $this->assign("status1",$status1);
        $this->assign("status2",$status2);
        $this->assign("keyword",$keyword);
        $this->assign("name",$name);
        $where =[];
        if($status1){
            $where["jckk_customer.customer_status_1"]= $status1;
        }
        if($status2){
            $where["jckk_customer.customer_status_2"]= $status2;
        }


        $create_uids = $this->check_post_menu_range_permission();
        if($create_uids == "all"){
            $data = model("customer","logic")->get_customers_by_status("customer_status_1",$name,"",$where,$keyword);
        }
        else{
            $data = model("customer","logic")->get_customers_by_status("customer_status_1",$name,$create_uids,$where,$keyword);
        }
        return  view("customer_status_list")->assign(["data"=>$data,"name"=>$name]);

    }


    public  function  customer_status_2($name){
        $entity = model("customer","logic")->get_customer_entity();
        $this->assign("entity",$entity);

        if(isset($_GET['customer_status_1'])){
            Cookie::set('cs2_status1',$_GET['customer_status_1'],30*24*3600);
        }

        if(isset($_GET['customer_status_2'])){
            Cookie::set('cs2_status2',$_GET['customer_status_2'],30*24*3600);
        }

        if(isset($_GET['keyword'])){
            Cookie::set('cs2_keyword',$_GET['keyword'],30*24*3600);
        }
        $status1 = Cookie::get('cs2_status1');
        $status2 = Cookie::get('cs2_status2');
        $keyword = Cookie::get('cs2_keyword');

        if(!$status2){
            $status2 =  $name;
        }
        $this->assign("status1",$status1);
        $this->assign("status2",$status2);
        $this->assign("keyword",$keyword);
        $this->assign("name",$name);
        $where =[];
        if($status1){
            $where["jckk_customer.customer_status_1"]= $status1;
        }
        if($status2){
            $where["jckk_customer.customer_status_2"]= $status2;
        }
       // dump($where);die;
        $create_uids = $this->check_post_menu_range_permission();
        if($create_uids == "all"){
            $data = model("customer","logic")->get_customers_by_status("customer_status_2",$name,"",$where,$keyword);
        }
        else{
            $data = model("customer","logic")->get_customers_by_status("customer_status_2",$name,$create_uids,$where,$keyword);
        }
        return  view("customer_status_list")->assign(["data"=>$data,"name"=>$name]);

    }



//    public function customer_number(){
//        $customers = model('customer')->select();
//        $i=0;
//        foreach ($customers as $customer){
//
//            $customer->number = "C".date('Ymd',strtotime($customer->create_time))."-".$customer->id;
//            if($customer->save()){
//                $i++;
//            }
//        }
//        dump($i);
//    }
//




}