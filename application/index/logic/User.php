<?php
namespace  app\index\logic;
use think\Model;
use think\Db;
use app\index\model\Log;
use app\index\controller\Common;
class User extends Model{

    protected  $table="jckk_user";

    //获取部门下所有用户
    public function  get_department_users($department_id){
        $users = $this->where(["department_id"=>$department_id,"is_delete"=>0])->select();
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


        //写库
        if(isset($data['uid'])){
            $user = $this->where("uid",$data['uid'])->find();
            $before_value = json_encode($user);
            if($img_url){
                //删除之前图片
                Common::unlink_file(ROOT_PATH . 'public'.$user->heard_img);
                $data['heard_img'] = $img_url;
            }
            if($data['password']){
                $data['password'] = $this->password($data['password']);
            }
            else{
                $data['password'] = $user->password;
            }
            if($user->update($data)){
                $user = $this->where("uid",$data['uid'])->find();
                $user_log["type"] = Log::UPDATE_TYPE;
                $user_log["before_value"] = $before_value;
                $user_log["after_value"] = json_encode($user);
                $user_log["title"] = "更改".$user->chinese_name ."(系统用户)信息，用户ID是".$user->uid;
                model("log","logic")->write_log($user_log);
            }


            return $user->uid;
        }
        else{
            $data['password'] = $this->password($data['password']);
            $data['heard_img'] = $img_url;
            $data['create_time'] = time();
            $this->save($data);

            $user = model("user")->where("uid",$this->uid)->find();
            $user_log["type"] = Log::ADD_TYPE;
            $user_log["before_value"] = "";
            $user_log["after_value"] = json_encode($user);
            $user_log["title"] = "添加".$user->chinese_name ."(系统用户)信息，用户ID是".$user->uid;
            model("log","logic")->write_log($user_log);
            return $this->uid;
        }


    }


    public function password($pwd){
        return md5("!@#JC".$pwd."kk0322");
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
            ->where("jckk_user.is_delete","<>",1)
            ->field(["jckk_user.*","jckk_department.department_name","jckk_post.post_name","jckk_post.path as post_path"])
            ->join("jckk_department","jckk_department.id = jckk_user.department_id",'LEFT')
            ->join("jckk_post","jckk_post.id=jckk_user.post_id",'LEFT')
            ->order("jckk_user.uid","desc")
            ->select();

        return $users;
    }


    public  function  get_user($id){

        $user=  Db::table("jckk_user")
            ->where("jckk_user.uid",$id)
            ->field(["jckk_user.*","jckk_department.department_name","jckk_post.post_name","jckk_post.path as post_path"])
            ->join("jckk_department","jckk_department.id = jckk_user.department_id",'LEFT')
            ->join("jckk_post","jckk_post.id=jckk_user.post_id",'LEFT')
            ->find();

        return $user;
    }


    public function delete_user($id){
        //删除头像
        $user =  $this->where("uid",$id)->find();
        Common::unlink_file(ROOT_PATH . 'public'.$user->heard_img);
        //添加日志
        $user_log["type"] = Log::DELETE_TYPE;

        $user_log["before_value"] = json_encode($user);
        $user_log["after_value"] = "";
        $user_log["title"] = "删除".$user->chinese_name."(系统用户),用户ID是".$user->uid;
        model("log","logic")->write_log( $user_log);
        $user->is_delete = 1;
        return   $user->save();


    }


    public function check_user($account,$pwd,$is_pwd = false){
        if($is_pwd){
            $pwd = $this->password($pwd);
        }
        $user1 = $this->where(["mobile"=>$account,"password"=>$pwd,"is_delete"=>0])->find();
        $user2 = $this->where(["email"=>$account,"password"=>$pwd,"is_delete"=>0])->find();
        if($user1){
            return $user1->uid;
        }
        elseif ($user2){
            return $user2->uid;
        }
    }

    public function chang_pwd_by_email($email,$pwd){
        $user = $this->where("email",$email)->find();
        $user->password = $this->password($pwd);
        $user->save();
        return $user->uid;
    }

    public  function  is_exist_email($email){
        if($user = $this->where("email",$email)->find()){
            return $user->uid;
        }
        else{
            return false;
        }
    }


    public  function  check_mobile($mobile,$uid=null){
        if($uid){
            return $this->where("mobile",$mobile)->where("uid","<>",$uid)->where("is_delete","<>",1)->find();
        }
        else{
            return $this->where("mobile",$mobile)->where("is_delete","<>",1)->find();
        }

    }


     public  function  check_email($email,$uid=null){

        if($uid){
            return $this->where("email",$email)->where("uid","<>",$uid)->where("is_delete","<>",1)->find();
        }
        else{
            return $this->where("email",$email)->where("is_delete","<>",1)->find();
        }


    }











}