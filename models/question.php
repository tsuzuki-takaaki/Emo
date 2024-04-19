<?php
require_once("./database.php");

class Question{
    /* 探索 */
    public static function find($id) {
        $question = ORM::for_table('questions')->where('id', $id)->find_one();
        return $question;
    }
    
    /* 全件取得 */
    public static function all(){
        $questions = ORM::for_table('questions')->find_many();
        return $questions;
    }

    /* 新規登録 */
    public static function save($title, $content, $tag_id){
        $question = ORM::for_table('questions')->create();
        $question->title  = $title;
        $question->content  = $content;
        $question->tag_id = $tag_id;
        $question->save();
        return $question;
    }

    /* 更新 */
    public static function update($id, $title, $content, $tag_id){
        $question = Question::find($id);
        $question->title  = $title;
        $question->content  = $content;
        $question->tag_id = $tag_id;
        $question->save();
        return $question;
    }
    
    /* 削除 */
    public static function delete($id){
        $question = Question::find($id);
        $question->delete();
    }
}