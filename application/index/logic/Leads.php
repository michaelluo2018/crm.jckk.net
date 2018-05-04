<?php

namespace  app\index\logic;

use think\Db;
use think\Model;
use app\index\model\Log as Lead_Log;
use think\Session;

class Leads extends Model{


    protected  $table="jckk_leads";

    public  function get_leads(){

        return Db::table("jckk_leads")
            ->field(["jckk_leads.*","u.chinese_name as chinese_name","cu.chinese_name as create_name","c.contact_name","c.sex","c.mobile"])
            ->where("jckk_leads.is_delete","<>",1)
            ->join("jckk_user u","jckk_leads.uid=u.uid")
            ->join("jckk_user cu","jckk_leads.create_uid=cu.uid")
            ->join("jckk_contact c","jckk_leads.contact_id=c.id")
            ->select();

    }


    public function get_lead($id){
        return Db::table("jckk_leads")
            ->field(["jckk_leads.*","u.chinese_name as chinese_name","cu.chinese_name as create_name","c.contact_name","c.sex","c.mobile","c.position","c.email","c.qq","c.wechat"])
            ->where("jckk_leads.id",$id)
            ->join("jckk_user u","jckk_leads.uid=u.uid")
            ->join("jckk_user cu","jckk_leads.create_uid=cu.uid")
            ->join("jckk_contact c","jckk_leads.contact_id=c.id")
            ->find();
    }



    public  function  save_leads($data){

        $contact_id = model("contact","logic")->save_contact($data);

        if(isset($data['id'])){
           $lead = model("leads")->where("id",$data['id'])->find();
           $lead_log["before_value"] = json_encode($lead);
           $lead_log["type"] =Lead_Log::UPDATE_TYPE;
            $lead_log["title"] = "修改线索，线索ID是". $lead->id;
        }
        else {

            $lead = model("leads");
            $lead->create_time = time();
            $lead->create_uid = Session::get("uid");
            $lead_log["before_value"] = "";
            $lead_log["type"] = Lead_Log::ADD_TYPE;
        }

            $lead ->uid = $data["uid"];
            $lead ->company_name = $data["company_name"];
            $lead ->lead_from = $data["lead_from"];
            $lead ->address = $data["address"];
            $lead ->contact_time = $data["contact_time"];
            $lead ->contact_content = $data["contact_content"];
            $lead->contact_id = $contact_id;
            $lead->note = $data['note'];
            $lead->is_delete = 0;

            if($lead->save()){
                $lead_log["after_value"] = json_encode($lead);
                $lead_log["title"] = "添加线索，线索ID是". $lead->id;
                model("log","logic")->write_log( $lead_log);
            }
            return $lead->id;


    }


    public function delete_lead($id){

        $lead = $this->where("id",$id)->find();

        //添加日志
        $lead_log["type"] = Lead_Log::DELETE_TYPE;

        $lead_log["before_value"] = json_encode($lead);
        $lead_log["after_value"] = "";
        $lead_log["title"] = "删除线索,线索ID是".$lead->id;
        $lead->is_delete = 1;
        if($lead->save()){
            model("log","logic")->write_log( $lead_log);
        }


    }


    public  function  to_customer($lead_id,$customer_id){

        $lead = model("leads")->where("id",$lead_id)->find();
        $lead_log["before_value"] = json_encode($lead);
        $lead_log["type"] = Lead_Log::LEAD_CHANGE;
        $lead_log["title"] = "把线索转化为客户，客户ID是". $customer_id;
        $lead_log["after_value"] = "";
        model("leads")->where("id",$lead_id)->delete();
        model("log","logic")->write_log( $lead_log);

    }










}