<?php
require_once("./database.php");

class AdminUser{
    /* 探索 */
    public static function find($id) {
        $admin_user = ORM::for_table('admin_users')->where_equal('id', $id)->find_one();
        return $admin_user;
    }
    
    /* 全件取得 */
    public static function all(){
        $admin_users = ORM::for_table('admin_users')->find_array();
        return $admin_users;
    }

    /* 新規登録 */
    public static function save($pass, $name){
        $admin_user = ORM::for_table('admin_users')->create();
        $admin_user->name  = $name;
        $admin_user->pass = $pass;
        $admin_user->save();
    }

    /* 更新 */
    public static function update($id, $name, $pass){
        $admin_user = AdminUser::find($id);
        $admin_user->name = $name;
        $admin_user->lv = $pass;
        $admin_user->save();
    }
    
    
    /* 削除 */
    public static function delete($id){
        $admin_user = AdminUser::find($id);
        $admin_user->delete();
    }
}
