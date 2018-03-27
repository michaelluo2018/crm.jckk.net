<?php
namespace  app\index\logic;
use think\Model;
class Department extends Model{

    protected  $table="jckk_department";

    public  function  get_departments(){

        $departments = $this->order("sort asc")->select();

        return $departments;
    }





}
