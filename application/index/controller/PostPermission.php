<?php
namespace app\index\controller;

use think\Request;

class  PostPermission extends  Base{



    public  function  save_permission(){

    $data = Request::instance()->post();

    model("post_permission","logic")->save_permission($data);

    echo "<script> alert('成功！'); history.back(-1);</script>";

    }


    public  function  ajax_get_post_permission(){

        $pid = Request::instance()->post('pid');

        $data = model("post_permission","logic")->get_post_permission($pid);
        if(!$data){
            $data = 0;
        }

        return $data;
    }




















}