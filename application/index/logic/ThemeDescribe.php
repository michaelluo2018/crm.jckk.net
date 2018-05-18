<?php
namespace  app\index\logic;
use think\Model;
use think\Config;
use think\Db;
use app\index\model\Log;
use think\Session;

class ThemeDescribe extends Model{

    protected $table="jckk_theme_describe";


    //保存
    public  function  save_theme_describe($data){

        if(isset($data['theme_describe_id'])){
            //修改
            $theme_describe = model("theme_describe","model")->where("id",$data['theme_describe_id'])->find();
            $theme_describe_log["type"] = Log::UPDATE_TYPE;
            $theme_describe_log["before_value"] = json_encode($theme_describe);
            $theme_describe_log["title"] = "更改产品信息";

        }
        else{
            //添加
            $theme_describe = model("theme_describe",'model');
            $theme_describe->create_time = time();
            $theme_describe->create_uid = Session::get("uid");
            $theme_describe_log["type"] = Log::ADD_TYPE;
            $theme_describe_log["before_value"] = "";
            $theme_describe_log["title"] = "添加新产品";
        }

        $theme_describe->theme_describe_name = trim($data['theme_describe_name']);
        $theme_describe->theme_describe_from = trim($data['theme_describe_from']);
        $theme_describe->cost_price = trim($data['cost_price']);
        $theme_describe->recommend_price = trim($data['recommend_price']);
        $theme_describe->link = trim($data['link']);

        $theme_describe->develop_time = trim($data['develop_time']);
        $theme_describe->note = trim($data['note']);
        $theme_describe->is_delete = 0;

        if(isset($data['theme_describe_type'])){
            $theme_describe->theme_describe_type = $data['theme_describe_type'];
        }
        else{
            $theme_describe->theme_describe_type = null;
        }

        if($theme_describe->save()){
            $theme_describe_log["after_value"] = json_encode($theme_describe);
            model("log","logic")->write_log( $theme_describe_log);
        }

        return $theme_describe->id;


    }

    //获取列表
    public function get_theme_describes(){
        return Db::table("jckk_theme_describe")
            ->alias("p")
            ->field(["p.*","u.chinese_name"])
            ->where("p.is_delete","<>",1)
            ->join("jckk_user u","p.create_uid = u.uid","LEFT")
            ->select();
    }



    //获取一条
    public function get_theme_describe($id){

        return  $this->where("id",$id)->find();

    }



    //删除
    public function  delete_theme_describe($id){

        $theme_describe = $this->where("id",$id)->find();

        //添加日志
        $theme_describe_log["type"] = Log::DELETE_TYPE;

        $theme_describe_log["before_value"] = json_encode($theme_describe);
        $theme_describe_log["after_value"] = "";
        $theme_describe_log["title"] = "删除".$theme_describe->theme_describe_name."(产品)，ID是".$theme_describe->id;
        $theme_describe->is_delete = 1;
        if($theme_describe->save()){
            model("log","logic")->write_log( $theme_describe_log);
        }



    }



    public function get_theme_describe_by_sort($theme_id,$sort){

        return $this->where("theme_id",$theme_id)->where("describe_sort",$sort)->where("is_delete","<>",1)->select();

    }




}