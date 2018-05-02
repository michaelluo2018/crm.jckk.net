<?php

namespace app\index\logic;
use think\model;
use app\index\model\Log as JcLog;
use think\Session;
use think\Db;
class Announcement extends  model{


    protected $table="jckk_announcement";


    public function  save_announcement($data){

        if(isset($data['id'])){
            //修改

            $announcement =  $this->where("id",$data['id'])->find();

            $log_ann['before_value'] = json_encode($announcement);
            $log_ann["type"] = JcLog::UPDATE_TYPE;
            $log_ann["title"] = "更改".$announcement->title ."公告";
        }
        else{
            //新加
            $announcement = model('announcement','model');
            $announcement->create_time = time();
            $announcement->create_uid = Session::get("uid");
            $log_ann['before_value'] = "";
            $log_ann["type"] = JcLog::ADD_TYPE;
            $log_ann["title"] = "添加".trim($data['title']) ."公告";
        }

        $announcement->title = trim($data['title']);
        $announcement->content = trim($data['content']);

        if($announcement->save()){
            $log_ann["after_value"] = json_encode($announcement);
            model("log","logic")->write_log( $log_ann);
        }


    }


    public  function  get_announcement(){

        return Db::table("jckk_announcement")
                ->field(["jckk_announcement.*","jckk_user.chinese_name"])
                ->join("jckk_user","jckk_user.uid=jckk_announcement.create_uid")
                ->select();
    }


    public function  delete_announcement($id){

        $announcement = $this->where("id",$id)->find();

        $log_ann['before_value'] = json_encode($announcement);
        $log_ann['after_value'] = "";
        $log_ann["type"] = JcLog::DELETE_TYPE;
        $log_ann["title"] = "删除".$announcement->title ."公告";
        model("log","logic")->write_log( $log_ann);
        $announcement->delete();
    }



    public  function  get_announcement_by_id($id){

        return $this->where("id",$id)->find();

    }



















}