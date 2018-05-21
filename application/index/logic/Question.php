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



    //获取h5题
    public function get_h5_questions(){
        //固定题目
        $fixed_question = $this->get_question_by_type("固定");
        //容易题目
        $easy_question = $this->get_question_by_type("容易");
        //困难题目
        $difficult_question = $this->get_question_by_type("困难");

        $h5_question_num = Config::get("h5_question_num");


        $easy_list = array();
        if($easy_question){
            $easy_num_rand = $this->get_range_num($h5_question_num['容易'],count($easy_question));
            for($n=0;$n<count($easy_num_rand);$n++){
                $easy_list[$n] = $easy_question[$n];
            }
        }
      
       $difficult_list = array();
       if($difficult_question){
            $difficult_num_rand = $this->get_range_num($h5_question_num['困难'],count($difficult_question));
            for($m=0;$m<count($difficult_num_rand);$m++){
                $difficult_list[$m] = $difficult_question[$m];
            }
        }

        $list = collection(array_merge($fixed_question,$easy_list,$difficult_list))->toArray();
        shuffle($list) ; //shuffle随机排序
        $result = array();
        foreach ($list as $key=>$value){
            $data = $this->get_question($value['id']);
            $result[$key]['question'] = $value;
            $result[$key]['answer'] = collection($data['answer'])->toArray();
        }
        return $result;
    }

    public function  get_range_num($need_num,$total_num){
        $num_range = range(0,$total_num-1);
        if($need_num<=$total_num-1){
            $result = array_rand($num_range,$need_num);
        }
       else{
           $result = $num_range;
       }
        return $result;
    }

}