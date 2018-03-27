<?php
namespace  app\index\logic;
use think\Model;
use think\Config;
use think\Db;
class Project extends Model{

    protected $table="jckk_project";

    //获取客户添加select值
    public  function get_project_entity(){
        $data['product_demand'] = Config::get("product_demand");//产品需求
        $data['contract_status'] = Config::get("contract_status");
        $data['payment_type'] = Config::get("payment_type");
        $data['payment_status'] = Config::get("payment_status");
        return $data;
    }


    //获取添加项目的所有实体
    public function  get_project_total_entity(){
        return array_merge(model("customer","logic")->get_customer_entity(),$this->get_project_entity());

    }


    //保存项目
    public  function  save_project($data){
        //保存客户信息
        $customer_id = model("customer","logic")->save_customer($data);
        if(isset($data['project_id'])){
            //修改
            $project = model("project","model")->where("id",$data['project_id'])->find();
        }
        else{
            //添加
            $project = model("project",'model');
            $project->create_time = time();
        }
        $project->customer_id = $customer_id;
        $project->executor_uid = $data['executor_uid'];
        $project->planning_uid = $data['planning_uid'];
        $project->docking_uid = $data['docking_uid'];
        $project->manage_uid = $data['manage_uid'];
        $project->product_demand_1 = $data['product_demand_1'];
        $project->product_demand_2 = $data['product_demand_2'];
        $project->contract_status = $data['contract_status'];
        $project->contract_amount = $data['contract_amount'];
        $project->payment_type = $data['payment_type'];
        $project->payment_status = $data['payment_status'];
        $project->rate = $data['rate'];
        $project->cost = $data['cost'];
        if( $project->save()){
            return $project->id;
        }

    }

    //获取项目列表
    public function get_projects(){
        return Db::table("jckk_project")
            ->alias("p")
            ->field(["p.*","c.customer_name","c.customer_status_1","c.customer_status_2","eu.chinese_name as e_name",
                "pu.chinese_name as p_name","du.chinese_name as d_name","mu.chinese_name as m_name","d.department_name"])
            ->join("jckk_customer c ","p.customer_id = c.id","LEFT")
            ->join("jckk_user eu","p.executor_uid = eu.uid","LEFT")
            ->join("jckk_user pu","p.planning_uid = pu.uid","LEFT")
            ->join("jckk_user du","p.docking_uid = du.uid","LEFT")
            ->join("jckk_user mu","p.manage_uid = mu.uid","LEFT")
            ->join("jckk_department d","d.id = eu.department_id","LEFT")
            ->paginate();
    }

    //获取一条
    public function get_project($id){
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
    public function  delete_project($id){
        return $this->where("id",$id)->delete();
    }





}