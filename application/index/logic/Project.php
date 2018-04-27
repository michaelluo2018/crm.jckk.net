<?php
namespace  app\index\logic;
use think\Model;
use think\Config;
use think\Db;
use app\index\model\Log;
use think\Session;

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


        $project->project_name =$project_name;
        $project->customer_id = $customer_id;
        $project->executor_uid = trim($data['executor_uid']);
        $project->planning_uid = trim($data['planning_uid']);
        $project->docking_uid = trim($data['docking_uid']);
        $project->manage_uid = trim($data['manage_uid']);
        $project->product_demand_1 = trim($data['product_demand_1']);
        $project->product_demand_2 = trim($data['product_demand_2']);
        $project->contract_status = trim($data['contract_status']);
        $project->contract_amount = trim($data['contract_amount']);
        $project->payment_type = trim($data['payment_type']);
        $project->payment_status = trim($data['payment_status']);
        $project->rate = trim($data['rate']);
        $project->cost = trim($data['cost']);
        $project->cost_note = trim($data['cost_note']);
        $project->company_name = trim($data['company_name']);
        $project->is_delete = 0;

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

    //获取项目列表
    public function get_projects($customer_id = null,$create_uids = null){

        if($customer_id){

            if($create_uids){
                return Db::table("jckk_project")
                    ->alias("p")
                    ->where("p.is_delete","<>",1)
                    ->where("p.customer_id",$customer_id)
                    ->whereIn("p.create_uid",$create_uids)
                    ->field(["p.*","c.customer_name","c.customer_status_1","c.customer_status_2","eu.chinese_name as e_name",
                        "pu.chinese_name as p_name","du.chinese_name as d_name","mu.chinese_name as m_name","cu.chinese_name as c_name","d.department_name"])
                    ->join("jckk_customer c ","p.customer_id = c.id","LEFT")
                    ->join("jckk_user eu","p.executor_uid = eu.uid","LEFT")
                    ->join("jckk_user pu","p.planning_uid = pu.uid","LEFT")
                    ->join("jckk_user du","p.docking_uid = du.uid","LEFT")
                    ->join("jckk_user mu","p.manage_uid = mu.uid","LEFT")
                    ->join("jckk_user cu","p.create_uid = cu.uid","LEFT")
                    ->join("jckk_department d","d.id = eu.department_id","LEFT")
                    ->order("p.id","desc")
                    ->select();
            }
            else{
                return Db::table("jckk_project")
                    ->alias("p")
                    ->where("p.is_delete","<>",1)
                    ->where("p.customer_id",$customer_id)
                    ->field(["p.*","c.customer_name","c.customer_status_1","c.customer_status_2","eu.chinese_name as e_name",
                        "pu.chinese_name as p_name","du.chinese_name as d_name","mu.chinese_name as m_name","cu.chinese_name as c_name","d.department_name"])
                    ->join("jckk_customer c ","p.customer_id = c.id","LEFT")
                    ->join("jckk_user eu","p.executor_uid = eu.uid","LEFT")
                    ->join("jckk_user pu","p.planning_uid = pu.uid","LEFT")
                    ->join("jckk_user du","p.docking_uid = du.uid","LEFT")
                    ->join("jckk_user mu","p.manage_uid = mu.uid","LEFT")
                    ->join("jckk_user cu","p.create_uid = cu.uid","LEFT")
                    ->join("jckk_department d","d.id = eu.department_id","LEFT")
                    ->order("p.id","desc")
                    ->select();
            }

        }
        else{

            if($create_uids){
                return Db::table("jckk_project")
                    ->alias("p")
                    ->where("p.is_delete","<>",1)
                    ->whereIn("p.create_uid",$create_uids)
                    ->field(["p.*","c.customer_name","c.customer_status_1","c.customer_status_2","eu.chinese_name as e_name",
                        "pu.chinese_name as p_name","du.chinese_name as d_name","mu.chinese_name as m_name","cu.chinese_name as c_name","d.department_name"])
                    ->join("jckk_customer c ","p.customer_id = c.id","LEFT")
                    ->join("jckk_user eu","p.executor_uid = eu.uid","LEFT")
                    ->join("jckk_user pu","p.planning_uid = pu.uid","LEFT")
                    ->join("jckk_user du","p.docking_uid = du.uid","LEFT")
                    ->join("jckk_user mu","p.manage_uid = mu.uid","LEFT")
                    ->join("jckk_user cu","p.create_uid = cu.uid","LEFT")
                    ->join("jckk_department d","d.id = eu.department_id","LEFT")
                    ->order("p.id","desc")
                    ->select();
            }
            else{
                return Db::table("jckk_project")
                    ->alias("p")
                    ->where("p.is_delete","<>",1)
                    ->field(["p.*","c.customer_name","c.customer_status_1","c.customer_status_2","eu.chinese_name as e_name",
                        "pu.chinese_name as p_name","du.chinese_name as d_name","mu.chinese_name as m_name","cu.chinese_name as c_name","d.department_name"])
                    ->join("jckk_customer c ","p.customer_id = c.id","LEFT")
                    ->join("jckk_user eu","p.executor_uid = eu.uid","LEFT")
                    ->join("jckk_user pu","p.planning_uid = pu.uid","LEFT")
                    ->join("jckk_user du","p.docking_uid = du.uid","LEFT")
                    ->join("jckk_user mu","p.manage_uid = mu.uid","LEFT")
                    ->join("jckk_user cu","p.create_uid = cu.uid","LEFT")
                    ->join("jckk_department d","d.id = eu.department_id","LEFT")
                    ->order("p.id","desc")
                    ->select();
            }

        }

    }



    //获取项目列表
    public function project_recycle($customer_id = null,$create_uids=null){
        if($customer_id){
            if($create_uids){
                return Db::table("jckk_project")
                    ->alias("p")
                    ->where("p.is_delete",1)
                    ->where("p.customer_id",$customer_id)
                    ->whereIn("p.create_uid",$create_uids)
                    ->field(["p.*","c.customer_name","c.customer_status_1","c.customer_status_2","eu.chinese_name as e_name",
                        "pu.chinese_name as p_name","du.chinese_name as d_name","mu.chinese_name as m_name","cu.chinese_name as c_name","d.department_name"])
                    ->join("jckk_customer c ","p.customer_id = c.id","LEFT")
                    ->join("jckk_user eu","p.executor_uid = eu.uid","LEFT")
                    ->join("jckk_user pu","p.planning_uid = pu.uid","LEFT")
                    ->join("jckk_user du","p.docking_uid = du.uid","LEFT")
                    ->join("jckk_user mu","p.manage_uid = mu.uid","LEFT")
                    ->join("jckk_user cu","p.create_uid = cu.uid","LEFT")
                    ->join("jckk_department d","d.id = eu.department_id","LEFT")
                    ->order("p.id","desc")
                    ->select();
            }
            else{
                return Db::table("jckk_project")
                    ->alias("p")
                    ->where("p.is_delete",1)
                    ->where("p.customer_id",$customer_id)
                    ->field(["p.*","c.customer_name","c.customer_status_1","c.customer_status_2","eu.chinese_name as e_name",
                        "pu.chinese_name as p_name","du.chinese_name as d_name","mu.chinese_name as m_name","cu.chinese_name as c_name","d.department_name"])
                    ->join("jckk_customer c ","p.customer_id = c.id","LEFT")
                    ->join("jckk_user eu","p.executor_uid = eu.uid","LEFT")
                    ->join("jckk_user pu","p.planning_uid = pu.uid","LEFT")
                    ->join("jckk_user du","p.docking_uid = du.uid","LEFT")
                    ->join("jckk_user mu","p.manage_uid = mu.uid","LEFT")
                    ->join("jckk_user cu","p.create_uid = cu.uid","LEFT")
                    ->join("jckk_department d","d.id = eu.department_id","LEFT")
                    ->order("p.id","desc")
                    ->select();
            }

        }
        else{

            if($create_uids){
                return Db::table("jckk_project")
                    ->alias("p")
                    ->where("p.is_delete",1)
                    ->whereIn("p.create_uid",$create_uids)
                    ->field(["p.*","c.customer_name","c.customer_status_1","c.customer_status_2","eu.chinese_name as e_name",
                        "pu.chinese_name as p_name","du.chinese_name as d_name","mu.chinese_name as m_name","cu.chinese_name as c_name","d.department_name"])
                    ->join("jckk_customer c ","p.customer_id = c.id","LEFT")
                    ->join("jckk_user eu","p.executor_uid = eu.uid","LEFT")
                    ->join("jckk_user pu","p.planning_uid = pu.uid","LEFT")
                    ->join("jckk_user du","p.docking_uid = du.uid","LEFT")
                    ->join("jckk_user mu","p.manage_uid = mu.uid","LEFT")
                    ->join("jckk_user cu","p.create_uid = cu.uid","LEFT")
                    ->join("jckk_department d","d.id = eu.department_id","LEFT")
                    ->order("p.id","desc")
                    ->select();
            }
            else{
                return Db::table("jckk_project")
                    ->alias("p")
                    ->where("p.is_delete",1)
                    ->field(["p.*","c.customer_name","c.customer_status_1","c.customer_status_2","eu.chinese_name as e_name",
                        "pu.chinese_name as p_name","du.chinese_name as d_name","mu.chinese_name as m_name","cu.chinese_name as c_name","d.department_name"])
                    ->join("jckk_customer c ","p.customer_id = c.id","LEFT")
                    ->join("jckk_user eu","p.executor_uid = eu.uid","LEFT")
                    ->join("jckk_user pu","p.planning_uid = pu.uid","LEFT")
                    ->join("jckk_user du","p.docking_uid = du.uid","LEFT")
                    ->join("jckk_user mu","p.manage_uid = mu.uid","LEFT")
                    ->join("jckk_user cu","p.create_uid = cu.uid","LEFT")
                    ->join("jckk_department d","d.id = eu.department_id","LEFT")
                    ->order("p.id","desc")
                    ->select();
            }

        }

    }




    public function get_projects_name($customer_id ){

            return $this->where("customer_id",$customer_id)->where("is_delete","<>",1)->select();


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



    //彻底删除
    public function  project_del_true($id){

        $project = $this->where("id",$id)->find();
        $customer = model("customer")->where("id",$project->customer_id)->find();

        //添加日志
        $project_log["type"] = Log::DELETE_TRUE;

        $project_log["before_value"] = json_encode($project);
        $project_log["after_value"] = "";
        $project_log["title"] = "彻底删除".$customer->customer_name."(客户)的项目,项目ID是".$project->id;

        if($project->delete()){
            model("log","logic")->write_log( $project_log);
        }



    }



    public function  total_project(){
        return $this->where("is_delete","<>",1)->count();
    }


    public function find_by_name($name){

        return Db::table("jckk_project")
            ->alias("p")
            ->where("p.is_delete","<>",1)
            ->where("c.customer_name","like",'%'.$name .'%')
            ->field(["p.*","c.customer_name","c.customer_status_1","c.customer_status_2","eu.chinese_name as e_name",
                "pu.chinese_name as p_name","du.chinese_name as d_name","mu.chinese_name as m_name","d.department_name"])
            ->join("jckk_customer c ","p.customer_id = c.id","LEFT")
            ->join("jckk_user eu","p.executor_uid = eu.uid","LEFT")
            ->join("jckk_user pu","p.planning_uid = pu.uid","LEFT")
            ->join("jckk_user du","p.docking_uid = du.uid","LEFT")
            ->join("jckk_user mu","p.manage_uid = mu.uid","LEFT")
            ->join("jckk_department d","d.id = eu.department_id","LEFT")
            ->select();
    }



    public function contract_count_status($status){

        return $this->where("contract_status",$status)->where("is_delete","<>",1)->count();
    }


    public function product_demand_count_1($status){

        return $this->where("product_demand_1",$status)->where("is_delete","<>",1)->count();
    }





    public  function  check_exist_project_name($project_name,$customer_id,$project_id =null){

        $project_name = trim($project_name);
        if($project_id){
            return $this->where("project_name",$project_name)
                ->where("customer_id",$customer_id)
                ->where("project_id","<>",$project_id)
                ->where("is_delete","<>",1)->count();
        }
        else{

            return $this->where("project_name",$project_name)->where("customer_id",$customer_id)->where("is_delete","<>",1)->count();
        }


    }


    //还原项目
    public function project_back($id){

        $project = $this->where("id",$id)->find();
        //检查是否已有同名项目

       if( $this->check_exist_project_name($project->project_name,$project->customer_id)){

           return "该客户已经有同名项目，还原失败!";
       }
       else{

           $customer = model("customer")->where("id",$project->customer_id)->find();

           //添加日志
           $project_log["type"] = Log::BACK_DELETE;

           $project_log["before_value"] = json_encode($project);

           $project_log["title"] = "还原".$customer->customer_name."(客户)的项目,项目ID是".$project->id;
           $project->is_delete = 0;
           if($project->save()){
               $project_log["after_value"] = json_encode($project);
               model("log","logic")->write_log( $project_log);
           }
       }


    }






}