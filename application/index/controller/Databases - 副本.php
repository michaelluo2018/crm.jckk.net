<?php

namespace  app\index\controller;
use extend\DbManage;
use think\Config;
use think\Request;

require ROOT_PATH .'/extend/DbManage.php';

class Databases extends Base{
	

    public $DbManage;



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
        $arr_file = array();

        if(is_dir(ROOT_PATH ."database" . DS)){
            $handler = opendir(ROOT_PATH ."/database" . DS);

            while(($filename = readdir($handler)) !== false){
                if($filename != "." && $filename != "..")
                {
                    $arr_file[] = $filename;
                }
            }
            closedir($handler);

        }
        else{
            mkdir(ROOT_PATH ."database" . DS);
        }
        $arr_file = array_reverse($arr_file);
        $file_page_data['lastPage'] =ceil(count($arr_file)/10);
        $file_page_data['listRows'] =10;
        $this->assign("file_page_data",$file_page_data);
        $this->assign("arr_file",$arr_file);
        $this->assign("table_infos",$table_infos);

        return view("index");

    }




    public  function  save_database(){


        $data = Request::instance()->post("data");

        $tables = $data['table_name'];

        $num = count($tables);

        for($i=0;$i<$num;$i++){
            $this->DbManage->backup($tables[$i],ROOT_PATH ."database" . DS, 40000);

        }
        return $data;

        $msg = $this->DbManage->message;

      //  $this->success($msg,"index","","30");
        return $msg;

    }


    public  function  save_one_database($file){

        $this->DbManage->backup($file,ROOT_PATH ."database" . DS, 40000);

        $msg = $this->DbManage->message;

        $this->success($msg,"index","","30");

    }



    public  function  restore_database($file){

        $this->DbManage->restore((ROOT_PATH ."database" . DS) .$file);

        $msg = $this->DbManage->message;


        $this->success($msg,"index","","30");


    }





    public  function  delete_database($file){

        Common::unlink_file((ROOT_PATH ."database" . DS) .$file);

        $this->redirect("index");
    }




















}
