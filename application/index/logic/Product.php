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
    public  function  save_product($data,$file){

        if(isset($file)&&!$url=model("user","logic")->upload_heard_img($file)){
            return ["status"=>"error","msg"=>"图片上传错误"];
        }



        if(isset($data['product_id'])){
            //修改
            $product = model("product","model")->where("id",$data['product_id'])->find();
            $product_log["type"] = Log::UPDATE_TYPE;
            $product_log["before_value"] = json_encode($product);
            $product_log["title"] = "更改产品信息";

        }
        else{
            //添加
            $product = model("product",'model');
            $product->create_time = time();
            $product->create_uid = Session::get("uid");
            $product_log["type"] = Log::ADD_TYPE;
            $product_log["before_value"] = "";
            $product_log["title"] = "添加新产品";
        }
        if(isset($url)){
            $img_url = "/uploads/".$url;
            $product->img = $img_url;
        }

        $product->product_name = trim($data['product_name']);
        $product->product_from = trim($data['product_from']);
        $product->cost_price = trim($data['cost_price']);
        $product->recommend_price = trim($data['recommend_price']);
        $product->link = trim($data['link']);

        $product->develop_time = trim($data['develop_time']);
        $product->note = trim($data['note']);
        $product->is_delete = 0;

        if(isset($data['product_type'])){
            $product->product_type = $data['product_type'];
        }
        else{
            $product->product_type = null;
        }

        if($product->save()){
            $product_log["after_value"] = json_encode($product);
            model("log","logic")->write_log( $product_log);
        }

        return $product->id;


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
        
        return  $this->where("id",$id)->find();
        
    }



    //删除
    public function  delete_product($id){
        
        $product = $this->where("id",$id)->find();

        //添加日志
        $product_log["type"] = Log::DELETE_TYPE;

        $product_log["before_value"] = json_encode($product);
        $product_log["after_value"] = "";
        $product_log["title"] = "删除".$product->product_name."(产品)，ID是".$product->id;
        $product->is_delete = 1;
        if($product->save()){
            model("log","logic")->write_log( $product_log);
        }



    }








}