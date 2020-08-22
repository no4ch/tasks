<?php


namespace app\Services\Login;


use app\Models\User;

class LoginHandler
{
    public static function make(): LoginHandler
    {
        return new static();
    }

    public function validation(string $login, $password)
    {
        $errors = [];
        if (!preg_match("/^[a-zA-Z0-9]+$/", $login)) {
            $errors[] = "Логин может состоять только из букв английского алфавита и цифр и не должен быть пустым";
        }
        if (!preg_match("/^[a-zA-Z0-9]+$/", $password)) {
            $errors[] = "Пароль может состоять только из букв английского алфавита и цифр и не должен быть пустым";
        }
        return $errors;
    }

    public function login(string $login, $password)
    {
        $user = User::make()->getUserByLogin($login);

        //проверка на наличие пользователя по логину в базе
        if (!$user) {
            return false;
        }

        //проверка на совпадение пароля
        if (!password_verify($password, $user->password)) {
            return false;
        }

        $hash = hash("md5", mt_rand(-100, 100));
        $user->hash = $hash;
        User::make()->setHashToUser($user);

        setcookie("id", $user->id, time() + 3600, "/");
        setcookie("hash", $hash, time() + 3600, "/");

        return true;
    }

    public function checkAdminRole()
    {
        if (isset($_COOKIE['id']) && isset($_COOKIE['hash'])) {
            $user = User::make()->getUserById($_COOKIE['id']);
            if ($user->hash == $_COOKIE["hash"]) {
                return true;
            }
        }

        return false;
    }
}