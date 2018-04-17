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

        $menus_all=  $this->all_menus;

        $list = array(); //存放登陆用户岗位的菜单
        $array = array(); //存放登陆用户岗位的菜单
        $permissions = array(); //存放登陆用户岗位的菜单权限，下标是菜单id

        foreach ($menus_all as $k=>$v){
            $mid = $v->id;
            $post_permission = model("post_permission")->where("pid", $this->post_id)->where("mid",$mid)->find();

            if($post_permission){
                if($post_permission->desc_operate==1){
                    $array[$k] = $v;
                    $permissions[$mid] = $post_permission;
                }
            }

        }
        $list['menus'] = $array;
        $list['permission'] = $permissions;
        return $list;


    }


    public function  check_post_menu_permission($operate_type){
        $menus = $this->user_menus;
        $permission = $menus['permission'];
        if(isset($permission[$this->menu_id])){
            if($permission[$this->menu_id]->$operate_type){
                return true;
            }
        }
    }




}