<?php
require_once("./database.php");

class Question_answer{
    /* 質問IDに紐づいたanswer要素の探索 */
    public static function find_by_question($question_id) {
        $answer_ids = ORM::for_table('question_answer')->where_equal('question_id', $question_id)->find_array();
        return $answer_ids;
    }
    
    /* 回答IDに紐づいたquestion要素の探索 */
    public static function find_by_answer($answer_id) {
        $question_ids = ORM::for_table('question_answer')->where_equal('answer_id', $answer_id)->find_array();
        return $question_ids;
    }
    
    
    /* 全件取得 */
    public static function all(){
        $question_answers = ORM::for_table('question_answer')->find_array();
        return $question_answers;
    }

    /* 新規登録 */
    public static function save($question_id, $answer_id){
        $question_answer = ORM::for_table('question_answer')->create();
        $question_answer->question_id  = $question_id;
        $question_answer->answer_id = $answer_id;
        $question_answer->save();
    }
}