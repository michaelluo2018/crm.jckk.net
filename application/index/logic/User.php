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



    public function get_book($is_paginate=true){
         if($is_paginate){
             $users = Db::table("jckk_user")
                 ->field(["jckk_user.*","jckk_post.post_name","jckk_department.department_name"])
                 ->where("jckk_user.is_delete",0)
                 ->join("jckk_post","jckk_post.id=jckk_user.post_id")
                 ->join("jckk_department","jckk_department.id=jckk_user.department_id")
                 ->group("jckk_user.department_id")
                 ->group("jckk_user.uid")
                 ->order("jckk_department.sort",'asc')
                 ->order("jckk_post.sort",'asc')
                 ->paginate();
         }
         else{
             $users = Db::table("jckk_user")
                 ->field(["jckk_user.*","jckk_post.post_name","jckk_department.department_name"])
                 ->where("jckk_user.is_delete",0)
                 ->join("jckk_post","jckk_post.id=jckk_user.post_id")
                 ->join("jckk_department","jckk_department.id=jckk_user.department_id")
                 ->group("jckk_user.department_id")
                 ->group("jckk_user.uid")
                 ->order("jckk_department.sort",'asc')
                 ->order("jckk_post.sort",'asc')
                 ->select();
         }


        return $users;
    }



    public  function  get_users_by_name($name){

        $users=  Db::table("jckk_user")
            ->where("jckk_user.is_delete","<>",1)
            ->where("jckk_user.chinese_name","like","%".$name."%")
            ->field(["jckk_user.*","jckk_department.department_name","jckk_post.post_name"])
            ->join("jckk_department","jckk_department.id = jckk_user.department_id",'LEFT')
            ->join("jckk_post","jckk_post.id=jckk_user.post_id",'LEFT')
            ->order("jckk_department.sort","asc")
            ->order("jckk_post.sort","asc")
            ->select();

        return $users;
    }


    public function  excel_save_user($data){
        //先检测是否已有
        $user_mobile = $this->where('mobile',$data["F"])->where('is_delete','<>',1)->count();
        $user_email = $this->where('email',$data["I"])->where('is_delete','<>',1)->count();

        if(!$user_mobile && !$user_email){
            //写库
            //获取部门id
            $department = \model("department")->where("department_name",$data['A'])->where("is_delete","<>",1)->find();
            if(!$department){
                return $result = ['status'=>'error','msg'=>'不存在部门'.$data['A'].'!'];
            }

            //获取职位id
            $post = \model("post")->where("department_id",$department->id)->where("post_name",$data['E'])->where("is_delete","<>",1)->find();
            if(!$post){
                //不存在岗位创建新岗位

                if($data['D'] == $data['E']){
                    $post_model =  \model('post');
                    $post_model->pid = 0;
                    $post_model->path =0;
                    $post_model->post_name = $data['E'];
                    $post_model->department_id = $department->id;
                    $post_model->create_time =  time();
                    $post_model->is_delete =  0;
                }
                else{
                    $p_post = \model("post")->where("department_id",$department->id)->where("post_name",$data['D'])->where("is_delete","<>",1)->find();

                   if($p_post){
                       $post_model =  \model('post');
                       $post_model->pid = $p_post->id;
                       $post_model->path = ($p_post->path).'-'.$p_post->id;
                       $post_model->post_name = $data['E'];
                       $post_model->department_id = $department->id;
                       $post_model->create_time =  time();
                       $post_model->is_delete =  0;
                       $post_model->sort =  $p_post->sort +1;
                   }
                   else{
                       return $result = ['status'=>'error','msg'=>$data['A'].'下岗位'.$data['E'].'的上级岗位不存在!'];
                   }

                }

                if($post_model->save()){
                    $post_id = $post_model->id;
                    //给基础菜单查看权限,工作台，个人中心，通讯录，客户和项目，客户管理，项目管理，线索管理
                    $menu_url_array = ["工作台","个人中心","通讯录","客户和项目","客户管理","项目管理","线索管理"];
                    for ($m=0;$m<count($menu_url_array);$m++){

                        $this_menu = \model("menu")->where("title",$menu_url_array[$m])->where("is_delete","<>",1)->find();

                       if($this_menu){
                           $permission_array[$m]['pid'] =  $post_id;
                           $permission_array[$m]['mid'] =  $this_menu->id;
                           $permission_array[$m]['add_operate'] =  0;
                           $permission_array[$m]['delete_operate'] =  0;
                           $permission_array[$m]['update_operate'] =  0;
                           $permission_array[$m]['desc_operate'] =  1;
                           $permission_array[$m]['permission_range'] =  "所有人";
                           $permission_array[$m]['create_time'] =  time();
                       }

                    }

                    if(isset($permission_array)){
                        \model("post_permission")->saveAll($permission_array);
                    }else{
                        return $result = ['status'=>'error','msg'=>'权限'.$menu_url_array[$m].'添加失败!'];
                    }

                }
                else{
                    return $result = ['status'=>'error','msg'=>$data['A'].'下岗位'.$data['E'].'添加失败!'];
                }
            }
            else{
                $post_id = $post->id;
            }
            $user =  \model("user");
            $user->chinese_name  = $data['B'];
            $user->english_name  = $data['C'];
            $user->sex  = $data['I']==0?"男":"女";
            $user->department_id  = $department->id;
            $user->post_id  = $post_id;
            $user->mobile  = $data["F"];
            $user->wechat  = $data['H'];
            $user->email  = $data["I"];
            $user->qq  = $data['G'];
            $user->password  = $this->password(123456);
            $user->create_time  = time();
            $user->is_delete  = 0;
            if( $user->save()){
                return $result = ['status'=>'ok','msg'=>'添加成功！'];
            }

        }
        else{
            return $result = ['status'=>'error','msg'=>'手机号或邮箱系统已存在！'];
        }

    }




}