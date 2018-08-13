<?php
namespace  app\common\logic;
use think\Model;
use think\Db;

class Answer extends Model{

    protected $table="jckk_answer";


    //保存
    public  function  save_answer($data){

        $count = count( $data['sort']);
        if(isset($data['question_id'])){
            $question_id =  $data['question_id'];
            //修改
            for($i=0;$i<$count;$i++){
                $answer = model("answer","model")->where("id",$data['answer_id'][$i])->find();
                $answer->question_id = $question_id;
                $answer->sort =  $data['sort'][$i];
                $answer->content =  $data['content'][$i];
                $answer->score =  $data['score'][$i];
                $answer->save();
            }
        }
        else{
           //插入
            $question_id =  $data['new_question_id'];
            for($i=0;$i<$count;$i++){
                $array[$i]=[
                    "question_id"=>$question_id,
                    "sort"=>$data['sort'][$i],
                    "content"=>$data['content'][$i],
                    "score"=>$data['score'][$i],
                    "create_time"=>time(),
                ];
            }
            Db::name("jckk_answer")->insertAll($array);
        }

    }

    //获取列表
    public function get_answers_by_question($question_id){
        return $this->where("question_id",$question_id)->select();
    }


    //删除
    public function  delete_answer($id){

        $answer = $this->where("id",$id)->find();

        //添加日志
        $answer_log["type"] = Log::DELETE_TYPE;

        $answer_log["before_value"] = json_encode($answer);
        $answer_log["after_value"] = "";
        $answer_log["title"] = "删除".$answer->answer_name."(产品)，ID是".$answer->id;
        $answer->is_delete = 1;
        if($answer->save()){
            model("log","logic")->write_log( $answer_log);
        }



    }






}