<?php
require_once("./database.php");

class Tag{
    /* 探索 */
    public static function find($id) {
        $tag = ORM::for_table('tags')->where_equal('id', $id)->find_one();
        return $tag;
    }
    
    /* 全件取得 */
    public static function all(){
        $tags = ORM::for_table('tags')->find_array();
        return $tags;
    }

    /* 新規登録 */
    public static function save($name){
        $tag = ORM::for_table('tags')->create();
        $tag->name  = $name;
        $tag->save();
        return $tag;
    }

    /* 更新 */
    public static function update($id, $name){
        $tag = Tag::find($id);
        $tag->name  = $name;
        $tag->save();
        return $tag;
    }
    
    /* 削除 */
    public static function delete($id){
        $tag = Tag::find($id);
        $tag->delete();
    }
}