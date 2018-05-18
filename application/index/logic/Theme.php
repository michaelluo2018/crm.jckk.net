<?php
namespace  app\index\logic;
use think\Model;
use think\Config;
use think\Db;
use app\index\model\Log;
use think\Session;

class Theme extends Model{

    protected $table="jckk_theme";


    //保存
    public  function  save_theme($data){

        if(isset($data['theme_id'])){
            //修改
            $theme = model("theme","model")->where("id",$data['theme_id'])->find();
            $theme_log["type"] = Log::UPDATE_TYPE;
            $theme_log["before_value"] = json_encode($theme);
            $theme_log["title"] = "更改产品信息";

        }
        else{
            //添加
            $theme = model("theme",'model');
            $theme->create_time = time();
            $theme->create_uid = Session::get("uid");
            $theme_log["type"] = Log::ADD_TYPE;
            $theme_log["before_value"] = "";
            $theme_log["title"] = "添加新产品";
        }

        $theme->theme_name = trim($data['theme_name']);
        $theme->theme_from = trim($data['theme_from']);
        $theme->cost_price = trim($data['cost_price']);
        $theme->recommend_price = trim($data['recommend_price']);
        $theme->link = trim($data['link']);

        $theme->develop_time = trim($data['develop_time']);
        $theme->note = trim($data['note']);
        $theme->is_delete = 0;

        if(isset($data['theme_type'])){
            $theme->theme_type = $data['theme_type'];
        }
        else{
            $theme->theme_type = null;
        }

        if($theme->save()){
            $theme_log["after_value"] = json_encode($theme);
            model("log","logic")->write_log( $theme_log);
        }

        return $theme->id;


    }

    //获取列表
    public function get_themes(){
        return Db::table("jckk_theme")
            ->alias("p")
            ->field(["p.*","u.chinese_name"])
            ->where("p.is_delete","<>",1)
            ->join("jckk_user u","p.create_uid = u.uid","LEFT")
            ->select();
    }



    //获取一条
    public function get_theme($id){

        return  $this->where("id",$id)->find();

    }



    //删除
    public function  delete_theme($id){

        $theme = $this->where("id",$id)->find();

        //添加日志
        $theme_log["type"] = Log::DELETE_TYPE;

        $theme_log["before_value"] = json_encode($theme);
        $theme_log["after_value"] = "";
        $theme_log["title"] = "删除".$theme->theme_name."(产品)，ID是".$theme->id;
        $theme->is_delete = 1;
        if($theme->save()){
            model("log","logic")->write_log( $theme_log);
        }



    }



    public function get_theme_by_type($theme_type){

        return $this->where("theme_type",$theme_type)->where("is_delete","<>",1)->select();

    }




}