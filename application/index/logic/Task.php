<?php
namespace  app\index\logic;
use app\index\controller\Common;
use think\Model;
use think\Db;
use app\index\model\Log as TaskLog;
use think\Session;

class Task extends Model{

    protected $table="jckk_task";


    //保存
    public  function  save_task($data,$file,$create_name){

        if(isset($file)){
            $info = $file->validate(['ext'=>'jpg,png,gif,docx,xlsx,xls,pdf,doc,zip,rar,ppt,pptx'])->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                $url = $info->getSaveName();
            }
        }
        $user = model("user")->where("uid",$data['uid'])->find();
        if(isset($data['task_id'])){
            //修改
            $task = model("task","model")->where("id",$data['task_id'])->find();
            $task_log["type"] = TaskLog::UPDATE_TYPE;
            $task_log["before_value"] = json_encode($task);
            $task_log["title"] = "更改任务信息";
            $old_to_uid = $task->to_uid;
            $user2 = model("user")->where("uid",$old_to_uid)->find();
            $old_message_id = $task->message_id;
            $old_is_send_mail = $task->is_send_mail;
            //历史记录
            if(trim($data['uid']) !=$task->to_uid){
                $history_data=[
                    "task_id" => $task->id,
                    "title" => date("Y-m-d H:i:s")."由".$create_name."修改指派人",
                    "before_value" =>"指派给".$user->chinese_name,
                    "after_value" => "指派给".$user2->chinese_name,
                ];
                model("task_history",'logic')->save_task_history($history_data);
            }

            if(trim($data['task_name']) !=$task->task_name){
                $history_data=[
                    "task_id" => $task->id,
                    "title" => date("Y-m-d H:i:s")."由".$create_name."修改任务名称",
                    "before_value" => trim($data['task_name']),
                    "after_value" => $task->task_name,
                ];
                model("task_history",'logic')->save_task_history($history_data);
            }

            if(isset($data['task_type']) && $data['task_type'] !=$task->task_type){
                $history_data=[
                    "task_id" => $task->id,
                    "title" => date("Y-m-d H:i:s")."由".$create_name."修改任务类型",
                    "before_value" => $data['task_type'],
                    "after_value" => $task->task_type,
                ];
                model("task_history",'logic')->save_task_history($history_data);
            }

            if(trim($data['task_describe']) !=$task->task_describe){
                $history_data=[
                    "task_id" => $task->id,
                    "title" => date("Y-m-d H:i:s")."由".$create_name."修改任务描述",
                    "before_value" => trim($data['task_describe']),
                    "after_value" => $task->task_describe,
                ];
                model("task_history",'logic')->save_task_history($history_data);
            }

            if(trim($data['audit_standard']) !=$task->audit_standard){
                $history_data=[
                    "task_id" => $task->id,
                    "title" => date("Y-m-d H:i:s")."由".$create_name."修改任务审核标准",
                    "before_value" => trim($data['audit_standard']),
                    "after_value" => $task->audit_standard,
                ];
                model("task_history",'logic')->save_task_history($history_data);
            }

            if(trim($data['task_start']) !=$task->task_start){
                $history_data=[
                    "task_id" => $task->id,
                    "title" => date("Y-m-d H:i:s")."由".$create_name."修改任务开始时间",
                    "before_value" => trim($data['task_start']),
                    "after_value" => $task->task_start,
                ];
                model("task_history",'logic')->save_task_history($history_data);
            }

            if(trim($data['task_end']) !=$task->task_end){
                $history_data=[
                    "task_id" => $task->id,
                    "title" => date("Y-m-d H:i:s")."由".$create_name."修改任务结束时间",
                    "before_value" => trim($data['task_end']),
                    "after_value" => $task->task_end,
                ];
                model("task_history",'logic')->save_task_history($history_data);
            }

            if(trim($data['task_order']) !=$task->task_order){
                $history_data=[
                    "task_id" => $task->id,
                    "title" => date("Y-m-d H:i:s")."由".$create_name."修改任务优先级",
                    "before_value" => trim($data['task_order']),
                    "after_value" => $task->task_order,
                ];
                model("task_history",'logic')->save_task_history($history_data);
            }
        }
        else{
            //添加
            $task = model("task",'model');
            $task->create_time = time();
            $task->create_uid = Session::get("uid");
            $task_log["type"] = TaskLog::ADD_TYPE;
            $task_log["before_value"] = "";
            $task_log["title"] = "添加新任务";

        }

        if(isset($url)){
            $file_url = DS ."uploads". DS .$url;
            $task->file = $file_url;
        }

        $task->project_id = trim($data['project_id']);
        $task->to_uid = trim($data['uid']);
        $task->task_name = trim($data['task_name']);
        $task->task_describe = trim($data['task_describe']);
        $task->audit_standard = trim($data['audit_standard']);
        $task->task_start =strtotime(trim($data['task_start']));
        $task->task_end = strtotime(trim($data['task_end']));
        $task->task_order = trim($data['task_order']);
        $task->is_delete = 0;

        if(isset($data['task_type'])){
            $task->task_type = $data['task_type'];
        }
        else{
            $task->task_type = null;
        }
        if( $task->save()){

            //发送系统消息或邮件
            // 1.首次添加，勾选发送
            //2.之前没有发送，修改勾选发送，指派人不变
            //3.修改指派人，旧的指派者和新指派都发送
            $url = "http://crm1.jckk.net/index/task/task_des?id=".$task->id;
            $message1 = [
                "from_uid"=>Session::get("uid"),
                "to_uid"=>$data['uid'],
                "title"=>"你有新的任务指派待完成",
                "content"=>"<a href='".$url."'>你的同事".$create_name."在".date('Y-m-d H:i:s').
                    "把".$task->task_name."任务指派给你，请在任务结束前完成它！点击查看任务详情！</a>"
            ];
            if(isset($data['message']) && $data['message']==1) {
                if (!isset($data['task_id'])) {
                    $mess_id = model("message", "logic")->save_message($message1);
                    $task->message_id = $mess_id;
                }
                else {
                    //修改
                    if ($old_to_uid != $task->to_uid) {
                        $mess_id = model("message", "logic")->save_message($message1);
                        $task->message_id = $mess_id;
                        $message2 = [
                            "from_uid" => Session::get("uid"),
                            "to_uid" => $old_to_uid,
                            "title" => "我的待办任务被重新指派给其他同事",
                            "content" => "<a href='" . $url . "'>你的同事" . $create_name . "在" . date('Y-m-d H:i:s') .
                                "把" . $task->task_name . "任务重新指派给其他同事！点击查看详情！</a>"
                        ];
                        model("message", "logic")->save_message($message2);
                    } else {
                        if( $old_message_id!=1){
                            $mess_id = model("message", "logic")->save_message($message1);
                            $task->message_id = $mess_id;
                        }

                    }
                }

            }

            if(isset($data['is_send_mail']) && $data['is_send_mail']==1){
                $content = $this->get_email_html($task->id,"任务指派",$url);
                if (!isset($data['task_id'])) {

                    Common::send_mail($user->email,$message1['title'],$content,$type = "HTML");
                    $task->is_send_mail = 1;

                }
                else {
                    //修改
                    if ($old_to_uid != $task->to_uid) {
                        $content = $this->get_email_html($task->id,"任务指派",$url);

                        Common::send_mail($user->email,$message1['title'],$content,$type = "HTML");
                        $task->is_send_mail = 1;
                        Common::send_mail($user2->email,"我的待办任务被重新指派给其他同事",$content,$type = "HTML");
                        $task->is_send_mail = 1;
                    }
                    else {
                        if( $old_is_send_mail!=1){
                            Common::send_mail($user->email,$message1['title'],$content,$type = "HTML");
                            $task->is_send_mail = 1;
                        }

                    }
                }
            }



            //历史记录

            if(!isset($data['task_id'])){

                //添加
                $history_data=[
                    "task_id" => $task->id,
                    "title" => "",
                    "before_value" => "",
                    "after_value" => "",
                ];
                $history_data['title']=date("Y-m-d H:i:s")."由".$create_name."创建";
                model("task_history",'logic')->save_task_history($history_data);
            }


        }

        if($task->save()){
            $task_log["after_value"] = json_encode($task);
            model("log","logic")->write_log( $task_log);
        }


        return $task->id;


    }

    public function get_email_html($task_id,$task_event,$url){
        $task =  $this->get_task_full_info($task_id); //dump($task);die;
        $html = "<div style='line-height: 40px;'><p>邮件主题：【".$task['task_name']."】-【".$task_event."】-任务通知-客户管理系统</p><p>尊敬的用户".$task['to_name']."，您好：</p><p style='margin-top: 20px;margin-bottom: 20px;'><a href='".$url."'>【".$task['task_name']."】-【".$task_event."】  -  点击处理</a></p><p>客户名称：".$task['customer_name']." </p><p>项目名称：".$task['project_name']."  </p><p>项目时间：".$task['project_start']."--".$task['project_end']." </p><p>任务名称：".$task['task_name']." </p><p>任务创建人：".$task['create_name']." </p><p>任务执行人：".$task['to_name']." </p><p>任务时间： ".$task['task_start']."--".$task['task_end']."</p><p>任务内容：".$task['task_describe']." </p><p style='margin-top: 20px;'>金诚互动客户管理系统 </p><p>技术支持邮箱：star.fang@jckk.net </p></div>";

        return $html;
    }

    public function get_task_full_info($task_id){
       return   Db::table("jckk_task")
            ->alias("t")
            ->field(["t.*","p.project_name","p.project_start","p.project_end","c.customer_name","tu.chinese_name as to_name","tu.email as to_email","cu.email as create_email","cu.chinese_name as create_name"])
            ->where("t.is_delete","<>",1)
            ->where("t.id",$task_id)
            ->join("jckk_project p","p.id = t.project_id","LEFT")
            ->join("jckk_user tu","tu.uid = t.to_uid","LEFT")
            ->join("jckk_user cu","cu.uid = t.create_uid","LEFT")
            ->join("jckk_customer c","c.id = p.customer_id","LEFT")
            ->find();
    }

    public function save_task_begin($data,$create_name){

        $task = model("task","model")->where("id",$data['id'])->find();
        $task->task_status = 1;
        $task->actual_start = trim($data['actual_start']);

        //发送系统消息或邮件
        $url = "/index/task/task_des?id=".$task->id;
        $message = [
            "from_uid"=>Session::get("uid"),
            "to_uid"=>$task->create_uid,
            "title"=>"你指派的".$task->task_name."已开始",
            "content"=>"<a href='".$url."'>你的同事".$create_name."已经开始了你指派的任务，点击查看</a>"
        ];

        model("message","logic")->save_message($message);
        $task->save();

        //历史记录
        $history_data=[
            "task_id" => $task->id,
            "title" => "",
            "before_value" => "",
            "after_value" => "",
        ];

        $history_data['title']=date("Y-m-d H:i:s")."由".$create_name."开始";
        model("task_history",'logic')->save_task_history($history_data);

    }

    public function save_task_end($data,$file,$create_name){
            $task = model("task","model")->where("id",$data['task_id'])->find();
            if(isset($file)){
                $info = $file->validate(['ext'=>'jpg,png,gif,docx,xlsx,xls,pdf,doc,zip,rar,ppt,pptx'])->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    $url = $info->getSaveName();
                    $file_url =  DS ."uploads". DS .$url;
                    $task->complete_file = $file_url;
                }
            }
            $task->task_status = 2;
            $task->actual_end = trim($data['actual_end']);


            //发送系统消息或邮件
            $url = "/index/task/task_des?id=".$task->id;
            $message = [
                "from_uid"=>Session::get("uid"),
                "to_uid"=>$task->create_uid,
                "title"=>"你指派的".$task->task_name."已完成",
                "content"=>"<a href='".$url."'>你的同事".$create_name."已经完成你指派的任务，点击查看</a>"
            ];

            model("message","logic")->save_message($message);
            $task->save();

            //历史记录
            $history_data=[
                "task_id" => $task->id,
                "title" => "",
                "before_value" => "",
                "after_value" => "",
            ];

            $history_data['title']=date("Y-m-d H:i:s")."由".$create_name."结束";
            model("task_history",'logic')->save_task_history($history_data);
    }



    //获取列表
    public function get_tasks(){
        return Db::table("jckk_task")
            ->alias("t")
            ->field(["t.*","p.project_name","tu.chinese_name as to_name","cu.chinese_name as create_name"])
            ->where("t.is_delete","<>",1)
            ->join("jckk_project p","p.id = t.project_id","LEFT")
            ->join("jckk_user tu","tu.uid = t.to_uid","LEFT")
            ->join("jckk_user cu","cu.uid = t.create_uid","LEFT")
            ->select();

    }



    public function get_tasks_by_project($project_id){
        return Db::table("jckk_task")
            ->alias("t")
            ->field(["t.*","p.project_name","tu.chinese_name as to_name","cu.chinese_name as create_name"])
            ->where("t.is_delete","<>",1)
            ->where("t.project_id",$project_id)
            ->join("jckk_project p","p.id = t.project_id","LEFT")
            ->join("jckk_user tu","tu.uid = t.to_uid","LEFT")
            ->join("jckk_user cu","cu.uid = t.create_uid","LEFT")
            ->select();

    }


   public function get_tasks_by_create_uid($create_uid){
       return Db::table("jckk_task")
           ->alias("t")
           ->field(["t.*","p.project_name","tu.chinese_name as to_name","cu.chinese_name as create_name"])
           ->where("t.is_delete","<>",1)
           ->where("t.create_uid",$create_uid)
           ->join("jckk_project p","p.id = t.project_id","LEFT")
           ->join("jckk_user tu","tu.uid = t.to_uid","LEFT")
           ->join("jckk_user cu","cu.uid = t.create_uid","LEFT")
           ->select();

   }




    public function get_tasks_by_to_uid($to_uid){
        return Db::table("jckk_task")
            ->alias("t")
            ->field(["t.*","p.project_name","tu.chinese_name as to_name","cu.chinese_name as create_name"])
            ->where("t.is_delete","<>",1)
            ->where("t.to_uid",$to_uid)
            ->join("jckk_project p","p.id = t.project_id","LEFT")
            ->join("jckk_user tu","tu.uid = t.to_uid","LEFT")
            ->join("jckk_user cu","cu.uid = t.create_uid","LEFT")
            ->select();

    }





    //获取一条
    public function get_task($id){

        return   Db::table("jckk_task")
            ->alias("t")
            ->field(["t.*","p.project_name","tu.chinese_name as to_name","cu.chinese_name as create_name"])
            ->where("t.is_delete","<>",1)
            ->where("t.id",$id)
            ->join("jckk_project p","p.id = t.project_id","LEFT")
            ->join("jckk_user tu","tu.uid = t.to_uid","LEFT")
            ->join("jckk_user cu","cu.uid = t.create_uid","LEFT")
            ->find();

    }



    //删除
    public function  delete_task($id,$create_name){

        $task= $this->where("id",$id)->find();

        //添加日志
        $task_log["type"] = TaskLog::DELETE_TYPE;

        $task_log["before_value"] = json_encode($task);
        $task_log["after_value"] = "";
        $task_log["title"] = "删除".$task->task_name;
        $task->is_delete = 1;
        if($task->save()){
            model("log","logic")->write_log( $task_log);
        }
        //发消息给指派者
        $message = [
            "from_uid"=>Session::get("uid"),
            "to_uid"=>$task->to_uid,
            "title"=>"任务被删除",
            "content"=>"你的同事".$create_name."删除了指派给你的任务：".$task->task_name
        ];
       model("message","logic")->save_message($message);



    }


/*
 * 获取某天，某人的任务
 * */

    public function get_task_by_day_and_uid($day,$uid){
        $tasks = Db::table("jckk_task")
                ->alias("t")
                ->field(["t.*","p.project_name","tu.chinese_name as to_name","cu.chinese_name as create_name"])
                ->whereTime('t.task_start','<=',$day)
                ->whereTime('t.task_end','>=',$day)
                ->where('t.to_uid',$uid)
                ->join("jckk_project p","p.id = t.project_id","LEFT")
                ->join("jckk_user tu","tu.uid = t.to_uid","LEFT")
                ->join("jckk_user cu","cu.uid = t.create_uid","LEFT")
                ->select();
        return $tasks;


    }


}