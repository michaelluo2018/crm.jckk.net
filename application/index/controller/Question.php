<?php
namespace  app\index\controller;

use think\Config;
use think\Request;

class Question extends Base {

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $mid = $this->get_mid_by_url("index/question/question");
        $this->menu_id = $mid;
        $this->assign("mid",$this->menu_id);

    }

    //列表
    public function question(){

        $questions =  model('question','logic')->get_questions();

        $this->assign("questions",$questions);
        return view("question");
    }

    //添加
    public function question_add(){


//        if(!$this->check_post_menu_permission("add_operate")){
//            echo "<script> alert('没有权限！');history.back(-1);</script>";
//        }
//        else {
            $question_type = Config::get("question_type");
            $answer_sort = Config::get("answer_sort");
            $answer_score = Config::get("answer_score");
            $this->assign("question_type",$question_type);
            $this->assign("answer_sort",$answer_sort);
            $this->assign("answer_score",$answer_score);
            return view("question_add");
//        }
    }



    //保存
    public function save_question(){
        $data = Request::instance()->post();
        $res = model("question","logic")->save_question($data);
        if($res){
            $this->redirect("question");
        }
    }


    //修改

    public function  question_edit($id){

//        if(!$this->check_post_menu_permission("update_operate")){
//            echo "<script> alert('没有权限！');history.back(-1);</script>";
//        }
//        else {

            $question = model("question", "logic")->get_question($id);
            $question_type = Config::get("question_type");
            $answer_sort = Config::get("answer_sort");
            $answer_score = Config::get("answer_score");
            $this->assign("question_type",$question_type);
            $this->assign("answer_sort",$answer_sort);
            $this->assign("answer_score",$answer_score);
            $this->assign('question',$question['question']);
            $this->assign('answers',$question['answer']);
            return view("question_edit");
//        }
    }


    //删除

    public function  question_del($id){
        if(!$this->check_post_menu_permission("delete_operate")){
            echo "<script> alert('没有权限！');history.back(-1);</script>";
        }
        else {
            model("question", "logic")->delete_question($id);

            $this->redirect("question");
        }

    }


    //信息查看

    public function  question_des($id){

        //获得一条项目信息
        $question = model("question", "logic")->get_question($id);
        $this->assign('question',$question['question']);
        $this->assign('answers',$question['answer']);
        return view("question_des");

    }



















}