<?php
namespace  app\api\controller;

use think\Controller;

class Project extends Controller{

    public function lists(){
        $data = model("project", "logic")->get_project_total_entity();
        dump($data);die;
    }








}