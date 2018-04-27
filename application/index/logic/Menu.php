<?php
namespace app\index\logic;

use think\Model;
use app\index\model\Log;
class Menu extends Model{

    protected $table="jckk_menu";


    public function get_menu_by_pid($pid,$toArray=null){
        if($toArray){
            $result = $this->where("pid",$pid)->where("is_delete","<>",1)->order("menu_order asc")->select();
            return collection($result)->toArray();
        }
        else{
            return $this->where("pid",$pid)->where("is_delete","<>",1)->order("menu_order asc")->select();
        }


    }

    public function get_menus(){

        $parent_mens = $this->get_menu_by_pid(0);

        $menus =  self::get_menu_path(self::get_list( $parent_mens));

        return $menus;
    }


    public static function get_list($arr){
        //$arr 所有分类列表
        static $menu_list = array() ;

        foreach($arr as $u){

            //看下面有没有子类
            $menu_list[] = $u;

            $children = model("menu")->where(["pid"=>$u->id,"is_delete"=>0])->order("menu_order asc")->select();

            if($children){

                self::get_list($children);

            }


        }

        return $menu_list;
    }


    public static function get_menu_path($arr){

        foreach($arr as $k=>$v){
            $arr[$k]['count']=25*(count(explode('-',$v->path))-1);
        }
        return $arr;
    }


    public  function  save_menu($data){
        if(!isset($data['pid'])){
            $data['pid'] = 0;
            $pre_path = 0;
        }
        else{
            $p_data = model("menu")->where("id",$data['pid'])->find();
            $pre_path = ($p_data->path).'-'.$data['pid'];
        }
        $num = count($data['title'] );
        for ($i=0;$i<$num;$i++){
            if(isset($data['menu_id'][$i])&& $data['menu_id'][$i]>0){
                //更改
                $menu = $this->where('id',$data['menu_id'][$i])->find();
                $before_value = json_encode($menu);
                $menu->title = $data['title'][$i];
                $menu->url = $data['url'][$i];
                $menu->menu_order = $data['menu_order'][$i];
                if( $menu->save()){
                    //处理日志
                    $update_menu_log[$i]["type"] = Log::UPDATE_TYPE;
                    $update_menu_log[$i]["before_value"] = $before_value;
                    $update_menu_log[$i]["after_value"] = json_encode($menu);
                    $update_menu_log[$i]["title"] = "更改" . $menu->title . "(菜单)信息，ID是" . $menu->id;
                }

            }
            else{
                //添加
                //过滤空白的
                if(isset($data['title'][$i])&& !empty($data['title'][$i])){
                    $array[$i]['title'] =  $data['title'][$i];
                    $array[$i]['url'] =  $data['url'][$i];
                    $array[$i]['menu_order'] = $data['menu_order'][$i];
                    $array[$i]['pid'] = $data['pid'];
                    $array[$i]['create_time'] = time();
                    $array[$i]['path'] = $pre_path;
                }

            }
        }

        if(isset( $update_menu_log)){
            if(count($update_menu_log)==1){
                foreach ($update_menu_log as $v){
                    $update_menu_log = $v;
                }
                model("log", "logic")->write_log($update_menu_log);
            }
            else{
                model("log", "logic")->write_log($update_menu_log,true);
            }
        }

        if(isset($array) && !empty($array)){

            $menu = model("menu");

            if(count($array) == 1){
                foreach ($array as $v){
                    $array = $v;
                }
                $menu->save($array);

                $add_menu_log["type"] = Log::ADD_TYPE;
                $add_menu_log["before_value"] = "";
                $add_menu_log["after_value"] = json_encode($menu);
                $add_menu_log["title"] = "添加" . $menu->title . "(菜单)信息，ID是" . $menu->id ;
                model("log", "logic")->write_log($add_menu_log);
            }
            else{
                $result = $this->saveAll($array);
                foreach ($result as $k=>$v){
                    if($v && $v->id ){
                        $add_menu_log[$k]["type"] = Log::ADD_TYPE;
                        $add_menu_log[$k]["before_value"] = "";
                        $add_menu_log[$k]["after_value"] = json_encode($v);
                        $add_menu_log[$k]["title"] = "添加" . $v->title . "(菜单)信息，ID是" . $v->id ;
                    }

                }

                model("log", "logic")->write_log($add_menu_log,true);
            }


        }

    }


    public function delete_menu($id){
        //删除
        $menu = $this->where("id",$id)->find();
        $pre_path = ($menu->path)."-".$menu->id;

        $menu_log["type"] = Log::DELETE_TYPE;
        $menu_log["before_value"] = json_encode($menu);
        $menu_log["after_value"] = "";
        $menu_log["title"] = "删除".$menu->title."(菜单),ID是".$menu->id;

        $menu->is_delete=1;
        if($menu->save()){
            model("log","logic")->write_log( $menu_log);
        }


        //删除子岗位
        $children_menu = $this->where("is_delete","<>",1)->where("path","like",$pre_path.'%')->select();

        if($children_menu){
            $child_delete_menu_log = array();
            foreach ($children_menu as $k=>$v){
                $before_value = $v;
                $v->is_delete = 1;
                if( $v->save()){
                    $child_delete_menu_log[$k]["type"] = Log::DELETE_TYPE;
                    $child_delete_menu_log[$k]["before_value"] = json_encode($before_value);
                    $child_delete_menu_log[$k]["after_value"] = "";
                    $child_delete_menu_log[$k]["title"] = "删除".$v->title."(菜单),ID是".$v->id;

                }

            }
            model("log","logic")->write_log( $child_delete_menu_log,true);

        }
    }











}