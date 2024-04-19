<?php
require_once("./database.php");

class Article{
    /* 探索 */
    public static function find($id) {
        $article = ORM::for_table('articles')->where('id', $id)->find_one();
        return $article;
    }
    
    /* 筆者IDでの記事検索 */
    public static function find_by_author($author_id){
        $articles = ORM::for_table('articles')->where('author_id', $author_id)->find_many();
        return $articles;
    }
    
    /* 全件取得 */
    public static function all(){
        $articles = ORM::for_table('articles')->find_array();
        return $articles;
    }

    /* 新規登録 */
    public static function save($title, $content, $author_id, $image_path){
        $article = ORM::for_table('articles')->create();
        $article->title  = $title;
        $article->content  = $content;
        $article->author_id  = $author_id;
        $article->image_path = $image_path;
        $article->save();
        // ToDo 返り値でidを持ったarticleが返ってきているか確認
        // すべてのmodelのsaveで要確認＆修正　特に、article, question
        return $article;
    }

    /* 更新 */
    public static function update($id, $title, $content, $author_id, $image_path){
        $article = Article::find($id);
        $article->title  = $title;
        $article->last_name  = $content;
        $article->author_id  = $author_id;
        $article->image_path = $image_path;
        $article->save();
        return $article;
    }
    
    /* 削除 */
    public static function delete($id){
        $article = Article::find($id);
        $article->delete();
    }
}