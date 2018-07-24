<?php
namespace  app\index\logic;
use think\Model;
use think\Config;
use think\Db;
use app\index\model\Log;
use think\Session;

class Customer extends  Model{

    protected $table="jckk_customer";

    //获取所有客户
    public function get_customers($create_uids = null,$id_info="",$customer_name="",$customer_status_1="",$customer_status_2="",$contact_name="",$contact_mobile="",$create_name=""){

        if($create_uids){
            if($id_info){
                if($customer_name){
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                    }
                }
                else{
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                    }
                }
            }
            else{
                if($customer_name){
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                }
                else{
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                }
            }
        }
        else{
            if($id_info){
                if($customer_name){
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                }
                else{
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                }
            }
            else{
                if($customer_name){
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                           ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                }
                else{
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }

                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }

                            }
                        }
                    }
                }
            }
        }
    }







    public function get_customers_by_status($key,$status,$create_uids=null,$id_info="",$customer_name="",$customer_status_1="",$customer_status_2="",$contact_name="",$contact_mobile="",$create_name=""){
        if($create_uids){
            if($id_info){
                if($customer_name){
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                    }
                }
                else{
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                    }
                }
            }
            else{
                if($customer_name){
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                }
                else{
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->whereIn("jckk_customer.create_uid",$create_uids)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                }
            }
        }
        else{
            if($id_info){
                if($customer_name){
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                }
                else{
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.number","like","%".$id_info."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                }
            }
            else{
                if($customer_name){
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_name","like","%".$customer_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                }
                else{
                    if($customer_status_1){
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_1","like","%".$customer_status_1."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                    }
                    else{
                        if($customer_status_2){
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_customer.customer_status_2","like","%".$customer_status_2."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                            }
                        }
                        else{
                            if($contact_name){
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_contact.contact_name","like","%".$contact_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }

                            }
                            else{
                                if($contact_mobile){
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_contact.mobile","like","%".$contact_mobile."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }
                                else{
                                    if($create_name){
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->where("jckk_user.chinese_name","like","%".$create_name."%")
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }
                                    else{
                                        return Db::table("jckk_customer")
                                            ->where("jckk_customer.is_delete","<>",1)
                                            ->where("jckk_customer.".$key,$status)
                                            ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                                            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                                            ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                                            ->order("jckk_customer.id","desc")
                                            ->paginate(['query'=> request()->param(),]);
                                    }

                                }

                            }
                        }
                    }
                }
            }
        }

    }


    public function get_customers_recycle($create_uids = null){

        if($create_uids){
            return Db::table("jckk_customer")
                ->where("jckk_customer.is_delete",1)
                ->whereIn("jckk_customer.create_uid",$create_uids)
                ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                ->order("jckk_customer.id","desc")
                ->paginate(['query'=> request()->param(),]);
        }
        else{
            return Db::table("jckk_customer")
                ->where("jckk_customer.is_delete",1)
                ->field(["jckk_customer.*","jckk_user.chinese_name","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
                ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
                ->join("jckk_user","jckk_user.uid = jckk_customer.create_uid","LEFT")
                ->order("jckk_customer.id","desc")
                ->paginate(['query'=> request()->param(),]);
        }


    }





//获取一条客户信息
    public function get_customer_by_id($id){
        return Db::table("jckk_customer")
            ->field(["jckk_customer.*","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
            ->where("jckk_customer.id=".$id)
            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
            ->find();
    }

//获取客户添加select值
    public  function get_customer_entity(){
        $data['industry'] = Config::get("industry");
        $data['company_nature'] = Config::get("company_nature");
        $data['annual_turnover'] = Config::get("annual_turnover");
        $data['customer_status_1'] = Config::get("customer_status_1");
        $data['customer_status_2'] = Config::get("customer_status_2");
        return $data;
    }


//检验客户是否存在
    public function is_exist_customer_by_name($customer_name){

        if($customer = $this->where("customer_name",$customer_name)->where("is_delete","<>",1)->find()){
            return $customer;
        }
    }

//检验客户是否存在
    public function is_exist_customer_by_name_recycle($customer_name){

        if($customer = $this->where("customer_name",$customer_name)->where("is_delete",1)->find()){
            return $customer;
        }
    }







    public function is_exist_customer_by_id($id){

        if($customer = $this->where("id",$id)->where("is_delete","<>",1)->find()){
            return $customer;
        }
    }

//添加客户
    public function save_customer($data){

        if(isset($data['customer_id'])){
//修改客户
            return $this->save_edit_customer($data);
        }
        elseif($customer = $this->is_exist_customer_by_name(trim($data['customer_name']))) {
//客户存在
            $data['customer_id'] = $customer->id;
//修改客户
            return $this->save_edit_customer($data);
        }
        elseif ( $customer = $this->is_exist_customer_by_name_recycle(trim($data['customer_name']))){
//客户存在于回收站
            $data['customer_id'] = $customer->id;

//修改客户
            return $this->save_edit_customer($data,$customer);
        }
        else{
            $contact_id = model("contact","logic")->save_contact($data);

//save customer
            $customer = model("customer",'model');
            $customer ->customer_name = $data["customer_name"];
            $customer->industry = $data['industry'];
            $customer->company_nature = $data['company_nature'];
            $customer->annual_turnover = $data['annual_turnover'];
            $customer->customer_status_1 = $data['customer_status_1'];
            $customer->customer_status_2 = $data['customer_status_2'];
            $customer->contact_id = $contact_id;
            $customer->note = $data['note'];
            $customer->is_delete = 0;
            $customer->create_time = time();
            $customer->number = "C".date('Ymd',time())."-".rand(100,999);
            if(isset($data['create_uid'])){
                $customer->create_uid = $data['create_uid'];
            }
            else{
                $customer->create_uid = Session::get("uid");
            }
            if($customer->save()){
                $customer_log["type"] = Log::ADD_TYPE;
                $customer_log["before_value"] = "";
                $customer_log["after_value"] = json_encode($customer);
                $customer_log["title"] = "添加". $data["customer_name"] ."(客户)，客户ID是". $customer->id;
                model("log","logic")->write_log( $customer_log);
            }
            return $customer->id;
        }





    }

//修改客户
    public function save_edit_customer($data,$recycle = null){

        $contact_id = model("contact","logic")->save_contact($data);

        if($recycle){
            $customer = $recycle;
            $before_value = json_encode($recycle);
        }
        else{
            if(!$customer = $this->is_exist_customer_by_id($data['customer_id'])){
                return ;
            }
            else{
                $before_value = json_encode($customer);
            }
        }

//save customer
        $customer ->customer_name = trim($data["customer_name"]);
        $customer->industry = trim($data['industry']);
        $customer->company_nature = trim($data['company_nature']);
        $customer->annual_turnover = trim($data['annual_turnover']);
        $customer->customer_status_1 = trim($data['customer_status_1']);
        $customer->customer_status_2 = trim($data['customer_status_2']);
        $customer->contact_id = $contact_id;
        $customer->note = trim($data['note']);
        $customer->is_delete = 0;

        if($customer->save()){
            $customer_log["type"] = Log::UPDATE_TYPE;
            $customer_log["before_value"] = $before_value;
            $customer_log["after_value"] = json_encode($customer);
            $customer_log["title"] = "修改". $data["customer_name"] ."(客户)，客户ID是". $customer->id;
            model("log","logic")->write_log( $customer_log);
        }


        return $customer->id;

    }





//删除客户
    public  function delete_customer($id)
    {
//检测客户是否有项目
        $projects = model("project","logic")->get_projects($id);
        $array = collection($projects)->toArray();
        if(empty($array)) {
            $customer = $this->where("id",$id)->find();

//添加日志
            $customer_log["type"] = Log::DELETE_TYPE;

            $customer_log["before_value"] = json_encode($customer);
            $customer_log["after_value"] = "";
            $customer_log["title"] = "删除".$customer->customer_name."(客户),客户ID是".$customer->id;
            $customer->is_delete = 1;
            if($customer->save()){
                model("log","logic")->write_log( $customer_log);
            }
        }
        else{

            return "该客户还有项目存在，不能删除！";
        }

    }

//还原客户
    public  function customer_back($id)
    {
        $customer = $this->where("id",$id)->find();

        if($this->is_exist_customer_by_name($customer->customer_name)){
            return $customer->customer_name ."已经存在，请勿重复";
        }
        else{
//添加日志
            $customer_log["type"] = Log::BACK_DELETE;

            $customer_log["before_value"] = json_encode($customer);

            $customer_log["title"] = "还原".$customer->customer_name."(客户),客户ID是".$customer->id;
            $customer->is_delete = 0;
            if($customer->save()){

                $customer_log["after_value"] = json_encode($customer);
                model("log","logic")->write_log( $customer_log);
            }
            return ;
        }


    }



//删除回收站客户
    public  function delete_customer_true($id)
    {

//查看回收站是否还有该客户项目
        $projects = model("project","logic")->project_recycle($id);
        $array =collection($projects)->toArray();
        if(empty($array)) {

            $customer = $this->where("id", $id)->find();

//添加日志
            $customer_log["type"] = Log::DELETE_TRUE;

            $customer_log["before_value"] = json_encode($customer);
            $customer_log["after_value"] = "";
            $customer_log["title"] = "彻底删除" . $customer->customer_name . "(客户),客户ID是" . $customer->id;

            if ($customer->delete()) {
                model("log", "logic")->write_log($customer_log);
            }

        }
        else{

            return "回收站还有该客户项目存在，不能删除！";
        }
    }




    public function  total_customer($uids=null){

        if($uids && $uids!='all'){
            return $this->where("is_delete","<>",1)
                ->whereIn("create_uid",$uids)
                ->count();
        }
        else{
            return $this->where("is_delete","<>",1)->count();
        }

    }

    public function  find_by_name($name){
        return Db::table("jckk_customer")
            ->where("jckk_customer.is_delete","<>",1)
            ->where("jckk_customer.customer_name","like","%".$name."%")
            ->field(["jckk_customer.*","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq","jckk_contact.wechat"])
            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
            ->paginate(['query'=> request()->param(),]);
    }

    public function  get_customer_like_name($name){
        return $this->where("customer_name","like","%".$name."%")->where("is_delete","<>",1)->select();
    }


    public function customer_count_status_1($name,$uids=null){
        if($uids && $uids!='all'){
            $data = $this->where("customer_status_1",$name)
                ->where("is_delete","<>",1)
                ->where("create_uid","in",$uids)
                ->count();
        }
        else{
            $data = $this->where("customer_status_1",$name)->where("is_delete","<>",1)->count();
        }

        return $data;
    }
    public function customer_count_status_2($name,$uids=null){
        if($uids && $uids!='all'){
            $data = $this->where("customer_status_2",$name)
                ->where("is_delete","<>",1)
                ->where("create_uid","in",$uids)
                ->count();
        }
        else{
            $data = $this->where("customer_status_2",$name)->where("is_delete","<>",1)->count();
        }

        return $data;
    }

















}