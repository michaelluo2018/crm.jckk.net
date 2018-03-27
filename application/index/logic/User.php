<?php
namespace  app\index\logic;
use think\Model;
class User extends Model{

    protected  $table="jckk_user";

    //获取部门下所有用户
    public function  get_department_users($department_id){
        $users = $this->where("department_id",$department_id)->select();
        return $users;
    }

}