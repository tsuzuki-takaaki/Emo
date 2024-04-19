<?php
require_once("./database.php");

class Article_affiliate_product{
    /* 記事IDに紐づいたaffiliate_product要素の探索 */
    public static function find_by_article($article_id) {
        $affiliate_product_ids = ORM::for_table('article_affiliate_product')->where('article_id', $article_id)->find_many();
        return $affiliate_product_ids;
    }
    
    /* アフィIDに紐づいたArticle要素の探索 */
    public static function find_by_affiliate_product($affiliate_product_id) {
        $article_ids = ORM::for_table('article_affiliate_product')->where('affiliate_product_id', $affiliate_product_id)->find_many();
        return $article_ids;
    }
    
    
    /* 全件取得 */
    public static function all(){
        $article_affiliate_products = ORM::for_table('article_affiliate_product')->find_array();
        return $article_affiliate_products;
    }

    /* 新規登録 */
    public static function save($article_id, $affiliate_product_id){
        $article_affiliate_product = ORM::for_table('article_affiliate_product')->create();
        $article_affiliate_product->article_id  = $article_id;
        $article_affiliate_product->affiliate_product_id = $affiliate_product_id;
        $article_affiliate_product->save();
    }
}