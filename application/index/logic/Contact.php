<?php
namespace  app\index\logic;
use think\Model;
use app\index\model\Log;
class Contact extends Model{

    protected $table="jckk_contact";

    //检查客户重要联系人是否存在
    public  function  is_exist_contact_by_name_and_mobile($name,$mobile){
        if($contact = $this->where(["contact_name"=>$name,"mobile"=>$mobile])->find()){
            return $contact;
        }

    }
      public  function  is_exist_contact_by_id($id){
            if($contact = $this->where("id",$id)->find()){
                return $contact;
            }

        }

    public  function  save_contact($data){

        if(!$contact = model("contact","logic")->is_exist_contact_by_name_and_mobile($data['contact_name'],$data['contact_mobile'])){
            //联系人不存在
            $contact = model("contact",'model');
            $contact_log["type"] = Log::ADD_TYPE;
            $contact_log["before_value"] = "";
            $contact_log["title"] = "为". $data["customer_name"] ."(客户)添加联系人". $data["contact_name"];

        }else{
            $contact_log["type"] = Log::ADD_TYPE;
            $contact_log["before_value"] = json_encode($contact);
            $contact_log["title"] = "修改". $data["customer_name"] ."(客户)联系人". $data["contact_name"];
        }

        //save contact
        $contact->contact_name = $data["contact_name"];
        $contact->mobile = $data["contact_mobile"];
        $contact->position = $data["position"];
        $contact->sex = $data["radio_sex"]=="男"?0:1;
        $contact->email = $data["contact_email"];
        $contact->qq = $data["contact_qq"];
        $contact->create_time = time();
        $contact->save();

        $contact_log["after_value"] = json_encode($contact);
        model("log","logic")->write_log( $contact_log);

        return $contact->id;

    }


}