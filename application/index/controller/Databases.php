<?php

namespace  app\index\controller;
use extend\DbManage;
use think\Config;
use think\Request;

require ROOT_PATH .'/extend/DbManage.php';

class Databases extends Base{

    public $DbManage;

    public $dir_path = ROOT_PATH  . 'database' . DS ;


    public  function  __construct(Request $request = null)
    {
        parent::__construct($request);

        $host = Config::get("database.hostname");
        $username = Config::get("database.username");
        $password = Config::get("database.password");
        $database = Config::get("database.database");
        $charset = Config::get("database.charset");
        $this->DbManage = new DbManage($host, $username, $password, $database, $charset);


    }



    public  function  index(){

        $table_infos =  $this->DbManage->getTableStatus();
        //获取所有备份
        $handler = opendir($this->dir_path);
        $arr_file = array();
        while(($filename = readdir($handler)) !== false){
            if($filename != "." && $filename != "..")
            {
                $arr_file[] = $filename;
            }
        }
        closedir($handler);

        $file_page_data['lastPage'] =ceil(count($arr_file)/10);
        $file_page_data['listRows'] =10;

        $this->assign("file_page_data",$file_page_data);
        $this->assign("arr_file",$arr_file);
        $this->assign("table_infos",$table_infos);

        return view("index");

    }




    public  function  save_database(){

        $data = Request::instance()->post();

        $tables = $data['table_name'];

        $num = count($tables);

        for($i=0;$i<$num;$i++){
            $this->DbManage->backup($tables[$i],$this->dir_path, 40000);

        }
        $msg = $this->DbManage->message;

        $this->success($msg,"index","","30");

    }



    public  function  restore_database($file){

        $this->DbManage->restore(($this->dir_path) .$file);

        $msg = $this->DbManage->message;


        $this->success($msg,"index","","30");


    }





    public  function  delete_database($file){

        Common::unlink_file(($this->dir_path) .$file);

        $this->redirect("index");
    }




















}
