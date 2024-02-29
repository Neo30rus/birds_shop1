<?php

namespace app\repository;

use app\entity\Users;

class UserRepository
{
    public static function getUserById($id){
        return Users::find()->where(['id' => $id])->one();
    }

    public static function createUser($login, $password, $is_admin = false){
        $user = new Users();
        $user->login = $login;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->is_admin = $is_admin;
        $user->save();
        return $user->id;
    }

    public static function deleteUserById($id){
        return Users::deleteAll(['id' => $id]);
    }

    public static function updateUser($id, $email, $password){
        $user = Users::find()->where(['id' => $id])->one();
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->save();
        return $user->id;
    }

    public static function getUserByLogin($login){
        return Users::find()-> where(['login' => $login]) -> one();
    }

}