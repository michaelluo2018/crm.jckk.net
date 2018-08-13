<?php
namespace app\common\logic;

use think\Model;
use think\Session;
use think\Db;
class Log extends Model{

    protected  $table = "jckk_logs";
    protected  $ip = "jckk_logs";

    protected  $auto = ["ip","model","action","uid","create_time"];

    protected  function setIpAttr(){

        return request()->ip();

    }


    protected  function setModelAttr(){

        return request()->controller();

    }


    protected  function setActionAttr(){

        return request()->action();

    }


    protected  function setUidAttr(){

        return Session::get("uid");

    }

   protected  function setCreateTimeAttr(){

        return date("Y-m-d H:i:s",time());

    }




    public function  write_log($data,$is_all = false){

        if($is_all){

               $sql = "insert into jckk_logs(model,action,type,before_value,after_value,ip,uid,title,is_delete,create_time) values ";
               $i=0;
              foreach($data as $k=>$v){

                  if($i>0){
                      $sql .=",";
                  }
                  $sql .= "('".request()->controller()."','".request()->action()."',".$v['type'].",'".$v['before_value']."','".$v['after_value']."','".request()->ip()."',".Session::get("uid").",'".$v['title']."',0,'".date("Y-m-d H:i:s",time())."')";
                  $i++;
              }
              $sql .=";";
             $this->query($sql);

        }
        else{
            $this->save($data);

        }

    }


    public function get_logs($uid=null){
        if($uid){
            $logs=  Db::table("jckk_logs")
                ->where("jckk_logs.uid",$uid)
                ->where("jckk_logs.is_delete","<>",1)
                ->order("jckk_logs.id","desc")
                ->field(["jckk_logs.*","jckk_user.chinese_name"])
                ->join("jckk_user","jckk_user.uid = jckk_logs.uid",'LEFT')
                ->paginate(6);
        }
        else{
            $logs=  Db::table("jckk_logs")
                ->where("jckk_logs.is_delete","<>",1)
                ->order("jckk_logs.id","desc")
                ->field(["jckk_logs.*","jckk_user.chinese_name"])
                ->join("jckk_user","jckk_user.uid = jckk_logs.uid",'LEFT')
                ->paginate();
        }


        return $logs;
    }


    public function get_log($id){
        $log=  Db::table("jckk_logs")
            ->where("jckk_logs.id",$id)
            ->field(["jckk_logs.*","jckk_user.chinese_name"])
            ->join("jckk_user","jckk_user.uid = jckk_logs.uid",'LEFT')
            ->find();

        if($before_value = $log['before_value']){
            $log['before_value'] = (array)json_decode($before_value);
        }
        if($after_value = $log['after_value']){
            $log['after_value'] = (array)json_decode($after_value);
        }

        return $log;
    }


    public function delete_logs_by_time($time){
      return  $this->where("create_time","<",$time)->update(["is_delete"=>1]);
    }


}