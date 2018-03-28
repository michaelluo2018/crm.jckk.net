<?php
namespace  app\index\logic;
use think\Model;
use think\Db;
class User extends Model{

    protected  $table="jckk_user";

    //获取部门下所有用户
    public function  get_department_users($department_id){
        $users = $this->where("department_id",$department_id)->select();
        return $users;
    }


    public function save_user($data,$file){

        if(isset($file)&&!$url=$this->upload_heard_img($file)){
            return ["status"=>"error","msg"=>"图片上传错误"];
        }
        if(isset($url)){
            $img_url = "/uploads/".$url;
        }
        else{
            $img_url = null;
        }

        if(isset($data['uid'])){
            $user = $this->where("uid",$data['uid'])->find();
            if($img_url){
                //删除之前图片
                unlink(ROOT_PATH . 'public'.$user->heard_img);
                $data['heard_img'] = $img_url;
            }
            $user->update($data);
        }
        else{

            $data['heard_img'] = $img_url;
            $data['create_time'] = time();
            $arr[0]=$data;
            $this->saveAll($arr);
        }


    }



    public function upload_heard_img($file){

        $info = $file->validate(['ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                return $info->getSaveName();
            }else{

               //  return  $file->getError();
            }

    }


    public  function  get_users(){

        $users=  Db::table("jckk_user")
         ->field(["jckk_user.*","jckk_department.department_name","jckk_post.post_name"])
          ->join("jckk_department","jckk_department.id = jckk_user.department_id",'LEFT')
          ->join("jckk_post","jckk_post.id=jckk_user.post_id",'LEFT')
          ->paginate();

        return $users;
    }



    public  function  get_user($id){

        $user=  Db::table("jckk_user")
            ->where("jckk_user.uid",$id)
            ->field(["jckk_user.*","jckk_department.department_name","jckk_post.post_name"])
            ->join("jckk_department","jckk_department.id = jckk_user.department_id",'LEFT')
            ->join("jckk_post","jckk_post.id=jckk_user.post_id",'LEFT')
            ->find();

        return $user;
    }


    public function delete_user($id){
        //删除头像
        $user =  $this->where("uid",$id)->find();
        unlink(ROOT_PATH . 'public'.$user->heard_img);
        $user->delete();
    }




}