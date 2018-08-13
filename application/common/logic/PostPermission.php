<?php

namespace  app\common\logic;

use think\Model;
use app\common\model\Log;
class PostPermission extends  Model{

    protected  $table="jckk_post_permission";


    public  function save_permission($data){
       // dump($data);
        $pid=$data['post_id'];
        $num = count($data['menu_id'] );

        for ($i=0;$i<$num;$i++){
            $mid = $data['menu_id'][$i];

            if(isset($data['pre_add'][$mid])){

                $add_operate = 1;
            }
            else{
                $add_operate = 0;
            }
            if(isset($data['pre_delete'][$mid])){
                $delete_operate = 1;
            }
            else{
                $delete_operate = 0;
            }

            if(isset($data['pre_update'][$mid])){
                $update_operate = 1;
            }
            else{
                $update_operate = 0;
            }

            if(isset($data['pre_des'][$mid])){
                $desc_operate = 1;
            }
            else{
                $desc_operate = 0;
            }

            $permission_range = $data['permission_range'][$mid];
          
            if( $post_permission = $this->where('pid',$pid)->where('mid',$mid)->find()){
                //更改
                $before_value = json_encode($post_permission);
                $post_permission->mid = $mid;
                $post_permission->pid = $pid;

                $post_permission->add_operate = $add_operate;
                $post_permission->delete_operate = $delete_operate;
                $post_permission->update_operate = $update_operate;
                $post_permission->permission_range = $permission_range;
                $post_permission->desc_operate = $desc_operate;

                if( $post_permission->save()){
                    //处理日志
                    $update_post_log[$i]["type"] = Log::UPDATE_TYPE;
                    $update_post_log[$i]["before_value"] = $before_value;
                    $update_post_log[$i]["after_value"] = json_encode($post_permission);
                    $update_post_log[$i]["title"] = "更改岗位权限，权限ID是" . $post_permission->id;
                }

            }
            else {
                //添加
                //过滤空白的

                $array[$i]['mid'] = $mid;
                $array[$i]['pid'] = $pid;
                $array[$i]['add_operate'] = $add_operate;
                $array[$i]['delete_operate'] = $delete_operate;
                $array[$i]['update_operate'] = $update_operate;
                $array[$i]['permission_range'] = $permission_range;
                $array[$i]['desc_operate'] = $desc_operate;
                $array[$i]['create_time'] = time();

            }

        }

        if(isset( $update_post_log)){
            if(count($update_post_log)==1){
                foreach ($update_post_log as $v){
                    $update_post_log = $v;
                }
                model("log", "logic")->write_log($update_post_log);
            }
            else{
                model("log", "logic")->write_log($update_post_log,true);
            }
        }

        if(isset($array) && !empty($array)){

            $post_permission = model("post_permission");

            if(count($array) == 1){
                foreach ($array as $v){
                    $array = $v;
                }
                $post_permission->save($array);

                $add_post_log["type"] = Log::ADD_TYPE;
                $add_post_log["before_value"] = "";
                $add_post_log["after_value"] = json_encode($post_permission);
                $add_post_log["title"] = "添加岗位权限，权限ID是" . $post_permission->id ;
                model("log", "logic")->write_log($add_post_log);
            }
            else{
                $result = $this->saveAll($array);
                foreach ($result as $k=>$v){
                    if($v && $v->id ){
                        $add_post_log[$k]["type"] = Log::ADD_TYPE;
                        $add_post_log[$k]["before_value"] = "";
                        $add_post_log[$k]["after_value"] = json_encode($v);
                        $add_post_log[$k]["title"] = "添加岗位权限，权限ID是" . $v->id ;
                    }

                }

                model("log", "logic")->write_log($add_post_log,true);
            }


        }

    }



    public  function get_post_permission($pid){

        return $this->where('pid',$pid)->select();


    }










}