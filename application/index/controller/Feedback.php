<?php

namespace  app\index\controller;

use think\Cookie;
use think\Request;

class Feedback extends  Base{


    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $mid = $this->get_mid_by_url("index/feedback/feedback_list");
        $this->menu_id = $mid;
        $this->assign("mid",$this->menu_id);

    }

    public  function  feedback(){

        if(Cookie::has("feedback".$this->uid)){
            $msg = "您10分钟内已经添加过意见反馈";
        }
        else{
            $data = Request::instance()->post();
            $data['create_uid'] = $this->uid;
            Cookie::set("feedback".$this->uid,$data,600);
            model("feedback","logic")->save_feedback($data);
            $msg = "我们已经收到您的反馈，谢谢！";
        }


        echo "<script>alert(\" ".$msg."\"); history.back(-1);</script>";
    }


    public function feedback_list(){

        $feedbacks = model("feedback","logic")->get_feedbacks();

        $this->assign("feedbacks",$feedbacks);

        return view("feedback_list");
    }


    public function feedback_des($id){

        $feedback = model("feedback","logic")->get_feedback($id);

        $this->assign("feedback",$feedback);

        return view("feedback_des");

    }




}