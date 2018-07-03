<?php
namespace app\index\controller;


use think\Config;

class Index extends Base
{

    public function index()
    {
        //本人操作日志
        $my_logs = model("log","logic")->get_logs($this->uid);

        //数据统计--客户状态
        $customer_status_1 = $this->get_customer_status1();
        $customer_status_2 = $this->get_customer_status2();

        //数据统计--合同状态
        $get_contract_status1 = $this->get_contract_status1();
        $get_contract_status2 = $this->get_contract_status2();
        //数据统计--产品需求
        $product_demand = $this->get_product_demand();
        $customer_status = array_merge($customer_status_1,$customer_status_2,$get_contract_status1,$get_contract_status2,$product_demand);
        if(! $this->menu_id){
            $this->menu_id = $this->get_mid_by_url("index/index/index");
            $this->assign("mid",$this->menu_id);
        }
        //任务排期
        $year = isset($_GET['year']) ? $_GET['year'] : date("Y");
        $month = isset($_GET['month']) ? $_GET['month'] : date("m");
        $mid = $this->get_mid_by_url("index/task/task");
        $this->menu_id = $mid;
        $uids = $this->check_post_menu_range_permission();
        if($uids == "all") {
            $res = __toString('index',$year,$month);
        }else{
            $res = __toString('index',$year,$month,$uids);
        }
        $this->assign('res',$res['out']);
        $this->assign('tasks',$res['tasks']);

        return view("index")->assign("my_logs",$my_logs)->assign("customer_status",$customer_status);

    }

    public function  login_out(){
        parent::login_out();
        $this->redirect("login/login");
    }


    public function get_customer_status1(){
        $array = Config::get("customer_status_1");

        $num = count($array);
        $list = array();

        for ($i=0;$i<$num;$i++){
            $customer_status_1 = $array[$i];
            $list[$i]['field']='customer_status_1';
            $list[$i]['key']=$customer_status_1;
            $list[$i]['value']  = model("customer","logic")->customer_count_status_1($customer_status_1);

        }
        return $list;
    }


    public function get_customer_status2(){
        $array = Config::get("customer_status_2");

        $num = count($array);
        $list = array();

        for ($i=0;$i<$num;$i++){
            $customer_status_2 = $array[$i];
            $list[$i]['field']='customer_status_2';
            $list[$i]['key']=$customer_status_2;
            $list[$i]['value']  = model("customer","logic")->customer_count_status_2($customer_status_2);

        }
        return $list;
    }


     public function get_contract_status1(){
        $array = Config::get("contract_status1");

        $num = count($array);
        $list = array();

        for ($i=0;$i<$num;$i++){
            $contract_status = $array[$i];
            $list[$i]['field']='contract_status1';
            $list[$i]['key']=$contract_status;
            $list[$i]['value']  = model("project","logic")->contract_count_status($contract_status);

        }
        return $list;
    }

     public function get_contract_status2(){
        $array = Config::get("contract_status2");

        $num = count($array);
        $list = array();

        for ($i=0;$i<$num;$i++){
            $contract_status = $array[$i];
            $list[$i]['field']='contract_status2';
            $list[$i]['key']=$contract_status;
            $list[$i]['value']  = model("project","logic")->contract_count_status($contract_status);

        }
        return $list;
    }


     public function get_product_demand(){
        $array = Config::get("product_demand");

        $num = count($array);
        $list = array();

        for ($i=0;$i<$num;$i++){
            $product_demand_1 = $array[$i];
            $list[$i]['field']='product_demand_1';
            $list[$i]['key']=$product_demand_1;
            $list[$i]['value']  = model("project","logic")->product_demand_count_1($product_demand_1);

        }
        return $list;
    }



    /*
     * 任务排期
     * */
    public function calendar_task(){

        $year = isset($_GET['year']) ? $_GET['year'] : date("Y");
        $month = isset($_GET['month']) ? $_GET['month'] : date("m");
        $res = __toString('calendar_task',$year,$month,$this->uid);
        $this->assign('res',$res['out']);
        $this->assign('tasks',$res['tasks']);
       return view('calendar_task');
    }


























}

