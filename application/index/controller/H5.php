<?php
namespace  app\index\controller;

use extend\ImageWatermark;
use think\Config;
use think\Controller;
use Think\Request;
require ROOT_PATH .'/extend/ImageWaterMark.php';


class H5 extends Controller {

        public function index(){
           $questions = model("question","logic")->get_h5_questions();
           dump($questions);
        }


        public function save_result(){
           // $score = Request::instance()->post("score");
            //$name = Request::instance()->post("name");
            //分数总值除以6，然后判断区间，随机获取昵称，随机获取3行内容，生成结果图片
            //$average = array_sum($score)/6;
            $name = "小二郎";
            $average = 90;
            $theme_type = Config::get("theme_type");
            if($average>85){
                //学神
                $user_theme = $theme_type[0];
            }
            elseif (85>=$average && $average>70){
                //学霸
                $user_theme = $theme_type[1];
            }
            else{
                //学渣
                $user_theme = $theme_type[2];
            }

            $theme_result = model("theme","logic")->get_user_theme_result($user_theme);
            //dump($theme_result);die;

            $orign_image = ROOT_PATH.'public'.DS.'static'.DS.'assets'.DS.'images'.DS.'background'.DS.'login-register=.jpg';
            $result_file = ROOT_PATH.'public'.DS.'uploads'.DS.date('Ymd').DS;
            if (!is_dir($result_file)) {
                mkdir($result_file, 0755, true);
            }
            $result_image =rand(1000,99999).'.jpg';
            //生成图片
            $image = new ImageWatermark($orign_image);
            $image->setMarkPos(100,200);//设置setMarkPos,则markPosType无效。
            $image->fontFile=ROOT_PATH.'public'.DS.'static'.DS.'font'.DS.'simkai.ttf';
            $image->color='#FFFFFF';
            $image->fontSize=24;
            echo $theme_result['theme']['theme_name'];
            $image->appendTextMark($theme_result['theme']['theme_name']);


//            $image->appendTextMark($theme_result['describe1']);
//            $image->appendTextMark($theme_result['describe2']);
//            $image->appendTextMark($theme_result['describe3']);

            $image->write($result_file.$result_image);





        }



        public function ajax_badword($name){
           $badword = Config::get("badword");
           $badword1 = array_combine($badword,array_fill(0,count($badword),'*'));
            $str = strtr($name, $badword1);
           if(strstr($str,"*")===false){
               return 1;
           }
           else{
               return 0;
           }
           
        }


        public function baiDuApi(){
            require_once 'BaiduApi.php';
        }


















}