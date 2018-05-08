<?php
namespace  app\index\controller;

use think\Config;
use think\Request;

class User extends Base{

    public  function  profile(){

        //本人操作日志
        $my_logs = model("log","logic")->get_logs($this->uid);
        return view("profile")->assign("my_logs",$my_logs);
    }



    public  function  save_user(){

        if(!$this->check_post_menu_permission("update_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
       else{
           $data = Request::instance()->post();
           $file = Request::instance()->file("heard_img");
           $uid = model('user','logic')->save_user($data,$file);
           $this->redirect("system/user_des",["id"=>$uid]);
       }

    }


    public  function user_del($id){


        if(!$this->check_post_menu_permission("delete_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            model("user", "logic")->delete_user($id);
            $this->redirect("system/member");
        }
    }


    //批量导入用户
     public  function  user_import(){

        return view("user_import");
     }

     public  function  excel_save_user(){

         $file = Request::instance()->file("file");
         $path = ROOT_PATH . 'public' . DS . 'uploads';
         $info = $file->validate(['ext'=>'xls,xlsx'])->move($path);
         if($info){
           $file_name = $info->getSaveName();
         }else{

             $error =   $file->getError();
             echo "<script>alert(' ".$error." ');history.go(-1);</script>";
         }

         $data = CommonExcel::importExecl($path.DS.$file_name);

         //循环写入数据库
         $list = array();
         $list['ok_count'] = 0;
         $list['error_count'] = 0;
         for($i=0;$i<count($data);$i++){
             if($i>=3){
                $result =  model("user","logic")->excel_save_user($data[$i]);
                if($result['status'] == 'ok'){
                    $list['ok_count']  = $list['ok_count']  + 1;
                }
                 if($result['status'] == 'error'){
                     $list['error_count'] =  $list['error_count'] + 1;
                     $list['msg'][] = "序号".$i."导入出现错误！错误信息是：".$result['msg'];
                 }
             }
         }

         $this->assign("list",$list);

         return view("user_import_result");

     }


    //导入模板下载
    public  function  user_import_file(){
        $filename = ROOT_PATH.'public'.DS.'static'.DS.'file'.DS.'user_import_file.xlsx';
        header('Content-Disposition: attachment; filename='.basename($filename));
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Length: '.filesize($filename));
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        readfile($filename);
       echo "<script>history.go(-1);</script>";
    }

    //导出通讯录
    public function  user_export(){
        //获取所有用户
        $users =  model("user","logic")->get_book(false);
        $users = collection($users)->toArray();
//        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" > ";
//        dump($users);die;
        CommonExcel::exportExcel($users);

    }















}