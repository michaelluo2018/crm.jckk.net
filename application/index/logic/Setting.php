<?php

namespace  app\index\logic;
use think\Model;
use app\index\model\Log;
class Setting extends Model{

    protected  $table = "jckk_setting";


    public  function  get_setting(){

        $datas =  model("setting")->select();
        $array_key = array();
        $array_value = array();
        foreach ($datas as $k => $v){
            $array_key[] = $v->sys_key;
            $array_value[] = $v->sys_value;
        }
        return array_combine($array_key,$array_value);
    }

    public function  save_settings($data,$is_file = false){

        $keys = array_keys($data);
        $num = count($keys);
        if($is_file){
            for($i=0;$i<$num;$i++){
                //检测是否已经存在
                if($setting = model("setting")->where("sys_key",$keys[$i])->find()){
                    $before_value = json_encode($setting);
                    $setting->sys_key = $keys[$i];
                    $setting->sys_value = "/uploads/". model("user","logic")->upload_heard_img($data[$keys[$i]]);
                    if($setting->save()){
                        $update_setting_log[$i]["type"] = Log::UPDATE_TYPE;
                        $update_setting_log[$i]["before_value"] = $before_value;
                        $update_setting_log[$i]["after_value"] = json_encode($setting);
                        $update_setting_log[$i]["title"] = "更改".$setting->sys_key ."(系统设置)信息，ID是".$setting->id;
                    }
                }
                else{
                    $array[$i]["sys_key"] = $keys[$i];
                    $array[$i]["sys_value"] = "/uploads/". model("user","logic")->upload_heard_img($data[$keys[$i]]);
                    $array[$i]["create_time"] = time();
                }

            }
        }
        else{
            for($i=0;$i<$num;$i++){
                if($setting = model("setting")->where("sys_key",$keys[$i])->find()){
                    $before_value = json_encode($setting);
                    $setting->sys_key = $keys[$i];
                    $setting->sys_value = $data[$keys[$i]];
                    if($setting->save()){
                        $update_setting_log[$i]["type"] = Log::UPDATE_TYPE;
                        $update_setting_log[$i]["before_value"] = $before_value;
                        $update_setting_log[$i]["after_value"] = json_encode($setting);
                        $update_setting_log[$i]["title"] = "更改".$setting->sys_key ."(系统设置)信息，ID是".$setting->id;
                    }
                }
                else{
                    $array[$i]["sys_key"] = $keys[$i];
                    $array[$i]["sys_value"] = $data[$keys[$i]];
                    $array[$i]["create_time"] = time();

                }
            }
        }



        if(isset( $update_setting_log)){
            if(count($update_setting_log)==1){
                foreach ($update_setting_log as $v){
                    $update_setting_log = $v;
                }
                model("log", "logic")->write_log($update_setting_log);
            }
            else{
                model("log", "logic")->write_log($update_setting_log,true);
            }
        }

        if(isset($array) && !empty($array)){



            if(count($array) == 1){
                $setting_model = model("setting");
                foreach ($array as $v){
                    $array = $v;
                }

                $setting_model->save($array);
                if($setting_model){
                    $add_setting_log["type"] = Log::ADD_TYPE;
                    $add_setting_log["before_value"] = "";
                    $add_setting_log["after_value"] = json_encode($setting_model);
                    $add_setting_log["title"] = "添加" . $setting_model->sys_key . "(系统设置)信息，ID是" . $setting_model->id ;
                    model("log", "logic")->write_log($add_setting_log);
                }


            }
            else{
                $setting_model = model("setting");
                $result = $setting_model->saveAll($array);

                foreach ($result as $k=>$v){
                    if($v && $v->id ){
                        $add_log[$k]["type"] = Log::ADD_TYPE;
                        $add_log[$k]["before_value"] = "";
                        $add_log[$k]["after_value"] = json_encode($v);
                        $add_log[$k]["title"] = "添加" . $v->sys_key . "(系统设置)信息，ID是" . $v->id ;
                    }

                }
                model("log", "logic")->write_log($add_log,true);
            }

        }



    }






}