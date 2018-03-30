<?php
namespace  app\index\logic;
use think\Model;
use think\Config;
use think\Db;
use app\index\model\Log;
class Customer extends  Model{

    protected $table="jckk_customer";

    //获取所有客户
    public function get_customers(){
        return Db::table("jckk_customer")
            ->field(["jckk_customer.*","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq"])
            ->join("jckk_contact","jckk_customer.contact_id = jckk_contact.id","LEFT")
            ->paginate();
    }


    //获取一条客户信息
    public function get_customer_by_id($id){
        return Db::table("jckk_customer")
            ->field(["jckk_customer.*","jckk_contact.contact_name","jckk_contact.position","jckk_contact.sex","jckk_contact.mobile","jckk_contact.email","jckk_contact.qq"])
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

        if($customer = $this->where("customer_name",$customer_name)->find()){
            return $customer;
        }
    }

    public function is_exist_customer_by_id($id){

        if($customer = $this->where("id",$id)->find()){
            return $customer;
        }
    }

    //添加客户
    public function save_customer($data){
            if(isset($data['customer_id'])){
                //修改客户
               return $this->save_edit_customer($data);
            }

            if($customer = $this->is_exist_customer_by_name($data['customer_name'])){
                //客户存在
                $data['customer_id'] = $customer->id;
                //修改客户
                return $this->save_edit_customer($data);
            }

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
            $customer->create_time = time();
            $customer->save();

            $customer_log["type"] = Log::ADD_TYPE;
            $customer_log["before_value"] = "";
            $customer_log["after_value"] = json_encode($customer);
            $customer_log["title"] = "添加". $data["customer_name"] ."(客户)，客户ID是". $customer->id;
            model("log","logic")->write_log( $customer_log);

            return $customer->id;

    }

    //修改客户
    public function save_edit_customer($data){

            $contact_id = model("contact","logic")->save_contact($data);

            if(!$customer = $this->is_exist_customer_by_id($data['customer_id'])){
                //客户不存在
               return "customer not exist";
            }
            else{
                $before_value = json_encode($customer);
            }
            //save customer
            $customer ->customer_name = $data["customer_name"];
            $customer->industry = $data['industry'];
            $customer->company_nature = $data['company_nature'];
            $customer->annual_turnover = $data['annual_turnover'];
            $customer->customer_status_1 = $data['customer_status_1'];
            $customer->customer_status_2 = $data['customer_status_2'];
            $customer->contact_id = $contact_id;
            $customer->note = $data['note'];
            $customer->create_time = time();
            $customer->save();

            $customer_log["type"] = Log::UPDATE_TYPE;
            $customer_log["before_value"] = $before_value;
            $customer_log["after_value"] = json_encode($customer);
            $customer_log["title"] = "修改". $data["customer_name"] ."(客户)，客户ID是". $customer->id;
            model("log","logic")->write_log( $customer_log);

            return $customer->id;

    }





    //删除客户
    public  function delete_customer($id)
    {
        $customer = $this->where("id",$id)->find();

        //添加日志
        $customer_log["type"] = Log::DELETE_TYPE;

        $customer_log["before_value"] = json_encode($customer);
        $customer_log["after_value"] = "";
        $customer_log["title"] = "删除".$customer->customer_name."(客户),客户ID是".$customer->id;
        model("log","logic")->write_log( $customer_log);
        $customer->is_delete = 1;
        return   $customer->save();
       
    }


}