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
            $theme_describe_log["title"] = "更改主题内容";

        }
        else{
            //添加
            $theme_describe = model("theme_describe",'model');
            $theme_describe->create_time = time();

            $theme_describe_log["type"] = Log::ADD_TYPE;
            $theme_describe_log["before_value"] = "";
            $theme_describe_log["title"] = "添加主题内容";
        }

        $theme_describe->theme_id = trim($data['theme_id']);
        $theme_describe->theme_describe= trim($data['theme_describe']);
        $theme_describe->describe_sort = trim($data['describe_sort']);
        $theme_describe->is_delete = 0;

        if($theme_describe->save()){
            $theme_describe_log["after_value"] = json_encode($theme_describe);
            model("log","logic")->write_log( $theme_describe_log);
        }

        return $theme_describe->id;


    }

    //获取列表
    public function get_theme_describes($theme_id){
        return $this->where("theme_id",$theme_id)->where("is_delete",0)
            ->order("describe_sort","asc")
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
        $theme_describe_log["title"] = "删除主题内容";
        $theme_describe->is_delete = 1;
        if($theme_describe->save()){
            model("log","logic")->write_log( $theme_describe_log);
        }



    }



    public function get_theme_describe_by_sort($theme_id,$sort){

        return $this->where("theme_id",$theme_id)->where("describe_sort",$sort)->where("is_delete","<>",1)->select();

    }




}