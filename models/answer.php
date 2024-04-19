<?php
require_once("./database.php");

class Answer{
    /* 探索 */
    public static function find($id) {
        $answer = ORM::for_table('answers')->where_equal('id', $id)->find_one();
        return $answer;
    }
    
    /* 全件取得 */
    public static function all(){
        $answers = ORM::for_table('answers')->find_array();
        return $answers;
    }

    /* 新規登録 */
    public static function save($title, $content, $author_id){
        $answer = ORM::for_table('answers')->create();
        $answer->title  = $title;
        $answer->content = $content;
        $answer->author_id  = $author_id;
        $answer->save();
        return $answer;
    }

    /* 更新 */
    public static function update($id, $title, $content, $author_id){
        $answer = Answer::find($id);
        $answer->title  = $title;
        $answer->last_name  = $content;
        $answer->author_id  = $author_id;
        $answer->save();
        return $answer;
    }
    
    /* 削除 */
    public static function delete($id){
        $answer = Answer::find($id);
        $answer->delete();
    }
}