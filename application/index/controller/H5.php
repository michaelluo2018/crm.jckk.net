<?php
namespace  app\index\controller;

use think\Config;
use think\Controller;
use Think\Image;




class H5 extends Controller {

        public function index(){
           $questions = model("question","logic")->get_h5_questions();
           dump($questions);
        }


        public function save_result(){
            $score = Request::instance()->post("score");
            $name = Request::instance()->post("name");
            //分数总值除以6，然后判断区间，随机获取昵称，随机获取3行内容，生成结果图片
            $average = array_sum($score)/6;
            //$name = "小二郎";
           // $average = 90;
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

            $orign_image = ROOT_PATH.'public'.DS.'static'.DS.'assets'.DS.'images'.DS.'1.jpg';
            $result_image = ROOT_PATH.'public'.DS.'uploads'.DS.date('YmdHis').DS.$name.rand(1000,99999).'.jpg';
            //生成图片
            $image = Image::open($orign_image);
            dump($image);die;
            $image->text($name,'字库','大小','#fffff')->save($result_image);
            $image->text($theme_result['theme'],'字库','大小','#fffff')->save($result_image);
            $image->text($theme_result['describe1'],'字库','大小','#fffff')->save($result_image);
            $image->text($theme_result['describe2'],'字库','大小','#fffff')->save($result_image);
            $image->text($theme_result['describe3'],'字库','大小','#fffff')->save($result_image);


        }



        public function badword($name){
           $badword = Config::get("badword");
           $badword1 = array_combine($badword,array_fill(0,count($badword),'*'));
           // $name = '抵制nnn共产主义';
            $str = strtr($name, $badword1);
            //dump($str);
            return $str;
        }


        public function baiDuApi(){
            require_once 'BaiduApi.php';
        }


















}