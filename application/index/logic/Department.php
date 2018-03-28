<?php
namespace  app\index\logic;
use think\Model;
class Department extends Model{

    protected  $table="jckk_department";

    public  function  get_departments(){

        $departments = $this->order("sort asc")->select();

        return $departments;
    }


    public  function  save_department($data){
        $num = count($data['department_name'] );
        for ($i=0;$i<$num;$i++){
            if(isset($data['depart_id'][$i])&& $data['depart_id'][$i]>0){
               $department = $this->where('id',$data['depart_id'][$i])->find();
                $department->department_name = $data['department_name'][$i];
                $department->sort = $data['listorder'][$i];
                $department->save();
            }
            else{
                $array[$i]['department_name'] =  $data['department_name'][$i];
                $array[$i]['sort'] = $data['listorder'][$i];
                $array[$i]['create_time'] = time();
            }
        }
        if(isset($array) && !empty($array)){
            $this->saveAll($array);
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

}
