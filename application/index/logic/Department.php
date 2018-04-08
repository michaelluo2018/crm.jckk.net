<?php
namespace  app\index\logic;
use think\Model;
use app\index\model\Log;
class Department extends Model{

    protected  $table="jckk_department";

    public  function  get_departments(){

        $departments = $this->where("is_delete","<>",1)->order("sort asc")->select();

        return $departments;
    }


    public  function  save_department($data){

        $num = count($data['department_name'] );
        for ($i=0;$i<$num;$i++){
            if(isset($data['depart_id'][$i])&& $data['depart_id'][$i]>0) {
                $department = $this->where('id', $data['depart_id'][$i])->find();
                $before_value = json_encode($department);
                $department->department_name = $data['department_name'][$i];
                $department->sort = $data['listorder'][$i];
                if($department->save()){
                    //处理日志
                    $update_department_log[$i]["type"] = Log::UPDATE_TYPE;
                    $update_department_log[$i]["before_value"] = $before_value;
                    $update_department_log[$i]["after_value"] = json_encode($department);
                    $update_department_log[$i]["title"] = "更改" . $department->department_name . "(部门)信息，部门ID是" . $department->id;
                }

            }
            else{
                //清朝空余的
                if(isset($data['department_name'][$i])&& !empty($data['department_name'][$i])){
                    $array[$i]['department_name'] =  $data['department_name'][$i];
                    $array[$i]['sort'] = $data['listorder'][$i];
                    $array[$i]['create_time'] = time();
                }

            }
        }

        if(isset( $update_department_log)){
            if(count($update_department_log)==1){
                foreach ($update_department_log as $v){
                    $update_department_log = $v;
                }
                model("log", "logic")->write_log($update_department_log);
            }
            else{
                model("log", "logic")->write_log($update_department_log,true);
            }


        }

        if(isset($array) && !empty($array)){
            $department = model("department");

            if(count($array) == 1){
                foreach ($array as $v){
                    $array = $v;
                }
                 $department->save($array);

                $add_department_log["type"] = Log::ADD_TYPE;
                $add_department_log["before_value"] = "";
                $add_department_log["after_value"] = json_encode($department);
                $add_department_log["title"] = "添加" . $department->department_name . "(部门)信息，部门ID是" . $department->id ;
                model("log", "logic")->write_log($add_department_log);
            }
            else{
                $result = $department->saveAll($array);
                foreach ($result as $k=>$v){
                    if($v){
                        $add_department_log[$k]["type"] = Log::ADD_TYPE;
                        $add_department_log[$k]["before_value"] = "";
                        $add_department_log[$k]["after_value"] = json_encode($v);
                        $add_department_log[$k]["title"] = "添加" . $v->department_name . "(部门)信息，部门ID是" . $v->id ;
                    }


                }
                model("log", "logic")->write_log($add_department_log,true);
            }



        }




    }


    public function get_organization($id = null){
        $data['departments'] = $this->get_departments();
        if($id){
            $data['posts'] = model("post","logic")->get_posts_by_department($id);
            $data['department_id'] = $id;
        }
        else{
            //第一个部门的岗位
            if( $data['departments']){
                $data['posts'] = model("post","logic")->get_posts_by_department($data['departments'][0]->id);
                $data['department_id'] = $data['departments'][0]->id;
            }
            else{
                $data['posts'] = null;
                $data['department_id'] = null;
            }
        }
      return $data;
    }



    public  function  only_delete_department($id){


        //删除
        $department = $this->where("id",$id)->find();
        $department_log["type"] = Log::DELETE_TYPE;
        $department_log["before_value"] = json_encode($department);
        $department_log["after_value"] = "";
        $department_log["title"] = "删除".$department->department_name."(岗位),岗位ID是".$department->id;
        $this->where("id",$id)->update(["is_delete"=>1]);
        model("log","logic")->write_log( $department_log);
    }

    public function  delete_department($id){
        //删除部门下面岗位
        model('post',"logic")->delete_post_by_department($id);

        //删除部门
        $this->only_delete_department($id);
    }




}
