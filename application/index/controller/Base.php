<?php

namespace  app\index\controller;
use think\Controller;
use think\Cookie;
use think\Request;
use think\Session;

class Base extends Controller{
    protected $uid;
    protected $post_id;
    protected $all_menus=null;
    protected $user_menus=null;
    protected $menu_id=null;
    protected $user_info=null;

    function __construct(Request $request = null)
    {
        parent::__construct($request);
        if(!$this->is_login()){
            if(!$this->is_remember_me()){
                $this->redirect("login/login");
            }
        }
        $this->uid = Session::get("uid");
        $user_info = model("user","logic")->get_user($this->uid);
        $this->assign("user_info",$user_info);

        //系统设置
        $setting = model("setting","logic")->get_setting();
        $key = ($this->uid).'system_theme';
        if(isset($setting[$key])){
            $setting['system_theme'] = $setting[$key];
        }
        $this->assign("setting",$setting);

        $this->post_id = $user_info['post_id'];
        $this->user_info = $user_info;

        $this->all_menus = model("menu","logic")->get_menus();


        $this->user_menus = $this->get_user_menus();

        $this->assign("base_menus",$this->user_menus);
        //总客户，总项目
        $total_customer = model("customer","logic")->total_customer();
        $total_project = model("project","logic")->total_project();
        $this->assign("total_customer",$total_customer);
        $this->assign("total_project",$total_project);

        $this->menu_id = Request::instance()->get("mid");
        $this->assign("mid",$this->menu_id);
        $this->assign("customer_mid",$this->get_mid_by_url("index/customer/customer_list"));

        //检测链接是否有权限展示

        if(!$this->get_desc_by_url(request()->module().'/'.request()->controller().'/'.request()->action())){
//            echo "<script>alert('没有权限！'); </script>";
            $this->redirect("/");
        }
        //公告
        $announcements = model("announcement","logic")->get_announcement();

        $this->assign("announcements",$announcements);
    }

    protected function login($uid){

        Session::set("uid",$uid);
        $value = $uid."^".request()->ip()."^".time();
        Cookie::set("user",base64_encode($value),3600*24*7);
    }

    protected  function  login_out(){
        Session::delete("uid");
        Cookie::delete("user");
    }

    protected  function is_login(){
        if(Session::has("uid")){
            return true;
        }else{
           if($value = Cookie::get("user")){
               $arr = explode("^",base64_decode($value));
               $ip = request()->ip();

               if($arr[1] == $ip){
                   Session::set("uid",$arr[0]);
                   return true;
               }

           }
        }

    }

    protected function is_remember_me(){
        $account = Cookie::get("account");
        $pwd = Cookie::get("pwd");
        if($account && $pwd){
            if( $uid = model("user","logic")->check_user($account,$pwd)){
                 $this->login($uid);
                 return true;
            }
        }

    }



//    public function get_user_menus(){
//
//        $menus_all=  $this->all_menus;
//
//        $list = array(); //存放登陆用户岗位的菜单
//        $array = array(); //存放登陆用户岗位的菜单
//        $permissions = array(); //存放登陆用户岗位的菜单权限，下标是菜单id
//
//        foreach ($menus_all as $k=>$v){
//            $mid = $v->id;
//            $post_permission = model("post_permission")->where("pid", $this->post_id)->where("mid",$mid)->find();
//
//            if($post_permission){
//                if($post_permission->desc_operate==1){
//                    $array[$k] = $v;
//                    $permissions[$mid] = $post_permission;
//                }
//            }
//
//        }
//        $list['menus'] = $array;
//        $list['permission'] = $permissions;
//        return $list;
//
//
//    }

    public function get_user_menus(){


        $menus = model("menu","logic")->get_menu_by_pid(0,true);

        foreach ($menus as $mk=>$mv){
            $child_pid1 = $mv['id'];
            $menus[$mk]['child'] = model("menu","logic")->get_menu_by_pid($child_pid1,true);
            foreach ( $menus[$mk]['child'] as $mck=>$mcv){
                $child_pid2 = $mcv['id'];
                $menus[$mk]['child'][$mck]['child'] = model("menu","logic")->get_menu_by_pid($child_pid2,true);
            }
        }

        return $menus;


    }

    public  function  get_menu_permission(){
        $menus_all=  $this->all_menus;

        $permissions = array(); //存放登陆用户岗位的菜单权限，下标是菜单id

        foreach ($menus_all as $k=>$v){
            $mid = $v->id;
            $post_permission = model("post_permission")->where("pid", $this->post_id)->where("mid",$mid)->find();

            if($post_permission){
                if($post_permission->desc_operate==1){
                    $permissions[$mid] = $post_permission;
                }
            }

        }

        return $permissions;

    }

    public function  check_post_menu_permission($operate_type){

        $permission = $this->get_menu_permission();
        if(isset($permission[$this->menu_id])){
            if($permission[$this->menu_id]->$operate_type){
                return true;
            }
        }
    }

    public function  check_post_menu_range_permission(){

        $permission =$this->get_menu_permission();
        $uid_array = null;
        if(isset($permission[$this->menu_id])){
           $range = $permission[$this->menu_id]->permission_range;
            $user_info = $this->user_info;
            if($range=="所有人"){
                $uid_array = "all";
            }
            if($range=="部门所有人"){
                //  登陆者可见部门所有人创建内容
                $department_id = $user_info['department_id'];
                //获取部门下所有uid
                $uid_array = model("user")->where("department_id",$department_id)->column("uid");


           }
            if($range=="自己和下属"){
                //  登陆者可见自己和下属创建内容

                $my_path =  ($user_info['post_path']).'-'.($user_info['post_id']);

                //获取自己和下属岗位id
                $post_ids = model("post")->where("path","like",$my_path.'%')->column("id");

                $uid_array = model("user")->whereIn("post_id",$post_ids)->column("uid");

                array_push($uid_array,$this->uid);

            }
            if($range=="仅自己"){
                //  登陆者可见仅自己创建内容
                $uid_array = [$this->uid];
            }
        }

        if(!$uid_array){

            $uid_array = [$this->uid];
        }

        return $uid_array;
    }

    public function get_mid_by_url($url){
       $id =  model("menu")->where("url","like",'%'.$url.'%')->column("id");
       if($id){
           return $id[0];
       }

    }

    public function get_desc_by_url($url){
        $mid = $this->get_mid_by_url($url);
        if($mid){
            $post_permission = model("post_permission")->where("pid", $this->post_id)->where("mid",$mid)->column("desc_operate");
            if($post_permission && $post_permission[0]){
                return true;
            }
        }
        else{
            return true;
        }

    }



}