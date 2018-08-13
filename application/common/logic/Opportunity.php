<?php

namespace  app\common\logic;

use think\Config;
use think\Db;
use think\Model;
use app\common\model\Log;
use think\Session;

class Opportunity extends Model{

    protected $table="jckk_opportunity";

    public function get_opportunity_entity(){

        $data['opportunity_type'] =  Config::get("opportunity_type");
        $data['opportunity_status'] =  Config::get("opportunity_status");
        $data['opportunity_from'] =  Config::get("opportunity_from");

        return $data;
    }



    //保存
    public  function  save_opportunity($data){

        if(isset($data['opportunity_id'])){
            //修改
            $opportunity = model("opportunity","model")->where("id",$data['opportunity_id'])->find();
            $opportunity_log["type"] = Log::UPDATE_TYPE;
            $opportunity_log["before_value"] = json_encode($opportunity);
            $opportunity_log["title"] = "更改商机信息";

        }
        else{
            //添加
            $opportunity = model("opportunity",'model');
            $opportunity->create_time = time();
            $opportunity->create_uid = Session::get("uid");
            $opportunity_log["type"] = Log::ADD_TYPE;
            $opportunity_log["before_value"] = "";
            $opportunity_log["title"] = "添加新商机";
        }


        $opportunity->uid = trim($data['uid']);
        $opportunity->customer_id = trim($data['customer_id']);
        $opportunity->opportunity_name = trim($data['opportunity_name']);
        $opportunity->opportunity_from = trim($data['opportunity_from']);
//        $opportunity->contact_id = trim($data['contact_id']);
      //  $opportunity->address = trim($data['address']);
        $opportunity->contact_time = trim($data['contact_time']);
        $opportunity->contact_content = trim($data['contact_content']);
        $opportunity->note = trim($data['note']);
        $opportunity->money = trim($data['money']);
        $opportunity->type = trim($data['type']);
        $opportunity->status = trim($data['status']);
        $opportunity->gain_rate = trim($data['gain_rate']);
        $opportunity->plan_money = trim($data['plan_money']);
        $opportunity->product_id = trim($data['product_id']);
        $opportunity->is_delete = 0;

        if($opportunity->save()){
            $opportunity_log["after_value"] = json_encode($opportunity);
            model("log","logic")->write_log( $opportunity_log);
        }

        return $opportunity->id;


    }


    //获取列表
    public function get_opportunities(){
        return Db::table("jckk_opportunity")
            ->alias("o")
            ->field(["o.*","cu.customer_name","u.chinese_name as chinese_name","uc.chinese_name as create_name","co.contact_name","pr.product_name"])
            ->where("o.is_delete","<>",1)
            ->join("jckk_customer cu","o.customer_id = cu.id","LEFT")
            ->join("jckk_contact co","cu.contact_id = co.id","LEFT")
            ->join("jckk_user u","o.uid = u.uid","LEFT")
            ->join("jckk_user uc","o.create_uid = uc.uid","LEFT")
            ->join("jckk_product pr","o.product_id = pr.id","LEFT")
            ->select();
    }



    //获取一条
    public function get_opportunity($id){

        return   Db::table("jckk_opportunity")
            ->alias("o")
            ->field(["o.*","cu.customer_name","u.chinese_name as chinese_name","pr.product_name"])
            ->where("o.id",$id)
            ->join("jckk_customer cu","o.customer_id = cu.id","LEFT")
            ->join("jckk_user u","o.uid = u.uid","LEFT")
            ->join("jckk_product pr","o.product_id = pr.id","LEFT")
            ->find();

    }



    //删除
    public function  delete_opportunity($id){

        $opportunity = $this->where("id",$id)->find();
        //添加日志
        $opportunity_log["type"] = Log::DELETE_TYPE;
        $opportunity_log["before_value"] = json_encode($opportunity);
        $opportunity_log["after_value"] = "";
        $opportunity_log["title"] = "删除".$opportunity->opportunity_name."(产品)，ID是".$opportunity->id;
        $opportunity->is_delete = 1;
        if($opportunity->save()){
            model("log","logic")->write_log( $opportunity_log);
        }



    }









}
