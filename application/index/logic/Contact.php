<?php
namespace  app\index\logic;
use think\Model;
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




}