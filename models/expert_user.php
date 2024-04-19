<?php
require_once("./database.php");

class ExpertUser{
    /* 探索 */
    public static function find($id) {
        $expert_user = ORM::for_table('expert_users')->where_equal('id', $id)->find_one();
        return $expert_user;
    }
    
    /* 全件取得 */
    public static function all(){
        $expert_users = ORM::for_table('expert_users')->find_array();
        return $expert_users;
    }

    /* 新規登録 */
    public static function save($pass, $first_name, $family_name, $description, $major){
        $expert_user = ORM::for_table('expert_users')->create();
        $expert_user->pass = $pass;
        $expert_user->first_name  = $first_name;
        $expert_user->family_name = $family_name;
        $expert_user->description  = $description;
        $expert_user->major = $major;
        $expert_user->save();
        return $expert_user;
    }

    /* 更新 */
    public static function update($id, $pass, $first_name, $family_name, $description, $major){
        $expert_user = ExpertUser::find($id);
        $expert_user->pass = $pass;
        $expert_user->first_name  = $first_name;
        $expert_user->family_name  = $family_name;
        $expert_user->description  = $description;
        $expert_user->major = $major;
        $expert_user->save();
        return $expert_user;
    }
    
    /* 削除 */
    public static function delete($id){
        $user = ExpertUser::find($id);
        $user->delete();
    }
}