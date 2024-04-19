<?php
class AffiliateProduct{
    /* 探索 */
    public static function find($id) {
        $affiliate_product = ORM::for_table('affiliate_products')->where_equal('id', $id)->find_one();
        return $affiliate_product;
    }
    
    /* 全件取得 */
    public static function all(){
        $affiliate_products = ORM::for_table('affiliate_products')->find_array();
        return $affiliate_products;
    }

    /* 新規登録 */
    public static function save($name, $price, $brand_name, $description, $image_path){
        $affiliate_product = ORM::for_table('affiliate_products')->create();
        $affiliate_product->name = $name;
        $affiliate_product->price  = $price;
        $affiliate_product->last_name  = $brand_name;
        $affiliate_product->description  = $description;
        $affiliate_product->image_path = $image_path;
        $affiliate_product->save();
        return $affiliate_product;
    }

    /* 更新 */
    public static function update($id, $name, $price, $brand_name, $description, $image_path){
        $affiliate_product = AffiliateProduct::find($id);
        $affiliate_product->name = $name;
        $affiliate_product->price  = $price;
        $affiliate_product->last_name  = $brand_name;
        $affiliate_product->description  = $description;
        $affiliate_product->image_path = $image_path;
        $affiliate_product->save();
        return $affiliate_product;
    }
    
    /* 削除 */
    public static function delete($id){
        $affiliate_product = AffiliateProduct::find($id);
        $affiliate_product->delete();
    }
}