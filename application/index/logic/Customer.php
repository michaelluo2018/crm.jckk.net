<?php
namespace  app\index\logic;
use think\Model;
use think\Config;
use think\Db;
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

            if(!$contact = model("contact","logic")->is_exist_contact_by_name_and_mobile($data['contact_name'],$data['contact_mobile'])){
                //联系人不存在
                $contact = model("contact",'model');
            }
            //save contact
            $contact->contact_name = $data["contact_name"];
            $contact->mobile = $data["contact_mobile"];
            $contact->position = $data["position"];
            $contact->sex = $data["radio_sex"]=="男"?0:1;
            $contact->email = $data["contact_email"];
            $contact->qq = $data["contact_qq"];
            $contact->create_time = time();

            if( !$contact->save()){
                return "save contact error";
            }
            if(!$customer = $this->is_exist_customer_by_name($data['customer_name'])){
                //客户不存在
                $customer = model("customer",'model');
            }
            //save customer
             $customer ->customer_name = $data["customer_name"];
            $customer->industry = $data['industry'];
            $customer->company_nature = $data['company_nature'];
            $customer->annual_turnover = $data['annual_turnover'];
            $customer->customer_status_1 = $data['customer_status_1'];
            $customer->customer_status_2 = $data['customer_status_2'];
            $customer->contact_id = $contact->id;
            $customer->note = $data['note'];
            $customer->create_time = time();

            if($customer->save()){
                return $customer->id;
            }
    }

    //修改客户
    public function save_edit_customer($data){

        if(!$contact = model("contact","logic")->is_exist_contact_by_id($data['contact_id'])){
            //联系人不存在
            $contact = model("contact",'model');
        }
        //save contact
        $contact->contact_name = $data["contact_name"];
        $contact->mobile = $data["contact_mobile"];
        $contact->position = $data["position"];
        $contact->sex = $data["radio_sex"]=="男"?0:1;
        $contact->email = $data["contact_email"];
        $contact->qq = $data["contact_qq"];
        $contact->create_time = time();

        if( !$contact->save()){
            return "save contact error";
        }
        if(!$customer = $this->is_exist_customer_by_id($data['customer_id'])){
            //客户不存在
           return "customer not exist";
        }
        //save customer
        $customer ->customer_name = $data["customer_name"];
        $customer->industry = $data['industry'];
        $customer->company_nature = $data['company_nature'];
        $customer->annual_turnover = $data['annual_turnover'];
        $customer->customer_status_1 = $data['customer_status_1'];
        $customer->customer_status_2 = $data['customer_status_2'];
        $customer->contact_id = $contact->id;
        $customer->note = $data['note'];
        $customer->create_time = time();

        if($customer->save()){
            return $customer->id;
        }
    }

    //删除客户
    public  function delete_customer($id)
    {
        return $this->where("id",$id)->delete();
    }


}