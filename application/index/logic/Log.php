<?php
namespace app\index\logic;

use think\Model;
use think\Session;

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
    protected  function setCreate_timeAttr(){

        return time();

    }
    public function  write_log($data){

        $this->save($data);

    }









}