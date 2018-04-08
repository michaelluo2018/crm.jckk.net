<?php
namespace  app\index\logic;
use think\Model;
use app\index\model\Log;
class Post extends Model{

    protected  $table="jckk_post";

    public  function  get_posts_by_department($department_id){

        return $this->where(["department_id"=>$department_id,"is_delete"=>0,"pid"=>0])->order("sort asc")->select();

    }
    


    public  function get_post_by_name_and_department($post_name,$department_id){

        return $this->where(["post_name"=>$post_name,"department_id"=>$department_id])->find();
    }


    public  function  save_post($data){
        if(!isset($data['post_pid'])){
            $data['post_pid'] = 0;
            $pre_path = 0;
        }
        else{
            $p_data = model("post")->where("id",$data['post_pid'])->find();
            $pre_path = ($p_data->path).'-'.$data['post_pid'];
        }
        $num = count($data['department_name'] );
        for ($i=0;$i<$num;$i++){
            if(isset($data['post_id'][$i])&& $data['post_id'][$i]>0){
                //更改
                $post = $this->where('id',$data['post_id'][$i])->find();
                $before_value = json_encode($post);
                $post->post_name = $data['department_name'][$i];
                $post->sort = $data['listorder'][$i];
                if( $post->save()){
                    //处理日志
                    $update_post_log[$i]["type"] = Log::UPDATE_TYPE;
                    $update_post_log[$i]["before_value"] = $before_value;
                    $update_post_log[$i]["after_value"] = json_encode($post);
                    $update_post_log[$i]["title"] = "更改" . $post->post_name . "(岗位)信息，岗位ID是" . $post->id;
                }

            }
            else{
                //添加
                $array[$i]['department_id'] =  $data['post_department_id'];
                $array[$i]['post_name'] =  $data['department_name'][$i];
                $array[$i]['sort'] = $data['listorder'][$i];
                $array[$i]['pid'] = $data['post_pid'];
                $array[$i]['create_time'] = time();
                $array[$i]['path'] = $pre_path;
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

            $post = model("post");

            if(count($array) == 1){
                foreach ($array as $v){
                    $array = $v;
                }
                $post->save($array);

                $add_post_log["type"] = Log::ADD_TYPE;
                $add_post_log["before_value"] = "";
                $add_post_log["after_value"] = json_encode($post);
                $add_post_log["title"] = "添加" . $post->post_name . "(岗位)信息，岗位ID是" . $post->id ;
                model("log", "logic")->write_log($add_post_log);
            }
            else{
                $result = $this->saveAll($array);
                foreach ($result as $k=>$v){
                    if($v && $v->id ){
                        $add_post_log[$k]["type"] = Log::ADD_TYPE;
                        $add_post_log[$k]["before_value"] = "";
                        $add_post_log[$k]["after_value"] = json_encode($v);
                        $add_post_log[$k]["title"] = "添加" . $v->post_name . "(岗位)信息，岗位ID是" . $v->id ;
                    }

                }

                model("log", "logic")->write_log($add_post_log,true);
            }


        }

    }


    public function delete_post($id){

        //删除岗位
        $post = $this->where("id",$id)->find();
        $post_log["type"] = Log::DELETE_TYPE;
        $post_log["before_value"] = json_encode($post);
        $post_log["after_value"] = "";
        $post_log["title"] = "删除".$post->post_name."(岗位),岗位ID是".$post->id;

        $post->is_delete=1;
        if($post->save()){
            model("log","logic")->write_log( $post_log);
        }


        //删除子岗位
        $children_post = $this->where(["pid"=>$id,"is_delete"=>0])->select();

        if($children_post){

            foreach ($children_post as $k=>$v){
                        $before_value = $v;
                        $v->is_delete = 1;
                        $v->save();
                        $child_post_log[$k]["type"] = Log::DELETE_TYPE;
                        $child_post_log[$k]["before_value"] = json_encode($before_value);
                        $child_post_log[$k]["after_value"] = "";
                        $child_post_log[$k]["title"] = "删除".$v->post_name."(岗位),岗位ID是".$v->id;
            }

              model("log","logic")->write_log( $child_post_log,true);


        }


    }



    public  function  delete_post_by_department($department_id)
    {
        $posts = $this->where('department_id',$department_id)->select();
        if($posts){
            foreach ($posts as $k=>$v){
                $id = $v->id;
                $this->delete_post($id);
            }
        }


    }



}
