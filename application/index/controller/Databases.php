<?php

namespace  app\index\controller;
use extend\DbManage;
use think\Config;
use think\Request;
use app\index\model\Log;
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
                $files[$i]['size'] =($size/1000)>1000? ($size/1000000).' MB':($size/1000). ' KB';
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
        $time = time();
        $result = $this->DbManage->backup($tables,$path,4096,$time);
        if($result!==false){
            $result = true;
        }
        //记录日志
         $this->write_database_log(Log::BACK_UP,$tables,$time);

        return $result;



    }






    public  function  save_one_database(){
         $path = ROOT_PATH ."database" . DS;
         $data = Request::instance()->post("data");
         $tables[0] =$data;
         $time = time();
         $result = $this->DbManage->backup($tables,$path,4096,$time);
        if($result!==false){
            $result = true;
        }
        //记录日志
        $this->write_database_log(Log::BACK_UP,$tables,$time);
        return $result;

    }



    public  function  restore_database(){
        $path = ROOT_PATH ."database" . DS;
        $file = Request::instance()->post("data");
        $file_name = $path .$file;
        $result = $this->DbManage->restore($file_name);
        //记录日志
        $this->write_database_log( Log::RESTORE,$file,time());
        return $result;


    }


    public function write_database_log($type,$tables,$time){
        $time = date('Y-m-d H:i:s',$time);
        if($type ==  Log::BACK_UP ){

            $table_log["after_value"] = json_encode($tables);
            $table_log["title"] = $time ."备份数据库"  ;
        }
        elseif($type ==  Log::RESTORE ){

            $table_log["after_value"] = json_encode($tables);
            $table_log["title"] = $time ."还原了sql文件".$tables  ;
        }
        elseif ($type == Log::DELETE_BACK_FILE){

            $table_log["after_value"] = json_encode($tables);
            $table_log["title"] = $time ."删除了备份文件".$tables  ;
        }

        $table_log["type"] = $type;
        $table_log["before_value"] = "";

        model("log", "logic")->write_log($table_log);
    }



    public  function  delete_database($file){


        Common::unlink_file((ROOT_PATH ."database" . DS) .$file);

        //记录日志
        $this->write_database_log( Log::DELETE_BACK_FILE ,$file,time());

        $this->redirect("index");
    }




















}
