<?php
namespace  app\index\logic;
use think\Model;
use think\Config;
use think\Db;
use app\index\model\Log;
use think\Session;

class Question extends Model{

    protected $table="jckk_question";


    //保存
    public  function  save_question($data){

        if(isset($data['question_id'])){
            //修改
            $question = model("question","model")->where("id",$data['question_id'])->find();
            $question_log["type"] = Log::UPDATE_TYPE;
            $question_log["before_value"] = json_encode($question);
            $question_log["title"] = "更改题目信息";
        }
        else{
            //添加
            $question = model("question",'model');
            $question->create_time = time();
            $question_log["type"] = Log::ADD_TYPE;
            $question_log["before_value"] = "";
            $question_log["title"] = "添加新题目";
        }

        $question->title = trim($data['title']);
        $question->is_delete = 0;
        if(isset($data['question_type'])){
            $question->question_type = $data['question_type'];
        }
        else{
            $question->question_type = null;
        }

        if($question->save()){
            $question_log["after_value"] = json_encode($question);
            model("log","logic")->write_log( $question_log);
        }
        $data['new_question_id'] = $question->id;
        model("answer","logic")->save_answer($data);
        return $question->id;


    }

    //获取列表
    public function get_questions(){
        return $this->where("is_delete",0)->order("id desc")->select();
    }



    //获取一条
    public function get_question($id){

        $data['question'] = $this->where("id",$id)->find();
        $data['answer'] = model("answer","logic")->get_answers_by_question($id);
        return $data;


    }



    //删除
    public function  delete_question($id){

        $question = $this->where("id",$id)->find();

        //添加日志
        $question_log["type"] = Log::DELETE_TYPE;

        $question_log["before_value"] = json_encode($question);
        $question_log["after_value"] = "";
        $question_log["title"] = "删除".$question->question_name."(产品)，ID是".$question->id;
        $question->is_delete = 1;
        if($question->save()){
            model("log","logic")->write_log( $question_log);
        }



    }



    public function get_question_by_type($type){

        return $this->where("question_type",$type)->where("is_delete","<>",1)->select();

    }




}