<?php
namespace  app\index\logic;
use think\Model;
use think\Config;
use think\Db;
use app\index\model\Log;
use think\Session;

class Product extends Model{

    protected $table="jckk_product";


    //保存
    public  function  save_product($data){
        //保存客户信息
        $project_name = trim($data['project_name']);
        $customer_id = trim($data['customer_id']);
        if(isset($data['project_id'])){
            //修改
            $project = model("project","model")->where("id",$data['project_id'])->find();
            $before_value = json_encode($project);
        }
        else{
            //查看回收站有没有同名项目
            if($project =model("project","model")->where(["project_name"=>$project_name , "customer_id"=>$customer_id , "is_delete"=>1])->find()){

                $before_value = json_encode($project);
            }
            else{
                //添加
                $project = model("project",'model');
                $project->create_time = time();
                $project->create_uid = Session::get("uid");
            }

        }

        $project->month_money = null;
        $project->quarter_money1 = null;
        $project->quarter_money2 = null;
        $project->quarter_money3 = null;
        $project->quarter_money4 = null;
        $project->project_money1 = null;
        $project->project_money2 = null;
        $project->project_money3 = null;
        $project->planning_uid = null;
        $project->docking_uid = null;
        $project->product_demand_2 = null;


        $project->project_name =$project_name;
        $project->customer_id = $customer_id;
        $project->executor_uid = trim($data['executor_uid']);
        $project->manage_uid = trim($data['manage_uid']);
        $project->product_demand_1 = trim($data['product_demand_1']);

        $project->contract_status = trim($data['contract_status']);
        $project->contract_amount = trim($data['contract_amount']);
        $project->payment_type = trim($data['payment_type']);
        $project->payment_status = trim($data['payment_status']);
        $project->rate = trim($data['rate']);
        $project->cost = trim($data['cost']);
        $project->cost_note = trim($data['cost_note']);
        $project->company_name = trim($data['company_name']);
        $project->is_delete = 0;
        $project->channel = trim($data['channel']);
        $project->channel_user = trim($data['channel_user']);

        if(isset($data['month_money'])){
            $project->month_money =$data['month_money'];
        }
        if(isset($data['quarter_money1'])){
            $project->quarter_money1 =$data['quarter_money1'];
        }
        if(isset($data['quarter_money2'])){
            $project->quarter_money2 =$data['quarter_money2'];
        }
        if(isset($data['quarter_money3'])){
            $project->quarter_money3 =$data['quarter_money3'];
        }
        if(isset($data['quarter_money4'])){
            $project->quarter_money4 =$data['quarter_money4'];
        }

        if(isset($data['project_money1'])){
            $project->project_money1 =$data['project_money1'];
        }

        if(isset($data['project_money2'])){
            $project->project_money2 =$data['project_money2'];
        }
        if(isset($data['project_money3'])){
            $project->project_money3 =$data['project_money3'];
        }
        if(isset($data['planning_uid'])){
            $project->planning_uid = trim($data['planning_uid']);
        }

        if(isset($data['docking_uid'])){
            $project->docking_uid = trim($data['docking_uid']);
        }
        if(isset($data['product_demand_2'])){
            $project->product_demand_2 = trim($data['product_demand_2']);
        }

        if($project->save()){
            //处理日志
            $customer_log = model("customer")->where("id",$data['customer_id'])->find();

            if(isset($data['project_id'])){
                //修改
                $project_log["type"] = Log::UPDATE_TYPE;

                $project_log["before_value"] = $before_value;
                $project_log["after_value"] = json_encode($project);
                $project_log["title"] = "更改".$customer_log->customer_name ."(客户)的项目，项目ID是".$project->id;
            }
            else{
                //添加
                $project_log["type"] = Log::ADD_TYPE;

                $project_log["before_value"] = "";
                $project_log["after_value"] = json_encode($project);
                $project_log["title"] = "给".$customer_log->customer_name."(客户)添加项目,项目ID是".$project->id;

            }

            model("log","logic")->write_log( $project_log);
        }

        return $project->id;


    }

    //获取列表
    public function get_products(){
            return Db::table("jckk_product")
                ->alias("p")
                ->field(["p.*","u.chinese_name"])
                ->where("p.is_delete","<>",1)
                ->join("jckk_user u","p.create_uid = u.uid","LEFT")
                ->select();
    }



    //获取一条
    public function get_product($id){
        return Db::table("jckk_project")
            ->alias("p")
            ->where("p.id",$id)
            ->field(["p.*","c.customer_name","c.customer_status_1","c.customer_status_2","eu.chinese_name as e_name",
                "pu.chinese_name as p_name","du.chinese_name as d_name","mu.chinese_name as m_name","eu.department_id as e_d_id",
                "pu.department_id as p_d_id","du.department_id as d_d_id","mu.department_id as m_d_id"])
            ->join("jckk_customer c ","p.customer_id = c.id","LEFT")
            ->join("jckk_user eu","p.executor_uid = eu.uid","LEFT")
            ->join("jckk_user pu","p.planning_uid = pu.uid","LEFT")
            ->join("jckk_user du","p.docking_uid = du.uid","LEFT")
            ->join("jckk_user mu","p.manage_uid = mu.uid","LEFT")
            ->find();
    }



    //删除
    public function  delete_product($id){
        $project = $this->where("id",$id)->find();
        $customer = model("customer")->where("id",$project->customer_id)->find();

        //添加日志
        $project_log["type"] = Log::DELETE_TYPE;

        $project_log["before_value"] = json_encode($project);
        $project_log["after_value"] = "";
        $project_log["title"] = "删除".$customer->customer_name."(客户)的项目,项目ID是".$project->id;
        $project->is_delete = 1;
        if($project->save()){
            model("log","logic")->write_log( $project_log);
        }



    }








}