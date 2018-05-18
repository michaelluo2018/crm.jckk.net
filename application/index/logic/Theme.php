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
            $theme_log["title"] = "更改主题信息";

        }
        else{
            //添加
            $theme = model("theme",'model');
            $theme->create_time = time();
            $theme_log["type"] = Log::ADD_TYPE;
            $theme_log["before_value"] = "";
            $theme_log["title"] = "添加新主题";
        }

        $theme->theme_name = trim($data['theme_name']);
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
        $array = array();
        $themes = $this->where("is_delete",0)->order("id desc")->select();
        foreach ($themes as $key=>$value){
            $array[$key]["theme"] = $value;
            $array[$key]["describes"] = $this->get_theme_and_describe($value->id);
        }

        return $array;
    }



    //获取一条
    public function get_theme($id){

        return  $this->where("id",$id)->find();

    }

    public function get_theme_and_describe($id){
        return  model("theme_describe","logic")->get_theme_describes($id);

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