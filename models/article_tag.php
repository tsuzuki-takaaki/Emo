<?php
require_once("./database.php");

class Article_tag{
    /* 記事IDに紐づいたTag要素の探索 */
    public static function find_by_article($article_id) {
        $tag_ids = ORM::for_table('article_tag')->where('article_id', $article_id)->find_many();
        return $tag_ids;
    }
    
    /* タグIDに紐づいたArticle要素の探索 */
    public static function find_by_tag($tag_id) {
        $article_ids = ORM::for_table('article_tag')->where('tag_id', $tag_id)->find_many();
        return $article_ids;
    }
    
    
    /* 全件取得 */
    public static function all(){
        $article_tags = ORM::for_table('article_tag')->find_array();
        return $article_tags;
    }

    /* 新規登録 */
    public static function save($article_id, $tag_id){
        $article_tag = ORM::for_table('article_tag')->create();
        $article_tag->article_id  = $article_id;
        $article_tag->tag_id = $tag_id;
        $article_tag->save();
    }
}
