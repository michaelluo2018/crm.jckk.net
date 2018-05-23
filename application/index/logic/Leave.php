<?php
namespace  app\index\logic;
use app\index\controller\Common;
use think\Model;
use think\Config;
use think\Db;
use app\index\model\Log;
use think\Session;

class Leave extends Model{

    protected $table="jckk_leave";


    //保存
    public  function  save_leave($data,$name){



        if(isset($data['leave_id'])){
            //修改
            $leave = model("leave","model")->where("id",$data['leave_id'])->find();
            $leave_log["type"] = Log::UPDATE_TYPE;
            $leave_log["before_value"] = json_encode($leave);
            $leave_log["title"] = "修改请假信息";

        }
        else{
            //添加
            $leave = model("leave",'model');
            $leave->create_time = time();
            $leave->create_uid = Session::get("uid");
            $leave_log["type"] = Log::ADD_TYPE;
            $leave_log["before_value"] = "";
            $leave_log["title"] = "添加请假";
        }

        $leave->leave_type = trim($data['leave_type']);
        $leave->leave_start = trim($data['leave_start']);
        $leave->leave_end = trim($data['leave_end']);
        $leave->work_day = trim($data['work_day']);
        $leave->leave_reason = trim($data['leave_reason']);
        if(isset($data['leader_uid2'])){
            $leave->leader_uid2 = trim($data['leader_uid2']);
            $leader_uid = trim($data['leader_uid2']);
            $leave->audit_status = 1;
        }
        if(isset($data['leader_uid'])){
            $leave->leader_uid = trim($data['leader_uid']);
            $leader_uid = trim($data['leader_uid']);
            $leave->audit_status = 0;
        }
        $leave->personnel_uid = trim($data['personnel_uid']);

        $leave->is_delete = 0;

        if($leave->save()){
            $leave_log["after_value"] = json_encode($leave);
            model("log","logic")->write_log( $leave_log);
            //发系统消息和邮件通知上司
            $url = "http://crm1.jckk.net/index/leave/leave_des?id=".$leave->id;
            $message1 = [
                "from_uid"=>Session::get("uid"),
                "to_uid"=>$leader_uid,
                "title"=>"【请假】【".$data['leave_type']."】".$name,
                "content"=>"<div style='margin-left: 30px;'> <a href='".$url."'><p>姓名：".$name."</p><p>请假类别：".$data['leave_type']."</p><p>请假时间：".$data['leave_start']."--".$data['leave_end']." （请假".$data['work_day']."天）</p><p>事由：".$data['leave_reason']."</p></a></div>"
            ];
            model("message", "logic")->save_message($message1);
            $user = model("user")->where("uid",$leader_uid)->find();
            $content = $this->get_leave_email_html($leave->id,$url);
            Common::send_mail($user->email,$message1['title'],$content,$type = "HTML");

        }
        return $leave->id;

    }

    public function get_leave_email_html($leave_id,$url,$message=null){
    $leave = $this->get_leave($leave_id);
    $html = $message;
    $html .= "<table style='width: 80%;margin: 0 auto;'><tr><td style='border: 1px solid #0c0c0c'>部门</td><td style='border: 1px solid #0c0c0c'>".$leave['department_name']."</td><td style='border: 1px solid #0c0c0c'>姓名</td><td style='border: 1px solid #0c0c0c'>".$leave['chinese_name']."</td><td style='border: 1px solid #0c0c0c'>职务</td><td style='border: 1px solid #0c0c0c'>".$leave['post_name']."</td></tr><tr><td style='border: 1px solid #0c0c0c'>请假类别</td><td colspan='5' style='border: 1px solid #0c0c0c'>".$leave['leave_type']."</td></tr><tr><td style='border: 1px solid #0c0c0c'>请假时间</td><td colspan='5' style='border: 1px solid #0c0c0c'>".$leave['leave_start']."--".$leave['leave_end']."（请假".$leave['work_day']."天）</td></tr><tr><td style='border: 1px solid #0c0c0c'>请假事由</td><td colspan='5' style='border: 1px solid #0c0c0c'>".$leave['leave_reason']."</td></tr></table>";
    $html .= "<div style='width: 80%;margin: 0 auto;'><p><a href='".$url."'>来至金诚互动客户管理系统，去查看</a></p><p>技术支持邮箱：star.fang@jckk.net</p></div>";
    return $html;
  }



    //获取列表
    public function get_leaves(){
        return Db::table("jckk_leave")
            ->alias("l")
            ->field(["l.*","u.chinese_name","d.department_name","p.post_name"])
            ->where("l.is_delete","<>",1)
            ->where("l.audit_status",3)
            ->join("jckk_user u","l.create_uid = u.uid","LEFT")
            ->join("jckk_department d","d.id = u.department_id","LEFT")
            ->join("jckk_post p","p.id = u.post_id","LEFT")
            ->select();
    }



    //获取一条
    public function get_leave($id){
        return Db::table("jckk_leave")
            ->alias("l")
            ->field(["l.*","u.chinese_name","d.department_name","p.post_name"])
            ->where("l.id",$id)
            ->join("jckk_user u","l.create_uid = u.uid","LEFT")
            ->join("jckk_department d","d.id = u.department_id","LEFT")
            ->join("jckk_post p","p.id = u.post_id","LEFT")
            ->find();
    }



    //删除
    public function  delete_leave($id){

        $leave = $this->where("id",$id)->find();
        if($leave->audit_status !=3){
            //添加日志
            $leave_log["type"] = Log::DELETE_TYPE;
            $leave_log["before_value"] = json_encode($leave);
            $leave_log["after_value"] = "";
            $leave_log["title"] = "删除请假";
            $leave->is_delete = 1;
            if($leave->save()){
                model("log","logic")->write_log( $leave_log);
            }
        }
        else{
            return 3;
        }




    }



    public function get_leave_by_uid($uid){
        return Db::table("jckk_leave")
            ->alias("l")
            ->field(["l.*","u.chinese_name","d.department_name","p.post_name"])
            ->where("l.create_uid",$uid)
            ->where("l.is_delete","<>",1)
            ->join("jckk_user u","l.create_uid = u.uid","LEFT")
            ->join("jckk_department d","d.id = u.department_id","LEFT")
            ->join("jckk_post p","p.id = u.post_id","LEFT")
            ->select();
    }


    public function leader_pass($id,$uid){
        //上司批准 状态改为1
        $leave = $this->where("id",$id)->find();
        if($leave->leader_uid ==  $uid){
            $leave->audit_status = 1;
            if($leave->save()){

                //发系统消息和邮件通知上司
                $url = "http://crm1.jckk.net/index/leave/leave_des?id=".$leave->id;
                $create_user = model("user")->where("uid",$leave->create_uid)->find();
                $message1 = [
                    "from_uid"=>$uid,
                    "to_uid"=>$leave->leader_uid2,
                    "title"=>"【请假】【".$leave->leave_type."】".$create_user->chinese_name,
                    "content"=>"<div style='margin-left: 30px;'> <a href='".$url."'><p>姓名：".$create_user->chinese_name."</p><p>请假类别：".$leave->leave_type."</p><p>请假时间：".$leave->leave_start."--".$leave->leave_end." （请假".$leave->work_day."天）</p><p>事由：".$leave->leave_reason."</p></a></div>"
                ];
                model("message", "logic")->save_message($message1);
                $user = model("user")->where("uid",$leave->leader_uid2)->find();
                $message = "<p>批准！</p>";
                $content = $this->get_leave_email_html($leave->id,$url,$message);
                Common::send_mail($user->email,$message1['title'],$content,$type = "HTML");
            }
        }
        else{
            return "你没有权利审批！";
        }
    }



    public function leader_pass2($id,$uid){
            //CEO批准 状态改为2
            $leave = $this->where("id",$id)->find();
            if($leave->leader_uid2 ==  $uid){
                $leave->audit_status = 2;
                if($leave->save()){

                    //发系统消息和邮件通知人事
                    $url = "http://crm1.jckk.net/index/leave/leave_des?id=".$leave->id;
                    $create_user = model("user")->where("uid",$leave->create_uid)->find();
                    $message1 = [
                        "from_uid"=>$uid,
                        "to_uid"=>$leave->personnel_uid,
                        "title"=>"【请假】【".$leave->leave_type."】".$create_user->chinese_name,
                        "content"=>"<div style='margin-left: 30px;'> <a href='".$url."'><p>姓名：".$create_user->chinese_name."</p><p>请假类别：".$leave->leave_type."</p><p>请假时间：".$leave->leave_start."--".$leave->leave_end." （请假".$leave->work_day."天）</p><p>事由：".$leave->leave_reason."</p></a></div>"
                    ];
                    model("message", "logic")->save_message($message1);
                    $user = model("user")->where("uid",$leave->personnel_uid)->find();
                    $message = "<p>批准！</p>";
                    $content = $this->get_leave_email_html($leave->id,$url,$message);
                    Common::send_mail($user->email,$message1['title'],$content,$type = "HTML");
                }
            }
            else{
                return "你没有权利审批！";
            }
        }



    public function leader_false($id,$uid){
        //上司驳回 状态改为4
        $leave = $this->where("id",$id)->find();
        if($leave->leader_uid ==  $uid){
            $leave->audit_status = 4;
            if($leave->save()){

                //发系统消息和邮件通知请假者
                $url = "http://crm1.jckk.net/index/leave/leave_des?id=".$leave->id;
                $leader_user = model("user")->where("uid",$uid)->find();
                $message1 = [
                    "from_uid"=>$uid,
                    "to_uid"=>$leave->create_uid,
                    "title"=>"【请假】【".$leave->leave_type."】被".$leader_user->chinese_name."驳回",
                    "content"=>"<a href='".$url."'>你的请假被驳回！</a></div>"
                ];
                model("message", "logic")->save_message($message1);
                $user = model("user")->where("uid",$leave->create_uid)->find();
                $message = "<p>驳回请求！</p>";
                $content = $this->get_leave_email_html($leave->id,$url,$message);
                Common::send_mail($user->email,$message1['title'],$content,$type = "HTML");
            }
        }
        else{
            return "你没有权利审批！";
        }
    }



    public function leader_false2($id,$uid){
        //CEO驳回 状态改为5
        $leave = $this->where("id",$id)->find();
        if($leave->leader_uid2 ==  $uid){
            $leave->audit_status = 5;
            if($leave->save()){

                //发系统消息和邮件通知上司和请假者
                $url = "http://crm1.jckk.net/index/leave/leave_des?id=".$leave->id;
                $create_user = model("user")->where("uid",$leave->create_uid)->find();
                $leader_user = model("user")->where("uid",$leave->leader_uid)->find();
                $leader_user2 = model("user")->where("uid",$leave->leader_uid2)->find();
                $message1 = [
                    "from_uid"=>$uid,
                    "to_uid"=>$leave->create_uid,
                    "title"=>"【请假】【".$leave->leave_type."】被".$leader_user2->chinese_name."驳回",
                    "content"=>"<a href='".$url."'>请假被驳回！</a></div>"
                ];
                $message2 = [
                    "from_uid"=>$uid,
                    "to_uid"=>$leave->leader_uid,
                    "title"=>"【请假】【".$leave->leave_type."】被".$leader_user2->chinese_name."驳回",
                    "content"=>"<a href='".$url."'>请假被驳回！</a></div>"
                ];
                model("message", "logic")->save_message($message1);
                model("message", "logic")->save_message($message2);
                $message = "<p>驳回请求！</p>";
                $content = $this->get_leave_email_html($leave->id,$url,$message);
                Common::send_mail($create_user->email,$message1['title'],$content,$type = "HTML");
                Common::send_mail($leader_user->email,$message1['title'],$content,$type = "HTML");
            }
        }
        else{
            return "你没有权利审批！";
        }
    }


    public function personnel_pass($id,$uid){
        //人事备案 状态改为3
        $leave = $this->where("id",$id)->find();
        if($leave->leader_uid ==  $uid){
            $leave->audit_status = 3;
            if($leave->save()){

                //发系统消息和邮件通知请假者
                $url = "http://crm1.jckk.net/index/leave/leave_des?id=".$leave->id;
                $create_user = model("user")->where("uid",$leave->create_uid)->find();
                $message1 = [
                    "from_uid"=>$uid,
                    "to_uid"=>$leave->create_uid,
                    "title"=>"【请假】【".$leave->leave_type."】".$create_user->chinese_name."已被人事备案",
                    "content"=>"<div style='margin-left: 30px;'> <a href='".$url."'><p>姓名：".$create_user->chinese_name."</p><p>请假类别：".$leave->leave_type."</p><p>请假时间：".$leave->leave_start."--".$leave->leave_end." （请假".$leave->work_day."天）</p><p>事由：".$leave->leave_reason."</p></a></div>"
                ];
                model("message", "logic")->save_message($message1);
                $message = "<p>请假批准，人事已备案！</p>";
                $content = $this->get_leave_email_html($leave->id,$url,$message);
                Common::send_mail($create_user->email,$message1['title'],$content,$type = "HTML");
            }
        }
        else{
            return "你没有权利审批！";
        }
    }



}