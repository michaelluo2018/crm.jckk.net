<?php
namespace app\index\controller;


class Index extends Base
{

    public function index()
    {
        return view("index");
    }

    public function  login_out(){
        parent::login_out();
        $this->redirect("login/login");
    }


}

