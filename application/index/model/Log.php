<?php
namespace app\index\model;
use think\Model;

class Log extends Model{

    protected  $table = "jckk_logs";

    const ADD_TYPE = 1; //添加

    const DELETE_TYPE = 2; //删除

    const UPDATE_TYPE = 3; //修改

    const BACK_UP = 4; //备份

    const RESTORE = 5; //还原

    const DELETE_BACK_FILE = 6; //删除备份文件

    const DELETE_TRUE = 7; //删除回收站

    const BACK_DELETE = 8; //还原回收站





















}