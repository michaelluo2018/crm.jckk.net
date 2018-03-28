<?php
namespace  app\index\logic;
use think\Model;
class Post extends Model{

    protected  $table="jckk_post";

    public  function  get_posts_by_department($department_id){

        return $this->where("department_id",$department_id)->order("sort asc")->select();

    }

    public  function get_post_by_name_and_department($post_name,$department_id){

        return $this->where(["post_name"=>$post_name,"department_id"=>$department_id])->find();
    }


    public  function  save_post($data){
        if(!isset($data['post_pid'])){
            $data['post_pid'] = 0;
        }
        $num = count($data['department_name'] );
        for ($i=0;$i<$num;$i++){
            if(isset($data['post_id'][$i])&& $data['post_id'][$i]>0){
                $post = $this->where('id',$data['post_id'][$i])->find();
                $post->post_name = $data['department_name'][$i];
                $post->sort = $data['listorder'][$i];
                $post->save();
            }
            else{
                $array[$i]['department_id'] =  $data['post_department_id'];
                $array[$i]['post_name'] =  $data['department_name'][$i];
                $array[$i]['sort'] = $data['listorder'][$i];
                $array[$i]['pid'] = $data['post_pid'];
                $array[$i]['create_time'] = time();
            }
        }
        if(isset($array) && !empty($array)){
            $this->saveAll($array);
        }

    }



}
