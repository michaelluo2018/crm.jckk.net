<?php

namespace app\common\logic;
use think\Model;
use app\common\model\Log as JcLog;
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
        $announcement->department_id = json_encode($data['department_id']);

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

    public function get_department_announcement($department_id){
        return Db::table("jckk_announcement")
            ->where("jckk_announcement.department_id","like",'%"'.$department_id.'"%')
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

        $announcement =  $this->where("id",$id)->find();
        $announcement->department_id = json_decode($announcement->department_id,true);
        return  $announcement;

    }



















}