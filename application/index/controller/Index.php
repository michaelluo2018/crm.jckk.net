<?php
namespace app\index\controller;


class Index extends Base
{

    public function index()
    {
        //本人操作日志
        $my_logs = model("log","logic")->get_logs($this->uid);
        return view("index")->assign("my_logs",$my_logs);
    }

    public function  login_out(){
        parent::login_out();
        $this->redirect("login/login");
    }


}

