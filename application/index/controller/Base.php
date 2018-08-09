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
    protected $user_customer_range=null;
    protected $user_project_range=null;

    function __construct(Request $request = null)
    {

        parent::__construct($request);
        if(!$this->is_login()){
            if(!$this->is_remember_me()){
                $this->redirect("login/login");
            }
        }
        if($_SERVER['REQUEST_URI']=="/"){
            $this->redirect("index/index"); //解决首页日历问题
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

        $key = ($this->uid).'menu_display';
        if(isset($setting[$key])){
            $setting['menu_display'] = $setting[$key];
        }
        else{
            $setting['menu_display'] = null;
        }
        $this->assign("setting",$setting);



        $this->post_id = $user_info['post_id'];
        $this->user_info = $user_info;

        $this->all_menus = model("menu","logic")->get_menus();
        $this->user_menus = $this->get_user_menus();
        $this->assign("base_menus",$this->user_menus);


        //总客户，总项目
        $this->user_customer_range = $this->get_range_permission($this->uid,"index/customer/customer_list");
        $this->user_project_range  = $this->get_range_permission($this->uid,"index/project/project_list");

        $total_customer = model("customer","logic")->total_customer($this->user_customer_range);
        $total_project = model("project","logic")->total_project( $this->user_project_range);
        $this->assign("total_customer",$total_customer);
        $this->assign("total_project",$total_project);

        $this->menu_id = Request::instance()->get("mid");
        $this->assign("mid",$this->menu_id);
        $this->assign("customer_mid",$this->get_mid_by_url("index/customer/customer_list"));

        //检测链接是否有权限展示
        $uri = request()->module().'/'.request()->controller().'/'.request()->action();
        if(strtolower($uri) != "index/index/index" && strtolower(request()->controller()) != "message" ){
            if(!$this->get_desc_by_url($uri)){
                echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" ><script>alert('抱歉，你还没有权限！');window.location.href='/'</script>"; exit;
            }
        }

        //公告

        $announcements = model("announcement","logic")->get_department_announcement( $user_info['department_id']);
        $this->assign("announcements",$announcements);

        //系统消息
        $message_count = model("message","logic")->get_message_count($this->uid,0);
        $this->assign("message_count",$message_count);
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


    public function get_user_menus(){


        $menus = $this->get_user_permission_menus( model("menu","logic")->get_menu_by_pid(0,true));

        foreach ($menus as $mk=>$mv){
            $child_pid1 = $mv['id'];
            $menus[$mk]['child'] = $this->get_user_permission_menus( model("menu","logic")->get_menu_by_pid($child_pid1,true));
            foreach ( $menus[$mk]['child'] as $mck=>$mcv){
                $child_pid2 = $mcv['id'];
                $menus[$mk]['child'][$mck]['child'] =$this->get_user_permission_menus( model("menu","logic")->get_menu_by_pid($child_pid2,true));
            }
        }
        return $menus;

    }

    public function get_user_permission_menus($menus){

        $array = array();
        foreach ($menus as $k=>$v){
            $mid = $v['id'];
            $post_permission = model("post_permission")->where("pid", $this->post_id)->where("mid",$mid)->find();

            if($post_permission){
                if($post_permission->desc_operate==1){
                    $array[] = $v;
                }
            }

        }

        return $array;
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



    public function get_range_permission($uid,$menu_url){
      //获取岗位id
        $user_info = model("user","logic")->get_user($this->uid);
        $post_id = $user_info['post_id'];
      //获取mid
        $mid = $this->get_mid_by_url($menu_url);
      //获取范围权限
        $post_permission = model("post_permission")->where("pid", $post_id)->where("mid",$mid)->find();
        $range =  $post_permission->permission_range;
        $uid_array = null;
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
            $uid_array = [$uid];
        }
        if(!$uid_array){
            $uid_array = [$uid];
        }
        return $uid_array;
    }

    public function get_mid_by_url($url){
       $id =  model("menu")->where("url","like",'%'.$url.'%')->where("is_delete","<>",1)->column("id");
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