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

        $host = Config::get("database.hostname");
        $username = Config::get("database.username");
        $password = Config::get("database.password");
        $database = Config::get("database.database");
        $charset = Config::get("database.charset");
        $this->DbManage = new DbManage($host, $username, $password, $database, $charset);

        parent::__construct($request);

    }



    public  function  index(){

        $table_infos =  $this->DbManage->getTableStatus();
        //获取所有备份
        $arr_file = array();
        $files = array();
        $path = ROOT_PATH ."database" . DS;


        if(is_dir($path)){
            $handler = opendir($path);

            while(($filename = readdir($handler)) !== false){
                if($filename != "." && $filename != "..")
                {
                        $arr_file[] = $filename;
                }
            }
            closedir($handler);
            $arr_file = array_reverse($arr_file);
        }
        else{
            mkdir(ROOT_PATH ."database" . DS,0777,true);

        }
        $num = count($arr_file);

        for ($i=0;$i<$num;$i++){

            if(isset($arr_file[$i])){
                $time = explode("_v",$arr_file[$i])[0];
                $size = 0;
                $j = 0;
                for ($k=0;$k<$num;$k++){

                    if(isset($arr_file[$k])){
                        if(preg_match("/^".$time."\_v\d+\.sql$/", $arr_file[$k])){

                            $j++;
                            $size = $size + filesize($path.$arr_file[$k]);
                            $count = $j;
                            unset($arr_file[$k]);
                        }
                    }

                }

                $files[$i]['name'] = $time."_v1.sql";
                $files[$i]['num'] = $count;
                $files[$i]['size'] =$size;
                $files[$i]['time'] = date("Y-m-d H:i:s",$time);
            }


        }


        $file_page_data['lastPage'] =ceil(count($files)/10);
        $file_page_data['listRows'] =10;
        $this->assign("file_page_data",$file_page_data);
        $this->assign("arr_file",$files);
        $this->assign("table_infos",$table_infos);

        return view("index");

    }




    public  function  save_database(){

        $path = ROOT_PATH ."database" . DS;
        $data = Request::instance()->post("data");

        $tables = explode("^^",$data);

        $result = $this->DbManage->backup($tables,$path,4096);
        if($result!==false){
            $result = true;
        }
        return $result;



    }


    public  function  save_one_database(){
         $path = ROOT_PATH ."database" . DS;
         $data = Request::instance()->post("data");
         $tables[0] =$data;
         $result = $this->DbManage->backup($tables,$path,4096);
        if($result!==false){
            $result = true;
        }
        return $result;

    }



    public  function  restore_database(){
        $path = ROOT_PATH ."database" . DS;
        $file = Request::instance()->post("data");

        $result = $this->DbManage->restore($path .$file);

        return $result;


    }





    public  function  delete_database($file){

        Common::unlink_file((ROOT_PATH ."database" . DS) .$file);

        $this->redirect("index");
    }




















}
