<?php


namespace app\Models;


use RedBeanPHP\R;

class User extends AppModel
{
    public $table = 'users';

    public static function make(): User
    {
        return new static();
    }

    public function getUserByLogin(string $login)
    {
        return R::findOne($this->table, "WHERE `user_login` = ?", [$login]);
    }

    public function setHashToUser($user)
    {
        R::store($user);
    }

    public function getUserById(int $id)
    {
        return R::findOne($this->table, "WHERE `id` = ?", [$id]);
    }
}